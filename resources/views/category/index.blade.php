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

@push('modals')
  <div class="modal fade" id="btnFormModal" tabindex="-1" role="basic" aria-hidden="true">
 <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
       <h4 class="modal-title">Add New Category</h4>
    </div>
  <div class="modal-body">
    <form method="POST" action="{{ route('category.store') }}">
            @csrf
            <div class="form-group">
                <!-- <select class="form-control">
                    @foreach ($data as $d)
                        <option>{{  $d->name }}</option>
                    @endforeach
                </select>
                <br> -->
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="name"
                    placeholder="Enter Category Name" required>
                <small id="name" class="form-text text-muted">Please write down Category Name here.</small>
            </div>
            
  </div>
  <div class="modal-footer">
      <button type="submit" class="btn btn-success">Submit</button>
        </form>
      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
  </div>
 </div>
 </div>
</div>
@endpush

@push("modals")
<div class="modal fade" id="modalEditA" tabindex="-1" role="basic" aria-hidden="true">
   <div class="modal-dialog modal-wide">
       <div class="modal-content" >
          <div class="modal-body" id="modalContent">
              {{-- You can put animated loading image here... --}}
          </div>
       </div>
   </div>
</div> 

<div class="modal fade" id="modalEditB" tabindex="-1" role="basic" aria-hidden="true">
   <div class="modal-dialog modal-wide">
       <div class="modal-content" >
          <div class="modal-body" id="modalContentB">
              {{-- You can put animated loading image here... --}}
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

@if(session('error'))
    <div class="alert alert-danger">
       {{ session('error') }}
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
  <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#btnFormModal">+ Add Category using Modal</button>
  <br><br>
  <table class="table">
  <thead>
      <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Category Name</th>
        <th>Total Food</th>
        <th>List Menu</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $r)
      <tr id="tr_{{ $r->id }}">
        <td>{{ $r->id }}</td>
        <td>
          <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" 
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
        <td id="td_name_{{ $r->id }}">{{ $r->name }}</td>
        <td>{{ count($r->foods) }}</td>
        <td>
            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" 
              data-bs-target="#detailModal" onclick="showDetail({{ $r->id }})">
            Details
            </button>
  

          <!-- @foreach ($r->foods as $f)
              {{ $f->name }}<br> 
          @endforeach -->
        </td>
        <td>
          <a href="{{ route('category.edit', $r->id) }}" class="btn btn-warning btn-sm">Edit</a>
          <a data-bs-toggle="modal" data-bs-target="#modalEditA" onclick="getEditForm({{  $r->id}})" class="btn btn-warning btn-sm">Edit with Modal(Type A)</a>

          <a data-bs-toggle="modal" data-bs-target="#modalEditB" onclick="getEditFormB({{  $r->id}})" class="btn btn-info btn-sm">Edit with Modal(Type B)</a>

          <a href="#" value="DeleteNoReload" class="btn btn-danger btn-sm"
            onclick="if(confirm('Are you sure to delete {{ $r->id }} - {{ $r->name }} ? ')) 
                     deleteDataRemove({{ $d->id }})">Delete without Reload
          </a>

          @can('delete-permission', Auth::user())
          <form method="POST" action="{{ route('category.destroy', $r->id) }}">
            @csrf
            @method("DELETE")
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin untuk menghapus data {{ $r->id .'-'.$r->name }} ini ?')">Delete</button>
          </form>
          @endcan
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

    function getEditForm(id)
    {
      $.ajax({
      type:'POST',
      url:'{{route("kategori.getEditForm")}}',
      data: {
        '_token' : '<?php echo csrf_token() ?>',
        'id': id
      },
      success: function(data){
        $('#modalContent').html(data.msg)
      }
      });
    }

    function getEditFormB(id)
    {
      $.ajax({
      type:'POST',
      url:'{{route("kategori.getEditFormB")}}',
      data: {
        '_token' : '<?php echo csrf_token() ?>',
        'id': id
      },
      success: function(data){
        $('#modalContentB').html(data.msg)
      }
      });
    }

    function saveDataUpdate(id) {
      var name = $('#ename').val();
      
      console.log(name); //debug->print to browser console
      $.ajax({
        type: 'POST',
        url: '{{ route("kategori.saveDataUpdate") }}',
        data: {
          '_token': '<?php echo csrf_token(); ?>',
          'id': id,
          'name': name,          
        },
        success: function(data) {
          if (data.status == "oke") {
            $('#td_name_' + id).html(name);
            $('#modalEditB').modal('hide');
          }
        }
      })
    }

    function deleteDataRemove(id)
 {
  $.ajax({
   type:'POST',
   url:'{{route("kategori.deleteData")}}',
   data: {
    '_token' : '<?php echo csrf_token() ?>',
    'id': id
   },
   success: function(data){
    if(data.status == "oke")
    {
     $('#tr_'+id).remove();
    }
   }
  });
 }



  </script>
@endpush

@endsection
