<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $table = "seo_landing";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class,'updated_by','id');
    }
}
