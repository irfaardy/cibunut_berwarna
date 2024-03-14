<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\SEOTools;

class BeritaController extends Controller
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
    public function show($url)
    {
       
        $berita = Berita::where('seo_url',$url)->first();
        SEOMeta::setTitle($berita->title);
        SEOMeta::setDescription(\Str::limit(strip_tags($berita->description),120));
        SEOMeta::addMeta('article:published_time',$berita->created_at, 'property');
        SEOMeta::addMeta('article:section','news', 'property');
        SEOMeta::addKeyword($berita->tags);

        OpenGraph::setDescription(\Str::limit(strip_tags($berita->description),120));
        OpenGraph::setTitle($berita->title);
        OpenGraph::setUrl(url('/berita/detail/'.$url));
        OpenGraph::addProperty('type', 'news');
        OpenGraph::addProperty('locale', 'id-id');
        OpenGraph::addProperty('locale:alternate', ['en-us', 'id-id',]);

        OpenGraph::addImage(url('images/'.$berita->thumbnail));
        OpenGraph::addImage(['url' =>url('images/'.$berita->thumbnail), 'size' => 300]);
        OpenGraph::addImage(url('images/'.$berita->thumbnail), ['height' => 300, 'width' => 300]);
        // Namespace URI: http://ogp.me/ns/article#
        // article
        OpenGraph::setTitle($berita->title)
            ->setDescription(\Str::limit(strip_tags($berita->description),120))
            ->setType('article')
            ->setArticle([
                'published_time' => $berita->created_at,
                'modified_time' => $berita->updated_at,
                'expiration_time' => '2080-12-30 00:00:00',
                'author' => $berita->user->name,
                'tag' => $berita->tags
            ]);

        return view('detail_berita')->with(['berita' =>$berita]);
    }
    public function index()
    {
        $berita = Berita::get();
        
            
        return view('berita.berita')->with(['berita' => $berita]);
    }
    public function create()
    {
    
        return view('berita.create');
    }
    public function edit($id)
    {
        $berita = Berita::where('id',$id)->first();
        return view('berita.edit')->with(['berita' => $berita]);
    }
    public function save(Request $request)
    {
        $request->validate([

            'file' => 'required|image|max:2048',

        ]);
        $imageName = time().'_'.\Str::kebab($request->judul).'.'.$request->file->extension();  
        $request->file->move(public_path('images'), $imageName);
        $berita = new Berita();
        $berita->title = $request->judul;
        $berita->description = $request->deskripsi;
        $berita->tags = 'cibunut berwarna,berwarna';
        $berita->thumbnail = $imageName ;
        $berita->thumbnail_sm = $imageName ;
        $berita->seo_description = strip_tags($request->description) ;
        $berita->seo_url = date('Ymd').'-'.\Str::kebab($request->judul) ;
        $berita->seo_title = $request->judul;
        $berita->created_by = auth()->user()->id;
        $berita->save();

        return redirect(url('admin/berita'))->with(['message_success' => "berhasil menambahkan berita"]);
    }
    public function update(Request $request)
    {
    
        $berita = Berita::where('id',$request->id)->first();
        $berita->title = $request->judul;
        $berita->description = $request->deskripsi;
        $berita->tags = $request->tags;
        if(!empty($request->file))
        {
            $imageName = time().'_'.\Str::kebab($request->judul).'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $berita->thumbnail = $imageName ;
            $berita->thumbnail_sm = $imageName ;

        }
        $berita->seo_description = strip_tags($request->description) ;
        if($request->judul != $berita->title)
        {
            $berita->seo_url = date('Ymd').'-'.\Str::kebab($request->judul);
            $berita->seo_title = $request->judul;
        }
        $berita->created_by = auth()->user()->id;
        $berita->save();

        return redirect(url('admin/berita'))->with(['message_success' => "berhasil mengubah berita"]);
    }

    public function delete(Request $request)
    {
    
        $berita = Berita::where('id',$request->id)->delete();

        return redirect(url('admin/berita'))->with(['message_success' => "berhasil menghapus berita"]);
    }
}
