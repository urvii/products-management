<div class="form-horizontal">
    <div class="box-body">
        <div class="form-group  col-md-12 pd-l-0">
            <label class="col-sm-3 control-label"  style="text-align:left;">Title </label>
            <label class="col-sm-2 pd-0"> : </label>
            <div class="col-sm-7 info">{{ isset($product) ? $product->title : ''  }}&nbsp;</div>
        </div>



        {{--<div class="form-group  col-md-12 pd-l-0">--}}
            {{--<label class="col-sm-3 control-label"  style="text-align:left;">Cost Price </label>--}}
            {{--<label class="col-sm-2 pd-0"> : </label>--}}
            {{--<div class="col-sm-7 info">{{ isset($product) ? $product->cost_price : ''  }}&nbsp;</div>--}}
        {{--</div>--}}

        <div class="form-group  col-md-12 pd-l-0">
            <label class="col-sm-3 control-label"  style="text-align:left;">Selling Price </label>
            <label class="col-sm-2 pd-0"> : </label>
            <div class="col-sm-7 info">{{ isset($product) ? $product->selling_price : ''  }}&nbsp;</div>
        </div>

        {{--<div class="form-group  col-md-12 pd-l-0">--}}
            {{--<label class="col-sm-3 control-label"  style="text-align:left;">Offer Price </label>--}}
            {{--<label class="col-sm-2 pd-0"> : </label>--}}
            {{--<div class="col-sm-7 info">{{ isset($product) ? $product->offer_price : ''  }}&nbsp;</div>--}}
        {{--</div>--}}

        <div class="form-group  col-md-12 pd-l-0">
            <label class="col-sm-3 control-label"  style="text-align:left;">Quantity </label>
            <label class="col-sm-2 pd-0"> : </label>
            <div class="col-sm-7 info">{{ isset($product) ? $product->quantity : ''  }}&nbsp;</div>
        </div>

        <div class="form-group  col-md-12 pd-l-0">
            <label class="col-sm-3 control-label"  style="text-align:left;">Units </label>
            <label class="col-sm-2 pd-0"> : </label>
            <div class="col-sm-7 info">{{ isset($product) ? $product->unit : ''  }}&nbsp;</div>
        </div>


        @if(count(json_decode($product->image, true)) > 0)

            <input type="hidden" value="{{$i=1}}">
            <div class="form-group col-md-12 pd-l-0">
                <label class="col-sm-3 control-label" style="text-align:left;" >Image </label>
                <label class="col-sm-2 pd-0 info"> : </label>
                <div class="col-md-7 info" style="padding-right: 0px !important;">
                    <img src="{{url( 'images/'.json_decode($product->image, true)[0]['filename']) }}" class="col-sm-4" style="height:100px;width:150px;padding-left: 0px !important;" alt="--">
                </div>
            </div>
        @endif
        @if($product->description != '')
            <div class="form-group col-md-12 pd-l-0">
                <label class="col-sm-3 control-label" style="text-align:left;" >Description</label>
                <label class="col-sm-2 pd-0"> : </label>
                <div class="col-md-7 info" style="white-space: pre-line;">{!! isset($product) ? $product->description : '' !!}</div>
            </div>
        @endif
    </div>
</div>
<style>
    .pd-0 {
        padding-left: 0px;
        padding-right: 0px;
        text-align: center;
    }

    .pd-l-0 {
        padding-left: 0px;
        padding-right: 0px;
    }

    p {
        margin-bottom: 0px !important;
    }

    .info {
        color: #50504c;
        overflow-wrap: break-word;
    }
    .control-label
    {
        padding-top: 0px !important;
    }
</style>