<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'user',
        'price',
        'created_at'
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

    public function setStatus($status)
    {
        $this->attributes['status']->$status;
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setPrice($price)
    {
        $this->attributes['price']->$price;
    }

    public function getDate()
    {
        return $this->attributes['created_at'];
    }

    public function setDate($date)
    {
        $this->attributes['created_at'] = $date;
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
        return $data->validate(
            [
            "price" => "required|numeric|gt:0",
            ]
        );
    }
}