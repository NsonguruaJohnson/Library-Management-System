@extends('layouts.app')

@section('content')
    <h2 style="text-align: center">Add a book here</h2>
    <div class="container">
        @if(session('msg'))
            <div style="width: 20rem; margin: 0 auto" class="text-center p-3 mb-2 bg-success text-white">
                {{ session('msg') }}
            </div>
        @endif
        <form action="{{ route('admin.addbook') }}" style="width: 20rem; margin: 0 auto" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control @error('title') border border-danger @enderror"
                    value="{{old('title')}}">
                    @error('title')
                        <div class="text-danger">
                            {{ $message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" name="author" id="author" class="form-control @error('author') border border-danger @enderror"
                    value="{{old('author')}}">
                    @error('author')
                        <div class="text-danger">
                            {{ $message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Choose BookCover</label>
                    <input name="book_cover" class="form-control @error('book_cover') border border-danger @enderror" type="file" id="book_cover"
                    value="{{old('book_cover')}}">
                    @error('book_cover')
                        <div class="text-danger">
                            {{ $message}}
                        </div>
                    @enderror
                </div>    
                <div class="mb-3">
                    <label for="formFile" class="form-label">Choose Book</label>
                    <input name="book_file" class="form-control @error('book_file') border border-danger @enderror" type="file" id="book_file"
                    value="{{old('book_file')}}">
                    @error('book_file')
                        <div class="text-danger">
                            {{ $message}}
                        </div>
                    @enderror
                </div>    
                {{-- <button type="submit" class="btn btn-primary">Post Book</button>  --}}
                <div class="d-grid gap-4">
                    <button class="btn btn-primary" type="submit">Post Book</button>
                    <a href="{{ route('admin.dashboard') }}"><button class="btn btn-warning" type="button">Back to Dashboard</button></a>
                </div>              
            </div>

        </form>
    </div>
@endsection