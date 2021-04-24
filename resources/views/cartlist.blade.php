@extends('master')
@section('content')
<div class="container"style="margin-bottom: 100px;">
    <div class="row" style="margin-bottom: 40px;">
  
    @if(count($products))
         <h3>  Product List on Cart   </h3>
         <span class="gobackk"><a href="/"> Add More shopping </a> </span>
     @else 
   
     <div class="alert alert-danger" role="alert">
         No Product on the Cart List  <span class="gobackk"><a href="/"> Go Back </a> </span>
    </div>
    @endif 
    </div>
    @if(count($products))
    @foreach($products as $item) 
    <div class="row" style="margin-bottom:15px;" >
        <div class="col-md-3">
            <a href="{{ route('detail',$item->id ) }}"> <img src="{{ $item->gallery }}" class="trending-image">
            </a>
        </div> 

        <div class="col-md-3"> 
            <h3>{{ $item->name }}</h3>
            <h3> Price : {{ $item->price }}</h3>
            <h5>{{ $item->description }}</h5>
          
        
        </div>

        <div class="col-md-3"> 
           <a class="btn btn-warning" href="{{ route('cart_remove', $item->cart_id) }}">Remove to Cart </a>
        
        </div>
    </div>
    <hr/>
    @endforeach  
    @endif 

    @if(count($products) > 0 )
    <div class="row" style="margin-bottom:15px;" > 
      <a href="{{ route('order_now') }}" class="btn btn-lg btn-success">Order Now </a>
    </div>
    @endif 
</div>
@endsection