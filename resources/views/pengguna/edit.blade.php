@extends('layouts.dashboard_master')

@section('title','Ubah Pengguna')
@section('content')


    <!-- Default box -->
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">Ubah Pengguna</h3>

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
            <form method="POST" action="{{url('admin/pengguna/update')}}">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            Nama
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" value="{{$user->name}}" required>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" class="form-control" value="{{$user->id}}" required>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            Email
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email" value="{{$user->email}}" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            Password
                        </div>
                        <div class="col-md-6">
                            <input type="password" name="password"  class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            Konfirmasi Password
                        </div>
                        <div class="col-md-6">
                            <input type="password" name="password_confirmation" class="form-control" >
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
                                <option value="admin" @if($user->level == 'admin') selected @endif>Admin</option>
                                <option value="content_admin" @if($user->level == 'content_admin') selected @endif>Admin Konten</option>
                                <option value="admin_berita" @if($user->level == 'admin_berita') selected @endif>Admin Berita</option>
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