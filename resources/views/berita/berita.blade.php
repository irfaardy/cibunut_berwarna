@extends('layouts.dashboard_master')

@section('title','Kelola Berita')
@section('content')


    <!-- Default box -->
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">Kelola Berita</h3>

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
            <a href="{{url('admin/berita/create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Berita</a>
            <hr>
        <table class="table table-bordered table-stripped" id="pengguna">
            <thead>
                <th>Judul</th>
                <th>Thumbnail</th>
                <th>Tags</th>
                <th>Dibuat Oleh</th>
                <th>Dibuat Pada</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @foreach($berita as $berita)
                <tr>
                    <td>{{$berita->title}}</td>
                    <td>{{$berita->thumbnail}}</td>
                    <td>{{$berita->tags}}</td>
                    <td>{{$berita->created_by}}</td>
                    <td>{{$berita->created_at}}</td>
                    <td><a href="{{url('admin/pengguna/edit/'.$berita->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i> Ubah</a></td>
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