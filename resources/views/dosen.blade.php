@extends('layout/main')

@section('title', 'Dosen')

@section('container')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <!-- TABLE HOVER -->
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h3><strong> Daftar Dosen</strong></h3>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <thead class="thead-dark align-middle">
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Jurusan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dosens as $dosen)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $dosen->nama }}</td>
                                        <td>{{ $dosen->email }}</td>
                                        <td>{{ $dosen->jurusan }}</td>
                                    </tr>    
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END TABLE HOVER -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('search')
<form class="navbar-form navbar-left" action="/dosen" method="GET" autocomplete="off">
    <input  class="form-control" type="search" placeholder="Cari Dosen..." aria-label="Search" name="search">
    <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
</form>
@endsection
