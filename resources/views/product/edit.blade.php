@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<p>
        <a href="{{ url('products') }}" class="btn btn-success">Back</a>
        
</p>
<div class="card uper">
  <div class="card-header">
    Edit Product
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('products.update', $product->id ) }}" enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="country_name">Name</label>
              <input type="text" class="form-control" name="name" value="{{ $product->name }}"/>
          </div>
          <div class="form-group">
              <label for="symptoms">Price</label>
              <textarea rows="5" columns="5" class="form-control" name="price">{{ $product->price }}</textarea>
          </div>
          <div class="form-group">
              <label for="symptoms">Category</label>
              <select class="form-control" name="category_id">
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>

                <option value="{{$category->id}}" >{{$category->name}}</option>
                @endforeach
            </select>             
          </div>
          <div class="form-group">        
              <label for="country_name">Image</label>
              <input type="file" class="form-control" name="image"/>
          </div>
          <div class="form-group">
              <label for="cases">Description</label>
              <input type="text" class="form-control" name="description" value="{{ $product->description }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection