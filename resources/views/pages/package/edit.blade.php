@extends('layouts.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('package.index') }}">Data Pelanggan</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Edit Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form method="POST" action="{{ route('package.update') }}">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="hidden" name="id" class="form-control" id="id"
                                        value="{{ old('id', $customer->id) }}" placeholder="Nama">
                                    <input type="text" name="nama" class="form-control" id="nama"
                                        placeholder="Nama" value="{{ old('nama', $customer->nama) }}">

                                    @error('nama')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Harga</label>
                                    <input type="text" name="harga" class="form-control" id="harga"
                                        placeholder="Harga" value="{{ old('harga', $customer->harga) }}">
                                    @error('harga')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('package.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
