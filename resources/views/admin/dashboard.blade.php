@extends('layouts.app')

@section('content')
    <h2 style="text-align: center">Welcome to The Admin's Dashboard</h2>
    {{-- <p>There are {{ $users->count() }} users and {{ $books->count() }} books</p> --}}
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body text-center">
                  <h5 class="card-title">Books</h5>
                  <p class="card-text">{{ $books->count() }} books</p>
                  {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body text-center">
                  <h5 class="card-title">Users</h5>
                  <p class="card-text">{{ $users->count() }} users</p>
                  {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                </div>
              </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col text-center">
                <h5>Books</h5>
            </div>
            <div class="col text-center">
                <h5>Users</h5>
            </div>
        </div>
    </div>
    
@endsection