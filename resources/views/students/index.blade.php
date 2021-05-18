@extends('layout/main')

@section('title', 'Daftar Mahasiswa')

@section('container')
<div class="main">
    <div class="main-content">
        <div class="container-fluid"> 
            <div class="row">
                <div class="col-md-12">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible my-3">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>{{ session('status') }} <i class="fa fa-check-circle"></i>
                        </div>
                    @endif
                    <!-- TABLE HOVER -->
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h3><strong>Daftar Mahasiswa</strong></h3>
                            </div>
                            <div class="right">
                                <a href="/students/create" class="btn btn-sm btn-primary active" role="button" aria-pressed="true">
                                    <i class="fas fa-plus-circle"></i> Tambah Mahasiswa Baru</a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover mt-3">
                                <thead class="thead-dark align-middle">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">NIM</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Jurusan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $student->nama }}</td>
                                        <td>{{ $student->nim }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->jurusan }}</td>
                                        <td>
                                            <form action="/students/{{ $student->id }}" method="post">
                                                <a href="/students/{{ $student->id}}/edit" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                                                
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
                    {{-- <ul class="list-group mt-3">
                        @foreach ($students as $student)       
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $student->nama }}
                            <a href="/students/{{ $student->id }}" class="btn-sm btn-info">Detail</a>
                        </li>
                        @endforeach
                    </ul> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('search')
<form class="navbar-form navbar-left" action="/students" method="GET" autocomplete="off">
    <input  class="form-control" type="search" placeholder="Cari Mahasiswa..." aria-label="Search" name="search">
    <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
</form>
@endsection