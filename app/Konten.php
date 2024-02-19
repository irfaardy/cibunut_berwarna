<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konten extends Model
{
    protected $table = "konten";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
}
