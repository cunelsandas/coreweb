<?php

namespace App\Http\Controllers\Itg;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $table = 'permissions';

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
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeV1(Request $request)
    {
        //
        $table_permission = $this->table;
        $table_module = 'modules';
        $id = $request->post('id');
        $permission = DB::table($table_permission)
            ->where(['permissions.domain_id' => $id])
            ->join('modules', 'permissions.module_id', '=', 'modules.id')
            ->get();
        $whereNotIn = array();
        foreach ($permission as $key => $value) {
            $whereNotIn[] = $value->module_id;
        }
        $modules = DB::table($table_module)->whereNotIn('id', $whereNotIn)->get();
        $result = array(
            'modules' => $modules,
            'permission' => $permission
        );
        return response()->json($result);
    }

    public function store(Request $request)
    {
        //
        $table_permission = $this->table;
        $table_module = 'modules';
        $id = $request->post('id');
        $data = DB::table($table_permission)
            ->where(['permissions.domain_id' => $id])
            ->join('modules', 'permissions.module_id', '=', 'modules.id')
            ->get();
        $modules = DB::table($table_module)->select('id','name')->get();
        $permission = array();
        foreach ($data as $key => $val) {
            $permission[] = $val->module_id;
        }
        foreach ($modules as $key => $val) {
            $checked = false;
            if (in_array($val->id, $permission)) {
                $checked = true;
            }
            $modules[$key]->check = $checked;
        }
        $result = array(
            'modules' => $modules,
            'domain' => $id
        );
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        //
        $result = false;
        $table_permission = $this->table;
        $id = $request->post('id');
        $post = Arr::except($request->post(), ['_method', 'id']);
        DB::table($table_permission)->where('domain_id', $id)->delete();
        foreach ($post['permission'] as $key => $value) {
            $result = DB::table($table_permission)->insert(['domain_id' => $id, 'module_id' => $value]);
        }
        return response()->json($result);
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
