@extends('layouts.client')

@section('content')
    <div class="container text-center">
        <h4><b>DATA INFORMASI MADRASAH</b></h4>
    </div>
    <div style="margin-top:50px;">
        <table id="datatable" class="display">
            <thead>
                <tr>
                    <th>Nama Madrasah</th>
                    <th>Jenis Madrasah</th>
                    <th>Alamat</th>
                    <th>Akreditasi</th>
                    <th>NPSN</th>
                    <th>Peta</th>
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
                        <td><a href="/map/{{$m->latitude}}/{{$m->longitude}}">Click here</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection