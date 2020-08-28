@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif

  <p>
        <a href="{{ route('products.create') }}" class="btn btn-success">Add New</a>
        
</p>
<div class="card-header">
    Products List
  </div>

  <form action="{{ route('products.index') }}" method ="get">
                        <input type="text" name="query" placeholder="Search by name" value="{{ request('query', '') }}" />
                        <select name="category_id">
                            <option value="0">-- search by category --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                        @if (request('category_id', 0) == $category->id) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @php
                        $price_options=[
                        2=>['id'=>2,'name'=>'Price Low to High'],
                        1=>['id'=>1,'name'=>'Price High to Low'],
                        ];
                        
                        @endphp
                        <select name="price">
                            @foreach ($price_options as $price)
                                <option value="{{ $price['id'] }}"
                                        @if (request('price', 0) == $price['id']) selected @endif>{{ $price['name'] }}</option>
                            @endforeach
                        </select>
                        <input type="submit" value="Search" />
                    </form>
                    <hr />



  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Price</td>
          <td>Category</td>
          <td>Image</td>
          <td>Desciption</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>
            
            <td>{{$product->category_name}}</td>
            <td>
              <img src="{{url($product->image) }}" class="col-sm-4" style="height:100px;width:150px;padding-left: 0px !important;" alt="--">
            </td>
            <!-- <td>{{$product->image}}</td> -->
            <td>{{$product->description}}</td>
            <td><a href="{{ route('products.edit', $product->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('products.destroy', $product->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection