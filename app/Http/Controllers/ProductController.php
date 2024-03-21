<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Sugestion_box;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $brands = Brand::all();
        return view('index', ['products' => $products, 'categories' => $categories, 'brands' => $brands]);
    }
    public function search(Request $request){
        $products = Product::all();
        $products2 = [];
        $categories = Category::all();
        $brands = Brand::all();
        $res1 = "";
        $res2 = "";
        $respuestas = explode(" ", $request->filtro);
        foreach ($respuestas as $res){
            foreach($categories as $category){
                if(strtolower($res) == strtolower($category->name)){
                    $res1 = $category->id;
                }
            }
            foreach($brands as $brand){
                if(strtolower($res) == strtolower($brand->name)){
                    $res2 = $brand->id;
                }
            }
        }
        foreach($products as $product){
            if((($product->category_id == $res1) || ($res1 == "")) && (($product->brand_id == $res2) || ($res2 == ""))){
                $products2 [] = $product;
            }
        }
        return view('index2', ['products' => $products2, 'categories' => $categories, 'brands' => $brands]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string',
            'categ' => 'required|integer',
            'brand' => 'required|integer',
            'val' => 'required|numeric',
            'stock' => 'required|integer',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $producto = new Product;
        $producto->name = $request->name;
        $producto->description = $request->desc;
        $producto->category_id = $request->categ;
        $producto->brand_id = $request->brand;
        $producto->value = $request->val;
        $producto->stock = $request->stock;
        //$producto->img = $imagenNombre;
        //$path = $request->img->store('img', 'public');
        $path = $request->file('img')->store('product', 'public');
        $producto->img = 'storage/'.$path;
        //$producto = new Producto($request->desc, $cat, $request->val, $request->stock,$imagenNombre);
        $producto->save();
        return redirect('/gestion');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product($request->all());
		$product->save();
		return redirect()->route('inicio');
    }

    /**
     * Display the specified resource.
     */
    public function getProduct($id)
    {
        // Buscar el producto por su ID en la base de datos
        $product = Product::findOrFail($id);

        // Devolver los detalles del producto en formato JSON
        return response()->json($product);
    }
    public function showProduct(Request $request)
    {
        // Buscar el producto por su ID en la base de datos
        $product = Product::find($request->id);
        $users = User::all();
        $categories = Category::all();
        $brands = Brand::all();
        $sugestions = Sugestion_box::all();

        // Devolver los detalles del producto en formato JSON
        return view('product', ['product' => $product, 'users' => $users, 'categories' => $categories, 'brands' => $brands, 'sugestions' => $sugestions]);
    }
    public function compra(Request $request)
    {
        // $user = User::find($request->user_id);
        // $cuenta = Cuenta::find($user->cuenta_id);
        // $producto = Producto::find($request->id);

        // if ($cuenta->dinero >= $producto->valor) {
        //     $cuenta->dinero -= $producto->valor;
        //     $producto->stock -= 1;
        // }

        // $producto->save();
        // $cuenta->save();

        // return redirect('/'); //->with(['compra' => $compra]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string',
            'categ' => 'required|integer',
            'brand' => 'required|integer',
            'val' => 'required|numeric',
            'stock' => 'required|integer',
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $producto = Product::find($request->id);
        $producto->name = $request->name;
        $producto->description = $request->desc;
        $producto->category_id = $request->categ;
        $producto->brand_id = $request->brand;
        $producto->value = $request->val;
        $producto->stock = $request->stock;

        if ($request->hasFile('img')) {
            $path = $request->file('img')->store('product', 'public');
            $producto->imagen = 'storage/'.$path;
        }

        $producto->save();
        return redirect('/gestion');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, Request $request)
    {
        $producto = Product::find($request->id);
        $producto->delete();

        return redirect('/gestion')->with('success', '¡Elemento eliminado correctamente!');
    }
}
