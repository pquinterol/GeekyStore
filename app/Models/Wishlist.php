<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    //attributes id, fullname, type, username, password
    protected $fillable = ['product','user'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_wishlist');
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'foreign_key');
    }

    public function getUser()
    {
        return $this->user;
    }

    public static function validation($data)
    {
        return  $data->validate([
        
            "product" => "required|numeric",
            "user" => "required|numeric",
        ]);
    }

}


