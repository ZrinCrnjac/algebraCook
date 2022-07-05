<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['name', 'description','image'];

    public function creator(){
        return $this->belongsTo(User::class);
    }

    public function ingredient(){
        return $this->hasMany(Ingredient::class);
    }
}
