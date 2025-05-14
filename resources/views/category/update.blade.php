@extends('layouts.adminlte4')

@section('content')
   <!-- fill with your page bar like previous week HERE !-->
   <!-- end page bar !-->
    <!-- END PAGE HEADER-->
     <div class="container">
        <form method="POST" action="{{ route('category.update', $category->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="name"
                    value="{{ $category->name }}">
                <small id="name" class="form-text text-muted">Please write down updated Category Name here.</small>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
