@extends('layouts.dashboard_master')

@section('title','Tambah Berita')
@section('content')


    <!-- Default box -->
    <div class="card">
        <div class="card-header">
        <h3 class="card-title">Tambah Berita</h3>

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
            <form method="POST" action="{{url('admin/berita/save')}}" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            Judul
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="judul" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            Isi Berita
                        </div>
                        <div class="col-md-12">
                           <textarea name="deskripsi" rows="30" id="description" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            Tag
                        </div>

                        <div class="col-md-6">
                            <div class="u-tagsinput">
                           <input type="text" name="tags" class="form-control" data-role="tagsinput">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            Thumbnail
                        </div>

                        <div class="col-md-6">
                        
                        <input type="file" name="file" class="form-control">
                        
                        </div>
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