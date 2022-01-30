<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\User;

class DashBoardController extends Controller
{
    public function users(){
        $users=User::all();
        return view('admin.users.index',compact('users'));
    }
}
