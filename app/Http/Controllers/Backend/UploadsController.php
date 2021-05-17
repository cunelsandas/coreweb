<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Upload;
use Illuminate\Http\Request;

class UploadsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param $folder_name
     * @param $file_name
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */

    public function getFile($folder_name,$file_name)
    {
        $system_path = config('app.upload_folder');
        $filePath = "$system_path$folder_name$file_name";
        if (!file_exists($filePath)) {
            $filePath = $system_path . 'no-photo.png';
        }
        return response()->file($filePath);
    }

    public function getFileByFolder($folder, $file_name)
    {
        $system_path = config('app.upload_folder');
        $filePath = $system_path . $folder . DIRECTORY_SEPARATOR . $file_name;
        if (!file_exists($filePath)) {
            $filePath = $system_path . 'no-photo.png';
        }
        return response()->file($filePath);
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        //
        $id = $request->post('id');
        $_file = Upload::where(['id' => $id])->get()->toArray();
        $result = Upload::deleteFile($_file);
        return response()->json($result);
    }
}
