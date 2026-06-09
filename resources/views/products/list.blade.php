@extends('layouts.app')

@section('title')
    <title>Product List</title>
@endsection

@section('content')
    <h2 class="display-6">Product List</h2>

    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Create+</a>

    <table class="table">
        <thead class="thead-dark">
            <tr class="table-dark">
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="table-light">
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->category?->name ?? 'Uncategorized' }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="text-info me-2">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>

                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this product?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-danger p-0 align-baseline">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
