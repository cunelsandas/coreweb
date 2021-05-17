<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function store(Request $request)
    {
        //
        $id = $request->post('id');
        $permission = getWmsModule($id);
        $result = array(
            'permission' => $permission,
            'user_id' => $id
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
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        //
        $result = false;
        $table_permission = 'permissions';
        $user_id = $request->post('id');
        $permission = $request->post('permission') ?: array();
        db2()->table($table_permission)->where('user_id', $user_id)->delete();
        foreach ($permission as $item) {
            $array = explode(',', $item);
            $module_id = $array[0];
            $type_id = $array[1];
            $result = db2()->table($table_permission)->insert(['user_id' => $user_id, 'module_id' => $module_id, 'type_id' => $type_id]);
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
