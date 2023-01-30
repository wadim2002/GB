<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LKController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $myJson = json_encode(response()->json($request->all()));
        \file_put_contents('user-data.json', $myJson);
        return response()->json(['user-name' => $request->input('user-name')]);
    }
}
