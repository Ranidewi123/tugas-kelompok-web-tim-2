@extends('layouts.app')

@section('content')

<div class="container">
    <div class="justify-content-center">
        <div class="row">
            <div class="col-6">
                <h2>Data Produk</h2>
            </div>
            @role('admin')
                <div class="col-6">
                    <a href="{{ url()->current().'/create' }}" class="btn btn-primary float-right">Tambah Baru</a>	
                </div>
            @endrole
        </div>
        <br>
        <table class="table table-striped">
            <tr>
                <th>Nama</th>
                <th style="max-width: 100px">Deskripsi</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Gambar</th>
                <th>Opsi</th>
            </tr>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->purchase_price }}</td>
                <td>{{ $product->sales_price }}</td>
                <td><img src="{{ url($product->picture) }}" width="75px" height="75px" /></td>
                <td>
                    @role('admin')
                        <a href="{{ url()->current().'/edit/'.$product->id }}">Edit</a>
                        |
                        <a href="{{ url()->current().'/delete/'.$product->id }}">Hapus</a>
                    @endrole
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
	

@endsection