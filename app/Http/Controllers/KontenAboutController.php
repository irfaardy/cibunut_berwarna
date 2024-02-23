<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Konten;
class KontenAboutController extends Controller
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
    
        $konten = Konten::where('kode_konten','LND-002')->first();
        if(empty($konten))
        {
            $konten = new Konten();
            $konten->kode_konten = 'LND-002';
            $konten->title = 'About Me';
            $konten->description = 'About me';
            $konten->image = null;
            $konten->created_by = auth()->user()->id;
            $konten->save();
        }

        return view('about.about')->with(['konten' => $konten]);
    }

    public function update(Request $request)
    {
        $request->validate([

            'file' => 'nullable|image|max:2048',

        ]);

        $konten = Konten::where('kode_konten','LND-002')->first();
        $konten->description = $request->deskripsi;
        if(!empty($request->file))
        {
            $imageName = time().'_content-about_'.'background-cibunut'.'.'.$request->file->extension();  
            $request->file->move(public_path('images/landing'), $imageName);
            $konten->image = $imageName ;
        }
        $konten->title = $request->judul;
        $konten->created_by = auth()->user()->id;
        $konten->save();

        return redirect()->back()->with(['message_success' => 'Berhasil mengubah About']);
    }
}
