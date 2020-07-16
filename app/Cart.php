<?php
namespace App;

class Cart
{
    public $products = null;
    public $totalPrice = 0;
    public $totalQty = 0;

    public function constans($cart)
    {
        if ($cart) {
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQty = $cart->totalQty;
        }
    }
    public function AddCart($product, $id)
    {
        $newProduct = ["qty" => 0, "price" => $product->price, "productInfo" => $product];
        if ($this->products) {
            if (array_key_exists($products,$id)) {
                $newProduct =$this->products[$id];
    }
        }
    }
    public function UpdateCart($id, $qty)
    {
        $this->totalPrice -= $this->products[$id]["price"];
        $this->totalQty -= $this->products[$id]["qty"];

        $this->products[$id]["qty"] = $qty;
        $this->products[$id]["price"] = $qty * $this->products[$id]["productInfo"]->price;

        $this->totalPrice += $this->products[$id]["price"];
        $this->totalQty += $this->products[$id]["qty"];
    }
}

?>
