<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $fillable = [
        'nama_kategori', 'slug'
    ];

    protected $hidden = [];

    public function artikel(){
        return $this->hasMany('App\Models\Artikel', 'kategori_id', 'id');
    }

    public function getRouteKeyName(){
        return 'slug';
    }
}
