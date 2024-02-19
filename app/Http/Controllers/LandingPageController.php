<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Konten;

class LandingPageController extends Controller
{
    public function index()
    {

        $konten = Konten::whereNotNull('created_by');
        return view('landing')->with(['konten' => $konten]);
    }
}
