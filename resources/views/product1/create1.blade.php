<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet"
      xmlns="http://www.w3.org/1999/html">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Add New Product</h3>
        <div class="box-tools">
            <div class="btn-group pull-right" style="margin-right: 5px">
                <a href="{{ url('products') }}" class="btn btn-sm btn-default">
                    <i class="fa fa-arrow-left"></i>
                    <span class="hidden-xs">&nbsp;Back</span>
                </a>
            </div>
        </div>
    </div>

    <form action="{{ route('products.store') }}"
          method="post" accept-charset="UTF-8" id="form" 
          class="form-horizontal" enctype="multipart/form-data">
        @if(isset($product))
            {{ method_field('POST') }}
        @endif
        <div class="box-body">
            <div class="fields-group">
                <div class="form-group col-md-12">
                    <label for="name" class="col-sm-2 asterisk  control-label" style="border: 0px;">Name</label>
                    <div class="col-sm-6">
                        <input type="text" id="name" name="name"
                               value="{{ (old('name')? old('name') : '')  }}"
                               class="form-control " style=";">
                        <div class="alert-name" style="color:red;padding-top:0px">
                        </div>
                        <input type="hidden" name="unique" id="unique">
                    </div>
                </div>
            </div>


            <div class="fields-group">
                <div class="form-group col-md-12">
                    <label for="name" class="col-sm-2 asterisk  control-label" style="border: 0px;">Price</label>
                    <div class="col-sm-6">
                        <input type="text" id="price" name="price"
                               value="{{ (old('price')? old('price') : '')  }}"
                               class="form-control " style=";">
                        <div class="alert-price" style="color:red;padding-top:0px">
                        </div>
                    </div>
                </div>
            </div>

            <div class="fields-group">
                <div class="form-group col-md-12">
                    <label for="to" class="col-sm-2 asterisk control-label">Upload Image</label>
                    <div class="col-sm-6">
                        <input type="file" class="form-control" name="image" id="image" accept=".png, .jpg, .jpeg"
                               value="{{ isset($product) ? $product->image: (old('image')) ?  old('image') : '' }}">
                        <div class="col-md-12 alert-image" style="color:red;padding-top:0px;padding-left: 0px;"></div>
                        <div class="col-md-12" style="padding-left: 0px">
                            <div id="upload-image-preview" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fields-group">
                <div class="form-group col-md-12">
                    <label for="to" class="col-sm-2 asterisk control-label">Description</label>
                    <div class="col-sm-6">
                            <textarea name="description" rows="6" id="description"
                                      class=" form-control">{!!  isset($product) ? $product->description : (old('description')) ?  old('description') : ''  !!}</textarea>
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
                <div class="btn-group pull-left">
                    <button type="submit" class="btn btn-primary submit">Submit</button>
                </div>
            </div>
            <input type="hidden" name="_previous_" value="url('products')" class="_previous_">
        </div>
    </form>
</div>
<style>
    .col-md-4{
        padding-left: 0px;
    }
    .select2-search__field
    {
        margin: 0px !important;
    }
</style>
<script>
    // $(document).ready(function () {

    //     // $("#cost_price").inputmask('Regex', {regex: "^[0-9]*(\\.\\d{1,})?$"});
    //     // $("#selling_price").inputmask('Regex', {regex: "^[0-9]*(\\.\\d{1,})$"});
    //     // $("#offer_price").inputmask('Regex', {regex: "^[0-9]*(\\.\\d{1,})?$"});
    //     // $("#quantity").inputmask('Regex', {regex: "^[1-9]+$"});

    //     $(function () {
    //         function readURL(input) {
    //             if (input.files && input.files.length==1) {
    //                 var flag = 1;
    //                 var file = input.files;
    //                 var reader = new FileReader();
    //                 var name = file[0].name;
    //                 var filename = name.split(".");
    //                 var extension = filename[filename.length - 1];

    //                 if (!extension.match(/(jpg|jpeg|png|gif)$/i)){
    //                     $("input[type=file]").val("");
    //                     $(".alert-image").text("The upload images must be an image of type: jpeg, png, jpg.");
    //                     flag = 0;
    //                     $('#upload-image-preview').empty();
    //                     return false;
    //                 } else {
    //                     $(".alert-image").text("");
    //                 }
    //                 reader.readAsDataURL(file[0]);
    //                 if (flag) {
    //                     $(".alert-image").text("");
    //                     var reader = new FileReader();
    //                     reader.onload = function (e) {
    //                         var img = e.target.result;
    //                         var name = file.name;
    //                         var content = '<div class="form-group col-md-4" style="margin-left: 0px;margin-right: 0px;"><img src="' + img + '" width="100px" height="100px" />';

    //                         $('#upload-image-preview').empty();
    //                         $('#upload-image-preview').append(content);
    //                     }
    //                     reader.readAsDataURL(file[0]);
    //                 }
    //             } else {
    //                 $('#upload-image-preview').empty();
    //             }

    //         }

    //         $("#image").change(function () {
    //             readURL(this);
    //         });
    //     });
    // });

</script>

