<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use PhpParser\JsonDecoder;
use Illuminate\Support\Str;
use App\Models\Style;

class StyleController extends Controller
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

        $view = 'backend.style.index';
        $url = url()->full();
        $title = 'เว็บสไตล์';
        $layout = 3;
        $limit = 6;
        $dataCss = DB::connection('db2')->table('settings')->get()->first();

        return view($view)->with(['url' => $url, 'title' => $title, 'layout' => $layout, 'limit' => $limit,'dataCss'=>$dataCss]);
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
     * @param \App\Models\Style $style
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $style = Style::all()->first();
        $style->bg_col = $request->input('bg_col');
        $style->bg_first_slide = $request->input('bg_first_slide');
        $style->bg_executive_menu = $request->input('bg_executive_menu');
        $style->bg_second_slide = $request->input('bg_second_slide');
        $style->bg_banner = $request->input('bg_banner');
        $style->bg_news_col = $request->input('bg_news_col');
        $style->bg_youtube = $request->input('bg_youtube');
        $style->bg_activity_layout = $request->input('bg_activity_layout');
        $style->bg_travel = $request->input('bg_travel');
        $style->bg_otop = $request->input('bg_otop');
        $style->bg_linkout = $request->input('bg_linkout');
        $style->bg_service = $request->input('bg_service');

        $style->font_col = $request->input('font_col');
        $style->web_logo_h = $request->input('web_logo_h');
        $style->web_nav_h = $request->input('web_nav_h');
        $style->web_nav_bgcol = $request->input('web_nav_bgcol');
        $style->layout_activity = $request->input('layout_activity');

        $style->marquee_text = $request->input('marquee_text');
        $style->web_m_col = $request->input('web_m_col');
        $style->web_m_fnt_col = $request->input('web_m_fnt_col');

        $style->menu_nav_col = $request->input('menu_nav_col');
        $style->menu_pnt_col = $request->input('menu_pnt_col');
        $style->menu_fnt_col = $request->input('menu_fnt_col');

        $style->layout_footer = $request->input('layout_footer');
        $style->layout_footer_add = $request->input('layout_footer_add');
        $style->layout_footer_tel = $request->input('layout_footer_tel');

        $style->layout_footer_col = $request->input('layout_footer_col');


        $style->fbchat_code = $request->input('fbchat_code');
        $style->fbpage_code = $request->input('fbpage_code');


        $style->save();
        return redirect()->route('style.index');
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

