@extends('layouts.dashboard_master')

@section('title','Kelola Pengguna')
@section('content')


    <!-- Default box -->
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">Tambah Pengguna</h3>

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
            <form method="POST" action="{{url('admin/pengguna/save')}}">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            Nama
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            Email
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            Password
                        </div>
                        <div class="col-md-6">
                            <input type="password" name="password" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            Konfirmasi Password
                        </div>
                        <div class="col-md-6">
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            Level
                        </div>
                        <div class="col-md-6">
                            <select name="level" class="form-control">
                                <option value="">Pilih</option>
                                <option value="admin">Admin</option>
                                <option value="content_admin">Admin Konten</option>
                                <option value="admin_berita">Admin Berita</option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <button class="btn btn-success btn-block" type="submit">Simpan</button>
                    </div>
                    </div>
            </div>
        
                @csrf
            </form>
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