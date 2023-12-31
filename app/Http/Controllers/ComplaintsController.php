<?php

namespace App\Http\Controllers;

use App\DataTables\ComplaintsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateComplaintsRequest;
use App\Http\Requests\UpdateComplaintsRequest;
use App\Models\Company;
use App\Models\Complaints;
use App\Repositories\ComplaintsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Response;
use App\Models\User;
use App\Models\aqar;
use App\Models\Activity;

class ComplaintsController extends AppBaseController
{
    /** @var  ComplaintsRepository */
    private $complaintsRepository;

    public function __construct(ComplaintsRepository $complaintsRepo)
    {
        $this->complaintsRepository = $complaintsRepo;
    }

    /**
     * Display a listing of the Complaints.
     *
     * @param ComplaintsDataTable $complaintsDataTable
     * @return Response
     */
    public function index(ComplaintsDataTable $complaintsDataTable)
    {
        return $complaintsDataTable->render('complaints.index');
    }

    /**
     * Show the form for creating a new Complaints.
     *
     * @return Response
     */
    public function create()
    {

        return view('complaints.create');
    }

    /**
     * Store a newly created Complaints in storage.
     *
     * @param CreateComplaintsRequest $request
     *
     * @return Response
     */
    public function store(CreateComplaintsRequest $request)
    {
        $input = $request->all();

        $complaints = $this->complaintsRepository->create($input);

        Flash::success('Complaints saved successfully.');

        return redirect(route('complaints.index'));
    }

    /**
     * Display the specified Complaints.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $complaints = $this->complaintsRepository->find($id);

        if (empty($complaints)) {
            Flash::error('Complaints not found');

            return redirect(route('complaints.index'));
        }
        $GetUsers = User::pluck('name', 'id');
        $Getaqar = aqar::pluck('title', 'id');
        return view('complaints.show', compact('GetUsers', 'Getaqar'))->with('complaints', $complaints);
    }

    /**
     * Show the form for editing the specified Complaints.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $complaints = $this->complaintsRepository->find($id);

        if (empty($complaints)) {
            Flash::error('Complaints not found');

            return redirect(route('complaints.index'));
        }

        $GetUsers = User::get();
        $Getaqar = aqar::pluck('title', 'id');

        $activity_logs = Activity::forSubject($complaints)->orderBy('id', 'DESC')->paginate(10);

        //   dd($complaints);
        return view('complaints.edit', compact('GetUsers', 'activity_logs', 'Getaqar'))->with('complaints', $complaints);
    }

    /**
     * Update the specified Complaints in storage.
     *
     * @param int $id
     * @param UpdateComplaintsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateComplaintsRequest $request)
    {
        $complaints = $this->complaintsRepository->find($id);

        if (empty($complaints)) {
            Flash::error('Complaints not found');

            return redirect(route('complaints.index'));
        }

        $complaints = $this->complaintsRepository->update($request->all(), $id);
        if ($request->send_email != "on" && $request->status == Complaints::COMPLAINT_SOLVED) {
            $complaints->update(['sent_email' => 1]);
            if ($complaints->userinfo->email)
                Mail::to($complaints->userinfo->email)
                    ->send(new \App\Mail\MaiableClass($complaints->userinfo->name));
        }
        activity()
            ->causedBy(Auth::user())
            ->performedOn($complaints)
            ->tap(function (Activity $activity) use ($request) {
                $activity->comment = $request->comment;
            })
            ->withProperties($request->except(['_method', '_token']))
            ->log('edited');

        Flash::success('Complaints updated successfully.');

        return redirect(route('complaints.index'));
    }

    /**
     * Remove the specified Complaints from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $complaints = $this->complaintsRepository->find($id);

        if (empty($complaints)) {
            Flash::error('Complaints not found');

            return redirect(route('complaints.index'));
        }

        $this->complaintsRepository->delete($id);

        Flash::success('Complaints deleted successfully.');

        return redirect(route('complaints.index'));
    }

}
