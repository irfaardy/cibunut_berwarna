<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seo;
class SeoController extends Controller
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

    public function index(Request $request)
    {
    
        $seo = Seo::first();
        if(empty($seo))
        {
            $seo = new Seo();
            $seo->title = 'Selamat Datang Di Cibunut Berwarna';
            $seo->description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
            $seo->keywords = 'Destinasi Wisata, Cibunut Berwarna, Bandung';
            $seo->content_type = 'article';
            $seo->site_name = 'cibunutberwarna.my.id';
            $seo->updated_by = auth()->user()->id;
            $seo->save();
        }

        return view('seo.seo')->with(['seo' => $seo]);
    }

    public function update(Request $request)
    {

        $seo = Seo::first();
        $seo->title = $request->judul;
        $seo->description = $request->description;
        $seo->keywords = $request->keyword;
        $seo->content_type = $request->content_type;
        $seo->site_name = $request->site_name;
        $seo->updated_by = auth()->user()->id;
        $seo->save();

        return redirect()->back()->with(['message_success' => 'Berhasil mengubah SEO']);
    }
}
