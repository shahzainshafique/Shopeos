@extends('layouts.front')
@section('title')
    My Cart
@endsection
@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">

<div class="container">

<h6 class="mb-0"><a href="{{url('/')}}">Home </a>/ <a href="{{url('cart')}}">Cart</a>  </h6>

</div>

</div>
<div class="container my-5">
  <div class="card shadow product_data">

<div class="card-body">

<div class="row">

<div class="col-md-2">

<img src="" alt="Image here">

</div>

<div class="col-md-5">

<h3>Product Name Here</h3>

</div>

<div class="col-md-3">

<input type="hidden" class="prod_id"> <label for="Quantity">Quantity</label>

<div class="input-group text-center ab-3" style="width:130px;"> <button class="input-group-text decresent-btn">-</button>

<input type="text" name="quantity" class="form-control qty-input text-center" value="1"> <button class="input-group-text increment-btn">+</button>

</div>

</div>

<div class="col-md-2">

<h3>Delete</h3>

</div>

</div>

</div>
  </div>
</div>



@endsection