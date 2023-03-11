<!DOCTYPE html>
<html lang="en">
@extends('layouts.main')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title> 

    <a href="/emptyshopping-cart" class="btn btn-success" style="float:right">Очистить корзину</a>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    @if(Session::has('product_deleted'))
    <div class="alert alert-success" role="alert">
    {{Session::get('product_deleted')}}
    </div>
    @endif 
    
    @if(Session::has('product_unselected'))
    <div class="alert alert-success" role="alert">
    {{Session::get('product_unselected')}}
    </div>
    @endif
    
</head>
<body>
   
    
  @if($products->isNotEmpty())          
<table class="table table-bordered border-primary">
  <thead>
    <tr>
      <th scope="col">Фото товара</th>
      <th scope="col">Название товара</th>
      <th scope="col">Категория</th>
      <th scope="col">Магазин</th>
      <th scope="col">Цена, $USD</th>
      <th scope="col">Изменить/Удалить</th>
    </tr>
  </thead>
  <tbody>
        @foreach ($products as $product)
    <tr>
      <td><img src="{{asset('images')}}/{{$product->productimage}}" style="max-width:200px;"></td>
      <td>{{$product->productname}}</td>
      <td>{{$product->category}}</td>
      <td>{{$product->store}}</td>
      <td>{{$product->price}}</td>
      <td>
      <a href="/edit-product/{{$product->id}}" class="btn btn-info">Изменить</a>
      <a href="/delete-product/{{$product->id}}" class="btn btn-danger" onClick="return confirm('Вы действительно хотите удалить товар: {{$product->productname}}?')">Удалить</a>
      <a href="/unselect-product/{{$product->id}}" class="btn btn-success">Удалить из корзины</a>
      </td>
    </tr>
        @endforeach
        @else 
        <div>
            <h2>Корзина пустая</h2>
        </div>
        @endif  
  </tbody>
</table>
Общая сумма всех товаров: <strong>{{$sum}} USD</strong>
             
@endsection                   

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>