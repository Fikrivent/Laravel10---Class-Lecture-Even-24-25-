@extends('layouts.adminlte4')

@section('content')
@if (@session('status'))
<div class="alert alert-success">{{ session('status') }}</div>
@endif

<a href="{{ route('orders.create')}}" 
    class="btn btn-primary" >
  + New Category
</a>

<div class="container">
  <h2>List Order</h2>
  
  <table class="table table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Order Code</th>
        <th>Time</th>
        <th>Order by</th>
        <th>Staff</th>
        <th>Number of Foods</th>
        <th>Total Spend</th>
        <th>Using Promo Code</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($datas as $d)
      <tr id="tr_{{ $d->id }}">
        <td>{{$d->id}}</td>
        <td>
          {{ $d->kode_order }}
        </td>
        <td>{{$d->tanggal_order}}</td>
        <td>{{$d->customer->name}}</td>
        <td>{{$d->staff->name}}</td>
        <td>{{$d->num_of_items }}     
            <ul>
                
                @foreach ($d->foods as $f)
                    <li> {{ $f->name }} with <i> {{ $f->pivot->quantity }} pcs </i> </li>
                @endforeach
            </ul>

        </td>

        <td>{{$d->total_orders_rp }}     </td>
        <td>{{$d->kode_promo }}     </td>
        
        <td>
          <a class="btn btn-warning" href="{{ route('orders.edit', $d->id) }}">Edit</a>
          
         
          <form method="POST" action="{{ route('orders.destroy', $d->id) }}">
            @csrf
            @method('DELETE')
            <input type="submit" value="delete" class="btn btn-danger"
            onclick="return confirm('Are you sure to delete {{ $d->id }} - {{ $d->kode_order }} ? ');">
          </form>
        </td>
      </tr>
     
        @endforeach
    </tbody>
  </table>
</div>
@endsection