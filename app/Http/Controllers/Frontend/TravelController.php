<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index($type)
    {
        //
        $module = getModule($type);
        $view = 'frontend.travel.index';
        $url = url()->full();
        $title = $module->name;
        $layout = 3;
        $limit = 6;  //$limit = 6;
        $getstylecheck = DB::connection('db2')
            ->table('settings')
            ->first('style');
        if($getstylecheck->style == 1) {
            $module = getModule($type);
            $view = 'frontend.travel.index';
            $url = url()->full();
            $title = $module->name;
            $layout = 3;
            $limit = 6;  //$limit = 6;
            return view($view)->with(['url' => $url, 'title' => $title, 'layout' => $layout, 'limit' => $limit]);
        }
        elseif($getstylecheck->style == 2){
            $module = getModule($type);
            $view = 'frontend_layouts2.travel.index';
            $url = url()->full();
            $title = $module->name;
            $layout = 4;
            $limit = 6;  //$limit = 6;
            return view($view)->with(['url' => $url, 'title' => $title, 'layout' => $layout, 'limit' => $limit]);
        }
        return view($view)->with(['url' => $url, 'title' => $title, 'layout' => $layout, 'limit' => $limit]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @param $type
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($type, $id)
    {
        $module = getModule($type);
        $table_name = $module->table_name;
        $folder_name = $module->folder_name;
        $data = db2()->table($table_name)->where(["id" => $id])->get()->first();
        $file = Upload::getFiles($table_name, $folder_name, $id);

        $travels = DB::connection('db2')
            ->table('tb_travels')
            ->select('*')
            ->where(["id" => $id])
            ->get();

        $getstylecheck = DB::connection('db2')
            ->table('settings')
            ->first('style');
        if($getstylecheck->style == 1) {
            $module = getModule($type);
            $table_name = $module->table_name;
            $folder_name = $module->folder_name;
            $data = db2()->table($table_name)->where(["id" => $id])->get()->first();
            $file = Upload::getFiles($table_name, $folder_name, $id);

            $travels = DB::connection('db2')
                ->table('tb_travels')
                ->select('*')
                ->where(["id" => $id])
                ->get();
            return view("frontend.travel.detail")->with(['file' => $file, 'data' => $data ,'travels'=>$travels]);
        }
        elseif ($getstylecheck->style == 2){
            $module = getModule($type);
            $table_name = $module->table_name;
            $folder_name = $module->folder_name;
            $data = db2()->table($table_name)->where(["id" => $id])->get()->first();
            $file = Upload::getFiles($table_name, $folder_name, $id);

            $travels = DB::connection('db2')
                ->table('tb_travels')
                ->select('*')
                ->where(["id" => $id])
                ->get();
            return view("frontend_layouts2.travel.detail")->with(['file' => $file, 'data' => $data ,'travels'=>$travels]);
        }


        return view("frontend.travel.detail")->with(['file' => $file, 'data' => $data ,'travels'=>$travels]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $type)
    {
        //

        $module = getModule($type);

        $url = url()->full();

        $table_name = $module->table_name;
        $folder_name = $module->folder_name;
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
                $val->_limit = $key % $limit;
                $val->detail = strip_tags($val->detail);
                $val->detail = html_entity_decode($val->detail);
                $val->url = "$url/$val->id";
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
     * @return void
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
