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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Student</a></li>
                            <li class="breadcrumb-item active">Upload Student</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- End Info box -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @if(session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        <h3 class="mb-0">{{session('error')}}</h3>
                                    </div>
                                @endif
                                <div class="col-md-12 text-right">
                                    <a role="button" href="{{route("student.create")}}" class="btn btn-info "><i class="fa fa-plus-circle"></i> Add New</a>
                                </div>
                            </div>
                            <hr>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="col-md-12">
                                            <table class="table table-bordered" width="100%" cellspacing="0" data-tablesaw-mode="swipe">
                                                <tr>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>otherName</th>
                                                    <th>Index Number</th>
                                                    <th>Level</th>
                                                    <th>Phone number</th>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="text-danger" >Arrange the Table using the Format Above </p>
                                            <small class="lead text-danger">only <strong>.csv</strong> or <strong>.xls</strong> or <strong>.xlsx</strong> files allowed</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <form action="{{route('studentUpload.store')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-row">
                                                <div class="col-md-8 mb-3">
                                                    <label for="level">Choose Excel File</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="file" required id="customFile">
                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="level">Level</label>
                                                        <select class="custom-select form-control" required  name="level">
                                                            <option value="">Select Level</option>
                                                            @foreach($levels as $lvl)
                                                                <option value="{{$lvl->id}}">{{$lvl->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Level is required is required
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary" type="submit">Submit form</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection