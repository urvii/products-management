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
    Add Product
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
      <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              <label for="country_name">Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              
              <label for="country_name">Description:</label>
              <textarea rows="5" columns="5" class="form-control" name="description"></textarea>

          </div>
          <div class="form-group">             
              <label for="country_name">Price:</label>
              <input type="text" class="form-control" name="price"/>
          </div>
          <div class="form-group">        
              <label for="country_name">Image:</label>
              <input type="file" class="form-control" name="image"/>
          </div>
          <div class="form-group">
              <label for="symptoms">Category</label>
              <select class="form-control" name="category_id">
                @foreach($categories as $category)
                <option value="{{$category->id}}" >{{$category->name}}</option>
                @endforeach
            </select>             
          </div>
          
          <button type="submit" class="btn btn-primary">Create</button>
      </form>
  </div>
</div>
@endsection