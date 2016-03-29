<?php
/**
 * Created by PhpStorm.
 * User: m.benhenda(benhenda.med@gmail.com)
 * Date: 28/03/2016
 * Time: 21:14
 */

namespace App;


class Basket
{
    private $products = [];

    public function add(Product $product)
    {
        $this->products[] = $product;
    }

    public function price()
    {
        $price = 0;
        foreach ($this->products as $product) {
            $price += $product->getPrice();
        }

        return $price;
    }
}