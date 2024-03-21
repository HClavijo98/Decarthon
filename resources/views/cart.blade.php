@extends('layouts.template')

@section('title', 'Carrito')

@section('content')
<div class="flex justify-center items-center bg-blue-300">
    <table class="border-2 border-blue-800 m-20">
        <tr>
            <th></th>
            <th>Producto</th>
            <th>Valor</th>
        </tr>
        @php
        $suma = 0;
        @endphp
    @if ($carts [0] == null)

    @else
    @foreach($carts as $cart)
    @if($cart->status == 'pendiente')
        <tr class="{{ $loop->iteration % 2 === 0 ? 'bg-grey' : 'bg-blue-400' }}">
            <td>
                <a href="#" onclick="event.preventDefault(); document.getElementById('{{$cart->id}}').submit();"><img src="{{asset('borrar.png')}}" alt="Eliminar" class="w-5"></a>
                <form id="{{$cart->id}}" action="/cart?id={{auth()->id()}}&&cart={{$cart->id}}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </td>
            <td>{{$cart->product_id}} -
                @foreach($products as $product)
                @if($cart->product_id == $product->id)
                {{$product->name}}
                @endif
                @endforeach
            </td>
            <td>{{$cart->totalValue}}</td>
            @php
                $suma += $cart->totalValue;
            @endphp
        </tr>
    @endif
    @endforeach
    @endif
        <tr>
            <td></td>
            <th>TOTAL</th>
            <td class="font-bold">{{$suma}}</td>
        </tr>
    </table>

    <a href="/pagar/{{auth()->id()}}?money={{$suma}}" class="m-10 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">PAGAR</a>
</div>
@endsection