<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model

{

    use HasFactory;

    protected $fillable = [
        'status',
        'price',
        'date',
        'description',
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

        return $this->attributes['name'];

    }

    public function setStatus($name)
    {

        $this->attributes['name'] = $name;

    }

    public function getPrice()
    {

        return $this->attributes['price'];

    }

    public function setDate($price)
    {

        $this->attributes['price'] = $price;

    }

    public function getDate()
    {

        return $this->attributes['discount'];

    }

    public function setDescription($discount)
    {

        $this->attributes['discount'] = $discount;

    }

    public function getDescription()
    {

        return $this->attributes['category'];

    }

    public static function validation($data)
    {
        return  $data->validate([
        
            "price" => "required|numeric|gt:0",
        
        ]);

    }
}