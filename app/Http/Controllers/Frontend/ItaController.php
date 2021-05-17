<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;


class ItaController extends Controller
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
        $url = url()->full();
        $title = 'ita';
        $data = array(
            'url' => $url, 'title' => $title
        );
        return view('frontend.ita.index')->with($data);
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
    public function store(Request $request, $type)
    {
        //
        $module = getModule($type);
        $table_name = $module->table_name;
        $folder_name = $module->folder_name;
        $result = array();
        if (!$request->has('id')):
            $_data = getAllMenu($table_name);
            $result = array(
                'data' => $_data
            );
        else:
            $_data = array();
            $id = $request->post('id');
            $_module = getFrontendModule();

            $columnsInTable = db2()->getSchemaBuilder()->getColumnListing($table_name); // เช็คชื่อ Column ใน Table
            foreach ($columnsInTable as $key => $value) {
                $_data[$value] = '';
            }
            $data = isset($id) ? db2()->table($table_name)->find($id) : $_data;

            $menuSub = getAllMenu($table_name); // ข้อมูลเมนูทั้งหมด
            $menuId = array();
            foreach ($menuSub as $index => $item) { // เช็คค่าเมนูว่าไม่เป็นเมนูซับสุดทเ้าย
                if ($item->id != $id) { //เช็คค่าว่าไม่เท่ากับเมนูที่แก้ไข
                    $menuId[] = $item->id;
                }
                foreach ($item->sub as $key => $value) {
                    if ($value->id != $id) { //เช็คค่าว่าไม่เท่ากับเมนูที่แก้ไข
                        $menuId[] = $value->id;
                    }
                }
            }
            $menuNotSelf = db2()->table($table_name)->select('id', 'name')->whereIn('id', $menuId)->get(); // เมนูที่ไม่ใช่เมนูซับสุดท้าย

            $result = array(
                'data' => $data,
                'module' => $_module,
                'menu' => $menuNotSelf
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
    public function update(Request $request, $type)
    {
        //
        $module = getModule($type);
        $table_name = $module->table_name;
        $folder_name = $module->folder_name;
        $at_time = date('Y-m-d H:i:s');
        $post = Arr::except($request->post(), ['_method', 'id', 'images']);
        $post['status'] = isset($post['status']) ? $post['status'] : 0;
        $post['sub'] = isset($post['sub']) ? $post['sub'] : 0;
        $id = $request->post('id');
        if ($id) {
            $post['updated_at'] = $at_time;
            $_save = db2()->table($table_name)->where(['id' => $id])->update($post);
        } else {
            $post['created_at'] = $at_time;
            $_save = db2()->table($table_name)->insertGetId($post);
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
     */
    public function destroy(Request $request, $type)
    {
        //
        $module = getModule($type);
        $table_name = $module->table_name;
        $folder_name = $module->folder_name;
        $id = $request->post('id');
        $_save = db2()->table($table_name)->delete(['id' => $id]); // ลบเมนู
        $menuSub = getAllMenu($table_name, $id);
        $menuId = array();
        foreach ($menuSub as $index => $item) {
            $menuId[] = $item->id;
        }
        $_save = db2()->table($table_name)->whereIn('id', $menuId)->update(['sub' => 0]); // เซ็ตค่าเมนูย่อยของเมนูลบเป็น 0
        $result = isset($_save) ? true : false;
        return response()->json($result);
    }
}
