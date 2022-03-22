@extends('layouts.app')

@section('content')

<div class="container">
    <div class="justify-content-center">
        <h3>Edit Data Produk</h2>
        {{ Form::open(array('url' => url()->current(), 'method' => 'post', 'enctype'=>'multipart/form-data')) }}
            <br>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" placeholder="Nama" name="name" value="{{ $product->name }}" required />
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <input type="text" class="form-control" placeholder="Deskripsi" name="description" value="{{ $product->description }}" required />
            </div>
            <div class="form-group">
                <label>Harga Beli</label>
                <input type="number" class="form-control" placeholder="Harga Beli" name="purchase_price" value="{{ $product->purchase_price }}" required />
            </div>
            <div class="form-group">
                <label>Harga Jual</label>
                <input type="number" class="form-control" placeholder="Harga Jual" name="sales_price" value="{{ $product->sales_price }}" required />
            </div>
            <div class="form-group">
                <p>Gambar</p>
                <input type="file" name="picture" id="picture" required />
                <img src="{{ url($product->picture) }}" width="300px" height="300px" />
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        {{ Form::close() }}
    </div>
</div>
	
<script>
    $("#picture").change(function () {
        var fileExtension = ['jpg','jpeg','png'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
            alert("Format tidak sesuai, tolong upload file dengan format : "+fileExtension.join(', '));
            $(this).val(''); 
        }
    });
</script>

@endsection