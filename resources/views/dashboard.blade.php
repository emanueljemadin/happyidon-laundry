@extends('layouts.main')
@section('content')
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body row">
                <div class="col-12 text-center d-flex align-items-center justify-content-center">
                    <div class="">
                        <h2>HappyIdon<strong>Laundry</strong></h2>
                        <p class="lead mb-5">Malang, Jawa Timur<br>
                            {{ date('Y') }}
                        </p>
                        <div class="form-group">
                            <a href="{{ route('transaction.create') }}" class="btn btn-primary btn-lg">Transaksi Baru</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
