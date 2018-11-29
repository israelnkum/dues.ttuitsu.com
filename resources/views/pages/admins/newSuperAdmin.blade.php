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
                    <li class="breadcrumb-item active">New Super Administrator</li>
                </ol>
            </div>
        </div>
    </div>
    @if(session('success'))

        <div>
            <h3 class="text-danger">{{session('success')}}</h3>
        </div>
    @endif
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title text-danger">New Super Administrator</h4>
                    </div>

                    {!! Form::open(['action' => 'AdminController@storeSuperAdmin','method'=>'POST','class'=>'form-horizontal form-material']) !!}
                    <div class="form-group m-t-20">
                        {{Form::label('username','Username')}}
                        {{Form::text('username','',['class'=>'form-control','placeholder'=>'Username here','required'] )}}
                    </div>

                    <div class="form-group m-t-20">
                        {{Form::label('phoneNumber','Phone')}}
                        {{Form::text('phoneNumber','',['class'=>'form-control phone-inputmask','placeholder'=>'Phone number here','required'] )}}
                    </div>

                    <div class="form-group m-t-20">
                        {{Form::label('email','Email')}}
                        {{Form::email('email','',['class'=>'form-control ','placeholder'=>'Enter Email Address','required'] )}}
                    </div>

                    {{Form::submit('Submit',['class'=>'btn btn-block btn-success'])}}
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone</th>

                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone</th>

                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($allSuperAdmin as $superAdmin)
                                <tr>
                                    <td>{{$superAdmin['username']}}</td>
                                    <td>{{$superAdmin['email']}}</td>
                                    <td>{{$superAdmin['phoneNumber']}}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->

@endsection