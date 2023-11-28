<!-- User Id Field -->
<div class="form-group col-sm-6">
{{--    <a class="btn" data-toggle="modal" data-target="#exampleModal">--}}
    <a href="{{route('user.edit',$complaints->user_id)}}">
        {!! Form::label('user_id', 'User:') !!}
    </a>
    <select disabled name="user_id" class="form-control custom-select">
        <option value="">اختار</option>

        @foreach ($GetUsers as $user_val)
            <option value="{{ $user_val->id}}" <?php if ($complaints->user_id == $user_val->id) {
                echo 'selected';
            } ?> >{{ $user_val->name }}</option>

        @endforeach
    </select>


</div>

<!-- Aqar Id Field -->
<div class="form-group col-sm-6">

    <a href="{{route('aqars.edit',$complaints->aqars_id)}}">
     Aqar </a>
    {!! Form::select('aqars_id', $Getaqar, null, ['placeholder' => 'Please select ...','class' => 'form-control custom-select', 'disabled' => 'disabled']) !!}
</div>


<!-- Aqar Id Field -->
<div class="form-group col-sm-6">
    <label>الحالة</label>
    <select name="status" class="form-control custom-select" id="status_select">
        <option value="">اختار</option>
        <option value="{{\App\Models\Complaints::COMPLAINT_PENDING}}"
            {{$complaints->status == \App\Models\Complaints::COMPLAINT_PENDING ? 'selected' : ''}}
        >متوقف
        </option>
        <option value="{{\App\Models\Complaints::COMPLAINT_INPROGRESS}}"
            {{$complaints->status == \App\Models\Complaints::COMPLAINT_INPROGRESS ? 'selected' : ''}}
        >جاري العمل عليه
        </option>
        <option value="{{\App\Models\Complaints::COMPLAINT_SOLVED}}"
            {{$complaints->status == \App\Models\Complaints::COMPLAINT_SOLVED ? 'selected' : ''}}
        >تم الحل
        </option>

    </select>
</div>

<!-- Aqar Id Field -->
<div class="form-group col-sm-6 " id="send_email">
    <label>عدم الارسال الي البريد الالكتروني</label>
    <input type="checkbox" class="checkbox m-3 " name="send_email" @if($complaints->sent_email == 1) checked @endif>
</div>
<!-- Message Field -->
<div class="form-group col-sm-6">
    {!! Form::label('message', 'Message:') !!}
    {!! Form::text('message', null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
</div>
<div class="col-lg-4">
    <label>الوقت:</label>
    <br/>
    <input disabled value="{{ $complaints->created_at }}"/>
</div>

<div class="row mt-3">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                    type="button" role="tab" aria-controls="pills-home" aria-selected="true">سجلات النشاط
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                    type="button" role="tab" aria-controls="pills-profile" aria-selected="false">اترك تعليقك
            </button>
        </li>

    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
             tabindex="0">
            @include('activity_log.index')
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
            @include('activity_log.create')
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label>الاسم</label>
                        <input type="text" class="form-control"
                               disabled value="{{$complaints->userinfo->name}}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label>البريد الالكتروني</label>
                        <input type="text" class="form-control"
                               disabled value="{{$complaints->userinfo->email}}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label>الهاتف</label>
                        <input type="text" class="form-control"
                               disabled value="{{$complaints->userinfo->MOP}}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label>الحالة</label>
                        <input type="text" class="form-control"
                               disabled value="{{$complaints->userinfo->getStatus()}}">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label>الاسم</label>
                        <input type="text" class="form-control"
                               disabled value="{{$complaints->aqarinfo->title}}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label>الهاتف</label>
                        <input type="text" class="form-control"
                               disabled value="{{$complaints->aqarinfo->user->MOP}}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label>القسم</label>
                        <input type="text" class="form-control"
                               disabled value="{{$complaints->aqarinfo->category_rel->category_name}}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label>الحالة</label>
                        <input type="text" class="form-control"
                               disabled value="{{$complaints->aqarinfo->getStatus()}}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label>الحالة</label>
                        <input type="text" class="form-control"
                               disabled value="{{$complaints->aqarinfo->getStatus()}}">
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
