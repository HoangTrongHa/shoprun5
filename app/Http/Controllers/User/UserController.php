<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Arrtibute_value;
use App\Models\Categories;
use App\Models\Product_arrtibutes;
use App\Models\Product_image;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        $ca = Categories::all();
        return view("fontend.index", compact("ca")
        );
    }

    public function contact()
    {
        $ca = Categories::all();
        return view("fontend.contact", compact("ca"));
    }

    public function details(string $categoryId)
    {
        $product = Products::where('cate_id', $categoryId)->get();
//        $products = Products::where("pro_name",$categoryId)->get();
        $cdkm = Categories::where("id", $categoryId)->first();
        $ca = Categories::all();
        return view("fontend.details", compact("ca"), [
                "products" => $product,
                "category" => $cdkm,
//                "products"=>$products
            ]
        );
    }

    public function addTocart($id)
    {

        $cart = session()->get("cart");
        $product = Products::find($id);
//        $attributes = Product_arrtibutes::find();
        if (isset($cart[$id])) {
            $cart[$id]["qty"] = $cart[$id]["qty"] + 1;
        } else {
            $cart[$id] = [
                "id" => $product->id,
                "name" => $product->pro_name,
                "price" => $product->price,
                "qty" => 1,
                "image" => $product->avatar

            ];
        }
        session()->put("cart", $cart);
        return response()->json([
            "code" => 200,
            "message" => "success"
        ], 200);
    }

    public function showCart()
    {
        $ca = Categories::all();
        $carts = session()->get("cart");
        return view("fontend.checkout", compact("carts", "ca"));
    }

    public function updateCart(Request $ha)
    {
        dd($ha->all());
    }
    public function desc(string $re)
    {
        $product = Products::where("id", $re)->first();
        $ca = Categories::all();
        $arrtb_vl = Product_arrtibutes::where("product_id",$re)->pluck("arrtibute_value_id")->toArray();
        $sizeShoes = Arrtibute_value::where("arrtb_id",4)->get();
        $sizeShirt = Arrtibute_value::where("arrtb_id",3)->get();

        $image = Product_image::where("product_id", $re)->get();
        return view("fontend.prodesc", compact("ca", "product", "image","sizeShirt","sizeShoes","arrtb_vl")
        );
    }
    public function banking()
    {
        $ca = Categories::all();
        $carts = session()->get("cart");
        return view("fontend.banking", compact("carts", "ca"));
    }
}
