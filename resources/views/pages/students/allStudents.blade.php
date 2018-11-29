@extends('layouts.app')
@section('content')

    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">
            @if (isset($_GET['payment_success']))
                <div class="alert alert-success bg-success text-center text-white alert-dismissable mb-0">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Payment</strong>  made successfully
                </div>
            @endif
        </div>
    </div>
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-12 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Student</a></li>
                            <li class="breadcrumb-item active">All Student</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Info box -->
            <!-- ============================================================== -->


            <!-- ============================================================== -->
            <!-- End Info box -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a role="button" href="{{route('student.create')}}" class="btn btn-info "><i class="fa fa-plus-circle"></i> Add New</a>
                                    <a role="button" href="{{route('studentUpload.index')}}" class="btn btn-success "><i class="fa fa-upload"></i> Upload Student(s)</a>
                                </div>
                            </div>
                            <div class="table-responsive m-t-40">
                                <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th >Name</th>
                                        <th >Index Number</th>
                                        <th >Level</th>
                                        <th >Souvenir</th>
                                        <th >Status</th>
                                        <th >Phone</th>
                                        <th >Action</th>
                                        <th >Payment</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th >Name</th>
                                        <th >Index Number</th>
                                        <th >Level</th>
                                        <th >Souvenir</th>
                                        <th >Status</th>
                                        <th >Phone</th>
                                        <th >Action</th>
                                        <th >Payment</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($allStudent as $student =>$row)
                                        <tr>
                                            <td>{{$row->lastName." ".$row->firstName." ".$row->otherName}}</td>
                                            <td>{{$row->indexNumber}}</td>
                                            <td>{{$row->level->name}}</td>
                                            <td>
                                                {{$row->souvenir}}
                                            </td>
                                            <td>
                                                @if($row->amount_paid > 0 && $row->amount_paid <$row['level']->amountPaying)
                                                    <a role="button" href="javascript:void(0)" class="btn btn-sm btn-primary">
                                                        Part Payment <span class="badge badge-light">{{$row['amount_paid']}}</span>
                                                    </a>
                                                @elseif($row['amount_paid']==0)

                                                    <a role="button" href="javascript:void(0)" class="btn btn-sm btn-danger">
                                                        Owing <span class="badge badge-light">{{$row['amount_paid']}}</span>
                                                    </a>
                                                @elseif($row['level']->amountPaying == $row->amount_paid)
                                                    <a role="button" href="javascript:void(0)" class="btn btn-sm btn-success">
                                                        Full Payment <span class="badge badge-light">{{$row['amount_paid']}}</span>
                                                    </a>
                                                @endif
                                            </td>
                                            <td>{{$row['phone']}}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <a role="button" href="/student/{{$row->id}}/edit" data-toggle="tooltip" data-placement="top" title="Edit Student Info" class="btn btn-outline-success btn-sm">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-4">
                                                        {!! Form::open(['action'=>['StudentController@destroy',$row->id],'method'=>'POST','onsubmit'=>'return confirm("Do you want to DELETE this Student?");']) !!}
                                                        {{Form::hidden('_method','DELETE')}}
                                                        <button type="submit" class="btn btn-outline-danger btn-sm" data-placement="top" title="Delete Student Info">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                        {!! Form::close()!!}
                                                    </div>
                                                    <div class="col-md-4">
                                                        @if($row->registered==1)
                                                            <button type="submit" data-placement="top" title="Register Student" class="btn btn-outline-primary btn-sm disabled">
                                                                <i class="fa fa-registered"></i>
                                                            </button>
                                                            @else
                                                            {!! Form::open(['action'=>['RegistrationController@update',$row->id],'method'=>'POST','onsubmit'=>'return confirm("Do you want to REGISTER this Student?");']) !!}
                                                            {{Form::hidden('_method','PUT')}}
                                                            <button type="submit" data-placement="top" title="Register Student" class="btn btn-outline-primary btn-sm">
                                                                <i class="fa fa-registered"></i>
                                                            </button>
                                                            {!! Form::close()!!}

                                                            @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                {{-- Make Payment button --}}
                                                @if($row['level']->amountPaying == $row->amount_paid && substr_count($row->souvenir, ",")+1 == $souvenirs)
                                                    <a role="button" href="/payment/{{$row->id}}/edit" class="btn btn-primary btn-sm disabled">
                                                        <i class="fa fa-money"></i>
                                                    </a>
                                                @else
                                                    <a role="button" href="/payment/{{$row->id}}/edit" class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Make Payment">
                                                        <i class="fa fa-money"></i>
                                                    </a>
                                                @endif

                                                {{-- Reverse Payment button --}}
                                                {{--/reversePayment/{{$row->id}}/edit--}}
                                                <a role="button" href="javascript:void(0)" class="btn btn-outline-warning btn-sm" data-toggle="tooltip" data-placement="left" title="Reverse Payment">
                                                    <i class="fa fa-recycle"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection