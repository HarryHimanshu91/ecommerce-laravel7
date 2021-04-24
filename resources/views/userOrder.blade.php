@extends('master')
@section('content')
<div class="container" style="margin-bottom: 100px;">
    <div class="row" style="margin-bottom: 40px;">
    

      @if(count($totalUserOrder) > 0 )
        <h1> My order Details </h1> 
        <span class="gobackk"><a href="/"> Home </a> </span>
       @else 
        <h1> No order yet..!!..Please order some products!</h1>
        <span class="gobackk"><a href="/"> Go to Shopping</a> </span>
      @endif 
    </div>
    @if(count($totalUserOrder))
    @foreach($totalUserOrder as $item) 
    <div class="row" style="margin-bottom:15px;" >
        <div class="col-md-3">
            <a href="{{ route('detail',$item->id ) }}"> <img src="{{ $item->gallery }}" class="trending-image">
            </a>
        </div> 

        <div class="col-md-3"> 
            <h3>{{ $item->name }}</h3>
            <h3> Price : {{ $item->price }}</h3>
            <h5>Delivery Status : {{ $item->status }}</h5>
            <h5>Payment Status : {{ $item->payment_status }}</h5>
            <h5>Payment Method : {{ $item->payment_method }}</h5>
            <h5>Address : {{ $item->address }}</h5>
            <h5>Phone Number: {{ $item->phone }}</h5>
        </div>

       
    </div>
    <hr/>
    @endforeach  
    @endif 

  
</div>
@endsection