<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;

class HomeController extends Controller
{
    public function redirect(){
        $usertype=Auth::user()->userType;
        if($usertype=='1')
        {
            return view('admin.home');
        } 
        else
        {
            return view('home.userpage');
        }   
    }

    public function index()
    {
        $product=Product::paginate(3);
        return view('home.userpage',compact('product'));


    }
}
