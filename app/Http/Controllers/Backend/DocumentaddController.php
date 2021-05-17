<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use function GuzzleHttp\json_encode;

class DocumentaddController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $module = getModule();
        $url = url()->full();
        $title = $module->name;
        $id = $request->post('id');
        $menuAll = db2()->table('menus_top')->select('id', 'name')->get();  // เมนูที่ไม่ใช่เมนูซับสุดท้าย
        $modules = DB::table('modules')->where('table_name', '=', 'documents')->get();
        $user_id = session('id');
        $i = 0;
        foreach ($modules as $key => $value) {

            $value->sub = db2()->table($value->table_name)->get()->toArray();

            if(!empty($armax)) {
                $armax = max(array_keys($value->sub));

                for ($i = 0; $i <= $armax; $i++) {
                    $result = db2()->table('permissions')->updateOrInsert(['user_id' => $user_id, 'module_id' => 9, 'type_id' => $value->sub[$i]->id]);
                    // dd(max(array_keys($value->sub)));
                }
            }
            elseif (empty($armax)) {
                $armax = max(array_keys($value->sub));

                for ($i = 0; $i <= $armax; $i++) {
                    $result = db2()->table('permissions')->updateOrInsert(['user_id' => $user_id, 'module_id' => 9, 'type_id' => $value->sub[$i]->id]);
                    // dd(max(array_keys($value->sub)));
                }
            }
        }
        $data2 = db2()->table('documents')->select('id')->get();

        $data = array(
            'url' => $url, 'title' => $title, 'module' => $module, 'checkEmpty' => "$url/empty", 'menuAll'=>$menuAll
        );
        return view('backend.documentadd.index')->with($data);
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
        //
        $module = getModule();
        $table_name = $module->table_name;
        $id = $request->post('id');
        $type = $request->post('type');
        $result = array();
        if (!$id && !$type) {
            $module_admin = DB::table('modules')->where('table_name', '=', 'documents')->get()->toArray();
            foreach ($module_admin as $key => $value) {
                $value->sub = db2()->table($value->table_name)->get();
            }
            $result = array(
                'data' => $module_admin,
            );
        } elseif ($id && !$type) { // Module Manage
            $modules = DB::table('modules')->where('table_name', '=', 'documents')->get()->first();
            $result = array(
                'data' => $modules,
            );
        } else {// Sub Module Manage
            $modules = DB::table('modules')->where('table_name', '=', 'documents')->get()->first();
            $data = db2()->table($modules->table_name)->where('id', '=', $id)->get()->first();
            $table = db2()->table($modules->table_name)->select('table_name')->get();
            $folder = db2()->table($modules->table_name)->select('folder_name')->get();
            $data->module = $type;
            $result = array(
                'data' => $data,
                'table' => $table,
                'folder' => $folder
            );
        }
        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        //
        $module = getModule();
        $table_name = $module->table_name;
        $result = false;
        $id = $request->post('id');
        $route = $request->post('route');
        $post = Arr::except($request->post(), ['_method', 'id', 'route']);
        if ($id && !$route) { // Module Manage
            $modules = DB::table('modules')->where('table_name', '=', 'documents')->get()->first();
            $data2 = db2()->table($modules->table_name)->select('id')->get();
            $new_table_name = $post['table_name'];
            $new_folder_name = $post['folder_name'];
            createTableDB2($new_table_name, $modules->route_name);
            createFolder($new_folder_name);
            $result = db2()->table($modules->table_name)->insert($post);
            // $result = db2()->table('permissions')->insert(['user_id' => 1, 'module_id' => $id, 'type_id' => $data2]);

        } else {// Sub Module Manage
            $modules = DB::table('modules')->where('table_name', '=', 'document')->get()->first();
            $result = db2()->table($modules->table_name)->where(['id' => $id])->update($post);
        }
        return response()->json($result);
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
        $module = getModule();
        $table_name = $module->table_name;
        $id = $request->post('id');
        $route = $request->post('route');
        $modules = DB::table('modules')->where('table_name', '=', 'documents')->get()->first();
        $result = db2()->table($modules->table_name)->delete(['id' => $id]);
        return response()->json($result);
    }
}
