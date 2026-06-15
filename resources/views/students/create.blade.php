@extends('layouts.app')
@section('title')
    <title>Create Student</title>
@section('content')
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="{{ route('students.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name = "name" class="form-control" id="name" aria-describedby="name">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name = "email" class="form-control" id="email" aria-describedby="email">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name = "phone" class="form-control" id="phone" aria-describedby="phone">

                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
@endsection
