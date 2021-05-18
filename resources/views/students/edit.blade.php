@extends('layout/main')

@section('title', 'Form Edit Student')

@section('container')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h3><strong>Form Edit Mahasiswa</strong></h3>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form method="POST" action="/students/{{$student->id}}" autocomplete="off">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                  <label for="nama">Name</label>
                                  <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Add Full Name" name="nama" value="{{ $student->nama }}">
                                  @error('nama')                          
                                    <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="nim">NIM</label>
                                    <input type="text" class="form-control  @error('nim') is-invalid @enderror" id="nim" placeholder="Add Student's NIM" name="nim" value="{{ $student->nim }}">
                                    @error('nim')                          
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="email">E-Mail</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Add E-mail" name="email" value="{{ $student->email }}">
                                    @error('email')                          
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="jurusan">Major</label>
                                    <input type="text" class="form-control @error('jurusan') is-invalid @enderror  " id="jurusan" placeholder="Add Major" name="jurusan" value="{{ $student->jurusan }}">
                                    @error('jurusan')                          
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <button type="submit" class="btn-sm btn-primary"><i class="fas fa-user-edit"></i> Edit Data</a></button>

                                <a href="/students" class="btn btn-sm btn-warning" role="button"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection