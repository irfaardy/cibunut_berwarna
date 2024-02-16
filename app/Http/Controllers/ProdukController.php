<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
class ProdukController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $produk = Produk::get();
        return view('produk.produk')->with(['produk' => $produk]);
    }
    public function create()
    {
    
        return view('produk.create');
    }
    public function edit($id)
    {
        $produk = Produk::where('id',$id)->first();
        return view('produk.edit')->with(['produk' => $produk]);
    }
    public function save(Request $request)
    {
        $request->validate([

            'file' => 'required|image|max:2048',

        ]);
        $imageName = time().'_produk_'.\Str::kebab($request->judul).'.'.$request->file->extension();  
        $request->file->move(public_path('images'), $imageName);

        $produk = new Produk();
        $produk->nama_produk = $request->nama_produk;
        $produk->thumbnail = $imageName ;
        $produk->deskripsi = $request->deskripsi;
        $produk->seo_url = date('Ymd').'-'.\Str::kebab($request->judul);
        $produk->seo_title = $request->nama_produk;
        $produk->created_by = auth()->user()->id;
        $produk->save();

        return redirect(url('admin/produk'))->with(['message_success' => "berhasil menambahkan produk"]);
    }
    public function update(Request $request)
    {
    
        $produk = Produk::where('id',$request->id)->first();
        $produk->nama_produk = $request->nama_produk;
        $produk->deskripsi = $request->deskripsi;
        if(!empty($request->file))
        {
            $imageName = time().'_produk_'.\Str::kebab($request->judul).'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $produk->thumbnail = $imageName ;

        }
        $produk->seo_description = strip_tags($request->description) ;
        if($request->judul != $produk->title)
        {
            $produk->seo_url = date('Ymd').'-'.\Str::kebab($request->judul);
            $produk->seo_title = $request->judul;
        }
        $produk->created_by = auth()->user()->id;
        $produk->save();

        return redirect(url('admin/produk'))->with(['message_success' => "berhasil mengubah produk"]);
    }

    public function delete(Request $request)
    {
    
        $produk = Produk::where('id',$request->id)->delete();

        return redirect(url('admin/produk'))->with(['message_success' => "berhasil menghapus produk"]);
    }
}
