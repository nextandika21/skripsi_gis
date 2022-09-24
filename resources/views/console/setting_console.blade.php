@extends('layouts.console')

@section('title','Manage Profile')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Setting Console</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/console/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Setting Console</li>
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
                    <h3 class="card-title">Form Setting</h3>
                </div>
                <form action="/console/setting/console" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="logo" name="logo" accept="image/*" onchange="loadFile(event)">
                                        <label id="filename" class="custom-file-label" for="logo">Choose file</label>
                                    </div>
                                </div>
                                @if($console->logo == "")
                                    <img id="output" width="250px" src="/storage/logo/asnfkjanfio3ro32nr32jnr32oroi32nr3onfpio32.jpg" height="300px" style="padding:5px;margin-top:10px;background-color:#d3d3d3;" />
                                @else
                                    <img id="output" width="250px" src="{{$console->logo}}" height="300px" style="padding:5px;margin-top:10px;background-color:#d3d3d3;" />
                                @endif
                                @if($errors->has('logo'))
                                    <label class="text-danger">
                                        <small>{{$errors->first('logo')}}</small>
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
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$console->title}}" placeholder="Enter name">
                                @if($errors->has('title'))
                                    <label class="text-danger">
                                        <small>{{$errors->first('title')}}</small>
                                    <label>
                                @endif
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