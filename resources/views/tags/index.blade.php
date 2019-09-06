@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

<H2>Tags List</H2>
<a href="{{('/tags/add')}}" class="btn btn-primary">Add Tag</a>
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

 @foreach($tags as $tag)
 
  <tr>
    <td>{{ $tag->id}}</td> 
    <td>{{ $tag->name}} </td>
    <td>
    @if ($tag->status == 1) 
       Active
       @else
       Inactive
   @endif
    </td>

    <td><a href="{{ url('tags/' . $tag->id. '/edit')}}">Edit</a>
    <form method="post" action="{{url ('tags/' .$tag->id)}}">
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