@extends('layouts.app')
@section('content')

    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-12 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Registered Student</a></li>
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
                                <div class="col-md-6">
                                    @if(session('success'))
                                        <div class="alert alert-success" role="alert">
                                            <h3 class="mb-0">{{session('success')}}</h3>
                                        </div>
                                    @endif
                                    @if(session('payment_success'))
                                        <div class="alert alert-success" role="alert">
                                            <h3 class="mb-0">{{session('payment_success')}}</h3>
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

                            </div>
                            <div class="table-responsive m-t-40">
                                <h3>All registered student</h3>
                                <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th >Name</th>
                                        <th >Index Number</th>
                                        <th >Level</th>
                                        <th >Phone</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th >Name</th>
                                        <th >Index Number</th>
                                        <th >Level</th>
                                        <th >Phone</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($allStudent as $student =>$row)
                                        <tr>
                                            <td>{{$row->lastName." ".$row->firstName." ".$row->otherName}}</td>
                                            <td>{{$row->indexNumber}}</td>
                                            <td>{{$row->level->name}}</td>
                                            <td>{{$row->phone}}</td>
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