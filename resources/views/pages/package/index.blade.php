@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">



                <div class="col-12">
                    @if (session('status'))
                        <div class="alert alert-info" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('package.create') }}" class="btn btn-primary">Tambah</a>
                            <div class="card-tools">
                                <form action="">

                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" value="{{ request('search') }}" name="search"
                                            class="form-control float-right" placeholder="Search">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Harga</th>

                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($packages->count())
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($packages as $package)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $package->nama }}</td>
                                                <td>{{ $package->harga }}</td>
                                                <td>

                                                    <div class="btn-group">
                                                        <a href="{{ route('package.edit', $package->id) }}"
                                                            class="btn btn-info">Edit</a>
                                                        <form method="POST"
                                                            action="{{ route('package.destroy', $package->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger" type="submit">Hapus</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td class="justify-content-center" colspan="6">

                                                Tidak ada data
                                            </td>
                                        </tr>
                                    @endif


                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                {{ $packages->links('pagination::bootstrap-4') }}
                            </ul>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
