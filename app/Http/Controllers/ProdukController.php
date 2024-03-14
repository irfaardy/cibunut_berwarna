<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\SEOTools;
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
    public function show($url)
    {
       
        $produk = Produk::where('seo_url',$url)->first();
        SEOMeta::setTitle($produk->nama_produk);
        SEOMeta::setDescription(\Str::limit(strip_tags($produk->deskripsi),120));
        SEOMeta::addMeta('article:published_time',$produk->created_at, 'property');
        SEOMeta::addMeta('article:section','news', 'property');
        SEOMeta::addKeyword('aksesoris cibunut, cibunut finest oleh-oleh, produk cibunut berwarna');

        OpenGraph::setDescription(\Str::limit(strip_tags($produk->deskripsi),120));
        OpenGraph::setTitle($produk->nama_produk);
        OpenGraph::setUrl(url('/berita/detail/'.$url));
        OpenGraph::addProperty('type', 'news');
        OpenGraph::addProperty('locale', 'id-id');
        OpenGraph::addProperty('locale:alternate', ['en-us', 'id-id',]);

        OpenGraph::addImage(url('images/'.$produk->thumbnail));
        OpenGraph::addImage(['url' =>url('images/'.$produk->thumbnail), 'size' => 300]);
        OpenGraph::addImage(url('images/'.$produk->thumbnail), ['height' => 300, 'width' => 300]);
        // Namespace URI: http://ogp.me/ns/article#
        // article
        OpenGraph::setTitle($produk->nama_produk)
            ->setDescription(\Str::limit(strip_tags($produk->deskripsi),120))
            ->setType('article')
            ->setArticle([
                'published_time' => $produk->created_at,
                'modified_time' => $produk->updated_at,
                'expiration_time' => '2080-12-30 00:00:00',
                'author' => $produk->user->name,
                'tag' =>'aksesoris cibunut, cibunut finest oleh-oleh'
            ]);

        return view('detail_produk')->with(['produk' =>$produk]);
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
        $produk->seo_url = date('Ymd').'-'.\Str::kebab($request->nama_produk);
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
            $produk->seo_url = date('Ymd').'-'.\Str::kebab($request->nama_produk);
            $produk->seo_title = $request->nama_produk;
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
