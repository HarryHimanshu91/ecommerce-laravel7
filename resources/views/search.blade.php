@extends('master')
@section('content')
<div class="container">
    <div class="row">
  
    <h3> Results for  Products </h3>
    @if(count($data) >0 )
    @foreach($data as $item) 
    <div class="col-md-4">
        <div class="searched-item">
            <a href="{{ route('detail',$item['id']) }}"> <img src="{{ $item['gallery'] }}" class="trending-image">
                    <div class="">
                        <h3>{{ $item['name'] }}</h3>
                        <h5>{{ $item['description'] }}</h5>
                       
            </div> 
            </a>
        </div> 
    </div>
    @endforeach 
@else 
NO record found 
    @endif 
    </div>
    
</div>
@endsection