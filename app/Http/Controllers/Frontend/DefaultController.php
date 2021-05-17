<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Bannerlinkout;
use Carbon\Traits\Converter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SlideShow;
use App\Models\Bannerlink;
use App\Models\Youtube;
use App\Models\Dashboard;
use App\Models\Executive;
use App\Models\News;
use App\Models\Purchase;
use App\Models\Activity;
use App\Models\SlideShowNew;
use App\Models\Upload;


class DefaultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */

    public function index()
    {
        $dataCss = DB::connection('db2')->table('settings')->get()->first();

        $bgtitles = Activity::all()
            ->where('table_name','=', 'tb_bgtitle')
            ->sortKeysDesc();
//
//        $slideshows = SlideShow::all('file_name','table_name')
//            ->where('table_name','=','tb_slideshow')
//            ->sortKeysDesc();

        $webURL = url('/');
        $parse = parse_url($webURL);
        $parseURL = $parse['host'];   //check url parse http and www

        $webname = Dashboard::all()
            ->where('domain_name','=',$parseURL);

        $webname = $webname->toArray('name');

        $domains = Dashboard::all()
            ->where('domain_name','=',$parseURL)
            ->sortKeysDesc();



        $slideshows = DB::connection('db2')
            ->table('tb_slideshow')
            ->join('uploads','tb_slideshow.id','=','uploads.master_id')
            ->select('uploads.*','tb_slideshow.*')
            ->where('uploads.table_name','=','tb_slideshow')
            ->get();
        $slidenayokimgs = SlideShow::all('file_name','table_name')
            ->where('table_name','=','tb_nayok')
            ->slice(0,1)
            ->sortKeysDesc();

        $slidenayoknames = DB::connection('db2')
            ->table('tb_nayok')
            ->get();

        $slideshownews = SlideShowNew::all('file_name','table_name')
            ->where('table_name','=','tb_slideshow_news')
            ->sortKeysDesc();

        $table_name = db2()->table('pagestyles')->get('table_name');

        $test2 = '';
        foreach ($table_name as $key => $value){

            $test[$key][$value->table_name] = db2()->table($value->table_name)->get()->all();

        }
        $newsequals = DB::connection('db2')->table('uploads')
            ->select('master_id')
            ->where('table_name','=','tb_news')
            ->get();



        $news = DB::connection('db2')
            ->table('tb_news')
            ->join('uploads','tb_news.id','=','uploads.master_id')
            ->select('uploads.*','tb_news.*')
            ->where('uploads.table_name','=','tb_news')
            ->orderBy('uploads.created_at','DESC')
            ->get();

        $news = $news->unique('id');
        $news = array_slice($news->values()->all(),0,9,true);

        $jobs = DB::connection('db2')
            ->table('tb_job')
            ->join('uploads','tb_job.id','=','uploads.master_id')
            ->select('uploads.*','tb_job.*')
            ->where('uploads.table_name','=','tb_job')
            ->get();

        $jobs = $jobs->unique('id');
        $jobs = array_slice($jobs->values()->all(),0,9,true);

        $executive_menus = DB::connection('db2')
            ->table('tb_executive_menu')
            ->join('uploads','tb_executive_menu.id','=','uploads.master_id')
            ->select('uploads.*','tb_executive_menu.*')
            ->where('uploads.table_name','=','tb_executive_menu')
            ->get();

        $logos = DB::connection('db2')
            ->table('tb_logo')
            ->join('uploads','tb_logo.id','=','uploads.master_id')
            ->select('uploads.*','tb_logo.*')
            ->where('table_name', '=' , 'tb_logo')
            ->get();


        $banner_executive_menus = DB::connection('db2')
            ->table('tb_banner_executive')
            ->join('uploads','tb_banner_executive.id','=','uploads.master_id')
            ->select('uploads.*','tb_banner_executive.*')
            ->where('uploads.table_name','=','tb_banner_executive')
            ->get();

        $banner_executive_menus = $banner_executive_menus->where('status','=',1)->unique('id')->slice(0,7);

        $banner_upperside_menu_forphp = DB::connection('db2')
            ->table('tb_banner_upperside_menu')
            ->join('uploads','tb_banner_upperside_menu.id','=','uploads.master_id')
            ->select('uploads.*','tb_banner_upperside_menu.*')
            ->where('uploads.table_name','=','tb_banner_upperside_menu')
            ->get();
        $banner_upperside_menu_forphp = $banner_upperside_menu_forphp->where('status','=',1)->unique('id')->slice(0,7);

//        dd($banner_upperside_menu_forphp);

        $banner_shortcut = DB::connection('db2')
            ->table('tb_banner_shortcut')
            ->join('uploads','tb_banner_shortcut.id','=','uploads.master_id')
            ->select('uploads.*','tb_banner_shortcut.*')
            ->where('uploads.table_name','=','tb_banner_shortcut')
            ->get();

        $banner_shortcut = $banner_shortcut->where('status','=',1)->unique('id')->slice(0,6);

        $travels = DB::connection('db2')
            ->table('tb_travels')
            ->join('uploads','tb_travels.id','=','uploads.master_id')
            ->select('uploads.*','tb_travels.*')
            ->where('uploads.table_name','=','tb_travels')
            ->orderBy('uploads.created_at','DESC')
            ->get();

        $travels = $travels->unique('id');
        $travels = array_slice($travels->values()->all(),0,3,true);

        $otops = DB::connection('db2')
            ->table('tb_otops')
            ->join('uploads','tb_otops.id','=','uploads.master_id')
            ->select('uploads.*','tb_otops.*')
            ->where('uploads.table_name','=','tb_otops')
            ->orderBy('uploads.created_at','DESC')
            ->get();

        $otops = $otops->unique('id');
        $otops = array_slice($otops->values()->all(),0,3,true);

        $activitys = DB::connection('db2')
            ->table('tb_activitys')
            ->where('status','=','1')
            ->join('uploads','tb_activitys.id','=','uploads.master_id')
            ->select('uploads.*','tb_activitys.*')
            ->where('uploads.table_name','=','tb_activitys')
            ->orderBy('uploads.created_at','DESC')
            ->get();
        $activitys = $activitys->unique('id')->slice(0,6);


//        foreach ($activitys as $activity){
//            $activity->file_name = Upload::getRandomFile('tb_activitys', 'activity', $activity->id);
//        }
//         dd($activitys);

        //htmlspecialchars() expects parameter 1 to be string, array given





        $eservice = DB::connection('db2')
            ->table('tb_test_eservice')
            ->join('uploads','tb_test_eservice.id','=','uploads.master_id')
            ->select('uploads.*','tb_test_eservice.*')
            ->where('uploads.table_name','=','tb_test_eservice')
            ->get();

        $eservice = $eservice->where('status','=',1)->unique('id')->slice(0,9);

        $linkouts = DB::connection('db2')
            ->table('tb_linkout')
            ->join('uploads','tb_linkout.id','=','uploads.master_id')
            ->select('uploads.*','tb_linkout.*')
            ->where('uploads.table_name','=','tb_linkout')
            ->get();

//        for default php 2
        $purchase_groups = DB::connection('db2')->table('purchases')
            ->get();


// end for default php 2

        $purchases = DB::connection('db2')->table('purchase_new')
            ->where('status','=','1')
            ->get();

        $purchases_mid = DB::connection('db2')->table('purchase_mid')
            ->where('status','=','1')
            ->get();
        $purchases_sub = DB::connection('db2')->table('tb_purchase_sub')
            ->where('status','=','1')
            ->get();
        $purchases_result = DB::connection('db2')->table('tb_purchase_result')
            ->where('status','=','1')
            ->get();

        $newsphotos = News::all()
            ->where('table_name','=','tb_news')
            ->sortKeysDesc();


        $banners = SlideShow::all('file_name','table_name','link')
            ->where('table_name','=','tb_banner')
            ->sortKeysDesc();

        $bannerlinks = Bannerlink::all()
            ->where('id')
            ->sortKeysDesc();

        $bannerslos = SlideShow::all('file_name','table_name','link')
            ->where('table_name','=','tb_linkout')
            ->sortKeysDesc();

        $bannerlinksouts = Bannerlinkout::all()
            ->where('id')
            ->sortKeysDesc();


        $youtubes = Youtube::all()
            ->where('status', '=' , 1);

        $executives = DB::connection('db2')
            ->table('tb_executive')
            ->join('uploads','tb_executive.id','=','uploads.master_id')
            ->select('uploads.*','tb_executive.*')
            ->where('table_name', '=' , 'tb_executive')
            ->get();

        $finances = DB::connection('db2')
            ->table('documents')
            ->where('table_name','=','tb_finance')
            ->get();

        $finances = DB::connection('db2')
            ->table('tb_finance')
            ->join('documents','tb_finance.document_id','=','documents.id')
            ->select('documents.*','tb_finance.*')
            ->get();


        $engineers = DB::connection('db2')
            ->table('tb_engineer')
            ->join('documents','tb_engineer.document_id','=','documents.id')
            ->select('documents.*','tb_engineer.*')
            ->get();

        $munipacitys = DB::connection('db2')
            ->table('tb_municipality')
            ->join('documents','tb_municipality.document_id','=','documents.id')
            ->select('documents.*','tb_municipality.*')
            ->get();

        $socailwelfares = DB::connection('db2')
            ->table('tb_social_welfare')
            ->join('documents','tb_social_welfare.document_id','=','documents.id')
            ->select('documents.*','tb_social_welfare.*')
            ->get();

        $edications = DB::connection('db2')
            ->table('tb_education')
            ->join('documents','tb_education.document_id','=','documents.id')
            ->select('documents.*','tb_education.*')
            ->get();

        $healthcares = DB::connection('db2')
            ->table('tb_public_health')
            ->join('documents','tb_public_health.document_id','=','documents.id')
            ->select('documents.*','tb_public_health.*')
            ->get();


        // return view('frontend.default.index')->with('data', $data ,['slideshows'=>$slideshows]);

        $getstylecheck = DB::connection('db2')
            ->table('settings')
            ->first('style');

        if($getstylecheck->style == 1){
            return view('frontend.default.index',['slideshows'=>$slideshows,'banners'=>$banners,'bannerlinks'=>$bannerlinks,'youtubes'=>$youtubes ,
                'executives'=>$executives,'test'=>$test,'news'=>$news,'jobs'=>$jobs,'newsphotos'=>$newsphotos,'purchases'=>$purchases,'purchases_mid'=>$purchases_mid,
                'purchases_sub' => $purchases_sub, 'purchases_result'=>$purchases_result,'activitys'=>$activitys,'slideshownews'=>$slideshownews,
                'travels'=>$travels,'otops'=>$otops,'bgtitles'=>$bgtitles,'bannerslos'=>$bannerslos,'bannerlinksouts'=>$bannerlinksouts,'linkouts'=>$linkouts,
                'slidenayokimgs'=>$slidenayokimgs,'dataCss'=>$dataCss,'executive_menus'=>$executive_menus,'slidenayoknames'=>$slidenayoknames,'finances'=>$finances,
                'engineers'=>$engineers,'munipacitys'=>$munipacitys,'socailwelfares'=>$socailwelfares,'edications'=>$edications,'healthcares'=>$healthcares,'eservice'=>$eservice
                ,'banner_executive_menus' =>$banner_executive_menus,'banner_shortcut'=>$banner_shortcut,'webname'=>$webname,'logos'=>$logos,'domains'=>$domains])->with('data',$dataCss);
        }elseif($getstylecheck->style == 2){
            return view('frontend_layouts2.default_layout2.index',['slideshows'=>$slideshows,'banners'=>$banners,'bannerlinks'=>$bannerlinks,'youtubes'=>$youtubes ,
                'executives'=>$executives,'test'=>$test,'news'=>$news,'jobs'=>$jobs,'newsphotos'=>$newsphotos,'purchases'=>$purchases,'purchases_mid'=>$purchases_mid,
                'purchases_sub' => $purchases_sub, 'purchases_result'=>$purchases_result,'activitys'=>$activitys,'slideshownews'=>$slideshownews,
                'travels'=>$travels,'otops'=>$otops,'bgtitles'=>$bgtitles,'bannerslos'=>$bannerslos,'bannerlinksouts'=>$bannerlinksouts,'linkouts'=>$linkouts,
                'slidenayokimgs'=>$slidenayokimgs,'dataCss'=>$dataCss,'executive_menus'=>$executive_menus,'slidenayoknames'=>$slidenayoknames,'finances'=>$finances,
                'engineers'=>$engineers,'munipacitys'=>$munipacitys,'socailwelfares'=>$socailwelfares,'edications'=>$edications,'healthcares'=>$healthcares,'eservice'=>$eservice
                ,'banner_executive_menus' =>$banner_executive_menus,'banner_shortcut'=>$banner_shortcut,'webname'=>$webname,'logos'=>$logos,'domains'=>$domains,
                'purchase_groups'=>$purchase_groups,'banner_upperside_menu_forphp'=>$banner_upperside_menu_forphp])->with('data',$dataCss);
        }

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
    public function store(Request $request, $type)
    {
        //

        $module = getModule($type);

        $url = url()->full();

        $table_name = $module->table_name;
        $folder_name = $module->folder_name;
        if (!$request->has('id')):
            $search = $request->post('search');
            $page = $request->post('page');
            $limit = $request->post('limit');
            $data = db2()->table($table_name)
                ->where('name', 'LIKE', "%$search%")
                ->where('status',1)
                ->get()->forPage($page, $limit)->toArray();
            $pages = db2()->table($table_name)
                ->where('name', 'LIKE', "%$search%")
                ->where('status',1)
                ->get()->count();
            foreach ($data as $key => $val) {
                $val->list = $key + 1;
                $val->file = Upload::getRandomFile($table_name, $folder_name, $val->id);
                $val->_limit = $key % $limit;
                $val->detail = strip_tags($val->detail);
                $val->date_create = formatDateThaionly($val->date_create);
                $val->url = "$url/$val->id";
            }
            $pages = $pages == 0 ? 1 : ceil($pages / $limit);
            $statistics = getStatistics($table_name);
            $result = array(
                'data' => $data,
                'pages' => $pages,
                'statistics' => $statistics,
            );
        else:
            $id = $request->post('id');
            $data = isset($id) ? db2()->table($table_name)->find($id) : array();
            $_file = Upload::getFiles($table_name, $folder_name, $id);
            $result = array(
                'files' => $_file,
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

    public function getFile($folder_name,$file_name)
    {
        $system_path = config('app.upload_folder');
        $filePath = "$system_path$folder_name$file_name";
        if (!file_exists($filePath)) {
            $filePath = $system_path . 'no-photo.png';
        }
        return response()->file($filePath);
    }

    public function getFileByFolder($folder, $file_name)
    {
        $system_path = config('app.upload_folder');
        $filePath = $system_path . $folder . DIRECTORY_SEPARATOR . $file_name;
        if (!file_exists($filePath)) {
            $filePath = $system_path . 'no-photo.png';
        }
        return response()->file($filePath);
    }
}
