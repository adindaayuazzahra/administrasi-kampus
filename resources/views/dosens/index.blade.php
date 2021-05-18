@extends('layout/main')

@section('title', 'Daftar Dosen')

@section('container')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible my-3">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>{{ session('status') }} <i class="fa fa-check-circle"></i>
                        </div>
                    @endif
                    <!-- TABLE HOVER -->
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h3><strong>Daftar Dosen</strong></h3>
                            </div>
                            <div class="right">
                                <a href="/dosens/create" class="btn btn-sm btn-primary active" role="button" aria-pressed="true"><i class="fas fa-plus-circle"></i> Tambah Dosen Baru</a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Jurusan</th>
                                    <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dosens as $dosen)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $dosen->nama }}</td>
                                        <td>{{ $dosen->email }}</td>
                                        <td>{{ $dosen->jurusan }}</td>
                                        <td>
                                            <form action="/dosens/{{ $dosen->id }}" method="post">
                                                <a href="/dosens/{{ $dosen->id }}/edit" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Ingin Menghapus Data Ini?')"><i class="fas fa-trash"></i> Delete</button>
                                            </form>
                                        </td>
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
<form class="navbar-form navbar-left" action="/dosens" method="GET" autocomplete="off">
    <input  class="form-control" type="search" placeholder="Cari Dosen..." aria-label="Search" name="search">
    <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
</form>
@endsection