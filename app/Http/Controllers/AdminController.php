<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


class AdminController extends Controller
{
    
    public function viewcategory()
    {   
        $data=category::all();
        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request)
    {

        $data=new category;

        $data->Category_Name=$request->category;  

        $data->save();   

        return redirect()->back()->with('message','Category Added Successfully');  


      }

      public function delete_category($id)
      {
            $data=category::find($id);
            $data->delete();  
            return redirect()->back()->with('message','Category Deleted');
              
    }

    public function view_product()
    {  
         $category=category::all();
        return view('admin.product',compact('category'));
    }

    public function add_product(Request $request)
    {
        $product=new product;

        $product->title=$request->title; 
        $product->description=$request->Description;
        $product->price=$request->price;
        $product->discount_price=$request->discount;
        $product->quantity=$request->quantity;
        $product->category=$request->category;

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);  
        $product->image=$imagename; 
        
        
        $product->save();  
        return redirect()->back()->with('message','Product add Successfully.');

    }  
    
    public function show_product()
    {
        $product=product::all();
        return view('admin.show_product',compact('product'));
    }

    public function delete_product($id)
    {
        $product=product::find($id);

        $product->delete(); 
        
        return redirect()->back()->with('message','Product deleted Successfully.');   
    
    }


    public function edit_product($id)
    {   
        $product=product::find($id);
        $category=category::all();
        return view('admin.edit_product',compact('product'));

    }


    public function edit_product_confirm(Request $request,$id)
    {
        $product=product::find($id);

        $product->title=$request->title;
        $product->description=$request->Description;     
        $product->price=$request->price; 
        $product->discount_price=$request->discount; 
        $product->category=$request->category; 
        $product->quantity=$request->quantity; 


        $image=$request->image; 

        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $product->image=$imagename;
        }
        
        $product->save();
        
        return redirect()->back()->with('message','Product updated Successfully.'); 
    
    }






}