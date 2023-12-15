<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Barang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

@extends('layouts.template')
@section('content')

<body style="background: lightgray">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">

                        <a href="{{ route('pesanan.create') }}" class="btn btn-md btn-success mb-3">TAMBAH DATA</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Pemesan</th>
                                    <th scope="col">JENIS CUCIAN</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">TANGGAL PEMESANAN</th>
                                    <th scope="col">BERAT</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $pesanan)
                                    <tr>
                                        <td>{{ $pesanan->user_name }}</td>
                                        <td class="text-center">{{ $pesanan->jenis_cucian }}</td>
                                        <td class="{{ $pesanan->status == 'Selesai' ? 'text-success' : 'text-danger' }}">
                                            {{ $pesanan->status }}
                                        </td>
                          
    <td>{{ $pesanan->tanggal_pemesanan }}</td>
    <td>{{ $pesanan->berat }}</td>
    <td class="text-center">



    

                                            <a href="#" class="btn btn-primary edit-button"
                                                data-toggle="modal"
                                                data-target="#editModal"
                                                data-id="{{ $pesanan->id_pesanan }}"
                                                data-jenis="{{ $pesanan->jenis_cucian }}"
                                                data-status="{{ $pesanan->status }}"
                                                data-tanggal="{{ $pesanan->tanggal_pemesanan }}"
                                                data-berat="{{ $pesanan->berat }}"><i class="bi bi-pencil-square"></i></a>
                                    
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('pesanan.destroy', $pesanan->id_pesanan) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn  btn-danger"><i class="bi bi-trash"></i></button>
                                                
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            <div class="alert alert-danger">
                                                Data pesanan belum Tersedia.
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('pesanan.edit')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if (session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif

        $('.edit-button').on('click', function() {
            var id = $(this).data('id');
            var jenis = $(this).data('jenis_cucian');
            var status = $(this).data('status');
            var tanggal = $(this).data('tanggal');
            var berat = $(this).data('berat');

            $('#editModal [name="jenis"]').val(jenis);
            $('#editModal [name="status"]').val(status);
            $('#editModal [name="tanggal_pemesanan"]').val(tanggal);
            $('#editModal [name="berat"]').val(berat);

            var action = "{{ route('pesanan.update', ':id') }}";
            action = action.replace(':id', id);
            $('#editModal form').attr('action', action);
        });
    </script>
</body>

</html>
@endsection
