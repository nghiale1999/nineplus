<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelBaiviet extends Model
{
    protected $table = 'baiviet';
    public $timestamps=false;
    protected $fillable=[
        'tieude','hinh','noidung'
    ];
}
