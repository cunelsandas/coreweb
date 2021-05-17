<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

function getRouteName()
{
    $route_name = array();
    $result = array();
    foreach (Route::getRoutes()->getRoutes() as $route) {
        $action = $route->getAction();
        if (array_key_exists('as', $action)) {
            $route_name[] = current(explode('.', $action['as']));
        }
    }
    $route_name = array_unique($route_name);
    foreach ($route_name as $key => $val) {
        $result[] = $val;
    }
    return $result;
}

function getAllMenu($table_name, $menu_id = 0)
{
//    if where status = 1 backend/frontend show if status = 0 backend/frontend hidden fix by create another function getAllMenuFrontend
    $_data = array();
    $data = db2()->table($table_name)->select('id', 'name', 'url', 'target', 'type')->where('sub', '=', $menu_id)->orderBy('list', 'asc')->limit(9)->get();
    foreach ($data as $key => $val) {
        $_sub = db2()->table($table_name)->select('id', 'name', 'url', 'target', 'type')->where('sub', '=', $val->id)->orderBy('list', 'asc')->get();
        $_data[$key] = $val;
        $_data[$key]->sub = $_sub;
        foreach ($_sub as $index => $item) {
            $_sub2 = db2()->table($table_name)->select('id', 'name', 'url', 'target', 'type')->where('sub', '=', $item->id)->orderBy('list', 'asc')->get();
            $_data[$key]->sub[$index]->sub = $_sub2;
        }
    }
    return $_data;
}

function getAllMenuFrontend($table_name, $menu_id = 0)
{
//    if where status = 1 backend/frontend show if status = 0 backend/frontend hidden fix by create another function getAllMenuFrontend
    $_data = array();
    $data = db2()->table($table_name)->select('id', 'name', 'url', 'target', 'type')->where('sub', '=', $menu_id)->where('status','=',1)->orderBy('list', 'asc')->limit(10)->get();
    foreach ($data as $key => $val) {
        $_sub = db2()->table($table_name)->select('id', 'name', 'url', 'target', 'type')->where('sub', '=', $val->id)->where('status','=',1)->orderBy('list', 'asc')->get();
        $_data[$key] = $val;
        $_data[$key]->sub = $_sub;
        foreach ($_sub as $index => $item) {
            $_sub2 = db2()->table($table_name)->select('id', 'name', 'url', 'target', 'type')->where('sub', '=', $item->id)->where('status','=',1)->orderBy('list', 'asc')->get();
            $_data[$key]->sub[$index]->sub = $_sub2;
        }
    }
    return $_data;
}

function getWmsMenu()
{
    $table_name = 'modules';
    $data = array();
    $data = DB::table($table_name)->where('backend', '=', 1)->orderBy('list', 'asc')->get();
    return $data;
}

function getWmsMainMenu()
{
    $table_name = 'modules';
    $data = array();
    $data = DB::table($table_name)->where('backend', '=', 1)->where('type','=','main')->orderBy('list', 'asc')->get();
    return $data;
}

function getWmsEservice()
{
    $table_name = 'modules';
    $data = array();
    $data = DB::table($table_name)->where('backend', '=', 1)->where('type','=','eservice')->orderBy('list', 'asc')->get();

    return $data;
}

function getWmsPurchase()
{
    $table_name = 'modules';
    $data = array();
    $data = DB::table($table_name)->where('backend', '=', 1)->where('type','=','purchase')->orderBy('list', 'asc')->get();

    return $data;
}

function getWmsMultimedia()
{
    $table_name = 'modules';
    $data = array();
    $data = DB::table($table_name)->where('backend', '=', 1)->where('type','=','multimedia')->orderBy('list', 'asc')->get();

    return $data;
}

function getWmsSystem()
{
    $table_name = 'modules';
    $data = array();
    $data = DB::table($table_name)->where('backend', '=', 1)->where('type','=','system')->orderBy('list', 'asc')->get();

    return $data;
}

function getWmsAdmin()
{
    $table_name = 'modules';
    $data = array();
    $data = DB::table($table_name)->where('backend', '=', 1)->where('type','=','admin')->orderBy('list', 'asc')->get();

    return $data;
}

function getWmsFile()
{
    $table_name = 'modules';
    $data = array();
    $data = DB::table($table_name)->where('backend', '=', 1)->where('type','=','file')->orderBy('list', 'asc')->get();

    return $data;
}

function getDataCss()
{
    $dataCss = DB::connection('db2')->table('settings')->get();
    return $dataCss;
}

function getWmsModule($user_id)
{
    $table_name = 'modules';
    $_module = array();
    $modules = DB::table($table_name)->where('backend', '=', 1)->get();
    $_modules = array();
    foreach ($modules as $key => $value) {
        if ($value->manage_sub == 1) {
            $sub_modules = db2()->table($value->table_name)->get();
            foreach ($sub_modules as $k => $v) {
                $module['route_id'] = $value->id;
                $module['route_type'] = $v->id;
                $module['name'] = $v->name;
                $module['value'] = "$value->id,$v->id";
                $module['permission'] = db2()->table('permissions')->where(['user_id' => $user_id, 'module_id' => $value->id, 'type_id' => $v->id])->get()->count();
                $_modules[] = $module;
            }
        } else {
            $module['route_id'] = $value->id;
            $module['route_type'] = 0;
            $module['name'] = $value->name;
            $module['value'] = "$value->id,0";
            $module['permission'] = db2()->table('permissions')->where(['user_id' => $user_id, 'module_id' => $value->id, 'type_id' => 0])->get()->count();
            $_modules[] = $module;
        }
    }
    return $_modules;
}

function getFrontendModule()
{
    $table_name = 'modules';
    $modules = DB::table($table_name)->where('frontend', '=', 1)->get();
    $_modules = array();
    foreach ($modules as $key => $value) {
        if ($value->is_sub == 1) {
            $sub_modules = db2()->table($value->table_name)->get();
            foreach ($sub_modules as $k => $v) {
                $v->route_name = $value->route_name;
                $_modules[] = $v;
            }
        } else {
            $_modules[] = $value;
        }
    }
    $result = array();
    foreach ($_modules as $key => $value) { // set data
        $type = '';
        if (isset($value->type)) {
            $type = "/$value->type";
        }
        elseif ($value->type == 'eservice') {
            $type = "/";
        }
        elseif ($value->route_name == 'content') {
            $type = "/$value->type/$value->id";
        }

        elseif ($value->route_name == 'document') {
            $type = "/$value->type";
            $result[$key]['name'] = $value->name;
        }

        $result[$key]['name'] = $value->name;
        $result[$key]['url'] = "$value->route_name$type";
    }
    return $result;
}


function getModule($type = '')
{
    $table_name = 'modules';
    $route_name = current(explode('.', Route::current()->getName()));
    $module = DB::table($table_name)->select()->where(['route_name' => $route_name])->get()->first();
    $module_id = $module->id;
    $type_id = 0;
    if ($type != '') {
        $table_name = $module->table_name;
        $route = $module->route_name;
        $module = db2()->table($table_name)->select()->where(['type' => $type])->get()->first();
        if ($module) {
            $module->route_name = $route;
            $type_id = $module->id;
        }
    }
    if (!$module) {
        abort('404');
    }
    getPermissionModule($module_id, $type_id) ?: abort(403);
    return $module;
}

function getPermissionModule($module_id, $type_id = null)
{
    $route_check = current(explode('/', Route::current()->uri()));
    $table_name = 'permissions';
    if (!Auth::guard('admin')->check() && $route_check == 'wms') {
        $domain_id = config('app.domain_id');
        $permission = DB::table($table_name)->where(['domain_id' => $domain_id, 'module_id' => $module_id])->get()->first();
        $user_id = session('id');
        $where_permission = $type_id ? ['user_id' => $user_id, 'module_id' => $module_id, 'type_id' => $type_id] : ['user_id' => $user_id, 'module_id' => $module_id];
        $permission_sub = db2()->table($table_name)->where($where_permission)->get()->first();
        if (!$permission || !$permission_sub) {
            return false;
        }
    }
    return true;
}

function getStatistics($table_name, $where = null)
{
    $statistics = array();
    $last = db2()->table($table_name)->where($where)->orderByDesc('updated_at')->get()->first();
    $record = db2()->table($table_name)->where($where)->get()->count();
    $name = isset($last->name) ? $last->name : '';
    $id = isset($last->id) ? $last->id : '';
    $statistics = array(
        'record' => $record,
        'name' => $name,
        'id' => $id
    );
    return $statistics;
}

function getLayout($type = null)
{
    $table_name = 'modules';
    $route_name = current(explode('.', Route::current()->getName()));
    $module = DB::table($table_name)->where(['route_name' => $route_name, 'module_type' => $type])->get()->first();
    if (!$module) {
        abort('404');
    }
    return $module;
}

function datePickerToDate($date)
{
    if ($date != '') {
        $Date = explode('/', $date);
        return $Date[2] - 543 . '-' . $Date[1] . '-' . $Date[0];
    }
    return '0000-00-00';

}

function dateToDatePicker($strDate)
{
    if ($strDate != '') {
        list ($y, $m, $d) = explode('-', $strDate);
        return sprintf("%02d/%02d/%04d", $d, $m, $y + 543);
    }
}

function putFile($file, $image, $folder_name, $NAME = '')
{
    $upload_folder = config('app.upload_folder') . $folder_name . DIRECTORY_SEPARATOR;
    if (!is_dir($upload_folder)) {
        mkdir($upload_folder, 0777, true);
    }
    $files = array();

    $file = isset($file) ? $file : array();

    $_type_ex = array(
        'jpeg',
        'png',
        'php',
        'exe'
    );

    foreach ($file as $key => $val) {
        $file_name_ran = $NAME == '' ? Str::random(5) . date('s') . Str::random(5) . date('i') : $NAME;
//        $file_name_ran = $val->getClientOriginalName();  if want to get original name to upload /29/4/21
        $file_mime_type = $val->getClientMimeType();
        $file_extension = $val->clientExtension();
        $file_name = "$file_name_ran.$file_extension";
        if (!in_array($file_extension, $_type_ex)) {
            $_upload = $val->move($upload_folder, $file_name);
            if ($_upload) {
                $files[] = $file_name;
            }
        }
    }

    $images = array();

    $image = isset($image) ? $image : array();

    foreach ($image as $key => $val) {
        $file_name_ran = $NAME == '' ? Str::random(5) . date('s') . Str::random(5) . date('i') : $NAME;
        $item = explode(',', $val);
        $file_decode = base64_decode($item[1]);
        $extension = explode('.', $item[2]);
        $extension = strtolower(end($extension));
        $file_name = "$file_name_ran.$extension";
        $name_to_upload = "$upload_folder$file_name";
        $_upload = file_put_contents($name_to_upload, $file_decode);
        if ($_upload) {
            $images[] = $file_name;
        }
    }
    return array_merge($files, $images);
}

function folderSize ($dir)
{
    $size = 0;
    foreach (glob(rtrim($dir, '/').'/*', GLOB_NOSORT) as $each) {
        $size += is_file($each) ? filesize($each) : folderSize($each);
        //$size .=$each ."<br>";
    }
    return $size;
}

function formatBytes($size)
{
    $base = log($size) / log(1024);
    $suffix = array("", "KB", "MB", "GB", "TB");
    $f_base = floor($base);
    return round(pow(1024, $base - floor($base)), 1);//. $suffix[$f_base];
}

function getModulelist($type = '')
{
    $table_name = 'modules';
    $route_name = current(explode('.', Route::current()->getName()));
    $module = DB::table($table_name)->select()->where(['route_name' => $route_name])->get()->first();
    $module_id = $module->id;
    $type_id = 0;
    if ($type != '') {
        $table_name = $module->table_name;
        $route = $module->route_name;
        $module = db2()->table($table_name)->select()->where(['type' => $type])->get()->first();
        if ($module) {
            $module->route_name = $route;
            $type_id = $module->id;
        }
    }
    if (!$module) {
        abort('404');
    }
    getPermissionModule($module_id, $type_id) ?: abort(403);
    return $module;
}

function getWmstype()
{
    $table_name = 'modules';

    $modules = DB::table($table_name)->where([['backend', '=', 1],['frontend', '=', 1]])->get();
    $_modules = array();
    foreach ($modules as $key => $value) {
        if ($value->manage_sub == 1) {
            $sub_modules = db2()->table($value->table_name)->get();
            foreach ($sub_modules as $k => $v) {
                $module['module_id'] = $value->id;
                $module['type_id'] = $v->id;
                $module['name'] = $v->name;
                $module['table_name'] = $v->table_name;
                $_modules[] = $module;
            }
        } else {
            $module['module_id'] = $value->id;
            $module['type_id'] = 0;
            $module['name'] = $value->name;
            $module['table_name'] = $value->table_name;
            $_modules[] = $module;
        }
    }

    return $_modules;
}


function getPageStyle()
{
    $table_name = 'modules';

    $modules = DB::table($table_name)->where([['backend', '=', 1],['frontend', '=', 1]])->get();
    $_modules = array();
    foreach ($modules as $key => $value) {
        if ($value->manage_sub == 1) {
            $sub_modules = db2()->table($value->table_name)->get();
            foreach ($sub_modules as $k => $v) {
                $module['module_id'] = $value->id;
                $module['type_id'] = $v->id;
                $module['name'] = $v->name;
                $_modules[] = $module;
            }
        } else {
            $module['module_id'] = $value->id;
            $module['type_id'] = 0;
            $module['name'] = $value->name;
            $_modules[] = $module;
        }
    }

    return $_modules;
}

function formatDateThai($strDate)
{
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strHour= date("H",strtotime($strDate));
    $strMinute= date("i",strtotime($strDate));
    $strSeconds= date("s",strtotime($strDate));
    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear เวลา $strHour:$strMinute น.";
}

function formatDateThaionly($strDate)
{
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strHour= date("H",strtotime($strDate));
    $strMinute= date("i",strtotime($strDate));
    $strSeconds= date("s",strtotime($strDate));
    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear";
}

function getDomains($domains)
{
    $webURL = url('/');
    $parse = parse_url($webURL);
    $parseURL = $parse['host'];   //check url parse http and www

    $webname = Dashboard::all()
        ->where('domain_name','=',$parseURL);

    $webname = $webname->toArray('name');

    $domains = Dashboard::all()
        ->where('domain_name','=',$parseURL)
        ->sortKeysDesc();
    return $domains;
}

function strip_tags_content($text, $tags = '', $invert = FALSE) {

    preg_match_all('/<(.+?)[\s]*\/?[\s]*>/si', trim($tags), $tags);
    $tags = array_unique($tags[1]);

    if(is_array($tags) AND count($tags) > 0) {
        if($invert == FALSE) {
            return preg_replace('@<(?!(?:'. implode('|', $tags) .')\b)(\w+)\b.*?>.*?</\1>@si', '', $text);
        }
        else {
            return preg_replace('@<('. implode('|', $tags) .')\b.*?>.*?</\1>@si', '', $text);
        }
    }
    elseif($invert == FALSE) {
        return preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $text);
    }
    return $text;
}


