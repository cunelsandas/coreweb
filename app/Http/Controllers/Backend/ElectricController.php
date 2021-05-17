<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ElectricController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {




        $module = getModule();
        $title = $module->name;
        $url = url()->full();

        $electrics = DB::connection('db2')
            ->table('electrics')
            ->select('*')
            ->get();
        return view('backend.electric.index')->with(['title' => $title, 'url' => $url, 'layout' => 1, 'limit' => 5 ,'electrics'=>$electrics]);
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


        $module = getModule();
        $url = url()->full();
        $table_name = $module->table_name;

        $result = array();


        if (!$request->has('id')):
            $search = $request->post('search');
            $page = $request->post('page');
            $limit = $request->post('limit');

            $data = db2()->table($table_name)
                ->where('postby', 'LIKE', "%$search%")
                ->get()->forPage($page, $limit)->toArray();
            $pages = db2()->table($table_name)
                ->where('postby', 'LIKE', "%$search%")
                ->get()->count();



            foreach ($data as $key => $val) {
                $val->list = $key + 1;
                $val->_limit = $key % $limit;
                $val->url = "$url/$val->id";
                $val->created_at = formatDateThai($val->created_at);
            }

            $pages = $pages == 0 ? 1 : ceil($pages / $limit);

            $result = array(
                'data' => $data,
                'pages' => $pages,

            );
        else:
            $id = $request->post('id');
            $data = isset($id) ? db2()->table($table_name)->find($id) : array();
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {


        $module = getModule();
        $table_name = $module->table_name;
        $id = $request->post('id');
        $post = Arr::except($request->post(), ['_method', 'id']);
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
