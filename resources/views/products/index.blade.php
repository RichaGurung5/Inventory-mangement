@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


<h2>Products List</h2>

<a href="{{('/products/add')}}" class="btn btn-primary">Add Product</a>
<br>
<br>
@if(session()->has('message'))
    <div class = "alert alert-success">{{session('message')}}</div>
@endif

<form method ="POST" action ="{{url('/products/search')}}">
@csrf

<input type ="text" name = "name">

<input type ="submit" name = "submit" value ="search">

</form>
<br>
<br>



<table border =1 class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Description</th>
        <th>Status</th>
        <th>Category</th>
        <th>Tag</th>
        <th>Action</th>
        

    </tr>
    <tr>
   @foreach($products as $product)

   <td>{{ $product->id }}</td>
   <td>{{ $product->name }}</td>
   <td>{{ $product->price }}</td>
   <td>{{ $product->description }}</td>
   <td>
   @if ($product->status == 1) 
       Active
       @else
       Inactive
   @endif
   
  
   </td>
   
   
   <td>
   <a href="{{ url ('categories/' . $product->category_id) }}">{{ optional($product->category)->name }}</a>
   </td>

<td>
@foreach($product->tags as $tag)

{{-- <span class="badge badge-secondary">/span> --}}
<a href="{{ url ('tags/' . $tag->id) }}">{{ $tag->name }}</a>
@endforeach

 </td>
    
   <td><a href="{{ url('products/' . $product->id. '/edit') }}">Edit</a>
    
    <form method="post" action="{{ url ('products/' .$product->id) }}">
      @csrf
      @method('delete')
      <input type="submit" value="Delete" name="submit" onClick="return confirm('Are sure you want to delete this record?')">
   </form>
   
   </td>
   
   </tr>
 @endforeach

</table>




</div></div></div>
@endsection


