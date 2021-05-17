<?php

namespace App\Http\Controllers\Itg;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //
        $module = getModule();
        $url = url()->full();
        $title = $module->name;
        $layout = 3;
        $limit = 10;
        return view('itg.module.index')->with(['url' => $url, 'title' => $title, 'layout' => $layout, 'limit' => $limit]);
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
        $result = array();
        if (!$request->has('id')):
            $search = $request->post('search');
            $page = $request->post('page');
            $limit = $request->post('limit');
            $data = DB::table($table_name)
                ->where('name', 'LIKE', "%$search%")
                ->get()->forPage($page, $limit)->toArray();
            $pages = DB::table($table_name)
                ->where('name', 'LIKE', "%$search%")
                ->get()->count();
            foreach ($data as $key => $val) {
                $val->list = $key + 1;
                $val->_limit = $key % $limit;
            }
            $pages = $pages == 0 ? 1 : ceil($pages / $limit);
            $result = array(
                'data' => $data,
                'pages' => $pages,
            );
        else:
            $id = $request->post('id');
            $data = isset($id) ? DB::table($table_name)->find($id) : array();
            $route_name = getRouteName();
            $result = array(
                'data' => $data,
                'route' => $route_name
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        //
        $module = getModule();
        $table_name = $module->table_name;
        $id = $request->post('id');
        $post = Arr::except($request->post(), ['_method', 'id']);
        $post['frontend'] = isset($post['frontend']) ? $post['frontend'] : 0;
        $post['backend'] = isset($post['backend']) ? $post['backend'] : 0;
        $post['is_sub'] = isset($post['is_sub']) ? $post['is_sub'] : 0;
        $post['manage_sub'] = isset($post['manage_sub']) ? $post['manage_sub'] : 0;
        $at_time = date('Y-m-d H:i:s');
        if ($id) {
            $post['updated_at'] = $at_time;
            $_save = DB::table($table_name)->where(['id' => $id])->update($post);
        } else {
            $post['created_at'] = $at_time;
            $_save = DB::table($table_name)->insertGetId($post);
            $id = $_save;
        }
        $result = isset($_save) ? true : false;
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
        $_data = DB::table($table_name)->delete(['id' => $id]);
        return response()->json($_data);
    }
}
