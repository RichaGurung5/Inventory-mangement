@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        <title>Edit Form</title>
    

    
            <form method="post" action="{{ url('/categories/' . $category->id)}}">
         @csrf
         @method('put')

        <label for ="name"> Name </label>
            <input type ="text" name ="name" value="{{old('name', $category->name)}}">
            <div class="alert-danger">{{ $errors->first('name') }}
        </div>
        <br>

        <label for ="name"> Status</label>
            <input type= "text" name="status" value="{{old('status', $category->status)}}">
            <div class="alert-danger">{{ $errors->first('status') }}
            </div>
        <br>

            <input type="submit" value="save">
    
    
    </form>
</div>
</div>
</div>
@endsection