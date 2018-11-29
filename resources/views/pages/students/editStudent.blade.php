@extends('layouts.app')
@section('content')

    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-12 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Student</a></li>
                            <li class="breadcrumb-item active">Update Student</li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button type="button" class="btn btn-info "><i class="fa fa-plus-circle"></i> Add New</button>
                                    <button type="button" class="btn btn-success "><i class="fa fa-upload"></i> Upload Student(s)</button>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                {!! Form::open(['action' => ['StudentController@update',$student->id],'method'=>'POST','class'=>'form-horizontal form-material needs-validation','novalidate' ]) !!}
                                <div class="container">
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            {{Form::label('firstName','First name')}}
                                            {{Form::text('firstName',$student->firstName,['class'=>'form-control','placeholder'=>'First name','required'] )}}
                                            <div class="invalid-feedback">
                                                First name is required
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            {{Form::label('lastName','Last name')}}
                                            {{Form::text('lastName',$student->lastName,['class'=>'form-control','placeholder'=>'Last name','required'] )}}
                                            <div class="invalid-feedback">
                                                Last name is required
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            {{Form::label('otherName','Other name')}}
                                            {{Form::text('otherName',$student->otherName,['class'=>'form-control','placeholder'=>'Other name'] )}}
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            {{Form::label('indexNumber','Index Number')}}
                                            {{Form::text('indexNumber',$student->indexNumber,['class'=>'form-control','placeholder'=>'Index Number','required'] )}}
                                            <div class="invalid-feedback">
                                                Index Number is required
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <label for="level">Level</label>
                                                <select class="custom-select form-control" required  name="level">
                                                    <option value="{{$student->level['id']}}">{{$student->level['name']}}</option>
                                                    @foreach($level as $lvl)
                                                        <option value="{{$lvl->id}}">{{$lvl->name}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">
                                                    Level is required is required
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            {{Form::label('phoneNumber','Phone Number')}}
                                            {{Form::text('phoneNumber',$student->phone,['class'=>'form-control','placeholder'=>'Phone Number','required'] )}}
                                            <div class="invalid-feedback">
                                                Phone Number is required
                                            </div>
                                        </div>
                                        <div>
                                            {{Form::hidden('_method','PUT')}}
                                            <button class="btn btn-primary" type="submit">Submit form</button>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection