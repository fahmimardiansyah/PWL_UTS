@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <div class="card-title">{{ $page->title }}</div>
            <div class="card-tools">
                <button onclick="modalAction('{{ url('/detail/import') }}')" class="btn btn-info">Import
                    Detail</button>
                <a href="{{ url('/detail/export_excel') }}" class="btn btn-primary"><i class="fa fa-file-excel"></i>
                    Export Detail</a>
                <a href="{{ url('/detail/export_pdf') }}" class="btn btn-warning"><i class="fa fa-file-pdf"></i>
                    Export
                    Detail</a>
                <button onclick="modalAction('{{ url('/detail/create_ajax') }}')" class="btn btn-success">Tambah
                    Data
                    (Ajax)</button>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="row">


            </div>
            <table class="table table-bordered table-striped table-hover table-sm" id="table_user">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Penjualan ID</th>
                        <th>Barang ID</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

<div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" databackdrop="static"
    data-keyboard="false" data-width="75%" aria-hidden="true"></div>

@push('css')
@endpush

@push('js')
    <script>
        function modalAction(url = '') {
            $('#myModal').load(url, function() {
                $('#myModal').modal('show');
            });
        }

        var dataUser;
        $(document).ready(function() {
            dataUser = $('#table_user').DataTable({
                // serverSide: true, jika ingin menggunakan server side processing
                serverSide: true,
                ajax: {
                    "url": "{{ url('detail/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function(d) {
                        d.barang_id = $('#barang_id').val();
                    }
                },
                columns: [{
                    data: "DT_RowIndex",
                    className: "text-center",
                    width: "5%",
                    orderable: false,
                    searchable: false
                }, {
                    data: "penjualan_id",
                    className: "",
                    width: "10%",
                    orderable: true,
                    searchable: false
                }, {
                    data: "barang.barang_id",
                    className: "",
                    width: "37%",
                    orderable: true,
                    searchable: false
                }, {
                    data: "harga",
                    className: "",
                    width: "14%",
                    orderable: true,
                    searchable: false
                }, {
                    data: "jumlah",
                    className: "",
                    width: "14%",
                    orderable: true,
                    searchable: false
                }, {
                    data: "aksi",
                    className: "",
                    width: "14%",
                    orderable: false,
                    searchable: false
                }]  
            });
            $('#level_id').on('change', function() {
                dataUser.ajax.reload();
            })
        });
    </script>
@endpush