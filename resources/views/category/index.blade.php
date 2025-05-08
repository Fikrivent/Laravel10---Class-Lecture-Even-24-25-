@extends('layouts.adminlte4')

@section('content')

@push ('modals')
<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="detail-title"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="detail-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endpush

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>
<br>
@if(session('status'))
    <div class="alert alert-success">
       {{ session('status') }}
    </div>
@endif

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<div class="container">
  <h2>Category Table</h2>     
  
  <button style="margin-bottom: 10px;" class="btn btn-warning" type="button" onclick="showInfo()">Click Me !</button>
  <div id="showinfo"></div>

  <br>
  <a href="{{ route('category.create') }}" class="btn btn-primary">+ Add Category</a>
  
  <br><br>
  <table class="table">
  <thead>
      <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Category Name</th>
        <th>Total Food</th>
        <th>List Menu</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $r)
      <tr>
        <td>{{ $r->id }}</td>
        <td>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" 
              data-bs-target="#imageModal-{{ $r->id }}">
            Show
          </button>

          @push ('modals')
            <!-- Modal {{ $r->id }} -->
            <div class="modal fade" id="imageModal-{{ $r->id }}" tabindex="-1" aria-labelledby="imageModalLabel" 
              aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="imageModalLabel">Gambar untuk Kategori {{$r->id}} </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <center><img class="img-responsive" style="max-height:250px;" src="{{ asset('storage/category/'.$r->image) }}"></center>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          @endpush

        </td>
        <td>{{ $r->name }}</td>
        <td>{{ count($r->foods) }}</td>
        <td>
            <button type="button" class="btn btn-info" data-bs-toggle="modal" 
              data-bs-target="#detailModal" onclick="showDetail({{ $r->id }})">
            Details
            </button>
  

          <!-- @foreach ($r->foods as $f)
              {{ $f->name }}<br> 
          @endforeach -->
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@push("script")
<script>
    function showInfo() {
      $.ajax({
        type: 'POST',
        url: '{{ route("category.showInfo") }}',
        data: '_token=<?php echo csrf_token(); ?>',
        success: function(data) {
          $('#showinfo').html(data.msg);
        }
      });
    }

    function showDetail(id) {
      $.ajax({
        type: 'POST',
        url: '{{ route("category.showListFoods") }}',
        data: { 
                '_token': '<?php echo csrf_token(); ?>',
                'idcat': id,
              },
        success: function(data) {
          $('#detail-title').html(data.title);
          $('#detail-body').html(data.body);
        }
      });
    }


  </script>
@endpush

@endsection
