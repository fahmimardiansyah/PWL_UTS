@extends('eaqly.template')

@section('content')
<div class="top">
</div>
<div class="cont">
    <div class="cont-header">
            <h3 class="cont-title profile-name">Daftar Stok</h3>
            <div class="cont-tools profile-actions"> 
                <button onclick="modalAction('{{ url('stok/import/') }}')" class="btn btn-sm btn-info mt-1"> Import Stok</button>
                <a href="{{ url('/stok/export_excel') }}" class="btn btn-sm btn-primary mt-1"><i class="fa fa-file-excel"></i>Export Stok</a>
                <a href="{{ url('/stok/export_pdf') }}" class="btn btn-warning"><i class="fa fa-file-pdf"></i> Export Stok</a>
                <button onclick="modalAction('{{ url('/stok/create_ajax') }}')" class="btn btn-success">Tambah Data (Ajax)</button>

                
            </div>
        </div>
        <div class="cont-body"> <!-- Style tetap, body -->
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <table class="table table-bordered table-sm table-striped table-hover" id="table-stok">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Supplier</th>
                        <th>Barang</th>
                        <th>User</th>
                        <th>Stok Tanggal</th>
                        <th>Stok Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            <a href="{{ url('/welcome') }}" class="btn btn-secondary mt-1"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    <div id="myModal" class="modal fade animate shake" tabindex="-1" data-backdrop="static" data-keyboard="false" data-width="75%"></div>
</div>
@endsection
@push('css')
@endpush
@push('js')
    <script>
        function modalAction(url = '') {
            $('#myModal').load(url, function() {
                $('#myModal').modal('show');
            });
        }

        var tableStok;
        $(document).ready(function() {
            tableStok = $('#table-stok').DataTable({
                processing: true,
                serverSide: true,
                pagingType: 'simple',
                ajax: {
                    "url": "{{ url('stok/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d) {
                        d.supplier_id = $('#supplier_id').val();
                    }
                    
                },
                
                columns: [
                    {
                        data: "DT_RowIndex",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    }, {
                        data: "supplier.supplier_nama",
                        className: "",
                        width: "10%",
                        orderable: true,
                        searchable: true
                    }, {
                        data: "barang.barang_nama",
                        className: "",
                        width: "37%",
                        orderable: true,
                        searchable: true,
                    }, {
                        data: "user.nama",
                        className: "",
                        width: "10%",
                        orderable: true,
                        searchable: true,
                    }, {
                        data: "stok_tanggal",
                        className: "",
                        width: "10%",
                        orderable: true,
                        searchable: false,
                        render: function(data, type, row) {
                            if (data) {
                                var date = new Date(data);
                                var year = date.getFullYear();
                                var month = ("0" + (date.getMonth() + 1)).slice(-2);
                                var day = ("0" + date.getDate()).slice(-2);
                                return year + "-" + month + "-" + day;
                            }
                            return data;
                        }
                    }, {
                        data: "stok_jumlah",
                        className: "",
                        width: "14%",
                        orderable: true,
                        searchable: false
                    }, {
                        data: "aksi",
                        className: "text-center",
                        width: "14%",
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            $('#table-stok_filter input').unbind().bind().on('keyup', function(e) {
                if (e.keyCode == 13) {
                    tableStok.search(this.value).draw();
                }
            });

            $('.filter_kategori').change(function() {
                tableStok.draw();
            });
            $('#supplier_id').on('change', function() {
                dataStok.ajax.reload();
            })
        });
    </script>
@endpush

 {{-- @extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <button onclick="modalAction('{{ url('stok/import/') }}')" class="btn btn-sm btn-info mt-1"> Import
                    Stok</button>
                <a href="{{ url('/stok/export_excel') }}" class="btn btn-sm btn-primary mt-1"><i class="fa fa-file-excel"></i>
                    Export Stok</a>
                <a href="{{ url('/stok/export_pdf') }}" class="btn btn-sm btn-warning mt-1"><i class="fa fa-file-pdf"></i>
                    Export Stok</a>
                <button onclick="modalAction('{{ url('stok/create_ajax') }}')" class="btn btn-sm btn-success mt-1">Tambah
                    Ajax</button>
            </div>
        </div>
        <div class="card-body">
            @if (@session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Filter </label>
                        <div class="col-3">
                            <select class="form-control" id="supplier_id" name="supplier_id" required>
                                <option value="">- Semua -</option>
                                @foreach ($supplier as $item)
                                    <option value="{{ $item->supplier_id }}">{{ $item->supplier_nama }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Supplier Barang</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-sm" id="table_stok">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Supplier</th>
                            <th>Nama Barang</th>
                            <th>Nama Pegawai</th>
                            <th>Tanggal Stok </th>
                            <th>Jumlah Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data-backdrop="static"
        data-keyboard="false" data-width="75%" aria-hidden="true"></div>
@endsection
@push('css')
@endpush
@push('js')
    <script>
        function modalAction(url = '') {
            $('#myModal').load(url, function() {
                $('#myModal').modal('show');
            });
        }
        $(document).ready(function() {
            dataStok = $('#table_stok').DataTable({
                // serverSide: true, jika ingin menggunakan server side processing
                serverSide: true,
                ajax: {
                    "url": "{{ url('stok/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d) {
                        d.supplier_id = $('#supplier_id').val();
                    }
                },
                columns: [{
                        data: "DT_RowIndex",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: "supplier.supplier_nama",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "barang.barang_nama",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "user.nama",
                        className: "",
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: "stok_tanggal",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "stok_jumlah",
                        className: "",
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: "aksi",
                        className: "",
                        orderable: false,
                        searchable: false
                    }
                ]

            });
            $('#supplier_id').on('change', function() {
                dataStok.ajax.reload();
            })
        });
    </script>
@endpush  --}}