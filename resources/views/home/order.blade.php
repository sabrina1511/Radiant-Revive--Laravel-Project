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
         border-collapse: collapse;
         padding: 10px;
         text-align: center;
      }

      .th_deg{
         background-color: skyblue;
         padding: 10px;
         font-size: 20px;
         font-weight: bold; 
      }




      </style>
   
   
   
   
   
    </head>
   <body>
     
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->

         <div class="center">
            <table>
                <tr>
                    <th class="th_deg">Order ID</th>
                    <th class="th_deg">Order Date</th>
                    <th class="th_deg">Product Title</th>
                    <th class="th_deg">Quantity</th>
                    <th class="th_deg">Price</th>
                    <th class="th_deg">Payment Status</th>
                    <th class="th_deg">Delivery Status</th>
                    <th class="th_deg">Image</th>
                    <th class="th_deg">Cancle Order</th>
                    <th class="th_deg">Print PDF</th>
                    
                </tr>

                @foreach($order as $order)

                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->created_at->format('d-m-Y')}}</td>
                    <td>{{$order->product_title}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->price}}</td>
                    <td>{{$order->payment_status}}</td>
                    <td>{{$order->delivery_status}}</td>
                    <td>
                        <img height="100" width="100" class="img_size" src="/product/{{$order->image}}">
                    </td>


                    <td>

                        @if($order->delivery_status=="processing"&& $order->payment_status=="cash on delivery")
                        <a onclick="return confirm('Are You Sure to Cancle the Order?')" class="btn btn-danger" href="{{ url('cancel_order', $order->id) }}">Cancle Order</a>
                        
                        @elseif($order->delivery_status=="processing" || $order->payment_status=="paid")
                        <p style="color:rgb(104, 152, 201);font-weight:bold">You Can't Cancle Order</p>
                        
                        @else

                        <p style="color:rgb(104, 152, 201);font-weight:bold">You Can't Cancle Order</p>
                      
                        
                        @endif
                    
                    
                    
                    </td>
                    <td>
                     <a class="btn btn-success" href="{{url('print_pdf',$order->id)}}">Print PDF</a>
                    </td>


                </tr>

                @endforeach
            
            </table>
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
