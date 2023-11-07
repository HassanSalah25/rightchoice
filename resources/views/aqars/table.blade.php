 @extends('layouts.app')
@section('title', 'Aqars')
@section('content')
@   <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Aqars</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('aqars.create') }}">
                        Add New
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">

<!-- DataTables -->
<link href="{{ URL::asset('plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ URL::asset('plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

 



 

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                    <div class="table-responsive">
                        <table id="datatable" class="table">
                            <div class="col-sm-12 col-md-6"><div id="datatable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="datatable"></label></div></div>
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>الاسم</th>
                                    <th>محافظه</th>
                                    <th>تاريخ الاضافه </th>
                                    <th>نوع الوحده</th>
                                    <th>التمييز</th>
                                    <th>الحاله </th>
                                    <th>اسم المالك</th>
                                    <th> المشاهدات   </th>
                                    <th>التنفيذ</th>
                                    
                                </tr>
                                <!--end tr-->
                            </thead>

                         <tbody>
                             
                                 @foreach($allAqars as $allAqars_val)

                            <tr>
                              <td> {{ $allAqars_val->id }} </td>
                              <td>   <?php  echo \Illuminate\Support\Str::limit($allAqars_val->title  , 30 , '') ;?> </td>
                              <td> {{ $allAqars_val->governrateq->governrate }} </td>
                              <td>   <?php echo date_format($allAqars_val->created_at,"Y/m/d  ");?> </td>
                              <td> {{ $allAqars_val->propertyType->property_type}} </td>
                              <td> {{ $allAqars_val->vip }} </td>
                              <td> {{ $allAqars_val->status }} </td>
                              <td>
                                   <a href="https://rightchoice-co.com/admin/public/user/{{ $allAqars_val->user->id }}/edit">   {{ $allAqars_val->user->name }}  </a>
                              </td>
                              <td> {{ $allAqars_val->views }} </td>
 
                               <td>
                {!! Form::open(['route' => ['aqars.destroy', $allAqars_val->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                     <a href="{!! route('aqars.edit', [$allAqars_val->id]) !!}" class='fas fa-edit text-info font-18'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'fa fa-trash text-danger font-18', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
            
            
                            </tr>
                            
                             @endforeach
                           
                          </tbody>
                        </table>
                    </div>
                <div class="card-footer clearfix float-right">
                    <div class="float-right">
                        <?php echo $allAqars->render(); ?>

                    </div>
                </div>
            </div>

        </div>
    </div>
    
    
    <script src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ URL::asset('plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>


 <div class="card-footer clearfix float-right">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection


 