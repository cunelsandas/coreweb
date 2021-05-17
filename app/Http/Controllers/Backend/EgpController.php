<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Egp;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use PhpParser\JsonDecoder;
use Illuminate\Support\Str;
use App\Models\Style;

class EgpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //

        $view = 'backend.egp.index';
        $url = url()->full();
        $title = 'จัดซื้อจัดจ้าง EGP';
        $layout = 3;
        $limit = 6;
        $dataEgp = DB::connection('db2')->table('egp_code')->get()->first();

        return view($view)->with(['url' => $url, 'title' => $title, 'layout' => $layout, 'limit' => $limit,'dataEgp'=>$dataEgp]);
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
    public function store(Request $request)
    {


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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Egp $egp
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $egp = Egp::all()->first();
        $egp->egp_code = $request->input('egp_code');

        $egp->save();
        return redirect()->route('egp.index');
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

    }
}

