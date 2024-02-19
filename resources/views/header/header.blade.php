@extends('layouts.dashboard_master')

@section('title','Kelola Header')
@section('content')
<form action="{{url('admin/konten/update')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">Ubah konten Header</h3>
   </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    Judul Halaman
                </div>
                <div class="col-md-12">
                  <input type="text" class="form-control" value="{{$konten->title}}" name="judul">
                </div>
            </div>
    <div class="row">
        <div class="col-md-12">
            Isi Konten
        </div>
        <div class="col-md-12">
           <textarea name="deskripsi" rows="30" id="description" class="form-control">{!!$konten->description!!}</textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            Latar belakang
        </div>
        <div class="col-md-12">
            <img alt="Belum ada gambar yang disetel" src="{{url('images/landing/'.$konten->image)}}" width="200px">
           <input class="form-control" type="file" name='file'>
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
<script>
   ClassicEditor
	.create( document.querySelector( '#description' ), {
		// Editor configuration.
	} )
	.then( editor => {
		window.editor = editor;

	} )
	.catch( handleSampleError );
    </script>
@endsection