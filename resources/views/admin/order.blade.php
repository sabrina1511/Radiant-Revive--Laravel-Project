<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')


    <style type="text/css">

    .title_deg
    {
        text-align: center;
        font-size: 40px;
        padding-top: 25px;
        padding-bottom: 40px;
        
    }

    .table_deg
    {
        border: 2px solid white;
        margin: auto;
        width: 100%;
        text-align: center;
        padding: 20px;
    }

    .th_deg
    {
        background-color: skyblue;
    }

    .img_size{
        width: 100px;
        height: 90px;
    }

    .input_color
        {
            color:black;
        }



    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
       @include('admin.slidebar')
      <!-- partial -->
       @include('admin.header')
        <!-- partial -->

    <div class="main-panel">
    <div class="content-wrapper">

        <h1 class="title_deg">All Orders</h1>


        <div style="padding-left: 470px; padding-bottom: 30px; ">
            <form action="{{url('search')}}" method="get">
                 
                @csrf

                <input class="input_color" type="text" name="search" placeholder="Search for Something">
               
                <input type="submit" value="Search" class="btn btn-outline-primary">
           
            </form>
        </div>

        <table class="table_deg">
            
            <tr class="th_deg">

                <th style="padding: 10px;">Customer ID</th> 
                <th style="padding: 10px;">Order ID</th>
                <th style="padding: 10px;">Order Date</th>
                <th style="padding: 10px;">Name</th>
                <th style="padding: 10px;">Email</th>
                <th style="padding: 10px;">Address</th> 
                <th style="padding: 10px;">Phone</th>
                <th style="padding: 10px;">Product Title</th>
                <th style="padding: 10px;">Quantity</th>
                <th style="padding: 10px;">Price</th>
                <th style="padding: 10px;">Payment Status</th>
                <th style="padding: 10px;">Delivery Status</th>
                <th style="padding: 10px;">Image</th>
                <th style="padding: 10px;">Delivered</th>
                <th style="padding: 10px;">Print PDF</th>
                <th style="padding: 10px;">Send Email</th>
            </tr>

            @forelse($order as $order)

            <tr>
                
                <td>{{$order->user_id}}</td>
                <td>{{$order->id}}</td>
                <td>{{$order->updated_at->format('d-m-Y')}}</td>
                <td>{{$order->name}}</td>
                <td>{{$order->email}}</td>
                <td>{{$order->address}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->product_title}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->payment_status}}</td>
                <td>{{$order->delivery_status}}</td>
               
               
                <td>
                    <img class="img_size" src="/product/{{$order->image}}">
                </td>

                <td>
                    @if($order->delivery_status=='processing')
                    
                    <a class="btn btn-primary" onclick="return confirm('Are you sure this product is delivered??')" href="{{url('delivered',$order->id)}}">Processing</a>
                   
                    @else
                    
                    <p style="color: green;font-weight:bold">Delivered</p>

        
                    @endif

                </td>

                <td>
                    <a class="btn btn-secondary" href="{{url('print_pdf',$order->id)}}">Print PDF</a>
                </td>


                <td>
                    <a href="{{url('send_email', $order->id) }}" class="btn btn-info">Send Email</a>
                </td>
            
            
            
            
            </tr>

            @empty

            <tr>
                <td colspan="16">No Orders Found</td>
            </tr>

            @endforelse

            
        </table>
       
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>