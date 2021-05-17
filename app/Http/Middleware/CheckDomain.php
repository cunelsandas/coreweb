<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use PDO;
use http\Env\Request;

class CheckDomain
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $domain = $request->getHttpHost();
        $data = DB::table('domains')->where('domain_name', $domain)->get()->first();
        if (!$data) {
            $domain = "www.$domain";
            $data = DB::table('domains')->where('domain_name', $domain)->get()->first();
        }
//        dd($data);
        /*config database*/
        if (isset($data->host_name)) {
            config(['database.connections.db2' => [
                'driver' => 'mysql',
                'host' => $data->host_name,
                'username' => $data->user_database,
                'database' => $data->database_name,
                'password' => $data->password_database,
                'url' => env('DATABASE_URL'),
                'port' => env('DB_PORT', '3306'),
                'unix_socket' => env('DB_SOCKET', ''),
                'charset' => 'utf8mb4',
                'collation' => 'utf8mb4_unicode_ci',
                'prefix' => '',
                'prefix_indexes' => true,
                'strict' => true,
                'engine' => null,
                'options' => extension_loaded('pdo_mysql') ? array_filter([
                    PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
                ]) : [],
            ]]);
        } else {
            return redirect()->intended('itg');
        }
        /*config upload folder*/
        $upload_folder_name = 'upload';
        list($drive, $host, $folder) = explode('/', $request->server('DOCUMENT_ROOT'));
        $upload_folder = $drive . DIRECTORY_SEPARATOR . $host . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . $domain . DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . $upload_folder_name . DIRECTORY_SEPARATOR;
        config(['app.upload_folder' => $upload_folder, 'app.domain_id' => $data->id]);
        return $next($request);
    }
}
