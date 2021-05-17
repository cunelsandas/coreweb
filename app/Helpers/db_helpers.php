<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

function db2()
{
    return DB::connection('db2');
}

function dbisp()
{
    return DB::connection('isp');
}

function createTableDB2($name, $type)
{
    if (!Schema::connection('db2')->hasTable($name)) {
        if ($type == 'catalog') {
            Schema::connection('db2')->create($name, function ($table) {
                $table->increments('id');
                $table->string('name', 255);
                $table->date('date_create')->default(DB::raw('CURRENT_TIMESTAMP'));
                $table->text('detail')->nullable(true)->change;
                $table->string('link', 255)->nullable(true)->change;
                $table->text('tag');
                $table->integer('status');
                $table->timestamps();
            });
        } elseif ($type == 'purchase') {
            Schema::connection('db2')->create($name, function ($table) {
                $table->increments('id');
                $table->integer('purchase_id');
                $table->string('name', 255);
                $table->text('detail')->nullable(true)->change;;
                $table->integer('status');
                $table->timestamps();
            });
        } elseif ($type == 'document') {
            Schema::connection('db2')->create($name, function ($table) {
                $table->increments('id');
                $table->integer('document_id');
                $table->string('name', 255);
                $table->text('detail');
                $table->integer('status');
                $table->timestamps();
            });
        } elseif ($type == 'officer') {
            Schema::connection('db2')->create($name, function ($table) {
                $table->increments('id');
                $table->integer('officer_id');
                $table->string('name', 255);
                $table->string('position', 255);
                $table->integer('block');
                $table->text('detail');
                $table->integer('list');
                $table->integer('status');
                $table->timestamps();
            });
        } elseif ($type == 'menu') {
            Schema::connection('db2')->create($name, function ($table) {
                $table->increments('id');
                $table->string('name', 255);
                $table->string('url', 255);
                $table->integer('sub');
                $table->integer('target');
//                $table->integer('target');
                $table->integer('type');
                $table->integer('list');
                $table->integer('status');
                $table->timestamps();
            });
        } elseif ($type == 'eservice') {
            Schema::connection('db2')->create($name, function ($table) {
                $table->increments('id');
                $table->string('name', 255);
                $table->text('detail')->nullable(true)->change;
                $table->string('link', 255)->nullable(true)->change;
                $table->string('linkout', 255)->nullable(true)->change;
                $table->integer('status');
                $table->timestamps();
            });
        }
    }
}
//function db3()
//{
//    return DB::connection('db3');
//}
//
//function createTableDB3($name, $type)
//{
//    if (!Schema::connection('db3')->hasTable($name)) {
//        if ($type == 'catalog') {
//            Schema::connection('db3')->create($name, function ($table) {
//                $table->increments('id');
//                $table->string('name', 255);
//                $table->text('detail');
//                $table->integer('status');
//                $table->timestamps();
//            });
//        } elseif ($type == 'purchase') {
//            Schema::connection('db3')->create($name, function ($table) {
//                $table->increments('id');
//                $table->integer('purchase_id');
//                $table->string('name', 255);
//                $table->text('detail');
//                $table->integer('status');
//                $table->timestamps();
//            });
//        } elseif ($type == 'document') {
//            Schema::connection('db3')->create($name, function ($table) {
//                $table->increments('id');
//                $table->integer('document_id');
//                $table->string('name', 255);
//                $table->text('detail');
//                $table->integer('status');
//                $table->timestamps();
//            });
//        } elseif ($type == 'officer') {
//            Schema::connection('db3')->create($name, function ($table) {
//                $table->increments('id');
//                $table->integer('officer_id');
//                $table->string('name', 255);
//                $table->string('position', 255);
//                $table->integer('block');
//                $table->text('detail');
//                $table->integer('list');
//                $table->integer('status');
//                $table->timestamps();
//            });
//        } elseif ($type == 'menu') {
//            Schema::connection('db3')->create($name, function ($table) {
//                $table->increments('id');
//                $table->string('name', 255);
//                $table->string('url', 255);
//                $table->integer('sub');
//                $table->integer('target');
//                $table->integer('target');
//                $table->integer('type');
//                $table->integer('list');
//                $table->integer('status');
//                $table->timestamps();
//            });
//        }
//    }
//}

function createFolder($name)
{
    $upload_folder = config('app.upload_folder') . $name;
    if (!is_dir($upload_folder)) {
        return mkdir($upload_folder, 0777, true);
    }
    return false;
}
