@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


<h2>Tag Add Form</h2>

<form method ="POST" action ="{{url('/tags')}}" >

@csrf

<label for = "name">Name : </label>
<input type = "text" name= "name" value = "{{old('name')}}">
 <div class="alert-danger">{{ $errors->first('name') }}
 </div>

<br>


<label for = "status">Status :</label>
<input type = "status" name= "status" value = "{{old('status')}}">
<div class="alert-danger">{{ $errors->first('status') }}
 </div>

<br>

<input type = "submit" value = "submit" name="Submit">
</form>
</div> </div> </div>
@endsection
