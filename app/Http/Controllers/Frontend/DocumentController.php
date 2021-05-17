<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param $type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index($type)
    {
        $module = getModule($type);
        $title = $module->name;
        $url = url()->full();

        $getstylecheck = DB::connection('db2')
            ->table('settings')
            ->first('style');
        if($getstylecheck->style == 1) {
            $module = getModule($type);
            $title = $module->name;
            $url = url()->full();

            return view('frontend.document.index')->with(['title' => $title, 'url' => $url, 'layout' => 1, 'limit' => 5]);
        }
        elseif ($getstylecheck->style == 2){
            $module = getModule($type);
            $title = $module->name;
            $url = url()->full();

            return view('frontend_layouts2.document.index')->with(['title' => $title, 'url' => $url, 'layout' => 1, 'limit' => 5]);

        }

        return view('frontend.document.index')->with(['title' => $title, 'url' => $url, 'layout' => 1, 'limit' => 5]);
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
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function store(Request $request, $type)
    {
        $module = getModule($type);

        $url = url()->full();
        $table_name = $module->table_name;
        $folder_name = $module->folder_name;
        $document_type = array('document_id' => $module->id);
        $result = array();
        if (!$request->has('id')):
            $search = $request->post('search');
            $page = $request->post('page');
            $limit = $request->post('limit');
            $data = db2()->table($table_name)
                ->where('name', 'LIKE', "%$search%")
                ->where($document_type)
                ->get()->forPage($page, $limit)->toArray();
            $pages = db2()->table($table_name)
                ->where('name', 'LIKE', "%$search%")
                ->where($document_type)
                ->get()->count();
            foreach ($data as $key => $val) {
                $val->list = $key + 1;
                $val->file = Upload::getRandomFile($table_name, $folder_name, $val->id);
                $val->_limit = $key % $limit;
                $val->url = "$url/$val->id";
            }
            $pages = $pages == 0 ? 1 : ceil($pages / $limit);
            $statistics = getStatistics($table_name, $document_type);
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
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function show($type, $id)
    {
        $module = getModule($type);

        $table_name = $module->table_name;
        $folder_name = $module->folder_name;
        $data = db2()->table($table_name)->where(["id" => $id])->get()->first();
        $file = Upload::getFiles($table_name, $folder_name, $id);

        $getstylecheck = DB::connection('db2')
            ->table('settings')
            ->first('style');
        if($getstylecheck->style == 1) {
            $module = getModule($type);

            $table_name = $module->table_name;
            $folder_name = $module->folder_name;
            $data = db2()->table($table_name)->where(["id" => $id])->get()->first();
            $file = Upload::getFiles($table_name, $folder_name, $id);

            return view("frontend.document.detail")->with(['file' => $file, 'data' => $data]);
        }elseif ($getstylecheck->style == 2){
            $module = getModule($type);

            $table_name = $module->table_name;
            $folder_name = $module->folder_name;
            $data = db2()->table($table_name)->where(["id" => $id])->get()->first();
            $file = Upload::getFiles($table_name, $folder_name, $id);

            return view("frontend_layouts2.document.detail")->with(['file' => $file, 'data' => $data]);
        }

        return view("frontend.document.detail")->with(['file' => $file, 'data' => $data]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $type)
    {
        //
        $module = getModule($type);
        $table_name = $module->table_name;
        $folder_name = $module->folder_name;
        $at_time = date('Y-m-d H:i:s');
        $post = Arr::except($request->post(), ['_method', 'id', 'images']);
        $post['status'] = isset($post['status']) ? $post['status'] : 0;
        $id = $request->post('id');
        $image = $request->post('images');
        $file = $request->file('files');
        $post['document_id'] = $module->id;
        if ($id) {
            $post['updated_at'] = $at_time;
            $_save = db2()->table($table_name)->where(['id' => $id])->update($post);
        } else {
            $post['created_at'] = $at_time;
            $_save = db2()->table($table_name)->insertGetId($post);
            $id = $_save;
        }
        $files = _put_file($file, $image, $folder_name);
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
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function destroy(Request $request, $type)
    {
        //
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
