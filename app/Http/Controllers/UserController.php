<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User as User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ));
    	$user= User::all();
    	return \Response::json($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        $id = User::create($input)->id;
        if($id)
        {
            $user = User::findOrFail($id);
        	return response()->json(['status' => '1', 'user' => $user]);
        }
        return response()->json(['status' => '0']);

    }
}
