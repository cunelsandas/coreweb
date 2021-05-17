<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;

class Upload extends Model
{
    //
    protected $connection = 'db2';

    protected $fillable = [
        'file_name', 'table_name', 'master_id', 'folder_name','link'
    ];

    protected $hidden = [
//        'id',
    ];

    public static function insertFile($files, $id, $table_name, $folder_name,$link = '')
    {
        foreach ($files as $key => $val) {
            $at_time = date('Y-m-d H:i:s');
            $result = self::create([
                'file_name' => $val,
                'table_name' => $table_name,
                'folder_name' => $folder_name,
                'link' => $link,
                'master_id' => $id,
                'create_at' => $at_time
            ]);
        }
        return $result;
    }

    public static function deleteFile($file)
    {
        $system_path = config('app.upload_folder');
        $result = true;
        foreach ($file as $key => $val) {
            $folder = $val['folder_name'] != '' ? $val['folder_name'] . DIRECTORY_SEPARATOR : '';
            $filePath = $system_path . $folder . $val['file_name'];
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $result = self::where(['id' => $val['id']])->delete();
        }
        return $result;
    }

    public static function getFiles($table_name, $folder_name, $master_id)
    {
        $files = array();
        $_file = Upload::where(['table_name' => $table_name, 'master_id' => $master_id])->get()->toArray();
        foreach ($_file as $key => $val) {
            $url = "upload/{$folder_name}/{$val['file_name']}";
            $extension = last(explode('.', $val['file_name']));
            $_type = 'img';
            if ($extension != 'png' && $extension != 'gif' && $extension != 'jpg' && $extension != 'jpeg') {
                $_type = 'file';
            }
            $files[$_type][$key] = [
                'id' => $val['id'],
                'url' => url($url),
                'name' => $val['file_name'],
                'type' => $extension
            ];
        }
        return $files;
    }

    public static function getRandomFile($table_name, $folder_name, $master_id)
    {
        $files = array();
        $_file = Upload::where(['table_name' => $table_name, 'master_id' => $master_id])->inRandomOrder()->first();
        if ($_file):
            $url = "upload/{$folder_name}/{$_file['file_name']}";
            $extension = last(explode('.', $_file['file_name']));
            $_type = true;
            if ($extension != 'png' && $extension != 'gif' && $extension != 'jpg' && $extension != 'jpeg') {
                $_type = false;
            }
            $files = [
                'url' => url($url),
                'name' => $_file['file_name'],
                'type' => $extension,
                'img' => $_type
            ];
        endif;
        return $files;
    }
}
