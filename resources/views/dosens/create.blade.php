@extends('layout/main')

@section('title', 'From Add Student')

@section('container')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h3><strong>Form Tambah Dosen Baru</strong></h3>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form method="POST" action="/dosens" autocomplete="off">
                                @csrf
                                <div class="form-group">
                                  <label for="nama">Name</label>
                                  <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama" name="nama" value="{{ old('nama') }}">
                                  @error('nama')                          
                                    <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="email">E-Mail</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan E-mail" name="email" value="{{ old('email') }}">
                                    @error('email')                          
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="jurusan">Jurusan</label>
                                    <input type="text" class="form-control @error('jurusan') is-invalid @enderror  " id="jurusan" placeholder="Masukkan Jurusan" name="jurusan" value="{{ old('jurusan') }}">
                                    @error('jurusan')                          
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <button type="submit" class="btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Tambahkan Dosen!</a></button>

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