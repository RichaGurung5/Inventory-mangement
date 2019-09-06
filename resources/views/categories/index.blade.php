@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

<H2>Categories List</H2>
<a href="{{('/categories/add')}}" class="btn btn-primary">Add Category</a>
<br>
<br>

@if(session()->has('message'))
    <div class = "alert alert-success">{{session('message')}}</div>
@endif

<table border =1 class="table table-striped">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Status</th>
    <th>Actions</th>
  </tr>

 @foreach($categories as $category)
 
  <tr>
    <td>{{ $category->id}}</td> 
    <td>{{ $category->name}} </td>
    <td>
    @if ($category->status == 1)  
       Active
       @else
       Inactive
   @endif
    </td>
    <td><a href="{{ url('categories/' . $category->id. '/edit')}}">Edit</a>
    
    <form method="post" action="{{url('categories/'. $category->id)}}">
      @csrf
      @method('delete')
      <input type="submit" value="Delete" onClick="return confirm('Are sure you want to delete this record?')">
      </form>
     </td>
  </tr>

 
 @endforeach

</table>
</div></div></div>
@endsection