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
                        <li class="breadcrumb-item"><a href="{{ route('transaction.index') }}">Data Paket</a></li>
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
                            <h3 class="card-title">Form Transaksi</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form method="POST" action="{{ route('transaction.store') }}">
                            @csrf
                            @method('post')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Pelanggan</label>
                                    <select name="pelanggan" class="form-control">
                                        <option value="">Pilih pelanggan</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->nama }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('pelanggan')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="harga">Paket Laundry</label>
                                    <select name="paket" class="form-control">
                                        <option value="">Pilih paket laundry</option>
                                        @foreach ($packages as $package)
                                            <option value="{{ $package->id }}">
                                                {{ $package->nama . ' - Rp.' . $package->harga }}/Kg
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('paket')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="harga">Tanggal Antar</label>
                                    <select name="tanggal_in" class="form-control">
                                        @php
                                            $date = date('Y-m-d');
                                            $weekOfdays = [];
                                            for ($i = 1; $i <= 14; $i++) {
                                                $date = date('Y-m-d', strtotime('-1 day', strtotime($date)));
                                                $weekOfdays[] = date('Y-m-d', strtotime($date));
                                            }
                                        @endphp
                                        <option value="{{ date('Y-m-d') }}">{{ date('Y-m-d') }}</option>
                                        @foreach ($weekOfdays as $days)
                                            <option value="{{ $days }}">{{ $days }}</option>
                                        @endforeach
                                    </select>
                                    @error('tanggal_in')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="harga">Tanggal Ambil</label>
                                    <select name="tanggal_out" class="form-control">
                                        @php
                                            $date = date('Y-m-d');
                                            $weekOfdays = [];
                                            for ($i = 1; $i <= 14; $i++) {
                                                $date = date('Y-m-d', strtotime('+1 day', strtotime($date)));
                                                $weekOfdays[] = date('Y-m-d', strtotime($date));
                                            }
                                        @endphp
                                        <option value="{{ date('Y-m-d') }}">{{ date('Y-m-d') }}</option>
                                        @foreach ($weekOfdays as $days)
                                            <option value="{{ $days }}">{{ $days }}</option>
                                        @endforeach
                                    </select>
                                    @error('tanggal_out')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Berat (Kg)</label>
                                    <input type="number" name="berat" class="form-control" value="1"
                                        placeholder="Berat">
                                    @error('berat')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Total Biaya</label>
                                    <input type="text" name="total_biaya" class="form-control" readonly
                                        placeholder="Total Biaya">
                                    @error('total_biaya')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('transaction.index') }}" class="btn btn-secondary">Kembali</a>
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

    <script>
        $(function() {
            var id = "";
            $('[name="paket"]').change(function(e) {
                e.preventDefault();
                id = $(this).val();

                if (id != '') {
                    $.ajax({
                        type: "GET",
                        url: '/package/show/' + id,
                        dataType: "JSON",
                        success: function(res) {
                            $('[name="total_biaya"]').val(res.data.harga);
                        },
                    });
                } else {
                    $('[name="total_biaya"]').val('');
                }
            });


            $('[name="berat"]').bind("keyup click", function(e) {
                e.preventDefault();
                var val = $(this).val();

                if (val != '') {
                    $.ajax({
                        type: "GET",
                        url: '/package/show/' + id,
                        dataType: "JSON",
                        success: function(res) {
                            $('[name="total_biaya"]').val(res.data.harga * val);
                        },
                    });
                }

            });
        });
    </script>
@endsection
