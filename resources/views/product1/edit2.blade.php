{{--<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet"--}}
{{--xmlns="http://www.w3.org/1999/html">--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Product</h3>
        <div class="box-tools">
            <div class="btn-group pull-right" style="margin-right: 5px">
                <a href="{{ url('products') }}" class="btn btn-sm btn-default">
                    <i class="fa fa-arrow-left"></i>
                    <span class="hidden-xs">&nbsp;Back</span>
                </a>
            </div>
        </div>
    </div>
    <form action="{{ isset($product) ? url('products/'.$product->id): url('products') }}"
          method="post" accept-charset="UTF-8" id="form" data-submit='noAjax'
          class="form-horizontal" enctype="multipart/form-data">
        @if(isset($product))
            {{ method_field('PUT') }}
        @endif
        <div class="box-body" >
            <div class="fields-group">
                <div class="form-group col-md-12">
                    <label for="name" class="col-sm-2 asterisk control-label" style="border: 0px;">Title</label>
                    <div class=" col-sm-6">
                        <input type="text" id="title" name="title"
                               value="{{ (old('title')) ? old('title') : (isset($product) ? $product->title : '')  }}"
                               class="form-control">
                        <div class="alert-title" style="color:red;padding-top:0px">
                            {{--{{$message}}--}}
                        </div>
                        <input type="hidden" name="unique" id="unique" value='{{$product->id}}'>
                    </div>
                </div>
            </div>


            {{--<div class="fields-group">--}}
                {{--<div class="form-group col-md-12">--}}
                    {{--<label for="name" class="col-sm-2 asterisk control-label" style="border: 0px;">Cost Price</label>--}}
                    {{--<div class=" col-sm-6">--}}
                        {{--<input type="text" id="cost_price" name="cost_price"--}}
                               {{--value="{{ (old('cost_price')) ? old('cost_price') : (isset($product) ? $product->cost_price : '')  }}"--}}
                               {{--class="form-control">--}}
                        {{--@foreach ($errors->get('cost_price') as $message)--}}
                            {{--<div class="alert " style="color:red;padding-top:0px">--}}
                                {{--{{$message}}--}}
                            {{--</div>--}}
                        {{--@endforeach--}}
                        {{--<div class="alert-cost_price" style="color:red;padding-top:0px">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            <div class="fields-group">
                <div class="form-group col-md-12">
                    <label for="name" class="col-sm-2 asterisk control-label" style="border: 0px;">Selling Price</label>
                    <div class=" col-sm-6">
                        <input type="text" id="selling_price" name="selling_price"
                               value="{{ (old('selling_price')) ? old('selling_price') : (isset($product) ? $product->selling_price : '')  }}"
                               class="form-control">
                        @foreach ($errors->get('selling_price') as $message)
                            <div class="alert " style="color:red;padding-top:0px">
                                {{$message}}
                            </div>
                        @endforeach
                        <div class="alert-selling_price" style="color:red;padding-top:0px">
                        </div>
                    </div>
                </div>
            </div>

            {{--<div class="fields-group">--}}
                {{--<div class="form-group col-md-12">--}}
                    {{--<label for="name" class="col-sm-2 asterisk control-label" style="border: 0px;">Offer Price</label>--}}
                    {{--<div class=" col-sm-6">--}}
                        {{--<input type="text" id="offer_price" name="offer_price"--}}
                               {{--value="{{ (old('offer_price')) ? old('offer_price') : (isset($product) ? $product->offer_price : '')  }}"--}}
                               {{--class="form-control">--}}
                        {{--@foreach ($errors->get('offer_price') as $message)--}}
                            {{--<div class="alert " style="color:red;padding-top:0px">--}}
                                {{--{{$message}}--}}
                            {{--</div>--}}
                        {{--@endforeach--}}
                        {{--<div class="alert-offer_price" style="color:red;padding-top:0px">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            <div class="fields-group">
                <div class="form-group col-md-12">
                    <label for="name" class="col-sm-2 asterisk control-label" style="border: 0px;">Quantity</label>
                    <div class=" col-sm-6">
                        <input type="text" id="quantity" name="quantity"
                               value="{{ (old('quantity')) ? old('quantity') : (isset($product) ? $product->quantity : '')  }}"
                               class="form-control">
                        @foreach ($errors->get('quantity') as $message)
                            <div class="alert " style="color:red;padding-top:0px">
                                {{$message}}
                            </div>
                        @endforeach
                        <div class="alert-quantity" style="color:red;padding-top:0px">
                        </div>
                    </div>
                </div>
            </div>

            <div class="fields-group">
                <div class="form-group col-md-12">
                    <label for="name" class="col-sm-2 asterisk control-label" style="border: 0px;">Units</label>
                    <div class=" col-sm-6">
                        <input type="text" id="unit" name="unit"
                               value="{{ (old('unit')) ? old('unit') : (isset($product) ? $product->unit : '')  }}"
                               class="form-control">
                        @foreach ($errors->get('unit') as $message)
                            <div class="alert " style="color:red;padding-top:0px">
                                {{$message}}
                            </div>
                        @endforeach
                        <div class="alert-unit" style="color:red;padding-top:0px">
                        </div>
                    </div>
                </div>
            </div>

            <div class="fields-group">
                <div class="form-group col-md-12">
                    <label for="to" class="col-sm-2  asterisk control-label">Image</label>
                    <div class="col-sm-6">
                        <input type="file" class="form-control" name="image" id="image" accept=".png, .jpg, .jpeg" value="" >
                        <div class="col-md-12 alert-image" style="color:red;padding-top:0px;padding-left: 0px;"></div>
                        <input type="hidden" value="{{ $product->image }}" name="existing_files" id="existing_files"/>
                        <input type="hidden" value="{{$i=0}}">
                        <div id="upload-image-preview">
                            @if(json_decode($product->image))
                                <div class="form-group col-md-4"  id="remove-radio-{{ $product->id }}"  style='margin-left: 0px;margin-right: 0px;'>
                                    <img src="{{url( 'images/'.json_decode($product->image)[0]->filename) }}" id="img" width='100px' height='100px'  >
                                </div>
                            @endif
                        </div>
                        <div class="col-md-12 alert-image-1" style="color:red;padding-top:0px"></div>

                    </div>
                </div>
            </div>
            <div class="fields-group" >
                <div class="form-group col-md-12">
                    <label for="to" class="col-sm-2  control-label">Description</label>
                    <div class=" col-sm-6">
                        <textarea type="text" name="description" rows="6"
                                  class="form-control" style=" ">{{ (old('description')) ? old('description') : (isset($product) ? $product->description : '')  }}</textarea>
                        @foreach ($errors->get('description') as $message)
                            <div class="alert " style="color:red;padding-top:0px">
                                {{$message}}
                            </div>
                        @endforeach
                        <div class="alert-description" style="color:red;padding-top:0px">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="box-footer">
            {{ csrf_field() }}
            <div class="col-md-2"></div>
            <div class="col-md-6">
                <div class="btn-group pull-left" >
                    <button type="submit" class="btn btn-primary submit">Submit</button>
                </div>
            </div>
        </div>
        <input type="hidden" name="_previous_" value="url('products')" class="_previous_">
    </form>
</div>
<style>
    .col-md-4 {
        padding-left: 0px;
    }

</style>

<script>
    $(document).ready(function () {
        var img = $('#img').attr('src');
        img = "<div class='form-group col-md-4'  style='margin-left: 0px;margin-right: 0px;'>" +
            "<img src='" + img + "' width='100px' height='100px' />";
        function readURL(input) {
            if (input.files && input.files.length == 1) {
                var flag = 1;
                var file = input.files;
                var reader = new FileReader();
                var name = file[0].name;
                var filename = name.split(".");
                var extension = filename[filename.length - 1];
                if (!extension.match(/(jpg|jpeg|png|gif)$/i)) {
                    $("input[type=file]").val("");
                    $(".alert-image").text("The upload images must be a image of type: jpeg, png, jpg.");
                    flag = 0;
                    $('#upload-image-preview').empty();
                    $('#upload-image-preview').append(img);
                    return false;
                }
                reader.readAsDataURL(file[0]);
                $('#upload-image-preview').empty();
                if (flag) {
                    $(".alert-image").text("");
                    var file = input.files;
                    reader.onload = function (e) {
                        var img = e.target.result;
                        var reader = new FileReader();
                        var content = "<div class='form-group col-md-4'  style='margin-left: 0px;margin-right: 0px;'>" +
                            "<img src='" + img + "' width='100px' height='100px' />";
                        $('#upload-image-preview').empty();
                        $('#upload-image-preview').append(content);
                        reader.readAsDataURL(file[0]);
                    }
                }
            } else {
                $('#upload-image-preview').empty();
                $('#upload-image-preview').append(img);
            }

        }
        $("#image").change(function () {
            readURL(this);
        });
    });
</script>