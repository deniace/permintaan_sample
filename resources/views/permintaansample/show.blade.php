@extends('layouts.main')
@section('title', 'Detail Permintaan Sample')

@section('container')
<div class="container-fluid">
    <!-- Card -->
    <div class="card shadow mb-4">
        <!-- card header -->
        <div class="card-header py-3">
            <div class="float-left font-weight-bold text-primary">Detail Permintaan Sample</div>
            <a href="{{ url("fpdf/$transaction->id_transaction") }}"
                class=" @if ($transaction->status_manager != 2) invisible @endif float-right btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate PDF</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th scope="row">ID Permintaan</th>
                        <td>{{$transaction->id_transaction}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">Nama Sales</th>
                        <td>{{$transaction->sales->name}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">Date</th>
                        <td>{{$transaction->date}} {{$transaction->month}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">Customer</th>
                        <td>{{$transaction->customer}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">Division</th>
                        <td>{{$transaction->division->nama_division}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">Area</th>
                        <td>{{$transaction->area->nama_area}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">Supplier</th>
                        <td>{{$transaction->supplier}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">Status Product</th>
                        <td>{{$transaction->status_product}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">End Application</th>
                        <td>{{$transaction->end_application}}</td>
                        <td></td>
                    </tr>

                    <tr>
                        <th scope="row">Tanggal pengiriman</th>
                        <td>{{date("d-M-Y",strtotime($transaction->tgl))}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">Note</th>
                        <td>{{$transaction->note}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">Status</th>
                        <td class=" 
                        @if ($transaction->status_manager == 2) text-success @endif>
                        @if ($transaction->status_manager == 3) text-danger @endif">
                            {{$transaction->status->nama_status}}</td>
                    </tr>
                    @if ($transaction->status_manager > 1)
                    <tr>
                        <th scope="row">Manager</th>
                        <td><strong>{{$transaction->manager->name}}</strong></td>
                    </tr>
                    @endif

                </tbody>
            </table>

            <h3 class="my-3 text-center"><b>Product</b></h3>
            <?php $no = 1;?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Product</th>
                        <th scope="col">Type Product</th>
                        <th scope="col">Jumlah (Dalam Gram)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trx as $item)
                    <tr>
                        <th scope="row">{{$no}}</th>
                        <td>{{$item->product_name}}</td>
                        <td>{{$item->product_type}}</td>
                        <td>{{$item->qty}}</td>
                    </tr>
                    <?php $no++?>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center @if ($transaction->status_manager > 1 || Auth::user()->id_role != 2) d-none @endif">
                <form onsubmit="return confirm('Accept permintaan sample???')"
                    action="/permintaansample/{{$transaction->id_transaction}}" method="POST" class="d-inline">
                    @method("put")
                    <input type="hidden" name="id_manager" id="id_manager" value="{{Auth::user()->id}}" required>
                    <input type="hidden" name="status_manager" id="status_manager" value="2" required>
                    @csrf
                    <button class="btn btn-success" type="submit">Accept</button>
                </form>
                <form onsubmit="return confirm('Reject permintaan sample???')"
                    action="/permintaansample/{{$transaction->id_transaction}}" method="POST" class="d-inline">
                    @method("put")
                    <input type="hidden" name="id_manager" id="id_manager" value="{{Auth::user()->id}}" required>
                    <input type="hidden" name="status_manager" id="status_manager" value="3" required>
                    @csrf
                    <button class="btn btn-danger" type="submit">Reject</button>
                </form>
            </div>
        </div>
        <!-- end card body -->
        <!-- card footer -->
        <div class="card-footer text-muted">
            <a href="/permintaansample" class="card-link">Kembali</a>
        </div>
    </div>
    <!-- end card -->
</div>
@endsection