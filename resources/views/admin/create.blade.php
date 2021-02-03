{{-- @extends('layouts.app')

@section('content')
    @if(session('msg'))
        <div class="text-center p-3 mb-2 bg-success text-white">
            {{ session('msg') }}
        </div>
    @endif
    @guest
        <p>Please <a href="{{ route('login') }}">Login</a> to create Todos</p>
    @endguest
    @auth
    <h1 style="text-align: center;">Create Book</h1>
        <a class="btn btn-primary" href="{{ route('admin.dashboard') }}">Go to Dashboard</a>
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('admin.create') }}" Method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control  @error('name') border border-danger @enderror" name="name" placeholder="Name"
                         value="{{ old('name') }}">
                         @error('name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control  @error('title') border border-danger @enderror" name="title" placeholder="Title" 
                        value="{{ old('title') }}">
                        @error('title')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control  @error('author') border border-danger @enderror" name="author" placeholder="Author" 
                        value="{{ old('author') }}">
                        @error('author')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control  @error('description') border border-danger @enderror" name="description" placeholder="Description" 
                        value="{{ old('description') }}">
                        @error('description')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control  @error('pages') border border-danger @enderror" name="pages" placeholder="No. of pages" 
                        value="{{ old('pages') }}">
                        @error('pages')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>   
                </form>
            </div>
        </div>
    @endauth
@endsection --}}