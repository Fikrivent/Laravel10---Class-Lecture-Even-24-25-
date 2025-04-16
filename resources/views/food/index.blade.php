@extends('layouts.adminlte4')

@section('content')
<div class="container">
  <h2>Food Table</h2>        
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Nutrition Facts</th>
        <th>Description</th>
        <th>Price</th>
        <th>Category</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($foods as $f)
      <tr>
        <td>{{ $f->id }}</td>
        <td>{{ $f->name }}</td>
        <td>{{ $f->nutrition_facts }}</td>
        <td>{{ $f->description }}</td>
        <td>{{ $f->price }}</td>
        <td>{{ $f->category->name }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
