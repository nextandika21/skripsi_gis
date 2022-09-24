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
                            <li class="breadcrumb-item"><a href="/console/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Madrasah</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Table of Madrasah</h3>
                </div>
                <div class="card-body row">
                    <div class="col-md-12">
                        <a class="btn btn-app" href="/console/madrasah/new">
                            <i class="fas fa-plus"></i> Add new
                        </a>
                        <hr>
                        <table id="datatable" class="display">
                            <thead>
                                <tr>
                                    <th>Nama Madrasah</th>
                                    <th>Jenis Madrasah</th>
                                    <th>Alamat</th>
                                    <th>Akreditasi</th>
                                    <th>NPSN</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($madrasah as $m)
                                    <tr>
                                        <td>{{$m->nama_madrasah}}</td>
                                        <td>{{$m->jenis_madrasah}}</td>
                                        <td>{{$m->alamat}}</td>
                                        <td>{{$m->akreditasi}}</td>
                                        <td>{{$m->npsn}}</td>
                                        <td class="text-center">
                                            <a href="/console/madrasah/{{$m->id}}/edit" class="mr-2"><i class="nav-icon fas fa-edit"></i></a>
                                            <a href="/console/madrasah/{{$m->id}}/delete"><i class="nav-icon fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection