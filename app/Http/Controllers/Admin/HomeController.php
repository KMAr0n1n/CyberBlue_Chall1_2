<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('admin.home',[
            'title'=>'Home teacher'
        ]);
    }

    public function download($file_name) {
        $file_path = storage_path()."/app/uploads/".$file_name;
        return response()->download($file_path);
    }
}
