@extends('layout/main')

@section('title', 'Detail Mahasiswa')

@section('container')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <h1>Detail Mahasiswa</h1>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $student->nama }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $student->nim }}</h6>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $student->email }}</h6>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $student->jurusan }}</h6>
                            <a href="{{ $student->id}}/edit" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>
                            
                            <form action="/students/{{ $student->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                            </form>
    
                            <a href="/students" class="btn-sm "><i class="fas fa-arrow-circle-left"></i> Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection