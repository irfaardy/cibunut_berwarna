@extends('layouts.dashboard_master')

@section('title','Kelola Produk')
@section('content')


    <!-- Default box -->
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">Kelola Produk</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
            </button>
        </div>
        </div>
        <div class="card-body">
            <a href="{{url('admin/produk/create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Produk</a>
            <hr>
        <table class="table table-bordered table-stripped" id="pengguna">
            <thead>
                <th>Nama Produk</th>
                <th>Deskripsi</th>
                <th>Tags</th>
                <th>Dibuat Oleh</th>
                <th>Dibuat Pada</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @foreach($produk as $produk)
                <tr>
                    <td>{{$produk->nama_produk}}</td>
                    <td>{{Str::limit(strip_tags($produk->deskripsi),120)}}</td>
                    <td>{{$produk->tags}}</td>
                    <td>{{$produk->user->name}}</td>
                    <td>{{$produk->created_at}}</td>
                   
                    <td><a href="{{url('admin/produk/edit/'.$produk->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i> Ubah</a>
                        <a href="{{url('admin/produk/delete/'.$produk->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        <!-- /.card-body -->
        <!-- /.card-footer-->
    </div>

@endsection
@section('javascript')
<script>
    let table = new DataTable('#pengguna');
    </script>
@endsection