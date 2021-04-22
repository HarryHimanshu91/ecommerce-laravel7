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
  .trending-item{
    float: left; width: 20%;
  }
  .trending-wrapper{
    margin: 30px;
  }
  .details-image{
    height: 200px;
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
 @yield('content') 
 @include('footer')
</body>

</html>
