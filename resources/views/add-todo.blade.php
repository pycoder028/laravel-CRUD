@extends('layouts.master')

@section('content')

<a href="{{ url('/') }}" class="btn btn-sm btn-success m-3 float-end">Todos</a>

<form action="{{ url('store-todo') }}" method="POST">
    @csrf
    <div class="mb-3">
      <input type="text" name="name" placeholder="Enter your name" class="form-control">
      @error('name')
          <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="mb-3">
        <input type="text" name="email" placeholder="Enter your email" class="form-control">
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection
