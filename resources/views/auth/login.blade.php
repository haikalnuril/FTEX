@extends('components.template')
@section('title', 'Login')
@section('content')
<div class="container d-flex justify-content-center align-items-center full-height">
        <div class="col-md-4">
            <div class="card border-0 rounded shadow-sm">
                <div class="card-body">
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div>
                            <h3 class="fw-bold d-flex justify-content-center mb-5">Welcome To FTEX</h3>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="mb-1 fw-bold">Email</label>
                            <input type="email" name="email" id="email" placeholder="Email@example.com" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="mb-1 fw-bold">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="**********">
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mt-3">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection