@extends('layouts.app')
@section('content')

    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Payment Log</li>
                    </ol>
                </div>

                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <div class="chart-text m-r-10  d-none d-lg-block m-l-15">
                            <h5 class="m-b-0"><small>Total Logs</small></h5>
                            <h4 class="m-t-0 text-info">
                                {{$countLogs}}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- End Info box -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    @if(session('success'))
                                        <div class="alert alert-success" role="alert">
                                            <h3 class="mb-0">{{session('success')}}</h3>
                                        </div>
                                    @endif

                                    @if(session('update_success'))
                                        <div class="alert alert-success" role="alert">
                                            <h3 class="mb-0">{{session('update_success')}}</h3>
                                        </div>
                                    @endif

                                    @if(session('delete_success'))
                                        <div class="alert alert-success" role="alert">
                                            <h3 class="mb-0">{{session('delete_success')}}</h3>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6 text-right">

                                </div>
                            </div>
                            <div class="col-md-12 text-right">
                                <a role="button" href="{{route('student.index')}}" class="btn btn-info ">
                                    <i class="fa fa-arrow-circle-left"></i>Go Back</a>
                            </div>
                            <div class="table-responsive m-t-40">
                                <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Index Number</th>
                                        <th>Level</th>
                                        <th>Dues Paid</th>
                                        <th>Receipt Number</th>
                                        <th>Payment Type</th>
                                        <th>Date Time</th>
                                        <th>User</th>
                                        <th>Print</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Index Number</th>
                                        <th>Level</th>
                                        <th>Dues Paid</th>
                                        <th>Receipt Number</th>
                                        <th>Payment Type</th>
                                        <th>Date Time</th>
                                        <th>User</th>
                                        <th>Print</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($paymentLog as $logs =>$row)
                                        <tr>
                                            <td>{{$row->student->lastName." ".$row->student->firstName." ".$row->student->otherName}}</td>
                                            <td>{{$row->student->indexNumber}}</td>
                                            <td>{{$row->student->level->name}}</td>
                                            <td>{{$row->amountPaid}}</td>
                                            <td>{{"ITSU".$row->receiptNumber}}</td>
                                            <td>{{$row->paymentType}}</td>
                                            <td>{{$row->created_at}}</td>
                                            <td>{{$row->currentUser}}</td>
                                            <td>
                                                <a data-toggle="tooltip" data-placement="top" title="Generate Receipt" class="btn btn-outline-cyan btn-sm" role="button" href="/print/{{$row->id}}/">
                                                    <i class="mdi mdi-printer"></i> Receipt
                                                </a>
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