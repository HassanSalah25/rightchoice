@extends('layouts.app')

@section('title', 'Users')
@section('headerStyle')

<!-- DataTables -->
<link href="{{ URL::asset('plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ URL::asset('plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

@stop

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>المستخدمون</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('user.create') }}">
                        اضف جديد
                    </a>
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
                                    <th>ID</th>
                                    <th>اسم</th>
                                    <th>زمن</th>
                                    <th>نوع</th>
                                    <th>البريد الإلكتروني</th>
                                    <th>التليفون المحمول</th>
                                    <th>حالة</th>
                                    <th>حدث</th>
                                </tr>
                                <!--end tr-->
                            </thead>

                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>{{$user->TYPE}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->MOP}}</td>
                                    <td>
                                        @php
                                            if($user->status == 1){
                                               $status = '<span class="badge badge-success">Active</span>';
                                           }elseif($user->status == 0){
                                               $status = '<span class="badge badge-warning">Wait</span>';
                                           }else{
                                               $status = '<span class="badge badge-danger">UnActive</span>';
                                           }
                                        @endphp
                                        {!! $status !!}
                                    </td>
                                    <td>
                                        @php
                                                $all  = '<!--<a data-toggle="tooltip" data-skin-class="tooltip-primary"  data-placement="top" title = "Show User Profile" href = "' . url('/users/' . $user->id) . '"   class="btn btn-sm btn-outline-primary"><i class="fas fa-user"></i></a>--> ';
                                               if ($user->status == 1) {
                                                   $all .= '<a onClick="return confirm(\'Are You Sure You Want To Block This Users?\')" data-toggle="tooltip" data-skin-class="tooltip-danger"  data-placement="top" title = "Block User" href="' . url('/users/' . $user->id . '/block') . '"  class="btn btn-sm btn-outline-danger ml-2"><i class="fas fa-times"></i></a>';
                                               } else {

                                                   $all .= '<a onClick="return confirm(\'Are You Sure You Want To Active This User ?\')" data-toggle="tooltip" data-skin-class="tooltip-danger" data-placement="top" title = "Active User"  href="' . url('/users/' . $user->id . '/activate') . '"  class="btn btn-sm btn-outline-success ml-2"><i class="fas fa-check"></i></a>';
                                               }
                                               $all .= '<a onClick="return confirm(\'Are You Sure You Want To Delete This Record ?  \')" data-toggle="tooltip" data-skin-class="tooltip-danger"  data-placement="top" title = "Delete" href = "' . url('/users/' . $user->id . '/delete'). '"  class="btn btn-sm btn-outline-danger ml-2" style="margin-left:5px"><i class="fas fa-trash"></i></a>';
                                               $all .= '<a     href = "' . url('/user/' . $user->id . '/edit'). '"  class="btn btn-sm btn-outline-edit   ml-2" style="margin-left:5px"><i class="fas fa-edit  "></i></a>';

                                        @endphp
                                        {!! $all !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                <div class="card-footer clearfix float-right">
                    <div class="float-right">
                        {{$users->links()}}

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('footerScript')
<script src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ URL::asset('plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>

@endsection

