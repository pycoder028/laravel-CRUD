@extends('layouts.master')

@section('content')
@if (Session::has('msg'))
    <p class="alert alert-success">{{ Session::get('msg') }}</p>
@endif
<a href="{{ url('add-todo') }}" class="btn btn-sm btn-success m-3 float-end">Add Todo</a>

<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">SL.</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <td scope="col">Action</td>
      </tr>
    </thead>
    <tbody>
      @foreach ($allTodos as $key=>$todo)
      <tr>
        <td>{{ $key+1 }}</td>
        <td>{{ $todo->name }}</td>
        <td>{{ $todo->email }}</td>
        <td>
          <a href="{{ url('/edit-todo/'.$todo->id) }}" class="btn btn-sm btn-warning" style="color: white">Edit</a>
          <a href="{{ url('/delete-todo/'.$todo->id) }}" onclick="return confirm('Are you want delete this?')" class="btn btn-sm btn-danger" style="color: white">Delete</a>
        </td>
      </tr>
      @endforeach

    </tbody>
  </table>
  {{ $allTodos->links() }}

@endsection
