<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/radiant.png" type="">
      <title>Radiant&Revive</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />


      <style type="text/css">

      .center{
         margin: auto;
         width: 70%;
         text-align: center;
         padding: 30px;
            
      }

      table,th,td{
        border: 1px solid black;
      }

      .th_deg{
          font-size:30px ;
          padding: 5px;
          background: skyblue;
      }

      .img_deg{
          width: 100px;
          height: 90px;
      }

      .total_deg{
          font-size: 20px;
          padding: 40px;
      }





      </style>


   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->


      @if(session()->has('message'))
         <div class="alert alert-success">

             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
             {{session()->get('message')}}

         </div>
       @endif
   
         

    <div class="center">

    <table>

      <tr>
        <th class="th_deg">Product ID</th>
        <th class="th_deg">Product Title</th>
        <th class="th_deg">Product Quantity</th>
        <th class="th_deg">Price</th>
        <th class="th_deg">Image</th>
        <th class="th_deg">Action</th>
        

      </tr>

      <?php $totalprice=0; ?>
     
      @foreach($cart as $cart)

      <tr>
         <td>{{$cart->product_id}}</td>
        <td>{{$cart->product_title}}</td>
        <td>{{$cart->quantity}}
         
         <form action="{{ url('update_quantity', $cart->id) }}" method="POST">

            @csrf

            <div class="row">

                <div class="col-md-4">

                    <input type="number" name="quantity" value="1" min="1"
                        style="width: 70px;">

                </div>
                <div class="col-md-4">
                    <input type="Submit" value="Update">
                </div>


            </div>

        </form>
      
      
      
      </td>
        <td> ৳ {{$cart->price}}</td>
        <td><img class="img_deg"src="/product/{{$cart->image}}"></td>
        <td><a class="btn btn-danger" onclick="return confirm('Are you sure to remove this product?');" href="{{url('/remove_cart',$cart->id)}}">Remove Product</td>

      </tr>

   
      <?php $totalprice=$totalprice + $cart->price ?>

      @endforeach


      
    </table>

    <div>
        
    <h1 class="total_deg">Total Price :  ৳ {{$totalprice}}</h1>

    </div>

    <div>

      <h1 style="font-size: 25px;padding-bottom:15px;font-weight: bold ">Proceed to Order</h1>

      <a href="{{url('cash_order')}}" class="btn btn-danger">Cash on Delivery</a>

      <a href="{{ url('stripe', $totalprice) }}" class="btn btn-danger">Pay Using Card</a>

    </div>
              


    </div>

    <br>
    <br>

      <div class="cpy_">
         <p class="mx-auto">© 2023 All Rights Reserved By <a href="https://www.facebook.com/sabrina.taskin.3?mibextid=LQQJ4d">Sabrina Youthy</a><br>
         
            Distributed By <a href="https://synesisit.com.bd/" target="_blank">Synesis IT</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>