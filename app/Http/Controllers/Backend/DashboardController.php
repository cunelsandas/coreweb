<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Dashboard;
use App\Models\Activity;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param int $id
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        $webURL = url('/');
        $parse = parse_url($webURL);
        $parseURL = $parse['host'];   //check url parse http and www

//        $ds = disk_total_space("/");
//        dd($ds);

        $folder_calculate = folderSize(config('app.upload_folder')  . DIRECTORY_SEPARATOR);



//        $webname = DB::connection()->table('domains')->select('domain_name')->get('id');

        $firstDayofMonth = Carbon::now()->startOfMonth()->toDateString();
        $lastDayofMonth = Carbon::now()->endOfMonth()->toDateString();

        $firstDayofContact = Carbon::now()->startofday()->toDateString();
        $endDayofContact = Carbon::now()->endOfDay()->toDateString();

        $domains = Dashboard::all()
            ->where('domain_name','=',$parseURL)
            ->sortKeysDesc();

        $countactivitys = DB::connection('db2')->table('tb_activitys')
            ->whereBetween('created_at',[$firstDayofMonth, $lastDayofMonth])
            ->count();

        $countnew_m = DB::connection('db2')->table('tb_news')
            ->whereBetween('created_at',[$firstDayofMonth, $lastDayofMonth])
            ->count();
        $countnewalls = DB::connection('db2')->table('tb_news')->count();

        $countmissions_m = DB::connection('db2')->table('tb_missions')
            ->whereBetween('created_at',[$firstDayofMonth, $lastDayofMonth])
            ->count();
        $countmissionalls = DB::connection('db2')->table('tb_missions')->count();

        $counttravel_m = DB::connection('db2')->table('tb_travels')
            ->whereBetween('created_at',[$firstDayofMonth, $lastDayofMonth])
            ->count();
        $counttravelalls = DB::connection('db2')->table('tb_travels')->count();

        $countotop_m = DB::connection('db2')->table('tb_otops')
            ->whereBetween('created_at',[$firstDayofMonth, $lastDayofMonth])
            ->count();
        $countotopalls = DB::connection('db2')->table('tb_otops')->count();
        $counthelpmealls = DB::connection('db2')->table('helpmes')->count();
        $countcorruptionalls = DB::connection('db2')->table('tb_corruption')->count();
        $countpaytaxalls = DB::connection('db2')->table('tb_paytax')->count();


        $countphotoactivitys = Activity::all()
            ->where('table_name','=','tb_activitys')
            ->whereBetween('created_at',[$firstDayofMonth, $lastDayofMonth])
            ->count();
        $countphotomissions = DB::connection('db2')->table('uploads')
            ->where('table_name','=','tb_mission')
            ->whereBetween('created_at',[$firstDayofMonth, $lastDayofMonth])
            ->count();
        $countphototravels = DB::connection('db2')->table('uploads')
            ->where('table_name','=','tb_travel')
            ->whereBetween('created_at',[$firstDayofMonth, $lastDayofMonth])
            ->count();
        $countphotobanners = DB::connection('db2')->table('uploads')
            ->where('table_name','=','tb_banner')
            ->whereBetween('created_at',[$firstDayofMonth, $lastDayofMonth])
            ->count();
        $countphotonews = DB::connection('db2')->table('uploads')
            ->where('table_name','=','tb_news')
            ->whereBetween('created_at',[$firstDayofMonth, $lastDayofMonth])
            ->count();
        $countyoutubes = DB::connection('db2')->table('youtubes')
            ->whereBetween('created_at',[$firstDayofMonth, $lastDayofMonth])
            ->count();

        $countactivityalls = DB::connection('db2')->table('tb_activitys')
            ->count();

        $countphotoactivityalls = Activity::all()
            ->where('table_name','=','tb_activitys')
            ->count();
        $countphotomissionalls = DB::connection('db2')->table('uploads')
            ->where('table_name','=','tb_mission')
            ->count();
        $countphototravelalls = DB::connection('db2')->table('uploads')
            ->where('table_name','=','tb_travel')
            ->count();
        $countphotobanneralls = DB::connection('db2')->table('uploads')
            ->where('table_name','=','tb_banner')
            ->count();
        $countphotonewalls = DB::connection('db2')->table('uploads')
            ->where('table_name','=','tb_news')
            ->count();
        $countyoutubealls = DB::connection('db2')->table('youtubes')
            ->count();


        return view('backend.dashboard.index', ['title' => 'Dash Board','domains'=>$domains,'countactivitys'=>$countactivitys,
            'countnew_m'=>$countnew_m,'countnewalls'=>$countnewalls,'countmissions_m'=>$countmissions_m,'countmissionalls'=>$countmissionalls,'counttravel_m'=>$counttravel_m,
            'counttravelalls'=>$counttravelalls,'countotop_m'=>$countotop_m,'countotopalls'=>$countotopalls,'counthelpmealls'=>$counthelpmealls,
            'countcorruptionalls'=>$countcorruptionalls,'countpaytaxalls'=>$countpaytaxalls,'countphotoactivitys'=>$countphotoactivitys,'countphototravels'=>$countphototravels,
            'countphotomissions'=>$countphotomissions, 'countphotobanners'=>$countphotobanners,'countphotonews'=>$countphotonews,
            'countyoutubes'=>$countyoutubes,'firstDayofMonth'=>$firstDayofMonth, 'lastDayofMonth'=>$lastDayofMonth,'firstDayofContact'=>$firstDayofContact,
            'endDayofContact'=>$endDayofContact, 'countactivityalls'=>$countactivityalls,'countphotoactivityalls'=>$countphotoactivityalls,
            'countphotomissionalls'=>$countphotomissionalls,'countphototravelalls'=>$countphototravelalls,'countphotobanneralls'=>$countphotobanneralls,
            'countphotonewalls'=>$countphotonewalls,'countyoutubealls'=>$countyoutubealls,'folder_calculate'=>$folder_calculate]);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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
