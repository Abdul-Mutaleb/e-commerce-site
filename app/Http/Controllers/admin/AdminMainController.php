<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminMainController extends Controller
{
    public function index()
    {
        return view ('admin.admin');
    }
    public function setting()
    {
        return view ('admin.setting');
    }
    public function manage()
    {
        return view ('admin.manage.user');
    }
    public function mange_store()
    {
        return view ('admin.manage.store');
    }
    public function cart_history()
    {
        return view ('admin.cart.history');
    }
    public function order_history()
    {
        return view ('admin.order.history');
    }
}
