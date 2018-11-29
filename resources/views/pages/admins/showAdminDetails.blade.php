@extends('layouts.app')
@section('content')

    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-12 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
                    <li class="breadcrumb-item active">{{$adminDetail['lastName']."'s Profile"}}</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Column -->
        <div class="col-lg-12 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                        <h3 class="card-title text-danger">{{$adminDetail['firstName']." ".$adminDetail['lastName']."'s Profile"}}</h3>
                    {!! Form::open(['class'=>'form-horizontal form-material']) !!}
                    <div class="form-group row m-t-20">
                        <div class="col-md-3">
                            {{Form::label('username','Title')}}
                            {{Form::text('username',$adminDetail['title'],['class'=>'form-control','placeholder'=>'Username','readonly'] )}}
                        </div>
                        <div class="col-md-3">
                            {{Form::label('username','First Name')}}
                            {{Form::text('username',$adminDetail['firstName'],['class'=>'form-control','placeholder'=>'Username','readonly'] )}}
                        </div>
                        <div class="col-md-3">
                            {{Form::label('username','Last Name')}}
                            {{Form::text('username',$adminDetail['lastName'],['class'=>'form-control','placeholder'=>'Username','readonly'] )}}
                        </div>
                        <div class="col-md-3">
                            {{Form::label('username','Username')}}
                            {{Form::text('username',$adminDetail['username'],['class'=>'form-control','placeholder'=>'Username','readonly'] )}}
                        </div>
                    </div>


                    <div class="form-group row m-t-20">
                        <div class="col-md-4">
                            {{Form::label('username','Phone Number')}}
                            {{Form::text('username',$adminDetail['phoneNumber'],['class'=>'form-control','placeholder'=>'Username','readonly'] )}}
                        </div>
                        <div class="col-md-4">
                            {{Form::label('username','Date of Birth')}}
                            {{Form::text('username',$adminDetail['dateOfBirth'],['class'=>'form-control','placeholder'=>'Username','readonly'] )}}
                        </div>
                        <div class="col-md-4">
                            {{Form::label('username','Home Town')}}
                            {{Form::text('username',$adminDetail['homeTown'],['class'=>'form-control','placeholder'=>'Username','readonly'] )}}
                        </div>
                    </div>

                    <div class="form-group row m-t-20">
                        <div class="col-md-4">
                            {{Form::label('username','Gender')}}
                            {{Form::text('username',$adminDetail['gender'],['class'=>'form-control','placeholder'=>'Username','readonly'] )}}
                        </div>
                        <div class="col-md-4">
                            {{Form::label('username','Date of Birth')}}
                            {{Form::text('username',$adminDetail['address'],['class'=>'form-control','placeholder'=>'Username','readonly'] )}}
                        </div>
                        <div class="col-md-4">
                            {{Form::label('username','Email')}}
                            {{Form::text('username',$adminDetail['email'],['class'=>'form-control','placeholder'=>'Username','readonly'] )}}
                        </div>
                    </div>
                    {!! Form::close() !!}
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