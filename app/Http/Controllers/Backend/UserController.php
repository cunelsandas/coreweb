<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class UserController extends Controller
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
        $data = array(
            'url' => $url, 'title' => $title, 'module' => $module
        );
        return view('backend.user.index')->with($data);
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
            $limit = $request->post('limit') ?: 10;
            $data = db2()->table($table_name)->select('id', 'name')
                ->where('name', 'LIKE', "%$search%")
                ->get()->forPage($page, $limit)->toArray();
            $pages = db2()->table($table_name)
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
            $data = isset($id) ? db2()->table($table_name)->select('id', 'name', 'username', 'password')->find($id) : array();
            $result = array(
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $module = getModule();
        $table_name = $module->table_name;
        $id = $request->post('id');
        $post = Arr::except($request->post(), ['_method', 'id']);
        $post['password_hash'] = bcrypt($post['password']);
        $at_time = date('Y-m-d H:i:s');
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
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        //
        $module = getModule();
        $table_name = $module->table_name;
        $result = false;
        $table_permission = 'permissions';
        $id = $request->post('id');
        $result = db2()->table($table_name)->delete(['id' => $id]);
        if ($result) {
            db2()->table($table_permission)->where('user_id', $id)->delete();
        }
        return response()->json($result);
    }
}
