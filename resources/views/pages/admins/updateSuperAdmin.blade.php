@extends('layouts.app')
@section('content')
    <div class="row page-titles">
        <div class="col-md-12 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
                    <li class="breadcrumb-item active">Update Information</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row" id="validation">
        <div class="col-12">
            <div class="card wizard-content">
                <div class="card-body">
                    <h3 class="card-title text-danger">Please update your information before you continue</h3>
                    {{--<h6 class="card-subtitle">You can us the validation like what we did</h6>--}}
                    {!! Form::open(['action' => 'AdminController@updateSuperAdminInfo','method'=>'POST','class'=>'form-horizontal form-material validation-wizard wizard-circle']) !!}
                        <!-- Step 1 -->
                    <h6>Personal Information</h6>
                    <section>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="{{Auth::user()->id}}">
                                    <label for="wlocation2">Title</label>
                                    <select class="custom-select form-control required"  name="title">
                                        <option value="{{Auth::user()->title}}">{{Auth::user()->title}}</option>
                                        <option value="Mr">Mr</option>
                                        <option value="Mrs">Mrs</option>
                                        <option value="Miss">Miss</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{Form::label('firstName','First Name')}}
                                    {{Form::text('firstName',Auth::user()->firstName,['class'=>'form-control','placeholder'=>'Username here','required'] )}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{Form::label('lastName','Last Name')}}
                                    {{Form::text('lastName',Auth::user()->lastName,['class'=>'form-control','placeholder'=>'Username here','required'] )}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="wdate2">Gender</label>
                                    <select class="custom-select form-control required" name="gender">
                                        <option value="{{Auth::user()->gender}}">{{Auth::user()->gender}}</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{Form::label('dateOfBirth','Date of Birth')}}
                                    {{Form::text('dateOfBirth',Auth::user()->dateOfBirth,['class'=>'form-control date-inputmask required','placeholder'=>'Username here','required'] )}}
                                </div>
                        </div>
                        </div>
                    </section>

                        <!-- Step 2 -->
                        <h6>Contact Information</h6>
                    <section>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{Form::label('email','Email')}}
                                    {{Form::email('email',Auth::user()->email,['class'=>'form-control ','placeholder'=>'Enter Email Address','required'] )}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{Form::label('phoneNumber','Phone Number ')}}
                                    {{Form::text('phoneNumber',Auth::user()->phoneNumber,['class'=>'form-control phone-inputmask','placeholder'=>'Phone number here','required'] )}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{Form::label('homeTown','Home Town')}}
                                    {{Form::text('homeTown',Auth::user()->homeTown,['class'=>'form-control ','placeholder'=>'Home Town','required'] )}}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="wdate2">Region</label>
                                    <select class="custom-select form-control required" name="region" >
                                        <option value={{Auth::user()->region}}>{{Auth::user()->region}}</option>
                                        <option value="Western">Western</option>
                                        <option value="Northern">Northern</option>
                                        <option value="Eastern">Eastern</option>
                                        <option value="Central">Central</option>
                                        <option value="Upper West">Upper West</option>
                                        <option value="Upper East">Upper East</option>
                                        <option value="Ashanti">Ashanti</option>
                                        <option value="Brong Ahafo">Brong Ahafo</option>
                                        <option value="Greater Accra">Greater Accra</option>
                                        <option value="Volter">Volter</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{Form::label('address','Address')}}
                                    {{Form::text('address',Auth::user()->address,['class'=>'form-control ','placeholder'=>'Postal Address','required'] )}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{Form::label('houseNumber','House Number ')}}
                                    {{Form::text('houseNumber',Auth::user()->houseNumber,['class'=>'form-control ','placeholder'=>'House Number','required'] )}}
                                </div>
                            </div>
                        </div>
                    </section>
                    @if(Auth::user()->updated==0)
                        <h6>Security</h6>
                        <section>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {{Form::label('username','Username')}}
                                        {{Form::text('username',Auth::user()->username,['class'=>'form-control ','placeholder'=>'Username','required'] )}}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {{Form::label('password','Password')}}
                                        {{Form::password('password',['class'=>'form-control','placeholder'=>'Password','required'] )}}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {{Form::label('confirmPassword','Confirm Password')}}
                                        {{Form::password('confirmPassword',['class'=>'form-control ','placeholder'=>'Confirm Password','required'] )}}
                                    </div>
                                </div>
                            </div>
                        </section>
                    @else

                    @endif


                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    @endsection