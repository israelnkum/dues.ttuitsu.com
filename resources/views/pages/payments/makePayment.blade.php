@extends('layouts.app')
@section('content')

    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-4 align-self-center">
            <div class="d-flex ">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">All Student</li>
                </ol>
            </div>
        </div>
        <div class="col-md-8  text-left">
            <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                <div class="chart-text m-r-10">
                    <h5 class="m-b-0"><small>HND LEVEL 100</small></h5>
                    <h4 class="m-t-0 text-info">
                        500
                    </h4>
                </div>
                <div class="chart-text m-r-10">
                    <h5 class="m-b-0"><small>HND LEVEL 200</small></h5>
                    <h4 class="m-t-0 text-info">
                        500
                    </h4>
                </div>
                <div class="chart-text m-r-10">
                    <h5 class="m-b-0"><small>HND LEVEL 300</small></h5>
                    <h4 class="m-t-0 text-info">
                        500
                    </h4>
                </div>
                <div class="chart-text m-r-10">
                    <h5 class="m-b-0"><small>Diploma LEVEL 100</small></h5>
                    <h4 class="m-t-0 text-info">
                        500
                    </h4>
                </div>
                <div class="chart-text m-r-10">
                    <h5 class="m-b-0"><small>Diploma LEVEL 100</small></h5>
                    <h4 class="m-t-0 text-info">
                        500
                    </h4>
                </div>
                <div class="chart-text m-r-10">
                    <h5 class="m-b-0"><small>BTECH LEVEL 100</small></h5>
                    <h4 class="m-t-0 text-info">
                        500
                    </h4>
                </div>
                <div class="chart-text m-r-10">
                    <h5 class="m-b-0"><small>BTECH LEVEL 100</small></h5>
                    <h4 class="m-t-0 text-info">
                        500
                    </h4>
                </div>
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
                    <div class="row">
                        {!! Form::open(['action' => ['PaymentController@update',$student->id],'method'=>'POST','class'=>'form-horizontal form-material needs-validation','novalidate' ]) !!}
                        <div class="container">
                            @if($maxAmount != $student->amount_paid)
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="amountPaying">Amount Paying</label>
                                        <input type="number" name="amountPaying" class="form-control" placeholder="Amount Paying" required min="1" max="{{$maxAmount -$student->amount_paid}}">
                                        <div class="invalid-feedback">
                                            Amount is invalid
                                        </div>
                                        <input value="{{$stdLevel}}" type="hidden" name="stdLevel" class="form-control" required >
                                    </div>
                                </div>
                            @endif

                            @foreach($selectedSouvenirs as $souvenir =>$row)
                                <div class="col-md-4">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item form-check">
                                            <input type="checkbox" value="{{preg_replace('/\s+/', '',  $row)}}" class="form-check-input" name="{{preg_replace('/\s+/', '',  $row)}}" id="{{preg_replace('/\s+/', '',  $row)}}">
                                            <label class="form-check-label" for="{{preg_replace('/\s+/', '',  $row)}}">{{$row}}</label>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                            <div class="form-row">
                                <div class="col-md-12 mb-3 text-right">
                                    <a role="button" href="{{route('student.index')}}" class="btn btn-danger">Cancel</a>
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
@endsection