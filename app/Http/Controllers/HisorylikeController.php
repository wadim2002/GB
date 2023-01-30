<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HisorylikeController extends Controller
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
        \file_put_contents('like-history.json', $myJson);
        return response()->json(['like' => $request->input('like')]);
    }
}
