@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

   
        <form method="post" action="{{ url('/products/' . $product->id)}}">
            @csrf
            @method('put')

            <label for ="name"> Name </label>
                <input type ="text" name ="name" value="{{old('name', $product->name)}}">
                <div class="alert-danger">{{ $errors->first('name') }}
                 </div>
                <br>
                <br>

            <label for ="name"> Price</label>
                <input type= "text" name="price" value="{{old('price', $product->price)}}">
                <div class="alert-danger">{{ $errors->first('price') }}
                    </div>
                <br>
                <br>

            <label for ="name"> Description</label>
                <input type= "text" name="description" value="{{old('description', $product->description)}}">
                 <div class="alert-danger">{{ $errors->first('description') }}
                 </div>
                <br>
                <br>    

                <div class = "form-group">
                <label for = "category_id"> Category</label>
                    <select name ="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" 
                        @if($product->category_id == $category->id) 
                        selected 
                        @endif  
                        >
                        {{ $category->name }}</option>
                    @endforeach
                    </select>
                </div>
                <br>

            <label for ="name"> Status</label>
                 <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline1" name="status" class="custom-control-input" 
                        value="{{old('status',$product->status)}}"
                    
                        
                    @if($product->status == 1)
                                checked
                                @endif
                                >
                    <label class="custom-control-label" for="customRadioInline1">Active</label>
                    </div>
                    
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline2" name="status" class="custom-control-input" 
                        value="{{$product->status}}"
                    
                        @if ($product->status == 0)
                                checked
                                @endif
                                >
                               
                    <label class="custom-control-label" for="customRadioInline2">Inactive</label>
                

                </div>

              
            

                <input type="submit" value="save">
                
    
    
        </form>
</div>
</div>
</div>
@endsection