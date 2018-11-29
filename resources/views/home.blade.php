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
                            <li class="breadcrumb-item active">Dashboard</li>
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
    {{--<div class="row">--}}
        {{--<!-- Column -->--}}
        {{--@for($i=0; $i<count($spliced);$i++)--}}
        {{--@for($n=0;$n<count($spliced[$i]);$n++)--}}
            {{--<div class="col-lg-2">--}}
                {{--<div class="card">--}}
                    {{--<div class="card-body">--}}
                        {{--<div class="stats-row m-t-5 m-b-5">--}}
                            {{--<div class="stat-item">--}}
                                {{--<small class="text-uppercase text-primary">{{$spliced[$i][$n]}}</small>--}}
                                {{--<h3 class="counter">{{$spliced[$i][$n]}}</h3>--}}
                            {{--</div>--}}
                            {{--<div class="float-right" style="font-size: 30px;">--}}
                                {{--<i class="fa fa-graduation-cap "></i>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--@endfor--}}
        {{--@endfor--}}
    {{--</div>--}}

    <div class="row">
        <!-- Column -->
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Admin(s)</h6>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="stats-row m-t-10 m-b-10">
                                        <div class="stat-item">
                                            <h1 class="counter">{{$countUsers}}</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <h6>Super Admin(s)</h6>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="stats-row m-t-10 m-b-10">
                                        <div class="stat-item">
                                            <h1 class="counter">{{$countAdmins}}</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title text-success">Paid</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="stats-row m-t-10 m-b-10">
                                        <div class="stat-item">
                                            <h1 class="counter text-success">{{$amtPaid}}</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5 class="card-title text-danger">Owing(s)</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="stats-row m-t-10 m-b-10">
                                        <div class="stat-item">
                                            <h1 class="counter text-danger">{{$totalAmt - $amtPaid}}</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->

        <!-- Column -->
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-primary">Total Dues</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="stats-row m-t-10 m-b-10">
                                <div class="stat-item">
                                    <h1 class="counter text-primary">{{$totalAmt}}</h1>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 text-right">
                            <div class="stats-row m-t-10 m-b-10">
                                <div class="stat-item">
                                    <i class="mdi mdi-cash-multiple text-primary mb-0 mt-0" style="font-size: 35px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->

        <!-- Column -->
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" style="color:saddlebrown;">All Student</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="stats-row m-t-10 m-b-10">
                                <div class="stat-item">
                                    <h1 class="counter" style="color:saddlebrown;">{{$allStudent}}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                            <div class="stats-row m-t-10 m-b-10">
                                <div class="stat-item">
                                    <i class="fa fa-graduation-cap  mb-0 mt-0" style="color:saddlebrown;font-size: 35px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->

        {{--<div class="col-lg-3">--}}
            {{--<div class="card">--}}
                {{--<div class="card-body">--}}
                    {{--<h5 class="card-title">Registered Student(s)</h5>--}}
                    {{--<div class="row m-t-20 m-b-20">--}}
                        {{--<div class="col-md-3">--}}
                            {{--<div class="stat-item">--}}
                                {{--<h6>HND</h6> <b>80.40%</b>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-3">--}}
                            {{--<div class="stat-item">--}}
                                {{--<h6>Dip.</h6>--}}
                                {{--<b>80.40%</b>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-3">--}}
                            {{--<div class="stat-item">--}}
                                {{--<h6>P. Dip.</h6> <b>80.40%</b>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-3">--}}
                            {{--<div class="stat-item">--}}
                                {{--<h6>Btech</h6> <b>80.40%</b>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
    <!-- ============================================================== -->
    <!-- End Info box -->

    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Projects of the Month -->
    <!-- ============================================================== -->


        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Payment Chart</h4>
                        <canvas id="myChart" ></canvas>
                        {{--@if(Auth::user()->isOnline())--}}
                            {{--{{Auth::user()->username}}--}}
                        {{--@endif--}}

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        {{--<h4 class="card-title">Recent Unprocessed Messages</h4>--}}
                        {{--<canvas id="gender"></canvas>--}}
                        <img src="{{asset('img/chart.jpg')}}" height="auto" width="350">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <img src="{{asset('img/chart.jpg')}}" height="auto" width="350">
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection

