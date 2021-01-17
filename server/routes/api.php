<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// 認証が必要ないエンドポイント
Route::get('/public', function (Request $request) {
    return response()->json(["message" => "パブリックなエンドポイントへようこそ！このレスポンスを確認するのに認証は必要ありません。"]);
});

// アクセストークンによる認証が必要なエンドポイント
Route::get('/private', function (Request $request) {
    return response()->json([
        "message" => "プライベートなエンドポイントへようこそ！これを表示するには有効なアクセストークンが必要です。"
        ]);
})->middleware('jwt');
