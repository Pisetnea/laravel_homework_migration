@extends('layouts.app')

@section('content')
    <h2 class="display-6 ">Category List</h2>

    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3 ">Create+</a>

    <table class="table">
        <thead class="thead-dark">
            <tr class="table-dark">
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="table-light">
            @foreach ($categories as $index => $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->desc }}</td>
                    <td>
                        <!-- Button trigger modal -->
                        <a href="" data-bs-toggle="modal" class="text-success"
                            data-bs-target="#category{{ $category->id }}">
                            <i class="fa-regular fa-eye"></i>
                        </a>


                        <a href="{{ route('categories.edit', $category->id) }}" class="text-info">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>

                        <a href="" data-bs-toggle="modal" data-bs-target="#updatecategory{{ $category->id }}"
                            class="text-danger">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                        <!-- Modal -->
                        @include('categories.show')
                        @include('categories.delete')

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
