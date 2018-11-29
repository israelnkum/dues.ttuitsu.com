@extends('layouts.app')
@section('content')

    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-12 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Admin(s)</a></li>
                    <li class="breadcrumb-item active">All Administrators</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Administrators</h4>
                    <h6 class="card-subtitle">Both Admin's and Super Admin's</h6>
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>User type</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>User type</th>
                                <th>Action</th>

                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($allAdmin as $admin)
                                <tr>
                                    <td>{{$admin['firstName']." ".$admin['lastName']}}</td>
                                    <td>{{$admin['username']}}</td>
                                    <td>{{$admin['email']}}</td>
                                    <td>{{$admin['phoneNumber']}}</td>
                                    <td><label class="badge badge-info">Admin</label></td>
                                    <td>
                                        <div class="row">
                                            <a href="{{route('admin.showDetails',[$admin['id'],$admin['userType']])}}" class="btn btn-success mr-3 text-white">
                                                <i class="mdi mdi-face-profile "></i>
                                            </a>
                                            {!! Form::open(['route' => ['admin.deleteAdmin',$admin['id'],$admin['userType']],'method'=>'POST','class'=>'form-horizontal form-material']) !!}
                                            {{Form::hidden('_method','DELETE')}}
                                            <button type="submit" class="btn btn-danger mr-0 text-white">
                                                <i class="mdi mdi-delete"></i>
                                            </button>
                                            {!! Form::close() !!}
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                            @foreach($allSuperAdmin as $admin)
                                <tr>
                                    <td>{{$admin['firstName']." ".$admin['lastName']}}</td>
                                    <td>{{$admin['username']}}</td>
                                    <td>{{$admin['email']}}</td>
                                    <td>{{$admin['phoneNumber']}}</td>
                                    <td><label class="badge badge-success">Super Admin</label></td>
                                    <td>
                                        <div class="row">
                                            <a href="{{route('admin.showDetails',[$admin['id'],$admin['userType']])}}" class="btn btn-success mr-3 text-white">
                                                <i class="mdi mdi-face-profile "></i>
                                            </a>
                                            {!! Form::open(['route' => ['admin.deleteAdmin',$admin['id'],$admin['userType']],'method'=>'POST','class'=>'form-horizontal form-material']) !!}
                                            {{Form::hidden('_method','DELETE')}}
                                            <button type="submit" class="btn btn-danger mr-0 text-white">
                                                <i class="mdi mdi-delete"></i>
                                            </button>
                                            {!! Form::close() !!}
                                        </div>
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
@endsection