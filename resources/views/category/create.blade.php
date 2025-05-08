@extends('layouts.adminlte4')

@section('content')
   <!-- fill with your page bar like previous week HERE !-->
   <!-- end page bar !-->
    <!-- END PAGE HEADER-->
     <div class="container">
        <form method="POST" action="{{ route('category.store') }}">
            @csrf
            <div class="form-group">
                <select class="form-control">
                    @foreach ($data as $d)
                        <option>{{  $d->name }}</option>
                    @endforeach
                </select>
                <br>
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="name"
                    placeholder="Enter Category Name">
                <small id="name" class="form-text text-muted">Please write down Category Name here.</small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
