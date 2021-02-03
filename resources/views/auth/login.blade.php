@extends('layouts.app')

@section('content')

@if(session('msg'))
        <div style="width: 20rem; margin: 0 auto" class="text-center p-3 mb-2 bg-danger text-white">
            {{ session('msg') }}
        </div>
    @endif
<form style="width: 20rem; margin: 0 auto" action="{{ route('login') }}" method="POST">
    @csrf
    <div class="row justify-content-center">     
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
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <label class="form-check-label" for="remember">Remember me</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>       
    </div>
</form>
@endsection