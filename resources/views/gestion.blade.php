@extends('layouts.template')

@section('title', 'Gestion')

@section('content')
    <div class="flex flex-wrap justify-center bg-blue-300">
        
        <div class="flex justify-center" style="width:100%; border-bottom: 5px solid rgb(30, 64, 175);">
            <div id="menuProducts" class="m-5 font-bold text-blue-800 cursor-pointer">PRODUCTOS</div>
            <div id="menuUsers" class="m-5 font-bold text-blue-800 cursor-pointer">USUARIOS</div>
            <div id="menuCategories" class="m-5 font-bold text-blue-800 cursor-pointer">CATEGORIAS</div>
            <div id="menuBrands" class="m-5 font-bold text-blue-800 cursor-pointer">MARCAS</div>
        </div>

        <div id="relleno" style="width:100%;height:500px;"></div>

    <form action="/addProduct" method="POST" style="width:40%;" class="m-5 bg-blue-800 rounded p-10 text-white product" enctype="multipart/form-data">
        @csrf
        <h2>AÑADIR PRODUCTO</h2>
        <ul>
            <li>Nombre: <input type="text" name="name" id="name" class="border-2 border-blue-600 px-4 py-2 rounded text-blue-800" style="width:500px;"></li>
            <li>Descripcion: <input type="text" name="desc" id="desc" class="border-2 border-blue-600 px-4 py-2 rounded text-blue-800" style="width:500px;"></li>
            <li>Categoria: <select id="categ" name="categ" required class="border-2 border-blue-600 px-4 py-2 rounded text-blue-800" style="width:500px;">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select></li>
            <li>Marca: <select id="brand" name="brand" required class="border-2 border-blue-600 px-4 py-2 rounded text-blue-800" style="width:500px;">
                    @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select></li>
            <li>Valor: <input type="double" name="val" id="val" class="border-2 border-blue-600 px-4 py-2 rounded text-blue-800" style="width:500px;"></li>
            <li>Stock: <input type="number" name="stock" id="stock" class="border-2 border-blue-600 px-4 py-2 rounded text-blue-800" style="width:500px;"></li>
            <li>Imagen: <input type="file" name="img" id="img" class="border-2 border-blue-600 px-4 py-2 rounded"></li>
            <li><input type="submit" class="bg-white hover:bg-blue-400 text-blue-600 hover:text-white font-bold py-2 px-4 rounded"></li>
        </ul>
    </form>

    <form action="/updateProduct" method="POST" style="width:40%;" class="m-5 bg-blue-800 rounded p-10 text-white product" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h2>MODIFICAR PRODUCTO</h2>
        <ul>
        <li>Producto: <select id="id" name="id" required  class="border-2 border-blue-600 px-4 py-2 rounded text-blue-800" style="width:500px;">
                    @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->id }}-{{ $product->name }}</option>
                    @endforeach
                </select></li>
            <li>Nombre: <input type="text" name="name" id="nameU" class="w-1000 border-2 border-blue-600 px-4 py-2 rounded text-blue-800" style="width:500px;"></li>
            <li>Descripcion: <input type="text" name="desc" id="descU" class="w-1000 border-2 border-blue-600 px-4 py-2 rounded text-blue-800" style="width:500px;"></li>
            <li>Categoria: <select id="categU" name="categ" required class="w-1000 border-2 border-blue-600 px-4 py-2 rounded text-blue-800" style="width:500px;">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select></li>
            <li>Marca: <select id="brandU" name="brand" required class="w-1000 border-2 border-blue-600 px-4 py-2 rounded text-blue-800" style="width:500px;">
                    @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select></li>
            <li>Valor: <input type="double" name="val" id="valU" class="w-1000 border-2 border-blue-600 px-4 py-2 rounded text-blue-800" style="width:500px;"></li>
            <li>Stock: <input type="number" name="stock" id="stockU" class="w-1000 border-2 border-blue-600 px-4 py-2 rounded text-blue-800" style="width:500px;"></li>
            <li>Imagen: <input type="file" name="img" id="imgU" class="w-1000 border-2 border-blue-600 px-4 py-2 rounded"></li>
            <li><input type="submit" class="bg-white hover:bg-blue-400 text-blue-600 hover:text-white font-bold py-2 px-4 rounded"></li>
        </ul>
    </form>

    <form action="/addCat" method="GET" style="width:40%;" class="m-5 bg-blue-800 rounded p-10 text-white category">
        @csrf
        <h2>AÑADIR CATEGORIA</h2>
        <ul>
            <li>Nombre: <input type="text" name="cat" id="cat" class="border-2 border-blue-600 px-4 py-2 rounded text-blue-800" style="width:500px;"></li>
            <li><input type="submit" class="bg-white hover:bg-blue-400 text-blue-600 hover:text-white font-bold py-2 px-4 rounded"></li>
        </ul>
    </form>

    <form action="/updateCat" method="POST" style="width:40%;" class="m-5 bg-blue-800 rounded p-10 text-white category">
        @csrf
        @method('PUT')
        <h2>ACTUALIZAR CATEGORIA</h2>
        <ul>
        <li>Categoria: <select id="cat" name="cat" class="border-2 border-blue-600 px-4 py-2 rounded text-blue-800" style="width:500px;" required>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select></li>
            <li>Nombre: <input type="text" name="name" id="name" class="border-2 border-blue-600 px-4 py-2 rounded text-blue-800" style="width:500px;"></li>
            <li><input type="submit" class="bg-white hover:bg-blue-400 text-blue-600 hover:text-white font-bold py-2 px-4 rounded"></li>
        </ul>
    </form>

    <form action="/addBrand" method="GET" style="width:40%;" class="m-5 bg-blue-800 rounded p-10 text-white brand">
        @csrf
        <h2>AÑADIR MARCA</h2>
        <ul>
            <li>Nombre: <input type="text" name="brand" id="brand" class="border-2 border-blue-600 px-4 py-2 rounded text-blue-800" style="width:500px;"></li>
            <li><input type="submit" class="bg-white hover:bg-blue-400 text-blue-600 hover:text-white font-bold py-2 px-4 rounded"></li>
        </ul>
    </form>

    <form action="/updateBrand" method="POST" style="width:40%;" class="m-5 bg-blue-800 rounded p-10 text-white brand">
        @csrf
        @method('PUT')
        <h2>ACTUALIZAR MARCA</h2>
        <ul>
        <li>Marca: <select id="brand" name="brand" class="border-2 border-blue-600 px-4 py-2 rounded text-blue-800" style="width:500px;" required>
                    @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select></li>
            <li>Nombre: <input type="text" name="name" id="name" class="border-2 border-blue-600 px-4 py-2 rounded text-blue-800" style="width:500px;"></li>
            <li><input type="submit" class="bg-white hover:bg-blue-400 text-blue-600 hover:text-white font-bold py-2 px-4 rounded"></li>
        </ul>
    </form>

    <form action="/upgradeUser" method="GET" style="width:40%;" class="m-5 bg-blue-800 rounded p-10 text-white user">
        @csrf
        <h2>ASCENDER USUARIO</h2>
        <ul>
            <li>Usuario: <select id="user" name="user" class="border-2 border-blue-600 px-4 py-2 rounded text-blue-800" style="width:500px;" required>
                    @foreach ($users as $user)
                    @if(!$user->hasRole("admin"))
                    <option value="{{ $user->id }}">{{ $user->id }}-{{ $user->name }}</option>
                    @endif
                    @endforeach
                </select></li>
            <li><input type="submit" class="bg-white hover:bg-blue-400 text-blue-600 hover:text-white font-bold py-2 px-4 rounded"></li>
        </ul>
    </form>

    <form action="/downgradeUser" method="GET" style="width:40%;" class="m-5 bg-blue-800 rounded p-10 text-white user">
        @csrf
        <h2>DESCENDER USUARIO</h2>
        <ul>
            <li>Usuario: <select id="user" name="user" class="border-2 border-blue-600 px-4 py-2 rounded text-blue-800" style="width:500px;" required>
                    @foreach ($users as $user)
                    @if(($user->hasRole("admin")) && ($user->id != 21))
                    <option value="{{ $user->id }}">{{ $user->id }}-{{ $user->name }}</option>
                    @endif
                    @endforeach
                </select></li>
            <li><input type="submit" class="bg-white hover:bg-blue-400 text-blue-600 hover:text-white font-bold py-2 px-4 rounded"></li>
        </ul>
    </form>

    <form action="/delUser" method="POST" style="width:40%;" class="m-5 bg-blue-800 rounded p-10 text-white user">
        @csrf
        @method('DELETE')
        <h2>BANNEAR USUARIO</h2>
        <ul>
            <li>Usuario: <select id="user" name="user" class="border-2 border-blue-600 px-4 py-2 rounded text-blue-800" style="width:500px;" required>
                @foreach ($banneds as $banned)
                    @foreach ($users as $user)
                    @if(($user->email != $banned->email) && ($user->hasRole('cliente')))
                    <option value="{{ $user->id }}">{{ $user->id }}-{{ $user->name }}</option>
                    @endif
                    @endforeach
                    @endforeach
                </select></li>
            <li><input type="submit" class="bg-white hover:bg-blue-400 text-blue-600 hover:text-white font-bold py-2 px-4 rounded"></li>
        </ul>
    </form>

    <form action="/delProduct" method="POST" style="width:40%;" class="m-5 bg-blue-800 rounded p-10 text-white product" enctype="multipart/form-data">
        @csrf
        @method('DELETE')
        <h2>ELIMINAR PRODUCTO</h2>
        <ul>
            <li>Producto: <select id="id" name="id" class="border-2 border-blue-600 px-4 py-2 rounded text-blue-800" style="width:500px;" required>
                    @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->id }}-{{ $product->name }}</option>
                    @endforeach
                </select></li>
            <li><input type="submit" class="bg-white hover:bg-blue-400 text-blue-600 hover:text-white font-bold py-2 px-4 rounded"></li>
        </ul>
    </form>

    <form action="/delCat" method="POST" style="width:40%;" class="m-5 bg-blue-800 rounded p-10 text-white category">
        @csrf
        @method('DELETE')
        <h2>ELIMINAR CATEGORIA</h2>
        <ul>
            <li>Categoria: <select id="cat" name="cat" class="border-2 border-blue-600 px-4 py-2 rounded text-blue-800" style="width:500px;" required>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select></li>
            <li><input type="submit" class="bg-white hover:bg-blue-400 text-blue-600 hover:text-white font-bold py-2 px-4 rounded"></li>
        </ul>
    </form>

    <form action="/delBrand" method="POST" style="width:40%;" class="m-5 bg-blue-800 rounded p-10 text-white brand">
        @csrf
        @method('DELETE')
        <h2>ELIMINAR MARCA</h2>
        <ul>
            <li>Marca: <select id="brand" name="brand" class="border-2 border-blue-600 px-4 py-2 rounded text-blue-800" style="width:500px;" required>
                    @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select></li>
            <li><input type="submit" class="bg-white hover:bg-blue-400 text-blue-600 hover:text-white font-bold py-2 px-4 rounded"></li>
        </ul>
    </form>
    </div>
    <script>
        function fillFormFields() {
        var productId = document.getElementById('id').value;
        
        fetch(`/getProduct/${productId}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('nameU').value = data.name;
                document.getElementById('descU').value = data.description;
                document.getElementById('categU').value = data.category_id;
                document.getElementById('brandU').value = data.brand_id;
                document.getElementById('valU').value = data.value;
                document.getElementById('stockU').value = data.stock;
                document.getElementById('imgU').value = data.img;
                // Si deseas mostrar la imagen actual del producto, puedes hacerlo aquí también
            })
            .catch(error => console.error('Error al obtener los datos del producto:', error));
    }
    function hideForms(){
        for(let form of forms){
            form.style.display = 'none';
        }
        document.getElementById('relleno').style.display = 'block';
    }
    function showProd(){
        hideForms();
        document.getElementById('relleno').style.display = 'none';
        let prods = document.getElementsByClassName('product');
        for(let prod of prods){
            prod.style.display = 'block';
        }
    }
    function showUser(){
        hideForms();
        document.getElementById('relleno').style.display = 'none';
        let users = document.getElementsByClassName('user');
        for(let user of users){
            user.style.display = 'block';
        }
    }
    function showCategory(){
        hideForms();
        document.getElementById('relleno').style.display = 'none';
        let categories = document.getElementsByClassName('category');
        for(let category of categories){
            category.style.display = 'block';
        }
    }
    function showBrand(){
        hideForms();
        document.getElementById('relleno').style.display = 'none';
        let brands = document.getElementsByClassName('brand');
        for(let brand of brands){
            brand.style.display = 'block';
        }
    }
    var productId = document.getElementById('id');
    var menuProducts = document.getElementById('menuProducts');
    var menuUsers = document.getElementById('menuUsers');
    var menuCategories = document.getElementById('menuCategories');
    var menuBrands = document.getElementById('menuBrands');
    var forms = document.getElementsByTagName('form');

    productId.addEventListener('change', fillFormFields);
    menuProducts.addEventListener('click',showProd);
    menuUsers.addEventListener('click',showUser);
    menuCategories.addEventListener('click',showCategory);
    menuBrands.addEventListener('click',showBrand);

    hideForms();
    </script>
@endsection