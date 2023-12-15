<div class="modal" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('pesanan.update', ':id') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="font-weight-bold">Pilih Jenis Cucian</label>
                            <select class="form-control @error('jenis_cucian') is-invalid @enderror" name="jenis_cucian">
                                <option value='Normal'>Normal</option>
                                <option value='Selimut'>Selimut</option>
                            </select>
                            @error('jenis_cucian')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Pilih Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" name="status">
                                <option value='Selesai'>Selesai</option>
                                <option value='Belum Selesai'>Belum Selesai</option>
                            </select>
                            @error('status')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Tanggal Pemesanan</label>
                            <input type="date" class="form-control @error('tanggal_pemesanan') is-invalid @enderror"
                                name="tanggal_pemesanan">
                            @error('tanggal_pemesanan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Berat</label>
                            <input type="number" class="form-control @error('berat') is-invalid @enderror" name="berat">
                            @error('berat')
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