@extends('layouts.app')

@section('content')
    <h2 style="text-align: center">Welcome to The Admin's Dashboard</h2>
    {{-- <p>There are {{ $users->count() }} users and {{ $books->count() }} books</p> --}}
    <div class="container">
        @if(session('msg'))
            <div style="width: 20rem; margin: 0 auto" class="text-center p-3 mb-2 bg-success text-white">
                {{ session('msg') }}
            </div>
        @endif
        <form action="{{ route('admin.updatebook', $book->id) }}" style="width: 20rem; margin: 0 auto" method="post">
            @csrf
            <div class="row justify-content-center">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control @error('title') border border-danger @enderror"
                    value="{{$book->title}}">
                    @error('title')
                        <div class="text-danger">
                            {{ $message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" name="author" id="author" class="form-control @error('author') border border-danger @enderror"
                    value="{{$book->author}}">
                    @error('author')
                        <div class="text-danger">
                            {{ $message}}
                        </div>
                    @enderror
                </div>     
                {{-- <button type="submit" class="btn btn-primary">Post Book</button>  --}}
                <div class="d-grid gap-4">
                    <button class="btn btn-primary" type="submit">Update Book</button>
                    <a href="{{ route('admin.dashboard') }}"><button class="btn btn-warning" type="button">Back to Dashboard</button></a>
                </div>              
            </div>

        </form>
    </div>

@endsection