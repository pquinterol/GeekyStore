<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{

    use HasFactory;

    protected $fillable = [
        'status',
        'user',
        'price',
        'date',
        'description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
    */
    protected $hidden = [
    ];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getStatus()
    {
        return $this->attributes['status'];
    }

    public function setStatus($name)
    {
        $this->attributes['status'] = $name;
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }

    public function setDate($price)
    {
        $this->attributes['created_at'] = $price;
    }

    public function getDate()
    {
        return $this->attributes['created_at'];
    }

    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
    }

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'foreign_key');
    }

    public function getUser()
    {
        return $this->user;
    }

    public static function validateData($data)
    {
        return  $data->validate([
            "price" => "required|numeric|gt:0",
        ]);
    }
}