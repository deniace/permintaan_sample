@extends('layouts.main')
@section('title', 'Tambah Permintaan Baru')

@section('container')
<div class="container-fluid">
    <!-- Card -->
    <div class="card shadow mb-4">
        <!-- card header -->
        <div class="card-header py-3">
            <div class="float-left font-weight-bold text-primary">Tambah Permintaan Baru</div>
        </div>
        <div class="card-body">
            @if($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">{{ $error }}</div>
            @endforeach
            @endif

            <form method="post" action="{{"/permintaansample"}}">
                @csrf
                <input type="hidden" name="id_sales" id="id_sales" value="{{Auth::user()->id}}" required>

                <div class="form-row" id="product_form">
                    <div class="form-group col-xl-4 col-lg">
                        <label for="nama_product">Nama Product*</label>
                        <input type="text" class="form-control @error('nama_product') is-invalid @enderror"
                            name="nama_product[]" id="nama_product" placeholder="nama_product"
                            value="{{old("nama_product")}}" required>
                        @error('nama_product')<div class="invalid-feedback">{{$message}}</div>@enderror
                    </div>

                    <div class="form-group col-xl-4 col-lg">
                        <label for="qty">Jumlah (Dalam Gram)*</label>
                        <input type="text" class="form-control @error('qty') is-invalid @enderror" name="qty[]" id="qty"
                            placeholder="qty" required value="{{old("qty")}}">
                        @error('qty')<div class="invalid-feedback">{{$message}}</div>@enderror
                    </div>

                    <div class="form-group col-xl-4 col-lg">
                        <label for="product_type">Type Product*</label>
                        <input type="text" class="form-control @error('product_type') is-invalid @enderror"
                            name="product_type[]" id="product_type" placeholder="product type"
                            value="{{old("product_type")}}" required>
                        @error('product_type')<div class="invalid-feedback">{{$message}}</div>@enderror
                    </div>

                </div>

                <button class="btn btn-primary mb-3" role="button" type="button" id="btn_tambah_product"
                    onclick="tambahProduct()">+</button>

                <div class="form-group">
                    <label for="customer">Customer*</label>
                    <input type="text" class="form-control @error('customer') is-invalid @enderror" name="customer"
                        value="{{old("customer")}}" id="customer" placeholder="customer" required>
                    @error('customer')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="status_product">Status Product*</label>
                    <input type="text" class="form-control @error('status_product') is-invalid @enderror"
                        name="status_product" id="status_product" placeholder="product type"
                        value="{{old("status_product")}}" required>
                    @error('status_product')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="id_division">Division*</label>
                    <select class="custom-select @error('id_division') is-invalid @enderror" id="id_division"
                        name="id_division">
                        <option value="">Pilih Division</option>
                        @foreach ($division as $item)
                        <option @if (old("id_division")==$item->id_division) selected @endif
                            value="{{$item->id_division}}">{{$item->nama_division}}
                        </option>
                        @endforeach
                    </select>
                    @error('id_division')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="id_area">Area*</label>
                    <select class="custom-select @error('id_area') is-invalid @enderror" id="id_area" name="id_area">
                        <option value="">Pilih Area</option>
                        @foreach ($area as $item)
                        <option @if (old("id_area")==$item->id_area) selected @endif
                            value="{{$item->id_area}}">{{$item->nama_area}}
                        </option>
                        @endforeach
                    </select>
                    @error('id_area')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tgl_pesan">Tanggal pesan*</label>
                    <input type="text" class="form-control @error('tgl_pesan') is-invalid @enderror" name="tgl_pesan"
                        id="tgl_pesan" autocomplete="off" placeholder="Tanggal" value="{{old("tgl_pesan")}}" required>
                    @error('tgl_pesan')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="tgl_pengiriman">Tanggal Pengiriman*</label>
                    <input type="text" class="form-control @error('tgl_pengiriman') is-invalid @enderror"
                        name="tgl_pengiriman" id="tgl_pengiriman" autocomplete="off" placeholder="Tanggal"
                        value="{{old("tgl_pengiriman")}}" required>
                    @error('tgl_pengiriman')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="end_application">End Application*</label>
                    <input type="text" class="form-control @error('end_application') is-invalid @enderror"
                        name="end_application" id="end_application" autocomplete="off" placeholder="End Application"
                        value="{{old("end_application")}}" required>
                    @error('end_application')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="manager_customer">Manager Customer*</label>
                    <input type="text" class="form-control @error('manager_customer') is-invalid @enderror"
                        name="manager_customer" id="manager_customer" autocomplete="off" placeholder="Manager Customer"
                        value="{{old("manager_customer")}}" required>
                    @error('manager_customer')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="supplier">Supplier*</label>
                    <input type="text" class="form-control @error('supplier') is-invalid @enderror" name="supplier"
                        id="supplier" autocomplete="off" placeholder="Supplier" value="{{old("supplier")}}" required>
                    @error('supplier')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="note">Note</label>
                    <input type="text" class="form-control @error('note') is-invalid @enderror" name="note" id="note"
                        placeholder="Note" value="{{old("note")}}" required>
                    @error('note')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
        <!-- end card body -->
        <!-- card footer -->
        <div class="card-footer text-muted">
            <small>* harus di isi</small>
        </div>
    </div>
    <!-- end card -->
</div>
@endsection

@section('js')
<script>
    $("#tgl_pesan").datepicker({
        dateFormat:"yy-mm-dd",
        changeMonth:true,
        changeYear:true
        });
    $("#tgl_pengiriman").datepicker({
        dateFormat:"yy-mm-dd",
        changeMonth:true,
        changeYear:true
        });
</script>

<script>
    function tambahProduct(){
        btnTambahProduct = document.getElementById("btn_tambah_product");
        $("#product_form").clone().insertBefore(btnTambahProduct);        
    }
</script>


@endsection