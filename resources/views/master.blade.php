<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ecommer project</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


  <style>
  .custom-login{
      height: 500px;
      padding-top: 100px;
  }
  img.slider-img{
    height: 400px !important;
  }
  .custom-product{
    height: 600px;
  }
  .slider-text{
    background-color: #35443585;
  }
  .trending-image{
    height: 100px;
  }
  .trending-item {
    float: left;
    width: 20%;
    margin-bottom: 50px;
    margin-top: 30px;
}
  .trending-wrapper{
    margin: 30px;
  }
  .details-image{
    /* height: 200px; */
    width:100%;
  }

  h4.textcentree {
    text-align: center;
}
.itemProdcut {
    margin-top: 50px;
    margin-bottom: 50px;
}
.col-md-4.products {
    border: 1px solid #ccc;
    margin-bottom: 20px;
}
.gobackk{
  float: right;
}
  .col-md-6.rightContent {
    padding-left: 100px;
}

 .col-md-6.leftsideImg {
    border: 1px solid #ccc;
}

  .footer.panel.panel-default {
    position: fixed;
    bottom: 0;
    width: 100%; margin-bottom: 0;
}
  </style>
</head>
<body>
 @include('header')

 @include('flash-message')
 @yield('content') 

 @include('footer')
</body>

</html>
