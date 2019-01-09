<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FirstController extends Controller
{
    public function index(Request $request, User $user)
    {
        //return response()->json($request->all());

        /*return response()->json([
            'name' => 'Sergey',
            'address' => 'X street',
        ]);*/
    }

    public function view()
    {
        return view('first.html', [
            'name' => 'Sergey',
            'address' => 'X street',
        ]);
    }
}











