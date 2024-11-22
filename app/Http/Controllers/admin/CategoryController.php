<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function index(){
    return view ('admin.category.create_category');
   }
   public function manage()
   {
    return view('admin.category.manage_category');
   }
}
