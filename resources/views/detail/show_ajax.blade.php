@empty($detail) 
    <div id="modal-master" class="modal-dialog modal-lg" role="document"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <h5 class="modal-title" id="exampleModalLabel">Kesalahan</h5> 
                <button type="button" class="close" data-dismiss="modal" 
                aria-label="Close"><span aria-hidden="true">&times;</span></button> 
            </div> 
            <div class="modal-body"> 
                <div class="alert alert-danger"> 
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!!!</h5> 
                    Data yang anda cari tidak ditemukan
                </div> 
                <a href="{{ url('/detail/') }}" class="btn btn-warning">Kembali</a> 
            </div> 
        </div> 
    </div> 
@else 
    <div id="modal-master" class="modal-dialog modal-lg" role="document"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <h5 class="modal-title" id="exampleModalLabel">Detail Data Detail</h5> 
                <button type="button" class="close" data-dismiss="modal" 
                aria-label="Close"><span aria-hidden="true">&times;</span></button> 
            </div> 
            <div class="modal-body"> 
                <div class="alert alert-info"> 
                    <h5><i class="icon fas fa-info-circle"></i> Informasi !!!</h5> 
                    Berikut adalah detail data Detail:
                </div> 
                <table class="table table-sm table-bordered table-striped"> 
                    <tr><th class="text-right col-3">ID :</th><td class="col-9">{{ $detail->detail_id }}</td></tr>
                    <tr><th class="text-right col-3">Kode Penjualan :</th><td class="col-9">{{ $detail->penjualan->penjualan_kode }}</td></tr>
                    <tr><th class="text-right col-3">Barang Nama :</th><td class="col-9">{{ $detail->barang->barang_nama }}</td></tr>
                    <tr><th class="text-right col-3">Harga :</th><td class="col-9">{{ $detail->harga }}</td></tr>
                    <tr><th class="text-right col-3">Jumlah :</th><td class="col-9">{{ $detail->jumlah }}</td></tr>
                </table>
            </div> 
            <div class="modal-footer"> 
                <button type="button" data-dismiss="modal" class="btn btn-primary">Tutup</button> 
            </div> 
        </div> 
    </div> 
@endempty