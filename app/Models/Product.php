<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'discount',
        'category',
        'manufacturer',
        'quantity',
        'description'
    ];

    public function calcRating($rating)
    {
        $currentRates = $this->getRates();
        $currentRating = $this->getRating();
        $newRating = ($currentRating*$currentRates + $rating)/($currentRates+1);

        return $newRating;
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }

    public function getDiscount()
    {
        return $this->attributes['discount'];
    }

    public function setDiscount($discount)
    {
        $this->attributes['discount'] = $discount;
    }

    public function getCategory()
    {
        return $this->attributes['category'];
    }

    public function setCategory($category)
    {
        $this->attributes['category'] = $category;
    }

    public function getRating()
    {
        return $this->attributes['rating'];
    }

    public function setRating($rating)
    {
        $this->attributes['rating'] = $rating;
    }

    public function getRates()
    {
        return $this->attributes['rates'];
    }

    public function setRates($rates)
    {
        $this->attributes['rates'] = $rates;
    }

    public function getManufacturer()
    {
        return $this->attributes['manufacturer'];
    }

    public function setManufacturer($manufacturer)
    {
        $this->attributes['manufacturer'] = $manufacturer;
    }

    public function getQuantity()
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity($quantity)
    {
        $this->attributes['quantity'] = $quantity;
    }

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
    }

    public function wishlists()
    {
        return $this->belongsToMany(Wishlist::class, 'product_wishlist');
    }

    public function getWishlist()
    {
        return $this->wishlists;
    }

    public static function validation($data)
    {
        return  $data->validate(
            [
            "name" => "required",
            "price" => "required|numeric|gt:0",
            "discount" => "required|numeric",
            "category" => "required",
            "manufacturer" => "required",
            "quantity" => "required|numeric",
            "description" => "required"
            ]
        );
    }

    public static function validateId($data)
    {
        $data->validate(
            [
            "id" => "required",
            ]
        );
    }

    public static function validateName($data)
    {
        $data->validate(
            [
            "name" => "required",
            ]
        );
    }
}