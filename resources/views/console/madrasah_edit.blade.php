@extends('layouts.console')

@section('title','Madrasah')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Madrasah</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/console/madrasah">Madrasah</a></li>
                            <li class="breadcrumb-item active">Add Madrasah</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Input Madrasah</h3>
                </div>
                <form action="/console/madrasah/{{$madrasah->id}}/edit" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="photo" name="photo" accept="image/*" onchange="loadFile(event)">
                                    <label id="filename" class="custom-file-label" for="photo">Choose file</label>
                                </div>
                            </div>
                            @if($madrasah->photo != '')
                                <img id="output" src="{{$madrasah->photo}}" width="100%" height="300px" style="padding:5px;margin-top:10px;background-color:#d3d3d3;" />
                            @else
                                <img id="output" width="100%" height="300px" style="padding:5px;margin-top:10px;background-color:#d3d3d3;" />
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_madrasah">Nama Madrasah</label>
                            <input type="text" value="{{$madrasah->nama_madrasah}}" class="form-control" id="nama_madrasah" name="nama_madrasah">
                            @if($errors->has('nama_madrasah'))
                                <label class="text-danger">
                                    <small>{{$errors->first('nama_madrasah')}}</small>
                                <label>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jenis_madrasah">Jenis Madrasah</label>
                            <input type="text" value="{{$madrasah->jenis_madrasah}}" class="form-control" id="jenis_madrasah" name="jenis_madrasah">
                            @if($errors->has('jenis_madrasah'))
                                <label class="text-danger">
                                    <small>{{$errors->first('jenis_madrasah')}}</small>
                                <label>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" value="{{$madrasah->alamat}}" class="form-control" id="alamat" name="alamat">
                            @if($errors->has('alamat'))
                                <label class="text-danger">
                                    <small>{{$errors->first('alamat')}}</small>
                                <label>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="akreditasi">Akreditasi</label>
                            <input type="text" value="{{$madrasah->akreditasi}}" class="form-control" id="akreditasi" name="akreditasi">
                            @if($errors->has('akreditasi'))
                                <label class="text-danger">
                                    <small>{{$errors->first('akreditasi')}}</small>
                                <label>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="npsn">NPSN</label>
                            <input type="text" value="{{$madrasah->npsn}}" class="form-control" id="npsn" name="npsn">
                            @if($errors->has('npsn'))
                                <label class="text-danger">
                                    <small>{{$errors->first('npsn')}}</small>
                                <label>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="latitude">Latitude</label>
                            <input type="text" value="{{$madrasah->latitude}}" class="form-control" id="latitude" name="latitude">
                            @if($errors->has('latitude'))
                                <label class="text-danger">
                                    <small>{{$errors->first('latitude')}}</small>
                                <label>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="longitude">Longitude</label>
                            <input type="text" value="{{$madrasah->longitude}}" class="form-control" id="longitude" name="longitude">
                            @if($errors->has('longitude'))
                                <label class="text-danger">
                                    <small>{{$errors->first('longitude')}}</small>
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
                        <a href="/console/madrasah" class="btn btn-danger btn-block"><i class="fa fa-window-close"></i> Batal</a>
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