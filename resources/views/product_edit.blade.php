@extends('layouts.base')

@section('title', 'Редактировать товар')
    
@section('content')
<form action="{{ route('product.update', ['product' => $product->id]) }}" method="post" 
    class="col-8 mx-auto mt-4">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="productName">Наимнование товара</label>
        <input type="text" name="name" id="productName" value="{{ old('name', $product->name) }}" 
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
        <input type="text" name="art" id="productArt" value="{{ old('art', $product->art) }}"
            class="form-control @error('art') is-invalid @enderror"
        >
        @error('art')
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>    
        </span>     
        @enderror
    </div>


    <div class="form-group">
        <label for="">Продукт доступен:</label>
        <div id="productStatus"> 
            <label for="productAvailable">Да</label>
            <input type="radio" name="status" id="productAvailable"
                value="available" 
                @if ($product->status == 'available') checked @endif
            > 
            <label for="productAvailable">Нет</label>
            <input type="radio" name="status" id="productUnavailable"
                value="unavailable" 
                @if ($product->status != 'available') checked @endif
            > 
        </div>
    </div>
    <div class="form-group">
        <label for="productSize">Вес товара (кг.)</label>
        <input type="number" name="data[weight]" id="productSize" value="{{ old('data[weight]', $product->data['weight']) }}"
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
        <input type="number" name="data[price]" id="productPrice" value="{{ old('data[price]', $product->data['price']) }}"
            class="form-control @error("data.price") is-invalid @enderror"
        >
        @error("data.price")
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Изменить товар</button>
</form>
@endsection