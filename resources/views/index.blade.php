@extends('layouts.template')

@section('title', 'Inicio')

@section('content')
<div class="flex flex-wrap justify-center bg-blue-300">
@foreach($products as $product)
    <div class="m-5 p-5 bg-blue-800 text-white rounded" style="width:20%;">
        @auth
        <a href="/showProduct/{{$product->id}}">
            <img src="{{asset($product->img)}}" alt="{{$product->name}}" class="rounded" style="width:90%; margin:auto;">
            <h3 class="text-2xl font-bold text-center text-blue-200 mt-4">{{$product->name}}</h3>
        </a>
        @else
            <img src="{{asset($product->img)}}" alt="{{$product->name}}" class="rounded" style="width:90%; margin:auto;">
            <h3 class="text-2xl font-bold text-center text-blue-200 mt-4">{{$product->name}}</h3>
        @endauth
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
        <button class="comprar bg-white hover:bg-blue-400 text-blue-600 hover:text-white font-bold py-2 px-4 rounded float-right">Comprar</button>
        @endauth
    </div>
@endforeach
</div>
<script>
    function aviso(e){
        alert('!Para poder comprar debes tener una cuenta e iniciar sesion!');
    }
    let botones = document.getElementsByClassName('comprar');
    let compra = document.getElementById('compra');
    for(let boton of botones){
        boton.addEventListener('click',aviso);
    }
</script>
@endsection