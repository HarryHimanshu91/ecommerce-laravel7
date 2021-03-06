@extends('master')
@section('content')
<div class="custom-product">
    <div class="row">

     @if(count($products))
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators" style="display: none;">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                @foreach($products as $item)

                <div class="item {{ $item['id'] == 1 ? 'active':''}}">
                    <a href="{{ route('detail',$item['id']) }}"> <img src="{{ $item['gallery'] }}" class="slider-img">
                        <div class="carousel-caption slider-text">
                            <h3>{{ $item['name'] }}</h3>
                            <p>{{ $item['description'] }}</p>
                        </div>
                    </a>
                </div>

                @endforeach

            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
     @endif
    </div>

    <div class="container"style="margin-top:50px;">
        <h3> Trending Products </h3>
        <div class="row" style="margin-bottom:100px;">

            @foreach($products as $item)
            <div class="col-md-4 products">
                <div class="itemProdcut">
                <a href="{{ route('detail',$item['id']) }}"> 
                    <center> <img src="{{ $item['gallery'] }}" class="trending-image"> </center>
                    <div class="">
                        <h4 class="textcentree">{{ $item['name'] }}</h4>
                    </div>
                </a>
</div>
            </div>
            @endforeach

        </div>
    </div>

</div>
@endsection