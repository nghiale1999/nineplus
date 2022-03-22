<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelNationality extends Model
{
    protected $table = 'nationality';
    protected $timestamps = false;

    protected $fillable = ['name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
