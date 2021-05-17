<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class OfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($type)
    {
        //
        $module = getModule($type);
        $view = 'backend.officer.index';
        $url = url()->full();
        $title = $module->name;
        $layout = 1;
        $limit = 6;
        return view($view)->with(['url' => $url, 'title' => $title, 'layout' => $layout, 'limit' => $limit]);
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
     * @param $type
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, $type)
    {
        $module = getModule($type);
        $table_name = $module->table_name;
        $folder_name = $module->folder_name;
        $result = array();
        $data = array();
        if (!$request->has('id')):
            $_block = db2()->table($table_name)->distinct()->get('block');
            foreach ($_block as $index => $item) {
                $data[$index] = db2()->table($table_name)->where(['block' => $item->block])->get();
                foreach ($data[$index] as $key => $value) {
                    $value->file = Upload::getRandomFile($table_name, $folder_name, $value->id);
                }
            }
            /*$data = db2()->table($table_name)->get();
            foreach ($data as $key => $val) {
                $val->file = Upload::getRandomFile($table_name, $folder_name, $val->id);
            }*/
            $result = array(
                'data' => $data,
            );
        else:
            $id = $request->post('id');
            $data = isset($id) ? db2()->table($table_name)->find($id) : array();
            $_file = Upload::getFiles($table_name, $folder_name, $id);
            $result = array(
                'files' => $_file,
                'data' => $data,
            );
        endif;
        return response()->json($result);
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
     * @param $type
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $type)
    {
        $module = getModule($type);
        $table_name = $module->table_name;
        $folder_name = $module->folder_name;
        $at_time = date('Y-m-d H:i:s');
        $post = Arr::except($request->post(), ['_method', 'id', 'images']);
        $post['status'] = isset($post['status']) ? $post['status'] : 0;
        $id = $request->post('id');
        $image = $request->post('images');
        $file = array();
        $post['officer_id'] = $module->id;
        if ($id) {
            $post['updated_at'] = $at_time;
            if ($image) {
                $_file = Upload::where(['table_name' => $table_name, 'master_id' => $id])->get()->toArray();
                Upload::deleteFile($_file);
            }
            $_save = db2()->table($table_name)->where(['id' => $id])->update($post);
        } else {
            $post['created_at'] = $at_time;
            $_save = db2()->table($table_name)->insertGetId($post);
            $id = $_save;
        }
        $files = putFile($file, $image, $folder_name);
        if ($_save && !empty($files)) {
            Upload::insertFile($files, "$id", "$table_name", "$folder_name");
        }
        $result = isset($_save) ? true : false;
        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param $type
     * @return \Illuminate\Http\JsonResponse
     */

    public function destroy(Request $request, $type)
    {
        $module = getModule($type);
        $table_name = $module->table_name;
        $result = false;
        $id = $request->post('id');
        $_data = db2()->table($table_name)->delete(['id' => $id]);
        if ($_data) {
            $_file = Upload::where(['table_name' => $table_name, 'master_id' => $id])->get()->toArray();
            $result = Upload::deleteFile($_file);
        }
        return response()->json($result);
    }
}
