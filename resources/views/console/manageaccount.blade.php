@extends('layouts.console')

@section('title','Manage Profile')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manage Account</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/console/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Manage Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Account</h3>
                </div>
                <form action="/console/manageaccount" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="photo" name="photo" accept="image/*" onchange="loadFile(event)">
                                        <label id="filename" class="custom-file-label" for="photo">Choose file</label>
                                    </div>
                                </div>
                                @if(Auth::user()->photo == "")
                                    <img id="output" width="250px" src="/storage/user/$2y$12$C7iVOlDT1xrX7x6w2Q3i1OQHFXZ83TE6FK.NMbgrQ7a7D3VU5MQS.jpg" height="300px" style="padding:5px;margin-top:10px;background-color:#d3d3d3;" />
                                @else
                                    <img id="output" width="250px" src="{{Auth::user()->photo}}" height="300px" style="padding:5px;margin-top:10px;background-color:#d3d3d3;" />
                                @endif
                                @if($errors->has('photo'))
                                    <label class="text-danger">
                                        <small>{{$errors->first('photo')}}</small>
                                    <label>
                                @endif
                                <script>
                                    var loadFile = function(event) {
                                        var output = document.getElementById('output');
                                        var file_name = event.target.files[0].name;

                                        document.getElementById('filename').innerHTML = file_name;
                                        output.src = URL.createObjectURL(event.target.files[0]);
                                        output.onload = function() {
                                            URL.revokeObjectURL(output.src) // free memory
                                        }
                                    };
                                </script>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{Auth::user()->email}}" placeholder="Enter email" readonly="true">
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{Auth::user()->name}}" placeholder="Enter name">
                                @if($errors->has('name'))
                                    <label class="text-danger">
                                        <small>{{$errors->first('name')}}</small>
                                    <label>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                @if($errors->has('password'))
                                    <label class="text-danger">
                                        <small>{{$errors->first('password')}}</small>
                                    <label>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer row">
                        <div class="col-md-4"></div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-success btn-block"><i class="fa fa-check"></i> Simpan</button>
                        </div>
                        <div class="col-md-2">
                            <a href="/console/dashboard" class="btn btn-danger btn-block"><i class="fa fa-window-close"></i> Batal</a>
                        </div>
                    </div>
                    <!-- /.card-footer-->
                </form>
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection