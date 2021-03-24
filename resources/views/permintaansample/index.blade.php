@extends('layouts.main')
@section('title', 'Permintaan Brang')

@section('container')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Permintaan Sample</h1>

    {{-- untuk menampilkan flashsession --}}
    @if (session('status'))
    <div class="alert alert-success">
        {{session("status")}}
    </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{url("/permintaansample/create")}}" class="btn btn-primary">Permintaan Baru</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Sales</th>
                            <th>Customer</th>
                            <th>Supplier</th>
                            <th>Area</th>
                            <th>Qty (Gram)</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$item->id_transaction}}</td>
                            <td>{{$item->sales->name}}</td>
                            <td>{{$item->supplier}}</td>
                            <td>{{$item->customer}}</td>
                            <td>{{$item->area->nama_area}}</td>
                            <td>{{$item->qty}}</td>
                            <td class=" @if ($item->status_manager == 2) text-success @endif>
                                @if ($item->status_manager == 3) text-danger @endif">
                                {{$item->status->nama_status}}</td>
                            <td>
                                <a href="/permintaansample/{{$item->id_transaction}}"
                                    class="btn btn-info btn-sm">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <form id="delete-form" method="POST" class="d-none">
        @method("delete")
        @csrf
    </form>

    <script>
        function processDelete(id_transaction){
            let formDelete = document.getElementById("delete-form");
            formDelete.innerHTML = "action", "/permintaansample/".id_transaction;
            formDelete.submit();
        }
    </script>

</div>
@endsection

@section('js')
<!-- Page level plugins -->
<script src="{{url("assets/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{url("assets/datatables/dataTables.bootstrap4.min.js")}}"></script>

<!-- Page level custom scripts -->
<script src="{{url("js/demo/datatables-demo.js")}}"></script>
@endsection