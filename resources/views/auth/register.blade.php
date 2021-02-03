@extends('layouts.app')

@section('content')
<form style="width: 20rem; margin: 0 auto;" action="{{ route('register') }}" method="POST">
    @csrf
    <div class="row justify-content-center">
        <div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') border border-danger @enderror" id="name"  name="name"
                value="{{ old('name') }}">
                    @error('name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
            </div>         
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="text" class="form-control @error('email') border border-danger @enderror" id="email"  name="email"
                value="{{ old('email') }}">
                    @error('email')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
            </div>           
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control @error('username') border border-danger @enderror" id="username" name="username" 
                value="{{old('username')}}">
                @error('username')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') border border-danger @enderror" id="password" name="password">
                @error('password')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>        
    </div>
</form>
@endsection