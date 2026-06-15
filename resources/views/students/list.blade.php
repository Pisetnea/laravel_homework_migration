@extends('layouts.app')

@section('content')
    <h2 class="display-6 ">Student List</h2>

    <a href="{{ route('students.create') }}" class="btn btn-primary mb-3 ">Create+</a>

    <table class="table">
        <thead class="thead-dark">
            <tr class="table-dark">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="table-light">
            @foreach ($students as $index => $student)
                <tr>
                    <td>{{index+1}}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->desc }}</td>
                    <td>
                        <!-- Button trigger modal -->
                        <a href="" data-bs-toggle="modal" class="text-success"
                            data-bs-target="#category{{ $student->id }}">
                            <i class="fa-regular fa-eye"></i>
                        </a>


                        <a href="{{ route('students.edit', $category->id) }}" class="text-info">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>

                        <a href="" data-bs-toggle="modal" data-bs-target="#updatecategory{{ $student->id }}"
                            class="text-danger">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                        <!-- Modal -->
                        @include('students.show')
                        @include('students.delete')

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
