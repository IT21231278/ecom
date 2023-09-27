<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style type="text/css">    
    
    .center
        {
            margin:auto;
            width:50%;
            border:2px solid white;
            text-align:center; 
            margin-top:40px;      
        }
        .font_size
        {       
            font-size:40px;
            padding-top:20px;
            text-align:center;

         }
         
         .image_size
         {
            width:150px;
            height:100px;

         }
         .th_color
         {
            background:skyblue;
         }
         
         .th_design
         {
            padding:30px;
         }

</style>
</head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

          @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
           </div>
            @endif

<h2 class="font_size">All Product</h2>

        <table class="center">
            <tr class="th_color">
                
                <th class="th_design">Product Title</th>
                <th class="th_design">Description</th>
                <th class="th_design">Quantity</th>
                <th class="th_design">Category</th>
                <th class="th_design">Price</th>
                <th class="th_design">Discount Price </th>
                <th class="th_design">Image</th>
                <th class="th_design">Delete</th>
                <th class="th_design">Edit</th>
            </tr>


            @foreach($product as $product)

            <tr>
                <td>{{$product->title}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->category}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->discount_price}}</td>
                <td>
                    <img class="image_size" src="/product/{{$product->image}}">
                </td>
                <td>
                    <a class="btn btn-danger" onclick="return confirm('Are you sure to delete this?')" href="{{url('delete_product',$product->id)}}">Delete</a>
                </td>
                <td>
                    <a class="btn btn-success" href="{{url('edit_product',$product->id)}}">Edit</a>
                </td>

            </tr>

            @endforeach
        </table>



</div>
</div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    @include('admin.script')
    <!-- End customs for this page -->
  </body>
</html>