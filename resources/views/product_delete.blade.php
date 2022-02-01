@extends('layouts.base')

@section('title', 'Редактировать товар')
    
@section('content')
<div class="col-8 mx-auto mt-4">
    <p class="text-center">Продукт: {{ $product->name }}</p>
    <p class="text-center">Артикул: {{ $product->art }}</p>
</div>
<form action="{{ route('product.destroy', ['product' => $product->id]) }}" method="post" 
    class="col-8 mx-auto mt-4">
    @csrf
    @method('DELETE')
    <button type="submit" class="d-block mx-auto btn btn-primary">Удалить продукт</button>
</form>
@endsection