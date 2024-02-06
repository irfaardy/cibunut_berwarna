<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class PenggunaController extends Controller
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
        $user = User::get();
        return view('pengguna.pengguna')->with(['user' => $user]);
    }
    public function create()
    {
    
        return view('pengguna.create');
    }
    public function edit($id)
    {
        $user = User::where('id',$id)->first();
        return view('pengguna.edit')->with(['user' => $user]);
    }
    public function save(Request $request)
    {
    
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->level = $request->level;
        $user->save();

        return redirect(url('admin/pengguna'))->with(['message_success' => "berhasil menambahkan pengguna"]);
    }
    public function update(Request $request)
    {
    
        $user = User::where('id',$request->id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->password))
        {
            $user->password = bcrypt($request->password);
        }
        $user->level = $request->level;
        $user->save();

        return redirect(url('admin/pengguna'))->with(['message_success' => "berhasil mengubah pengguna"]);
    }
}
