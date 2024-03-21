@extends('layouts.template')

@section('title', 'Producto')

@section('content')
<div class="flex flex-wrap justify-center bg-blue-300">

    <div class="m-5 p-5 bg-blue-800 text-white rounded" style="width:20%;">
        <img src="{{asset($product->img)}}" alt="{{$product->name}}" class="rounded" style="width:90%; margin:auto;">
        <h3 class="text-2xl font-bold text-center text-blue-200 mt-4">{{$product->name}}</h3>
        <ul>
            <li>Descripcion: {{$product->description}}</li>
            <li>Stock: {{$product->stock}}</li>
            @foreach($categories as $category)
            @if($product->category_id == $category->id)
            <li>Categoria: {{$category->name}}</li>
            @endif
            @endforeach
            @foreach($brands as $brand)
            @if($product->brand_id == $brand->id)
            <li>Marca: {{$brand->name}}</li>
            @endif
            @endforeach
            <li class="text-2xl font-bold ">{{$product->value}} €</li>
        </ul>
        @auth
        <a href="/compra/{{$product->id}}?user_id={{ auth()->id() }}" class="bg-white hover:bg-blue-400 text-blue-600 hover:text-white font-bold py-2 px-4 rounded float-right">Comprar</a>
        @else
        <button class="bg-white hover:bg-blue-400 text-blue-600 hover:text-white font-bold py-2 px-4 rounded float-right">Comprar</button>
        @endauth
    </div>

    <form action="/addSugestion" method="POST" style="width:40%;" class="flex flex-wrap align-item m-5 bg-blue-800 rounded p-10 text-white" enctype="multipart/form-data">
        @csrf
        <h2>AÑADIR COMENTARIO</h2>
        <ul>
            <li>Titulo: <input type="text" name="title" id="title" class="w-1000 border-2 border-blue-600 px-4 py-2 rounded text-blue-800 float-right"></li>
            <li>Comentrario: <textarea name="body" id="body" cols="50" rows="5" class="w-1000 border-2 border-blue-600 px-4 py-2 rounded text-blue-800 float-right"></textarea></li>
            <li><input id="product_id" name="product_id" type="hidden" value="{{$product->id}}"></li>
            <li><input id="user_id" name="user_id" type="hidden" value="{{auth()->user()->id}}"></li>
            <li><input type="submit" class="bg-white hover:bg-blue-400 text-blue-600 hover:text-white font-bold py-2 px-4 rounded"></li>
        </ul>
    </form>

</div>

<div class="flex flex-wrap justify-center">
    <h2 class="text-2xl font-bold text-center text-blue-800 mt-4" style="width:100%;">Comentarios</h2>
@foreach($sugestions as $sugestion)
    @if ($sugestion->product_id == $product->id)
    <div class="m-5 p-5 bg-blue-300 rounded" style="width:40%;">
        <ul>
        @foreach($users as $user)
        @if ($user->id == $sugestion->user_id)
            <li class="text-2xl font-bold text-center text-blue-800">{{$user->name}}</li>
        @endif
        @endforeach
        <li class="font-bold">{{$sugestion->title}}</li>
        <li>{{$sugestion->body}}</li>
        </ul>
    </div>
    @endif
    @endforeach
</div>
@endsection