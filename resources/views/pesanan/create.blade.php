<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Barang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
@extends('layouts.template')
@section('content')
<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('pesanan.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold">Pilih Pemesan</label>
                                <select class="form-control @error('user_id') is-invalid @enderror" name="user_id">
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Pilih Jenis Cucian</label>
                                <select class="form-control @error('jenis_cucian') is-invalid @enderror"
                                    name="jenis_cucian">
                                    <option value='Normal'>Normal</option>
                                    <option value='Selimut'>Selimut</option>
                                </select>
                                @error('jenis_ucican')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="font-weight-bold">Pilih Status</label>
                                    <select
                                        class="form-control @error('status') is-invalid @enderror"
                                        name="status" placeholder="Pilih Status">
                                        <option value='Selesai'>Selesai</option>
                                        <option value='Belum Selesai'>Belum Selesai</option>
                                    </select>
                                

                                <!-- error message untuk cost -->
                                @error('status')
                                <div class="alert alert-danger

mt-2">

                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Pemesanan</label>
                                <input type="date" class="form-control @error('tanggal_pemesanan') is-invalid @enderror" name="tanggal_pemesanan">
                                <!-- error message for due_date -->
                                @error('due_date')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Berat</label>
                                <input type="number" class="form-control @error('berat') is-invalid @enderror" name="berat" placeholder="berat">
                                <!-- error message for description -->
                                @error('description')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
    
                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
</body>
</html>
@endsection
