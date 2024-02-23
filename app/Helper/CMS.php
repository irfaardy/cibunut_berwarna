<?php 
namespace App\Helper;

use Illuminate\Http\Request;
use App\Konten;

class CMS
{
    public static function getContent($kode,$field)
    {
        $konten = Konten::where('kode_konten',$kode)->first();

        if(empty($konten))
        {
            return null;
        }

        return $konten->{$field};
    }
}