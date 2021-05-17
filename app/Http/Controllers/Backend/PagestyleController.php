<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\GetModule;
use App\Models\GetPageStyle;

class PagestyleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module = getModule();
        $url = url()->full();
        $title = $module->name;
        $moduletypes = getWmstype();
        $getmodules = DB::table('modules')->where([['backend', '=', 1],['frontend', '=', 1]])->get();
        $getmoduless = DB::table('modules')->select('table_name')->where([['backend', '=', 1],['frontend', '=', 1]])->get();
        $getpagestyles = GetPageStyle::all();
        $table_names = DB::select("select TABLE_NAME from information_schema.tables where table_schema='web1'");
//        $table_names_test = DB::select("select * from INFORMATION_SCHEMA.COLUMNS where table_schema='web1'");
        //$db3 = DB::connection('db3')->select('select * from INFORMATION_SCHEMA.COLUMNS');
        $gettable_name = $getmodules;
        $data = array(
            'url' => $url, 'title' => $title, 'module' => $module, 'checkEmpty' => "$url/empty",'moduletypes' => $moduletypes ,'getmoduless'=> $getmoduless
        );



        return view('backend.pagestyle.index',['getmodules' => $getmodules, 'moduletype' =>$moduletypes ,'getpagestyles' => $getpagestyles,'table_names'=>$table_names])->with($data);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $module = getModule();
        //dd ($table_name);

        $moduletype = getWmstype();

        $result = array(
            'data' => $moduletype,
        );


        return  $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request)
    {
        $module = getModule();
        $table_name = $module->table_name;
        $id = $request->post('id');
        $post = Arr::except($request->post(), ['_method', 'id']);
        $at_time = date('Y-m-d H:i:s');
        $post['status'] = isset($post['status']) ? $post['status'] : 0;

        if ($id) {
            $post['updated_at'] = $at_time;
            $_save = db2()->table($table_name)->where(['id' => $id])->update($post);
        } else {
            $post['created_at'] = $at_time;
            $_save = db2()->table($table_name)->insertGetId($post);
            $id = $_save;
        }
        $result = isset($_save) ? true : false;
        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function checkEmpty(Request $request)
    {
        //
        $name = $request->post('name');
        $type = $request->post('type');
        $result = false;
        if ($type == 'table') {
            if (!Schema::connection('db2')->hasTable($name) && $name) {
                $result = true;
            }
        } elseif ($type == 'folder') {
            if (!is_dir(config('app.upload_folder') . $name) && $name) {
                $result = true;
            }
        }

        return response()->json($result);
    }
}
