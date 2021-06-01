<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name','price','status'];

    public function user(){
        return $this->belongsTo(App\Models\User::clas);
    }

    public function scopeActive($query){
        return $query->where('status',1);
    }

}
