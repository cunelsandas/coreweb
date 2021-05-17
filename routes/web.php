<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*Route::get('/', function () {
    return view('welcome');
});*/

/*TODO Frontend Route*/

/*Route Index*/

use Illuminate\Support\Facades\Route;

Route::get('/', 'Frontend\DefaultController@index');

Route::get('/index1', 'Frontend\DefaultController@index1');

/*Route View Img*/
Route::get('upload/{filename}/{folder}', 'Frontend\UploadsController@getFileByFolder');
Route::get('img/{filename}', 'Frontend\UploadsController@getFile');
Route::delete('unset', 'Frontend\UploadsController@destroy');

/*Route Tiny*/
Route::post('tiny', 'Backend\TinyController@upload');

/*Route Catalog*/
Route::name('catalog.')->namespace('Frontend')->prefix('catalog/{type}')->group(function () {
    Route::get('', 'CatalogController@index')->name('index');
    Route::get('{id}', 'CatalogController@show')->name('show');
    Route::post('', 'CatalogController@store')->name('store');
    Route::put('{id}', 'CatalogController@update')->name('update');
    Route::delete('{id}', 'CatalogController@destroy')->name('destroy');
});

/*Route Travel*/
Route::name('travel.')->namespace('Frontend')->prefix('travel/{type}')->group(function () {
    Route::get('', 'TravelController@index')->name('index');
    Route::get('{id}', 'TravelController@show')->name('show');
    Route::post('', 'TravelController@store')->name('store');
    Route::put('{id}', 'TravelController@update')->name('update');
    Route::delete('{id}', 'TravelController@destroy')->name('destroy');
});

/*Route E-service*/
Route::name('eservice.')->namespace('Frontend')->prefix('eservice/{type}')->group(function () {
    Route::get('', 'EserviceController@index')->name('index');
    Route::get('{id}', 'EserviceController@show')->name('show');
    Route::post('', 'EserviceController@store')->name('store');
    Route::put('{id}', 'EserviceController@update')->name('update');
    Route::delete('{id}', 'EserviceController@destroy')->name('destroy');
});

/*Route Content*/
Route::name('content.')->namespace('Frontend')->prefix('content/{type}')->group(function () {
    Route::get('', 'ContentController@index')->name('index');
    Route::get('{id}', 'ContentController@show')->name('show');
    Route::post('', 'ContentController@store')->name('store');
    Route::put('{id}', 'ContentController@update')->name('update');
    Route::delete('{id}', 'ContentController@destroy')->name('destroy');
});

Route::name('document.')->namespace('Frontend')->prefix('document/{type}')->group(function () {
    Route::get('', 'DocumentController@index')->name('index');
    Route::post('', 'DocumentController@store')->name('store');
    Route::get('{id}', 'DocumentController@show')->name('show');
    Route::put('', 'DocumentController@update')->name('update');
    Route::delete('', 'DocumentController@destroy')->name('destroy');
});

/*Route Purchase*/
Route::name('purchase.')->namespace('Frontend')->prefix('purchase/{type}')->group(function () {
    Route::get('', 'PurchaseController@index')->name('index');
    Route::post('', 'PurchaseController@store')->name('store');
    Route::get('{id}', 'PurchaseController@show')->name('show');
    Route::put('', 'PurchaseController@update')->name('update');
    Route::delete('', 'PurchaseController@destroy')->name('destroy');
});

/*Route youtube*/
Route::name('youtube.')->namespace('Frontend')->prefix('youtube')->group(function () {
    Route::get('', 'YoutubeController@index')->name('index');
    Route::post('', 'YoutubeController@store')->name('store');
    Route::get('{id}', 'YoutubeController@show')->name('show');
    Route::put('', 'YoutubeController@update')->name('update');
    Route::delete('', 'YoutubeController@destroy')->name('destroy');
});

/*Route Officer*/
Route::name('officer.')->namespace('Frontend')->prefix('officer/{type}')->group(function () {
    Route::get('', 'OfficerController@index')->name('index');
    Route::post('', 'OfficerController@store')->name('store');
    Route::get('{id}', 'OfficerController@show')->name('show');
    Route::put('', 'OfficerController@update')->name('update');
    Route::delete('', 'OfficerController@destroy')->name('destroy');
});

Route::name('ita')->namespace('Frontend')->prefix('ita')->group(function () {
    Route::get('', 'ItaController@index')->name('index');
    Route::post('', 'ItaController@store')->name('store');
    Route::get('', 'ItaController@show')->name('show');
    Route::put('', 'ItaController@update')->name('update');
    Route::delete('', 'ItaController@destroy')->name('destroy');
});

/*Route Helpme*/
Route::name('helpme.')->namespace('Frontend')->prefix('helpme/eservice')->group(function () {
    Route::get('', 'HelpmeController@index')->name('index');
    Route::post('', 'HelpmeController@store')->name('store');
    Route::get('{id}', 'HelpmeController@show')->name('show');
    Route::put('', 'HelpmeController@update')->name('update');
    Route::delete('', 'HelpmeController@destroy')->name('destroy');
});


/*Route Corruption*/
Route::name('corruption.')->namespace('Frontend')->prefix('corruption/eservice')->group(function () {
    Route::get('', 'CorruptionController@index')->name('index');
    Route::post('', 'CorruptionController@store')->name('store');
    Route::get('{id}', 'CorruptionController@show')->name('show');
    Route::put('', 'CorruptionController@update')->name('update');
    Route::delete('', 'CorruptionController@destroy')->name('destroy');
});

/*Route Paytax*/
Route::name('paytax.')->namespace('Frontend')->prefix('paytax/eservice')->group(function () {
    Route::get('', 'PaytaxController@index')->name('index');
    Route::post('', 'PaytaxController@store')->name('store');
    Route::get('{id}', 'PaytaxController@show')->name('show');
    Route::put('', 'PaytaxController@update')->name('update');
    Route::delete('', 'PaytaxController@destroy')->name('destroy');
});

/*Route Queue Frontend*/
Route::name('queue.')->namespace('Frontend')->prefix('queue/eservice')->group(function () {
    Route::get('', 'QueueController@index')->name('index');
    Route::post('', 'QueueController@store')->name('store');
    Route::get('{id}', 'QueueController@show')->name('show');
    Route::put('', 'QueueController@update')->name('update');
    Route::delete('', 'QueueController@destroy')->name('destroy');
});

/*Route Electric*/
Route::name('electric.')->namespace('Frontend')->prefix('electric/eservice')->group(function () {
    Route::get('', 'ElectricController@index')->name('index');
    Route::post('', 'ElectricController@store')->name('store');
    Route::get('{id}', 'ElectricController@show')->name('show');
    Route::put('', 'ElectricController@update')->name('update');
    Route::delete('', 'ElectricController@destroy')->name('destroy');
});

/*Route Waterwork*/
Route::name('waterwork.')->namespace('Frontend')->prefix('waterwork/eservice')->group(function () {
    Route::get('', 'WaterworkController@index')->name('index');
    Route::post('', 'WaterworkController@store')->name('store');
    Route::get('{id}', 'WaterworkController@show')->name('show');
    Route::put('', 'WaterworkController@update')->name('update');
    Route::delete('', 'WaterworkController@destroy')->name('destroy');
});

/*Route Accident*/
Route::name('accident.')->namespace('Frontend')->prefix('accident/eservice')->group(function () {
    Route::get('', 'AccidentController@index')->name('index');
    Route::post('', 'AccidentController@store')->name('store');
    Route::get('{id}', 'AccidentController@show')->name('show');
    Route::put('', 'AccidentController@update')->name('update');
    Route::delete('', 'AccidentController@destroy')->name('destroy');
});


/*TODO Backend Route*/
/*Route Login Logout WMS*/
Route::name('wms.')->prefix('wms')->namespace('CustomLogin')->group(function () {
    Route::get('', 'LoginController@UserIndex')->name('login');
    Route::post('', 'LoginController@CheckUserLogin')->name('checkuserlogin');
});

Route::get('logout', 'CustomLogin\LoginController@logout')->name('logout');

/*Route WMS*/
Route::prefix('wms')->group(function () {
    /*Route Dashboard*/
    Route::name('dashboard.')->namespace('Backend')->middleware('auth')->prefix('dashboard')->group(function () {
        Route::get('', 'DashboardController@index')->name('index');
        Route::get('{id}', 'DashboardController@show')->name('show');
        Route::post('', 'DashboardController@store')->name('store');
        Route::put('{id}', 'DashboardController@update')->name('update');
        Route::delete('{id}', 'DashboardController@destroy')->name('destroy');
    });

    Route::name('document_type.')->namespace('Backend')->middleware('auth')->prefix('document_type')->group(function () {
        Route::get('', 'DocumenttypeController@index')->name('index');
        Route::get('{id}', 'DocumenttypeController@show')->name('show');
        Route::post('', 'DocumenttypeController@store')->name('store');
        Route::post('{id}', 'DocumenttypeController@update')->name('update');
        Route::delete('{id}', 'DocumenttypeController@destroy')->name('destroy');
    });

    /*Route Documentadd*/
    Route::name('document_add.')->namespace('Backend')->middleware('auth')->prefix('document_add')->group(function () {
        Route::get('', 'DocumentaddController@index')->name('index');
        Route::post('', 'DocumentaddController@store')->name('store');
        Route::post('/empty', 'DocumentaddController@checkEmpty')->name('checkEmpty');
        Route::put('', 'DocumentaddController@update')->name('update');
        Route::delete('', 'DocumentaddController@destroy')->name('destroy');
    });

    /*Route Catalogs*/
    Route::name('catalog.')->namespace('Backend')->middleware('auth')->prefix('catalog/{type}')->group(function () {
        Route::get('', 'CatalogController@index')->name('index');
        Route::post('', 'CatalogController@store')->name('store');
        Route::get('{id}', 'CatalogController@show')->name('show');
        Route::put('', 'CatalogController@update')->name('update');
        Route::delete('', 'CatalogController@destroy')->name('destroy');
    });

    /*Route Travel*/
    Route::name('travel.')->namespace('Backend')->middleware('auth')->prefix('travel/{type}')->group(function () {
        Route::get('', 'TravelController@index')->name('index');
        Route::post('', 'TravelController@store')->name('store');
        Route::get('{id}', 'TravelController@show')->name('show');
        Route::put('', 'TravelController@update')->name('update');
        Route::delete('', 'TravelController@destroy')->name('destroy');
    });

    /*Route Eservice*/
    Route::name('eservice.')->namespace('Backend')->middleware('auth')->prefix('eservice/{type}')->group(function () {
        Route::get('', 'EserviceController@index')->name('index');
        Route::post('', 'EserviceController@store')->name('store');
        Route::get('{id}', 'EserviceController@show')->name('show');
        Route::put('', 'EserviceController@update')->name('update');
        Route::delete('', 'EserviceController@destroy')->name('destroy');
    });

    /*Route Documents*/
    Route::name('document.')->namespace('Backend')->middleware('auth')->prefix('document/{type}')->group(function () {
        Route::get('', 'DocumentController@index')->name('index');
        Route::post('', 'DocumentController@store')->name('store');
        Route::get('{id}', 'DocumentController@show')->name('show');
        Route::put('', 'DocumentController@update')->name('update');
        Route::delete('', 'DocumentController@destroy')->name('destroy');
    });

    /*Route Purchase*/
    Route::name('purchase.')->namespace('Backend')->middleware('auth')->prefix('purchase/{type}')->group(function () {
        Route::get('', 'PurchaseController@index')->name('index');
        Route::post('', 'PurchaseController@store')->name('store');
        Route::get('{id}', 'PurchaseController@show')->name('show');
        Route::put('', 'PurchaseController@update')->name('update');
        Route::delete('', 'PurchaseController@destroy')->name('destroy');
    });

    /*Route Officer*/
    Route::name('officer.')->namespace('Backend')->middleware('auth')->prefix('officer/{type}')->group(function () {
        Route::get('', 'OfficerController@index')->name('index');
        Route::post('', 'OfficerController@store')->name('store');
        Route::get('{id}', 'OfficerController@show')->name('show');
        Route::put('', 'OfficerController@update')->name('update');
        Route::delete('', 'OfficerController@destroy')->name('destroy');
    });

    /*Route Content*/
    Route::name('content.')->namespace('Backend')->middleware('auth')->prefix('content')->group(function () {
        Route::get('', 'ContentController@index')->name('index');
        Route::post('', 'ContentController@store')->name('store');
        Route::get('{id}', 'ContentController@show')->name('show');
        Route::put('', 'ContentController@update')->name('update');
        Route::delete('', 'ContentController@destroy')->name('destroy');
    });

    /*Route Youtube*/
    Route::name('youtube.')->namespace('Backend')->middleware('auth')->prefix('youtube')->group(function () {
        Route::get('', 'YoutubeController@index')->name('index');
        Route::post('', 'YoutubeController@store')->name('store');
        Route::get('{id}', 'YoutubeController@show')->name('show');
        Route::put('', 'YoutubeController@update')->name('update');
        Route::delete('', 'YoutubeController@destroy')->name('destroy');
    });

    /*Route Menu*/
    Route::name('menu.')->namespace('Backend')->middleware('auth')->prefix('menu/{type}')->group(function () {
        Route::get('', 'MenuController@index')->name('index');
        Route::post('', 'MenuController@store')->name('store');
        Route::get('{id}', 'MenuController@show')->name('show');
        Route::put('', 'MenuController@update')->name('update');
        Route::delete('', 'MenuController@destroy')->name('destroy');
    });

    /*Route Module*/
    Route::name('module.')->namespace('Backend')->middleware('auth')->prefix('module')->group(function () {
        Route::get('', 'ModuleController@index')->name('index');
        Route::post('', 'ModuleController@store')->name('store');
        Route::post('/empty', 'ModuleController@checkEmpty')->name('checkEmpty');
        Route::put('', 'ModuleController@update')->name('update');
        Route::delete('', 'ModuleController@destroy')->name('destroy');
    });

    /*Route User*/
    Route::name('user.')->namespace('Backend')->middleware('auth')->prefix('user')->group(function () {
        Route::get('', 'UserController@index')->name('index');
        Route::post('', 'UserController@store')->name('store');
        Route::get('{id}', 'UserController@show')->name('show');
        Route::put('', 'UserController@update')->name('update');
        Route::delete('', 'UserController@destroy')->name('destroy');
    });

    /*Route Permission Manage*/
    Route::name('permission.')->namespace('Backend')->middleware('auth')->prefix('permission')->group(function () {
        Route::get('', 'PermissionController@index')->name('index');
        Route::post('', 'PermissionController@store')->name('store');
        Route::put('', 'PermissionController@update')->name('update');
        Route::delete('', 'PermissionController@destroy')->name('destroy');
    });

    /*Route Page Style*/
    Route::name('pagestyle.')->namespace('Backend')->middleware('auth')->prefix('pagestyle')->group(function () {
        Route::get('', 'PagestyleController@index')->name('index');
        Route::post('', 'PagestyleController@store')->name('store');
        Route::post('/empty', 'PagestyleController@checkEmpty')->name('checkEmpty');
        Route::put('', 'PagestyleController@update')->name('update');
        Route::delete('', 'PagestyleController@destroy')->name('destroy');
    });

    /*Route Style*/
    Route::name('style.')->namespace('Backend')->middleware('auth')->prefix('style')->group(function () {
        Route::get('', 'StyleController@index')->name('index');
        Route::post('', 'StyleController@store')->name('store');
        Route::post('/empty', 'StyleController@checkEmpty')->name('checkEmpty');
        Route::put('', 'StyleController@update')->name('update');
        Route::delete('', 'StyleController@destroy')->name('destroy');
    });

    /*Route EGP*/
    Route::name('egp.')->namespace('Backend')->middleware('auth')->prefix('egp')->group(function () {
        Route::get('', 'EgpController@index')->name('index');
        Route::post('', 'EgpController@store')->name('store');
        Route::post('/empty', 'EgpController@checkEmpty')->name('checkEmpty');
        Route::put('', 'EgpController@update')->name('update');
        Route::delete('', 'EgpController@destroy')->name('destroy');
    });

    Route::name('ita')->namespace('Frontend')->prefix('ita')->group(function () {
        Route::get('', 'ItaController@index')->name('index');
        Route::post('', 'ItaController@store')->name('store');
        Route::get('', 'ItaController@show')->name('show');
        Route::put('', 'ItaController@update')->name('update');
        Route::delete('', 'ItaController@destroy')->name('destroy');
    });

    /*Route Helpme*/
    Route::name('helpme.')->namespace('Backend')->middleware('auth')->prefix('helpme')->group(function () {
        Route::get('', 'HelpmeController@index')->name('index');
        Route::post('', 'HelpmeController@store')->name('store');
        Route::get('{id}', 'HelpmeController@show')->name('show');
        Route::put('', 'HelpmeController@update')->name('update');
        Route::delete('', 'HelpmeController@destroy')->name('destroy');
    });

    /*Route Corruption*/
    Route::name('corruption.')->namespace('Backend')->middleware('auth')->prefix('corruption')->group(function () {
        Route::get('', 'CorruptionController@index')->name('index');
        Route::post('', 'CorruptionController@store')->name('store');
        Route::get('{id}', 'CorruptionController@show')->name('show');
        Route::put('', 'CorruptionController@update')->name('update');
        Route::delete('', 'CorruptionController@destroy')->name('destroy');
    });

    /*Route Paytax*/
    Route::name('paytax.')->namespace('Backend')->middleware('auth')->prefix('paytax')->group(function () {
        Route::get('', 'PaytaxController@index')->name('index');
        Route::post('', 'PaytaxController@store')->name('store');
        Route::get('{id}', 'PaytaxController@show')->name('show');
        Route::put('', 'PaytaxController@update')->name('update');
        Route::delete('', 'PaytaxController@destroy')->name('destroy');
    });
    /*Route Questionnaire*/
    Route::name('questionnaire.')->namespace('Backend')->middleware('auth')->prefix('questionnaire')->group(function () {
        Route::get('', 'QuestionnaireController@index')->name('index');
        Route::post('', 'QuestionnaireController@store')->name('store');
        Route::get('{id}', 'QuestionnaireController@show')->name('show');
        Route::put('', 'QuestionnaireController@update')->name('update');
        Route::delete('', 'QuestionnaireController@destroy')->name('destroy');
    });
    /*Route Queue Backend*/
    Route::name('queue.')->namespace('Backend')->middleware('auth')->prefix('queue')->group(function () {
        Route::get('', 'QueueController@index')->name('index');
        Route::post('', 'QueueController@store')->name('store');
        Route::get('{id}', 'QueueController@show')->name('show');
        Route::put('', 'QueueController@update')->name('update');
        Route::delete('', 'QueueController@destroy')->name('destroy');
    });
    /*Route Electric*/
    Route::name('electric.')->namespace('Backend')->middleware('auth')->prefix('electric')->group(function () {
        Route::get('', 'ElectricController@index')->name('index');
        Route::post('', 'ElectricController@store')->name('store');
        Route::get('{id}', 'ElectricController@show')->name('show');
        Route::put('', 'ElectricController@update')->name('update');
        Route::delete('', 'ElectricController@destroy')->name('destroy');
    });
    /*Route Waterwork*/
    Route::name('waterwork.')->namespace('Backend')->middleware('auth')->prefix('waterwork')->group(function () {
        Route::get('', 'WaterworkController@index')->name('index');
        Route::post('', 'WaterworkController@store')->name('store');
        Route::get('{id}', 'WaterworkController@show')->name('show');
        Route::put('', 'WaterworkController@update')->name('update');
        Route::delete('', 'WaterworkController@destroy')->name('destroy');
    });
    /*Route Accident*/
    Route::name('accident.')->namespace('Backend')->middleware('auth')->prefix('accident')->group(function () {
        Route::get('', 'AccidentController@index')->name('index');
        Route::post('', 'AccidentController@store')->name('store');
        Route::get('{id}', 'AccidentController@show')->name('show');
        Route::put('', 'AccidentController@update')->name('update');
        Route::delete('', 'AccidentController@destroy')->name('destroy');
    });
    /*Route Accident*/
    Route::name('pagestyleedit.')->namespace('Backend')->prefix('pagestyleedit')->group(function () {
        Route::get('', 'PagestyleeditController@index')->name('index');
    });


    Route::get('dropzone', [DropzoneController::class, 'dropzone']);
    Route::post('dropzone/store', [DropzoneController::class, 'dropzoneStore'])->name('dropzone.store');
});

/* TODO ROUTE ITG */
/*Route Login ITG*/
Route::name('itg.')->prefix('itg')->namespace('CustomLogin')->group(function () {
    Route::get('', 'LoginController@AdminIndex')->name('adminlogin');
    Route::post('', 'LoginController@CheckAdminLogin')->name('checkadminlogin');
});

/*Route ITG*/
Route::prefix('itg')->group(function () {
    /*Route Manage Admin*/
    Route::name('admin.')->namespace('Itg')->middleware('auth.admin')->prefix('admin')->group(function () {
        Route::get('', 'AdminController@index')->name('index');
        Route::post('', 'AdminController@store')->name('store');
        Route::put('', 'AdminController@update')->name('update');
    });

    /*Route ManageDomain*/
    Route::name('domain.')->namespace('Itg')->middleware('auth.admin')->prefix('domain')->group(function () {
        Route::get('', 'DomainController@index')->name('index');
        Route::post('', 'DomainController@store')->name('store');
        Route::put('', 'DomainController@update')->name('update');
        Route::delete('', 'DomainController@destroy')->name('destroy');
    });

    /*Route Module Manage*/
    Route::name('module.')->namespace('Itg')->middleware('auth.admin')->prefix('module')->group(function () {
        Route::get('', 'ModuleController@index')->name('index');
        Route::post('', 'ModuleController@store')->name('store');
        Route::put('', 'ModuleController@update')->name('update');
        Route::delete('', 'ModuleController@destroy')->name('destroy');
    });

    /*Route Permission Manage*/
    Route::name('permission.')->namespace('Itg')->middleware('auth.admin')->prefix('permission')->group(function () {
        Route::get('', 'PermissionController@index')->name('index');
        Route::post('', 'PermissionController@store')->name('store');
        Route::put('', 'PermissionController@update')->name('update');
        Route::delete('', 'PermissionController@destroy')->name('destroy');
    });
});

Route::get('/test', 'TestController@index');
