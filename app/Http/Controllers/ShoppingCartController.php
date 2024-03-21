<?php

namespace App\Http\Controllers;

use App\Models\Bank_account;
use App\Models\Product;
use App\Models\Shopping_cart;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::all();
        $carros = Shopping_cart::all();
        foreach ($carros as $carro) {
            if ($carro->user_id == $request->id) {
                $carts[] = $carro;
            }
        }
        return view('cart', ['carts' => $carts, 'products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de datos...
        $carts = Shopping_cart::all();
        $count = count($carts);
        $current = 0;

        foreach ($carts as $carro) {
            $current++;
            if ($carro->user_id == $request->user_id) {
                if ($carro->status == 'pendiente') {
                    $cart = $carro;
                } else if ($carro->status == 'finalizado') {
                    $cart = new Shopping_cart();
                }
            } else if ($current === $count && $carro->user_id != $request->user_id) {
                $cart = new Shopping_cart();
            }
        }

        $product = Product::find($request->id);

        $cart = new Shopping_cart($request->all());
        $cart->status = 'pendiente';
        $cart->totalValue += $product->value;
        $cart->date = Carbon::now();
        $cart->user_id = $request->user_id;
        $cart->product_id = $request->id;
        $cart->save();
        // Adjuntar categorías
        // Asumiendo que recibimos los IDs de categorías como un array en la solicitud
        $productIds = $request->input('products', []); // ['1', '2', ...]
        $cart->products()->attach($productIds);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Shopping_cart $shopping_cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shopping_cart $shopping_cart, Request $request)
    {
        $user = User::find($request->id);
        $accounts = Bank_account::all();
        $carros = Shopping_cart::all();
        $products = Product::all();

        foreach ($accounts as $account) {
            if ($user->bank_account_id == $account->id) {
                if ($account->money < $request->money) {

                } else {
                    $account->money -= $request->money;
                    $account->save();
                    foreach ($carros as $carro) {
                        if (($carro->user_id == $request->id) && ($carro->status == 'pendiente')) {
                            $carro->status = 'finalizado';
                            $carro->save();
                            foreach($products as $product){
                                if($product->id == $carro->product_id){
                                    $product->stock--;
                                    $product->save();
                                }
                            }
                        }
                    }
                }
            }
        }
        return redirect('/cart/' . $request->id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shopping_cart $shopping_cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shopping_cart $shopping_cart, Request $request)
    {
        $cart = Shopping_cart::find($request->cart);
        $cart->delete();
        return redirect('/cart/'.$request->id)->withInput();
    }
}
