@extends('layouts.front')
@section('title',$products->name)
    
@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">

<div class="container">

<h6 class="mb-0">Collections / {{$products->category->name}} / {{$products->name}} </h6>

</div>

</div>

<div class="container">

<div class="card shadow product_data">

<div class="card-body">

<div class="row">

<div class="col-md-4 border-right">

<img src="{{ asset('assets/uploads/products/'.$products->image) }}" class="w-100" alt="">

</div>

<div class="col-md-8">

<h2 class="mb-0">

{{ $products->name}}

<label style="font-size: 16px;" class="float-end badge bg-danger trending tag">Trending</label>

</h2>
<hr>

<label class="me-3">Original Price: <s>Rs {{ $products->original_price }}</s></label>

<label class="fw-bold">Selling Price: Rs {{ $products->selling_price }}</label>

<p class="mt-3 ">

{!! $products->small_description !!}

</p>

<hr>

@if($products->qty > 0)

<label class="badge bg-success">In stock</label>

@else

<label class="badge bg-danger">Out of stock</label>

@endif

<div class="row mt-2">

<div class="col-md-2">
 <input type="hidden" value="{{ $products->id }}" class="prod_id">

<label for="Quantity">Quantity</label>

<div class="input-group text-center mb-3">

<button class="input-group-text decrement-btn">-</button>

<input type="text" name="quantity " value="1" class="form-control qtv-input" />

<button class="input-group-text Increment-btn">+</button>

</div>

</div>
</div>

<div class="col-md-10">

<br/>

<button type="button" class="btn btn-success me-3 float-start"> Add to Wishlist <i class="fa fa-heart"></i></button>

<button type="button" class="btn btn-primary me-3 addToCartBtn float-start">Add to Cart<i class="fa fa-shopping-cart"></i></button>

</div>

</div>

</div>

</div>

</div>

</div>

</div>
@endsection
@section('scripts')
<script>

$(document).ready(function ()
{
    $('.addToCartBtn').click(function (e)
   {

       e.preventDefault();
       var product_id=$(this).closest('.product_data').find('.prod_id').val();
       var product_qtv=$(this).closest('.product_data').find('.qtv-input').val();
      
       $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
      $.ajax({
          method:"POST",
          url:"/add-to-cart",
          data:{
              'product_id':product_id,
              'product_qtv':product_qtv,
          },
          success : function (response){

              alert(response.status);
          }
      });


   });

   $('.Increment-btn').click(function (e)
   {
       e.preventDefault();

       var int_Value=$('.qtv-input').val();
       var value=parseInt(int_Value,10);
       value=isNaN(value) ? 0 : value;
       if (value<11){
           value++;
           $('.qtv-input').val(value);
       }
   });
   $('.decrement-btn').click(function (e)
   {
       e.preventDefault();

       var dec_Value=$('.qtv-input').val();
       var value=parseInt(dec_Value,10);
       value=isNaN(value) ? 0 : value;
       if (value>1){
           value--;
           $('.qtv-input').val(value);
       }
   });


});

    </script>
    @endsection