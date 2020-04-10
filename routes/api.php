<?php

use Illuminate\Support\Facades\Route;
use Rocramer\MatomoAnalytics\Http\Controllers\RequestController;

/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. They are protected
| by your tool's "Authorize" middleware by default. Now, go build!
|
*/

Route::get('page-urls/{range}', RequestController::class.'@getPageUrls');
Route::get('entry-pages/{range}', RequestController::class.'@getEntryPages');
Route::get('exit-pages/{range}', RequestController::class.'@getExitPages');
