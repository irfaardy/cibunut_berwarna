<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
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
    
        $berita = new Berita();
        $berita->name = $request->name;
        $berita->email = $request->email;
        $berita->password = bcrypt($request->password);
        $berita->level = $request->level;
        $berita->save();

        return redirect(url('admin/pengguna'))->with(['message_success' => "berhasil menambahkan pengguna"]);
    }
    public function update(Request $request)
    {
    
        $berita = User::where('id',$request->id)->first();
        $berita->name = $request->name;
        $berita->email = $request->email;
        $user->save();

        return redirect(url('admin/pengguna'))->with(['message_success' => "berhasil mengubah pengguna"]);
    }
}
