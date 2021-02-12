@extends('layouts.app')

@section('content')
    <h2 style="text-align: center">Add a user here</h2>
    <div class="container">
        @if(session('msg'))
            <div style="width: 20rem; margin: 0 auto" class="text-center p-3 mb-2 bg-success text-white">
                {{ session('msg') }}
            </div>
        @endif
        <form action="{{ route('admin.adduser') }}" style="width: 20rem; margin: 0 auto" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') border border-danger @enderror"
                    value="{{old('name')}}">
                    @error('name')
                        <div class="text-danger">
                            {{ $message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control @error('username') border border-danger @enderror"
                    value="{{old('username')}}">
                    @error('username')
                        <div class="text-danger">
                            {{ $message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" class="form-control @error('email') border border-danger @enderror"
                    value="{{old('email')}}">
                    @error('email')
                        <div class="text-danger">
                            {{ $message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') border border-danger @enderror">
                    @error('password')
                        <div class="text-danger">
                            {{ $message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') border border-danger @enderror">
                    @error('password_confirmation')
                        <div class="text-danger">
                            {{ $message}}
                        </div>
                    @enderror
                </div>
                <div class="d-grid gap-4">
                    <button class="btn btn-primary" type="submit">Add User</button>
                    <a href="{{ route('admin.dashboard') }}"><button class="btn btn-warning" type="button">Back to Dashboard</button></a>
                </div> 
            </div>

        </form>
    </div>
@endsection