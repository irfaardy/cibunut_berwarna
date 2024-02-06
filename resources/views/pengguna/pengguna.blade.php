@extends('layouts.dashboard_master')

@section('title','Kelola Pengguna')
@section('content')


    <!-- Default box -->
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">Kelola Pengguna</h3>

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
            <a class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Pengguna Baru</a>
            <hr>
        <table class="table table-bordered table-stripped" id="pengguna">
            <thead>
                <th>Nama</th>
                <th>Email</th>
                <th>Level</th>
                <th>Tanggal Dibuat</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @foreach($user as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->level}}</td>
                    <td>{{$user->created_at}}</td>
                    <td></td>
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