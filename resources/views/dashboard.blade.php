@extends('layouts.app')

@section('content')
<h2 style="text-align: center">Welcome to your Dashboard</h2>
<div class="container">
    <div class="row px-4 mb-2">
        {{-- <h6 class="">Search</h6> --}}
        {{-- <form action="{{ route('dashboard') }}" method="get">
            <input type="text" name="search" id="search" placeholder="search" value="{{request()->query('search')}}">
        </form> --}}
        <form action="{{ route('dashboard') }}" method="get">
            <div class="input-group">
                <div class="form-outline">
                    <input type="text" name="search" id="search" class="form-control" placeholder="search" value="{{request()->query('search')}}">
                    {{-- <label class="form-label" for="form1">Search</label> --}}
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

    </div>
    @if ($books->count())
        <div class="row">
            @foreach ($books as $book)              
                <div class="col-md-3 px-2 py-2" >
                <div style="box-shadow: 0px 0px 1px 0px;">
                    <img src="{{ asset($book->book_cover_path) }}" class="" alt="..." width="100%" height="300rem" style="object-fit: cover; max-width: 100%">
                        <div class="text-center">
                            <h5 class="mt-3 mb-0 text-uppercase" style=" font-size: 1.3rem">{{ $book->title }}</h5>
                            <p class="mb-0 mt-0 text-secondary" style="font-size: 1rem">{{ $book->author}}</p>
                            <div class="mb-0 mt-0">
                                <small class="text-secondary">Uploaded: {{ $book->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                        <div class="mb-0 mt-0 card-footer bg-success text-center">
                            <button class="btn mb-0 mt-0 " ><a href="{{ asset($book->book_path) }}" class="text-white text-decoration-none" >Download</a></button>
                        </div>
                        
                </div>
                </div>
            @endforeach 
        </div>
        {{-- <div class="d-flex">
            {{ $books->links() }}
        </div> --}}
        
        
    @else
        <p>No book uploaded</p>
    @endif
    
    
</div>
@endsection