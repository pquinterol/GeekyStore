<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Item extends Model

{

    use HasFactory;

    protected $fillable = ['quantity','subtotal','product', 'order'];

    public function getId()
    {

        return $this->attributes['id'];

    }

    public function setId($id)
    {

        $this->attributes['id'] = $id;

    }

    public function getQuantity()
    {

        return $this->attributes['quantity'];

    }

    public function setQuantity($quantity)
    {

        $this->attributes['quantity'] = $quantity;

    }

    public function getSubtotal()
    {

        return $this->attributes['subtotal'];

    }

    public function setSubtotal($subtotal)
    {

        $this->attributes['subtotal'] = $subtotal;

    }

    public function getProduct()
    {

        return $this->attributes['product'];

    }

    public function setProduct($product)
    {

        $this->attributes['product'] = $product;

    }
    public function getOrder()
    {

        return $this->attributes['product'];

    }

    public function setOrder($product)
    {

        $this->attributes['product'] = $product;

    }

    public static function validation($data)
    {
        return  $data->validate([
        
            "quantity" => "required|numeric",
            "subtotal" => "required|numeric|gt:0",
            "product" => "required|numeric|gt:0",
            "order" => "required|numeric|gt:0"
        
        ]);

    }
}