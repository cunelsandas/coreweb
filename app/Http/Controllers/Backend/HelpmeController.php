<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class HelpmeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {

        $title = 'ร้องเรียนร้องทุกข์';
        $module = getModule();
        $url = url()->full();


//        foreach($helpmes as $helpme)
//        {
//            dd($helpme->f_lat);
//        }




        return view('backend.helpme.index')->with(['title' => $title, 'url' => $url, 'layout' => 1, 'limit' => 10]);

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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {


        $module = getModule();
        $url = url()->full();
        $table_name = $module->table_name;
        $folder_name = 'helpme';
        $result = array();


        if (!$request->has('id')):
            $search = $request->post('search');
            $page = $request->post('page');
            $limit = $request->post('limit');

            $data = db2()->table($table_name)
                ->where('subject', 'LIKE', "%$search%")
                ->get()->forPage($page, $limit)->toArray();
            $pages = db2()->table($table_name)
                ->where('subject', 'LIKE', "%$search%")
                ->get()->count();



            foreach ($data as $key => $val) {
                $val->list = $key + 1;
                $val->file = Upload::getRandomFile($table_name, $folder_name, $val->id);
                $val->_limit = $key % $limit;
                $val->url = "$url/$val->id";
                $val->created_at = formatDateThai($val->created_at);
                $val->f_lat;
                $val->f_lng;
                $val->id;

            }

            $pages = $pages == 0 ? 1 : ceil($pages / $limit);

            $result = array(
                'data' => $data,
                'pages' => $pages,

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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {


        $module = getModule();
        $table_name = $module->table_name;
        $folder_name = 'helpme';
        $id = $request->post('id');
        $post = Arr::except($request->post(), ['_method', 'id']);
        $at_time = date('Y-m-d H:i:s');
        $post['status'] = isset($post['status']) ? $post['status'] : 0;
        $image = $request->post('images');
        $file = $request->file('files');

        if ($id) {
            $post['updated_at'] = $at_time;
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
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        //
        $module = getModule();

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
