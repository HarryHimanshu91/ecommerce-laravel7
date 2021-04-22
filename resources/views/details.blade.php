@extends('master')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-6">
        <img class="details-image" src="{{ $data['gallery']}}" />

      </div>

      <div class="col-md-6">
            <a href="/">Go Back </a>
           <h2> {{ $data['name'] }} </h2>
           <h3> Price : {{ $data['price'] }} </h3>
           <h4> Category : {{ $data['category'] }} </h4>
           <h4> {{ $data['description'] }} </h4> 

           <br>
           <form method="POST" action="{{ route('add_to_cart') }}">
             @csrf 
             <input type="hidden" name="product_id" value="{{ $data['id'] }}">
             <button class="btn btn-primary">Add to Cart </button>
           </form>
          
           
            <br>  <br>
           <button class="btn btn-success"> Buy Now </button>
      </div>
    </div>
</div>
@endsection