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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database;
use Illuminate\Support\Facades\Session;

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
        $ca = Categories::all();
        if ($ha->id && $ha->qty) {
            $carts = session()->get("cart");
            $carts[$ha->id]["qty"] = $ha->qty;
            session()->put("cart", $carts);
            $car = view("fontend.checkout", compact("carts", "ca"))->render();
            return response()->json(["car
    " => $car, "code" => 200], 200);
        }
    }

    public function desc(string $re)
    {
        $product = Products::where("id", $re)->first();
        $ca = Categories::all();
        $arrtb_vl = Product_arrtibutes::where("product_id", $re)->pluck("arrtibute_value_id")->toArray();
        $sizeShoes = Arrtibute_value::where("arrtb_id", 4)->get();
        $sizeShirt = Arrtibute_value::where("arrtb_id", 3)->get();
        $image = Product_image::where("product_id", $re)->get();
        return view("fontend.prodesc", compact("ca", "product", "image", "sizeShirt", "sizeShoes", "arrtb_vl")
        );
    }

    public function banking()
    {
        $ca = Categories::all();
        $carts = session()->get("cart");
        return view("fontend.banking", compact("carts", "ca"));
    }

    public function login_checkout()
    {

        $ca = Categories::all();
        $carts = session()->get("cart");
        return view("fontend.banking", compact("carts", "ca"));
    }

    public function addcustomer(Request $request)
    {
        $data = array();
        $data["name"] = $request->name_account;
        $data["email"] = $request->email_account;
        $data["password"] = $request->password_account;
        $data["phone"] = $request->phone_account;

        $insert = DB::table("customer")->insertGetId($data);

        Session::put("id", $insert);
        Session::put("name", $request->name_account);
        return Redirect("/product/banking");
    }

    public function showcheck()
    {
        $ca = Categories::all();
        $carts = session()->get("cart");
        return view("fontend.show-banking", compact("carts", "ca"));
    }

    public function savecustomer(Request $request)
    {
        $data = array();
        $data["shipping_name"] = $request->shipping_name;
        $data["shipping_address"] = $request->shipping_address;
        $data["shipping_phone"] = $request->shipping_phone;
        $data["shipping_company"] = $request->shipping_company;
        $data["shipping_country"] = $request->shipping_Country;
        $data["notes"] = $request->message;
        $insert = DB::table("shipping")->insertGetId($data);
        Session::put("shipping_id", $insert);
        return Redirect("/payment");
    }

    public function payment()
    {

    }

    public function logincustomer(Request $request)
    {
        $ca = Categories::all();
        $carts = session()->get("cart");
        $email = $request->email_account;
        $pass = $request->password_account;
        $result = DB::table("customer")->where("email", $email)->where("password", $pass)->get();
        if ($result) {
            return Redirect("/showcheck");

        } else {
            return view("fontend.show-banking", compact("carts", "ca"));
        }
    }
}
