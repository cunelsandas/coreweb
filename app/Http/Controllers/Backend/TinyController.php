<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TinyController extends Controller
{
    public function upload(Request $request)
    {
        $folder_name = 'tiny';
        $_file = putFile(array(), array($request->post('file') . "," . $request->post('name')), $folder_name);
        $_file_name = $_file[0];
        return response()->json(array('location' => url("../upload/$folder_name/$_file_name")));
    }
}
