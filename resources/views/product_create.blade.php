@extends('layouts.base')

@section('title', 'Создать товар')
    
@section('content')
<form action="{{ route('product.store') }}" method="post" class="col-8 mx-auto mt-4">
    @csrf
    <div class="form-group">
        <label for="productName">Наимнование товара</label>
        <input type="text" name="name" id="productName" 
            class="form-control @error('name') is-invalid @enderror"
        >
        @error('name')
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>    
        </span>    
        @enderror
    </div>
    <div class="form-group">
        <label for="productArt">Артикул товара</label>
        <input type="text" name="art" id="productArt"
            class="form-control @error('art') is-invalid @enderror"
        >
        @error('art')
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>    
        </span>     
        @enderror
        
    </div>
    <div class="form-group">
        <label for="productSize">Вес товара (кг.)</label>
        <input type="number" name="data[weight]" id="productSize"
            class="form-control @error("data.weight") is-invalid @enderror"
        >
        @error("data.weight")
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Стоимость товара (руб.)</label>
        <input type="number" name="data[price]" id="productPrice"
            class="form-control @error("data.price") is-invalid @enderror"
        >
        @error("data.price")
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Создать товар</button>
</form>
@endsection