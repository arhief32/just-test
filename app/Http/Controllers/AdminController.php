<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $result = DB::table('admin')->select('*')->get();

        return view('index', ['admins' => $result]);
    }

    public function detail(Request $request)
    {
        $username = $request->username;
        $result = DB::table('admin')->select('*')->where('username', $username)->first();
        
        return response()->json($result);
    }
}
