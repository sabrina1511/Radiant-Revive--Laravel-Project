<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

      <link rel="shortcut icon" href="images/radiant.png" type="">
      <title>Radiant&Revive</title>

     <style type="text/css">




  
     </style>

</head>

<body>
    
      <img height="130" width="250"  src="images/radiant2.png"> 
    
      <h1>Order Details</h1>
   
       Customer ID :<h3>{{ $order->user_id }}</h3>
       Customer Name :<h3>{{ $order->name }}</h3>
       Customer Email :<h3>{{ $order->email}}</h3>
       Customer Phone :<h3>{{ $order->phone }}</h3>
       Customer Address :<h3>{{ $order->address }}</h3> 
  
       Product ID :<h3>{{ $order->product_id }}</h3>
       Product Name :<h3>{{ $order->product_title }}</h3>
       Product Price :<h3>{{ $order->price }}</h3>
       Product Quantity :<h3>{{ $order->quantity }}</h3>
       Payment Status :<h3>{{ $order->payment_status }}</h3>
       Purchasing Date :<h3>{{ $order->created_at }}</h3>
   
       <br>

       <img height="130" width="150" src="product/{{ $order->image }}"> 
    
</body>
</html>
