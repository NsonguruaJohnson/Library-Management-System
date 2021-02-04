@extends('layouts.app')

@section('content')
    <h2 style="text-align: center">Welcome to The Admin's Dashboard</h2>
    {{-- <p>There are {{ $users->count() }} users and {{ $books->count() }} books</p> --}}
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="d-grid gap-2 col-6 mx-auto">
                    <a href="{{ route('admin.adduser') }}"><button type="button" class="btn btn-primary btn-lg">Add User</button></a>
                    <a href="{{ route('admin.addbook') }}"><button type="button" class="btn btn-primary btn-lg">Add Book</button></a>
                </div>
            </div>
            <div class="col-9">
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
            </div>       
        </div>
               
        <br>
        <div class="row">
            <div class="col text-center">
                <h5>Books</h5>
                @if($books->count())
                    <div class="">
                        <table class="table table-bordered table-striped table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Author</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <td>{{ $book->id }}</td>
                                        <td>{{ $book->title }}</td>
                                        <td>{{ $book->author }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>There are no books</p>
                @endif
                
            </div>
            <div class="col text-center">
                <h5>Users</h5>
                @if($users->count())
                    <div class="">
                        <table class="table table-bordered table-striped table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>There are no users</p>
                @endif
            </div>
        </div>
    </div>
    
@endsection