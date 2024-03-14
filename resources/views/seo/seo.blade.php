@extends('layouts.dashboard_master')

@section('title', 'Seo Landing')
@section('content')
    <form action="{{ url('admin/seo/landing/update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Ubah SEO</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        Judul
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" value="{{ $seo->title }}" name="judul">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        Deskripsi SEO
                    </div>
                    <div class="col-md-12">
                        <textarea name="description" id="description" class="form-control">{!! $seo->description !!}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        Keyword
                    </div>
                    <div class="col-md-12">
                        <input name="keyword" type="text" id="keyword" class="form-control"
                            value="{{ $seo->keywords }}"></input>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        Nama Situs
                    </div>
                    <div class="col-md-12">
                        <input name="site_name" type="text" id="site_name" class="form-control"
                            value="{{ $seo->site_name }}"></input>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        Kategori
                    </div>
                    <div class="col-md-12">
                        <input name="content_type" type="text" id="content_type" class="form-control"
                            value="{{ $seo->content_type }}"></input>
                    </div>
                </div>

                <hr>
                <div class="row">
                    <div class="col-md-3">

                        <button class="btn btn-success btn-block" type="submit">Simpan</button>
                    </div>
                </div>
            </div>

    </form>

@endsection
@section('javascript')
    <script></script>
@endsection
