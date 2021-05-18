@extends('layout/main')

@section('title', 'Mahasiswa')

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
                                <h3><strong> Daftar Mahasiswa</strong></h3>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead class="thead-dark align-middle">
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Jurusan</th>
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
<form class="navbar-form navbar-left" action="/mahasiswa" method="GET" autocomplete="off">
    <input  class="form-control" type="search" placeholder="Cari Mahasiswa..." aria-label="Search" name="search">
    <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
</form>
@endsection
{{-- <form class="navbar-form navbar-left">
					<div class="input-group">
						<input type="text" value="" class="form-control" placeholder="Search dashboard...">
						<span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
					</div>
</form> --}}