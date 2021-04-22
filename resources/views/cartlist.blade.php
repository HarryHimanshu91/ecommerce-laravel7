@extends('master')
@section('content')
<div class="container">
    <div class="row" style="text-decoration: underline;margin-bottom: 40px;">
  
    @if(count($products))
    <h3>  Product List on Cart  </h3>
     @else 
     <h3>  No Product on the Cart List <h3>
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
            <h5>{{ $item->description }}</h5>
        
        </div>

        <div class="col-md-3"> 
           <a class="btn btn-warning" href="{{ route('cart_remove', $item->cart_id) }}">Remove to Cart </a>
        
        </div>
    </div>
    <hr/>
    @endforeach  
    @endif
    
    
</div>
@endsection