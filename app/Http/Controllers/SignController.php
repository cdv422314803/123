<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;;

class SignController extends Controller
{

    public function index()
    {
        return '这是注册';
    }

    public function store(Request $request)
    {
        $data = $request->all();

        User::create($data);

        return User::all();
        
    }
}
