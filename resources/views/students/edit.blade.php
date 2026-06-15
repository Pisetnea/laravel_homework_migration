@extends('layouts.app')
@section('title')
    <title>Edit Student</title>

@section('content')

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="{{ route('students.update',$category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" value= "{{ $student->name }}" name = "name" class="form-control"
                            id="name" aria-describedby="name">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" value= "{{ $student->email }}" name = "email" class="form-control"
                            id="email" aria-describedby="name">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" value= "{{ $student->phone }}" name = "phone" class="form-control"
                            id="phone" aria-describedby="name">

                        <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    
@endsection



