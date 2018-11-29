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
                <div class="col-md-6 offset-3">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-horizontal form-material needs-validation" action="{{route('levels.update',$levels->id)}}" method="post" novalidate>
                                @csrf
                                {!! method_field('PUT') !!}
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label>Name</label>
                                        <input type="text" name="newName" value="{{$levels->name}} " class="form-control" required>
                                        <div class="invalid-feedback">
                                            Name is required
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>New Amount</label>
                                        <input type="text" name="newAmtPaying" value="{{$levels->amountPaying}} " class="form-control" required>
                                        <div class="invalid-feedback">
                                            New Amount is required
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection