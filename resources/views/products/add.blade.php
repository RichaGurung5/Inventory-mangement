@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


        <h2>Products Add Form</h2>

    {{-- @if ($errors->any())
<div class="alert-danger">

    <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach

    </ul>
    </div>
    @endif --}}

            <form method ="Post" action ="{{url('/products')}}">

                @csrf
                <div class = "form-group">

                <label for = "name"> Name :</label>
                    <input class= "form-control" type = "text" name = "name">
                    <div class="alert-danger">{{ $errors->first('name') }}
                </div>
                </div>
                
                <div class = "form-group">
                <label for = "price"> Price :</label>  
                    <input class= "form-control" type = "text" name = "price">
                    <div class="alert-danger">{{ $errors->first('price') }}
                    </div>
                    </div>
                
                <div class = "form-group">

                    <label for = "description"> Description:</label>
                        <textarea class="form-control" type = "text" name = "description"></textarea>
                        <div class="alert-danger">{{ $errors->first('description') }}
                </div>
                </div>
                
                 <div class = "form-group">
                <label for = "category_id"> Category:</label>
                    <select name ="category_id">
                    @foreach($categories as $category)
                        <option value=
                        "{{ $category->id }}">
                        {{ $category->name }}</option>
                    @endforeach
                    </select>
                </div>
                
                <div class = "form-group">
                    <label for ="tags" > Tags</label>
                     <select name ="tags[]" multiple>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id}}">{{ $tag->name }}</option>
                        @endforeach
                

                </select>

                </div>

                <label for = "status">Status :</label>
                
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline1" name="status" class="custom-control-input" value=1>
                    <label class="custom-control-label" for="customRadioInline1">Active</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline2" name="status" class="custom-control-input" value=0>
                    <label class="custom-control-label" for="customRadioInline2">Inactive</label>
                </div>
                <div class="alert-danger">{{ $errors->first('status') }}
                </div>
                
                <div>
                    <input type = "submit" value = "submit" name="submit">
                </div>
            
            </form>

            </div></div></div>
@endsection