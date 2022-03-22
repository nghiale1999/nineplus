<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelProject extends Model
{
    protected $table = 'users';
    protected $timestamps = false;

    protected $fillable = ['name', 'amount'];


    public function user()
    {
        return $this->hasMany(user::class);
    }
}
