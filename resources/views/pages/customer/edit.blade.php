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
                        <li class="breadcrumb-item"><a href="{{ route('customer.index') }}">Data Pelanggan</a></li>
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

                        <form method="POST" action="{{ route('customer.update') }}">
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
                                    <label for="nama">Gender</label>
                                    <select id="gender" name="gender" class="form-control">
                                        <option value="">Pilih gender</option>
                                        <option {{ $customer->gender == 'L' ? 'selected' : '' }} value="L">
                                            Laki-laki
                                        </option>
                                        <option {{ $customer->gender == 'P' ? 'selected' : '' }} value="P">
                                            Perempuan
                                        </option>
                                    </select>

                                    @error('gender')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" id="alamat"
                                        placeholder="Alamat" value="{{ old('alamat', $customer->alamat) }}">

                                    @error('alamat')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror


                                </div>

                                <div class="form-group">
                                    <label for="telepon">Telepon</label>
                                    <input type="text" name="telepon" class="form-control" id="telepon"
                                        placeholder="Alamat" value="{{ old('telepon', $customer->telepon) }}">

                                    @error('telepon')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror

                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('customer.index') }}" class="btn btn-secondary">Kembali</a>
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
