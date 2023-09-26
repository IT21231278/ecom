<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
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
    <h1 class="font_size">Add Products</h1>

    <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">

    @csrf
    
    <div class="div_design">
    <lable>Product Title </lable>
    <input class="input_color" type="text" name="title" placeholder="Write Product name" required="">
    </div>

    <div class="div_design">
    <lable>Product Description </lable>
    <input class="input_color" type="text" name="Description" placeholder="Write a Product Description" required="">
    </div>

    <div class="div_design">
    <lable>Product Price </lable>
    <input class="input_color" type="number" name="price" placeholder="Product Price" required="">
    </div>

     <div class="div_design">
    <lable>Product Discount Price</lable>
    <input class="input_color" type="number" name="discount" placeholder=" Product discount">
    </div>


    <div class="div_design">
    <lable>Product Quantity </lable>
    <input class="input_color" type="number" min="0" name="quantity" placeholder="Product Quantity" required="">
    </div>

    <div class="div_design">
    <lable>Product Category </lable>
    <select class="text_color" name="category" required="">
      <option value="" selected="">Add a category here</option>
      @foreach($category as $category)   
         
      <option value="{{$category->Category_Name}}">{{$category->Category_Name}}</option>

      @endforeach     
    </select>
    </div>

    <div class="div_design">
    <lable>Product Image</lable>
    <input  type="file" name="image" placeholder="Write Product name" required="">
    </div>

    <div class="div_design">
     <input  type="submit" value="Add Product" class="btn btn-primary">
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