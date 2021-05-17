<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class QueueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //
        $module = getModule();
        $title = $module->name;
        $url = url()->full();
        return view('backend.queue.index')->with(['title' => $title, 'url' => $url, 'layout' => 1, 'limit' => 5]);
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
    public function store(Request $request)
    {
        //
        $module = getModule();
        $table_name = 'tb_queue';
        $folder_name = 'tb_queue';
        $result = array();
        if (!$request->has('id')):
            $search = $request->post('search');
            $page = $request->post('page');
            $limit = $request->post('limit');
            $data = db2()->table($table_name)
                ->where('name', 'LIKE', "%$search%")
                ->get()->forPage($page, $limit)->toArray();
            $pages = db2()->table($table_name)
                ->where('name', 'LIKE', "%$search%")
                ->get()->count();
            foreach ($data as $key => $val) {
                $val->list = $key + 1;
                $val->file = Upload::getRandomFile($table_name, $folder_name, $val->id);
                $val->date_in = formatDateThaiOnly($val->date_in);
                $val->_limit = $key % $limit;
                $val->created_at = formatDateThai($val->created_at);
            }
            $pages = $pages == 0 ? 1 : ceil($pages / $limit);
            $statistics = getStatistics($table_name);
            $result = array(
                'data' => $data,
                'pages' => $pages,
                'statistics' => $statistics,
            );
        else:
            $id = $request->post('id');
            $data = isset($id) ? db2()->table($table_name)->find($id) : array('detail' => '');
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
    public function update(Request $request)
    {
        //
        $module = getModule();
        $table_name = 'tb_queue';
        $folder_name = 'queue';
        $at_time = date('Y-m-d H:i:s');
        $post = Arr::except($request->post(), ['_method', 'id', 'images']);
        $post['status'] = isset($post['status']) ? $post['status'] : 0;
        $id = $request->post('id');
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
     */
    public function destroy(Request $request)
    {
        //
        $module = getModule();

        $table_name = $module->table_name;
        $result = false;
        $id = $request->post('id');
        $_data = db2()->table($table_name)->delete(['id' => $id]);
        return response()->json($_data);
    }
}
