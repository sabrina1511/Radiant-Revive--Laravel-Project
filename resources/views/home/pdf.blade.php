<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

      <link rel="shortcut icon" href="images/radiant.png" type="">
      <title>Radiant&Revive</title>

     <style type="text/css">
     
     body{
            background-color: white; 
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
		
		
		.container{
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }
        
        .row{
            display: flex;
            flex-wrap: wrap;
        }
        .col-6{
            width: 50%;
            flex: 0 0 auto;
        }
        .text-white{
            color: #fff;
        }
		
		
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .heading{
            font-size: 20px;
            margin-bottom: 08px;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
		
		table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px white;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
		.w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
    </style>



</head>

<body>
  
       

      <div class="body-section">
        <div class="row">
            <div class="col-6">
              <img height="130" width="250"  src="images/radiant2.png">
              <br>
              <br><br>
                <h2 class="heading">Invoice No:{{ $order->id }}</h2>
                <p class="sub-heading">Order Date: {{ $order->created_at->format('d-m-Y') }} </p>
            </div>
            <br>
            <div class="col-6">
                <p class="sub-heading">Customer Name:{{ $order->name }}  </p>
                <p class="sub-heading">Address: {{ $order->address }} </p>
                <p class="sub-heading">Phone Number: {{ $order->phone }}  </p>
                <p class="sub-heading">Email: {{ $order->email }}  </p>
            </div>
        </div>
    </div>
    
      <div class="body-section">
        <h3 class="heading">Ordered Items</h3>
        <br>
        <table class="table-bordered">
            <thead>
     <tr>
                    <th>Product</th>
                    <th class="w-20">Price</th>
                    <th class="w-20">Quantity</th>
                    <th class="w-20">Grandtotal</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $order->product_title }}</td>
                    <td>{{ $order->price }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->price * $order->quantity }}</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-right">Sub Total</td>
                    <td> {{ $order->price }}</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-right">Delivery Charge</td>
                    <td> 70</td>
                </tr>
                <tr>
       <td colspan="3" class="text-right">Grand Total</td>
                    <td> {{ $order->price + 70 }}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <h3 class="heading">Payment Status:{{ $order->payment_status }}</h3>
      
    </div>
       <br>

       <img height="200" width="200" src="product/{{ $order->image }}"> 
    
</body>
</html>
