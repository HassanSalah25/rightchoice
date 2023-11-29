@extends('layouts.app')

@section('title', 'Users')
@section('headerStyle')

    <!-- DataTables -->
    <link href="{{ URL::asset('plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Responsive datatable examples -->
    <link href="{{ URL::asset('plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>

@stop

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>التفاصيل</h1>
                </div>

            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        @include('components.filter_search',['route_name' => 'user.index'])
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table id="datatable" class="table">
                        <thead class="thead-light">
                        <tr>
                            <th>العقار</th>
                            <th>النقط</th>
                            <th>السبب</th>
                            <th>التاريخ</th>
                            <th>الحدث</th>
                        </tr>
                        <!--end tr-->
                        </thead>

                        <tbody>
                        @foreach($aqars_views as $view)

                            <tr>
                                <th>{{$view->title}}</th>
                                <th>{{ $view->points_avail }}</th>
                                <th>
                                    @php
                                        $reason = \App\Models\Activity::where('subject_id',$view->id)
                                        ->where('subject_type','App\Models\aqar')
                                        ->where('description','refund')
                                        ->first();
                                    @endphp
                                    @if($reason)
                                        {{$reason->comment}}
                                    @else
                                        لا يوجد
                                    @endif
                                </th>
                                <th>{{\Carbon\Carbon::parse($view->created_at)->format('d/m/Y h:i A')}}</th>
                                <th>
                                    @if(!$reason)
                                    <a class="btn btn-danger actionLink"
                                       data-toggle="modal"
                                       data-target="#confirmationModal{{$view->id}}"
                                       data-aqar_id="{{$view->id}}"
                                    >استرجاع</a>
                                    @endif
                                </th>
                            </tr>

                            <!-- Include your modal structure -->
                            <div class="modal" tabindex="-1" role="dialog" id="confirmationModal{{$view->id}}">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form action="{{route('user.refund',$user)}}" class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">تأكيد</h5>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="aqar_id" value="{{$view->id}}">
                                                <input type="hidden" name="points" value="{{$view->points_avail}}">
                                                <h4 class="text-start mx-3">هل تريد الاستكمال؟</h4>
                                                <hr>
                                                <div class="row m-2">
                                                    <label for="reason">السبب؟</label>
                                                    <textarea name="reason" required class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    الغاء
                                                </button>
                                                <button type="submit" class="btn btn-success" id="confirmActionBtn">
                                                    تأكيد
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix float-right">
                    <div class="float-right">


                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
@section('footerScript')
    <script>
        $(document).ready(function () {
            var aqar_id;
            // Open modal when the link is clicked
            $(".actionLink").click(function () {
                aqar_id = $(this).data('aqar_id');
                $("#confirmationModal").modal('show');
            });

            // Handle AJAX request when "Done" is clicked
        });
    </script>
    <script src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ URL::asset('plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>

@endsection

