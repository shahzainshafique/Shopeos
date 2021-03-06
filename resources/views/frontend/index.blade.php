@extends('layouts.front')
@section('title')
    Welcome to Shopeos
@endsection
@section('content')
@include('layouts.inc.slider')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Featured Products</h2>
                <div class="owl-carousel featured-carousel owl-theme">

                    {{-- @foreach ($category as $cat)  --}}
    @foreach ($featured_products as $prod)
                <div class="item">
                <a href="{{url('category/'.$prod->category->slug.'/'.$prod->slug)}}">
                    <div class="card" >
                        
                        <img src="{{asset('assets/uploads/products/'.$prod->image)}}" alt="product image" style="width: auto;height:310px">
                        <div class="card-body">
                            <h5>{{$prod->name}}</h5>
                        <span class="float-start">Rs.{{$prod->selling_price}}</span>
                        <span class="float-end"><s>Rs.{{$prod->original_price}}</s></span>
                    
                    </div></div></a></div>@endforeach
                     {{-- @endforeach --}}
</div>
                </div>
            
        </div>
    </div>
    
  
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Trending categories</h2>
                <div class="owl-carousel featured-carousel owl-theme">
    
          @foreach ($trending_category as $tcategory)
    
                
                <div class="item">
                    <a href="{{url('view-category/'.$tcategory->slug)}}">
                    <div class="card" >
                        <img src="{{asset('assets/uploads/category/'.$tcategory->image)}}" alt="product image" style="width: auto;height:auto">
                        <div class="card-body">
                            <h5>{{$tcategory->name}}</h5>
                        <p>
                        {{$tcategory->description}}

</p>
                    
                    </div></div></a></div>
                    @endforeach
</div>
</div>    </div></div>
    
@endsection
@section('scripts')
    <script>$('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})</script>
@endsection