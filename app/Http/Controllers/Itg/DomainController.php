<?php

namespace App\Http\Controllers\Itg;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    private $table = 'domains';

    public function index()
    {
        //
        $url = url()->full();
        $title = 'จัดการ Domain';
        return view('itg.domain.index', ['title' => $title, 'url' => $url]);
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
        $table = $this->table;
        $result = [];
        if (!$request->has('id')):
            $search = $request->post('search');
            $page = $request->post('page');
            $limit = 10;
            $data = DB::table($table)
                ->select('id as field', 'name', 'start_domain', 'end_domain')
                ->where('name', 'LIKE', "%$search%")
                ->get()->forPage($page, $limit);
            $pages = DB::table($table)
                ->where('name', 'LIKE', "%$search%")
                ->get()->count();
            $pages = ceil($pages / $limit);
            $pages = $pages == 0 ? 1 : $pages;
            $result['pages'] = $pages;
            foreach ($data as $key => $val) {
                $val->list = $key + 1;
                $val->start_domain = dateToDatePicker($val->start_domain);
                $val->end_domain = dateToDatePicker($val->end_domain);
            }
            $result['data'] = $data;
        else:
            $id = $request->post('id');
            $data = DB::table($table)->find($id);
            if ($data) {
                $data->start_domain = dateToDatePicker($data->start_domain);
                $data->end_domain = dateToDatePicker($data->end_domain);
            }
            $result = $data;
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
        //_method
        $table = $this->table;
        $id = $request->post('id');
        $data = Arr::except($request->post(), ['_method', 'id']);
        $data['start_domain'] = datePickerToDate($request->post('start_domain'));
        $data['end_domain'] = datePickerToDate($request->post('end_domain'));
        $result = DB::table($table)->updateOrInsert(['id' => $id], $data);
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
        $table = $this->table;
        $id = $request->post('id');
        $result = DB::table($table)->delete($id);
        if ($result) {
            $table_permission = 'permissions';
            DB::table($table_permission)->where('domain_id', $id)->delete();
        }
        return response()->json($result);
    }
}
