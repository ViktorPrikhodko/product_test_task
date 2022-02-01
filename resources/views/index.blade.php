@extends('layouts.base')

@section('title', 'Главная')

@section('content')
@if (count($products) > 0)
<table class="table table-striped">
    <thead>
        <th>Наимнование</th>
        <th>Артикул</th>
        <th>Вес(кг.)</th>
        <th>Стоимость(руб.)</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->art }}</td>
                <td>{{ $product->data['weight'] }}</td>
                <td>{{ $product->data['price'] }}</td>
                <td><a href="{{ route('product.edit', ['product' => $product->id]) }}">Редактировать</a></td>
                <td><a href="{{ route('product.delete', ['product' => $product->id]) }}">Удалить</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
@else
<h2 class="text-center primary">На данный момент нет созданных продуктов</h2>
@endif
<div class="mt-4">
    <p class="text-center">Чтобы создать товар, нажмите <a href="{{ route('product.create') }}">Создать товар</a></p>
</div>

    
@endsection