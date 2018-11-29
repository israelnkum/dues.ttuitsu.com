@extends('layouts.app')
@section('content')

    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">System Preference</li>
                    </ol>
                </div>

                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <div class="chart-text m-r-10  d-none d-lg-block m-l-15">
                            <h5 class="m-b-0"><small>Preferences</small></h5>
                            <h4 class="m-t-0 text-info">

                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    @if(count($errors)>0)
                                        <div class="alert alert-danger" role="alert">
                                            <ul>
                                                @foreach($errors->all() as $error)
                                                    <li>{!! $error !!}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="container">
                                <h3 class="text-danger">Department Information</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <form action="{{url('/duesPreference')}}" class="form-horizontal form-material needs-validation" method="post" novalidate enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-row">
                                                <div class="col-md-12 mb-3">
                                                    <input type="text" name="departmentName"  placeholder="Department Name"
                                                           value="{{$depName->departmentName}}" required class="form-control">
                                                    <div class="invalid-feedback">
                                                        Name is required
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-4 mb-3">
                                                    <small class="text-danger">Optional</small>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="select_file"  id="customFile">
                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary" name="upload" type="submit">
                                                <i class="fa fa-edit"></i>
                                                Update Info
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="table-responsive m-t-40">
                                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    <th>Class Name</th>
                                                    <th>Current Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($levels as $level)
                                                    <tr>
                                                        <td>{{$level->name }}</td>
                                                        <td>{{$level->amountPaying}}</td>
                                                        <td>
                                                            <a href="{{route('levels.edit',$level->id)}}" class="btn btn-outline-success btn-sm">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <form class="float-right" action="{{route('levels.destroy',$level->id)}}" method="post" onsubmit="return confirm('Do you really want to Delete this Class?');">
                                                                @csrf
                                                                {!! method_field('DELETE') !!}
                                                                <button class="btn btn-sm btn-outline-danger">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        {{--levels --}}

                                    </div>
                                    <div class="col-md-6 text-right">
                                        <h3 class="text-danger">
                                            Add Class
                                        </h3>
                                        <form action="{{route('levels.store')}}" class="form-horizontal form-material needs-validation" method="post" novalidate enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-row">
                                                <div class="col-md-4 offset-md-8 mb-3">
                                                    <input type="text" name="levelName" placeholder="Class" required class="form-control">
                                                    <div class="invalid-feedback">
                                                        Name is required
                                                    </div>
                                                </div>

                                                <div class="col-md-4 offset-md-8 mb-3">
                                                    <input type="number" name="amountPaying" placeholder="Amount" required class="form-control">
                                                    <div class="invalid-feedback">
                                                        Amount is required
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fa fa-plus"></i> Add Class
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <h3>Souvenirs</h3>
                                        <ul class="list-group list-group-flush">
                                            @foreach($souvenir as $value =>$item)
                                                <li class="list-group-item  d-flex justify-content-between align-items-center">
                                                    {{$item->name}}
                                                    <form onsubmit="return confirm('Are you sure you want to Delete this souvenir?');" method="post" action="{{route('souvenir.destroy',$item->id)}} " >
                                                        @csrf
                                                        {!! method_field('DELETE') !!}
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-window-close"></i>
                                                        </button>
                                                    </form>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <div class="col-md-6 text-right">
                                        <h3 class="text-danger">
                                            Add Souvenirs
                                        </h3>
                                        <form action="{{route('souvenir.store')}}" class="form-horizontal form-material needs-validation" method="post" novalidate enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-row">
                                                <div class="col-md-4 offset-md-8 mb-3">
                                                    <input type="text" name="souvenir" placeholder="Souvenir" required class="form-control">
                                                    <div class="invalid-feedback">
                                                        Name is required
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fa fa-plus"></i> Add
                                            </button>
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

