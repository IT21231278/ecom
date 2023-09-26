<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">

    @include('admin.css')

    <style type="text/css">
        .div_center
        {
            text-align:center; 
            padding-top:40px;      
        }
        .font_size
        {       
            font-size:40px;
            padding-bottom:40px; 

         }
         .text_color
         {
            color:black;
            padding-bottom:20px;

         }
         .input_color
         {
            color:black;
            padding-bottom:20px;

         }
         lable
         {
            display:inline-block;
            width:200px;
         }
         .div_design
         {
            padding-bottom:15px;
         }
        </style>


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
          

<div class="div_center">
    <h1 class="font_size">Update Products</h1>

    <form action="{{url('/edit_product_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">

    @csrf
    
    <div class="div_design">
    <lable>Product Title </lable>
    <input class="input_color" type="text" name="title" placeholder="Write Product name" required="" value="{{$product->title}}">
    </div>

    <div class="div_design">
    <lable>Product Description </lable>
    <input class="input_color" type="text" name="Description" placeholder="Write a Product Description" required="" value="{{$product->description}}">
    </div>

    <div class="div_design">
    <lable>Product Price </lable>
    <input class="input_color" type="number" name="price" placeholder="Product Price" required="" value="{{$product->price}}">
    </div>

     <div class="div_design">
    <lable>Product Discount Price</lable>
    <input class="input_color" type="number" name="discount" placeholder=" Product discount" value="{{$product->discount_price}}">
    </div>


    <div class="div_design">
    <lable>Product Quantity </lable>
    <input class="input_color" type="number" min="0" name="quantity" placeholder="Product Quantity" required="" value="{{$product->quantity}}">
    </div>

    <div class="div_design">
    <lable>Product Category </lable>
    <select class="text_color" name="category" required="">
      <option value="{{$product->category}}" selected="">{{$product->category}}</option>

      
    
    </select>
    </div>

    <div class="div_design">
    <lable> Current Product Image</lable>
    <img  style="margin:auto;" height="100" width="100"  src="/product/{{$product->image}}">
    <input  type="file" name="image" placeholder="Insert Product image" required="">
    </div>






    <div class="div_design">
    <lable> Change Product Image</lable>
    <input  type="file" name="image" placeholder=" Product image">
    </div>

    <div class="div_design">
     <input  type="submit" value="Update Product" class="btn btn-primary">
    </div>

        </form>
   

</div>

</div>
</div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
         @include('admin.script')
      <!-- End custom js for this page -->
  </body>
</html>