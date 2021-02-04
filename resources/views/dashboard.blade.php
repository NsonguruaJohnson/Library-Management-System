@extends('layouts.app')

@section('content')
<h2 style="text-align: center">Welcome to your Dashboard</h2>
<div class="container">
    @if ($books->count())
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($books as $book)              
                <div class="col">
                    <div class="card text-center h-100">
                        {{-- <img src="..." class="card-img-top" alt="..."> --}}
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            {{-- <h3 class="card-text">{{ $book-> name}}</p> --}}
                            <p class="card-text">{{ $book->author}}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">{{ $book->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>  
            @endforeach 
        </div>
    @else
        <p>No book uploaded</p>
    @endif
    
</div>
@endsection