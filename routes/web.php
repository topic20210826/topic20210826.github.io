<?php

use Illuminate\Support\Facades\Route;
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
//首頁
Route::get('/',  function () {
    return view('index');
});

//店家首頁
Route::get('/store-index',  function () {
    return view('store-index');
});

Route::get('/buy_page',  function () {
    return view('buy_page');
});
//聯絡我們
Route::get('/contact',  function () {
    return view('contact');
});

Route::get('/ticket', 'OtherController@ticketListPage')
    ->middleware(['user.auth']);
//menu
Route::get('/menu',  'OtherController@menuPage');

//關於
Route::get('/about', 'OtherController@aboutPage');

//使用者
Route::group(['prefix' => 'user'], function () {
    //使用者憑證
    Route::group(['prefix' => 'auth'], function () {
        //使用者註冊頁面
        Route::get('/sign-up', 'UserAuthController@signUpPage');
        //使用者資料新增
        Route::post('/sign-up', 'UserAuthController@signUpProcess');
        Route::get('/sign-in', 'UserAuthController@signInPage');
        Route::post('/sign-in', 'UserAuthController@signInProcess');
        //登出
        Route::get('/sign-out', 'UserAuthController@signOut');
        //修改使用者資料
        Route::post('/userdata', 'UserAuthController@userdataProcess');
        Route::get('/userdata', 'UserAuthController@userdataPage');
        //店家註冊頁面
        Route::get('/store-sign-up', 'StoreAuthController@signUpPage');
        Route::post('/store-sign-up', 'StoreAuthController@signUpProcess');
    });
});

//商品
Route::group(['prefix' => 'merchandise'], function () {
    //購買飲品(顧客)
    Route::get('/', 'MerchandiseController@merchandiseListPage')
        ->middleware(['user.auth']);
    //新增商品(店家)
    Route::get('/create', 'MerchandiseController@merchandiseCreatePage')
        ->middleware(['user.auth.admin']);
    //新增/編輯商品(店家)
    Route::post('/create', 'MerchandiseController@merchandiseCreateProcess')
        ->middleware(['user.auth.admin']);
    //商品管理(店家)
    Route::get('/manage', 'MerchandiseController@merchandiseManageListPage')
        ->middleware(['user.auth.admin']);
    //投票頁面(顧客)
    Route::get('/vote', 'MerchandiseController@merchandisevotePage')
        ->middleware(['user.auth']);
    //飲料排名投票畫面(顧客)
    Route::post('/votecheck', 'MerchandiseController@merchandisevoteProcess')
        ->middleware(['user.auth']);


    //指定商品
    Route::group(['prefix' => '{merchandise_id}'], function () {
        Route::group(['middleware' => ['user.auth.admin']], function () {
            //商品單品檢視編輯
            Route::get('/edit', 'MerchandiseController@merchandiseItemEditPage');
            //商品單品修改
            Route::put('/', 'MerchandiseController@merchandiseItemUpdateProcess');
        });
        //商品單品檢視(顧客)
        Route::get('/', 'MerchandiseController@merchandiseItemPage');
        //購買商品(顧客)
        Route::post('/buy', 'MerchandiseController@merchandiseItemBuyProcess')
            ->middleware(['user.auth']);
    });
});
//建立團購
Route::group(['prefix' => 'create_join'], function () {
    //團購
    Route::get('/join', 'MerchandiseController@merchandisejoinPage')
        ->middleware(['user.auth']);
    Route::get('/joinrecord', 'MerchandiseController@merchandisejoinrecordPage')
        ->middleware(['user.auth']);
    //跟團
    Route::post('/joincreate', 'MerchandiseController@merchandisejoinProcess')
        ->middleware(['user.auth']);
    //新增團購(顧客)
    Route::get('/createjoin', 'MerchandiseController@merchandisecreatejoinPage')
        ->middleware(['user.auth']);
    //團購單品修改
    Route::post('/createjoin', 'MerchandiseController@merchandisejoinUpdateProcess')
        ->middleware(['user.auth']);
});
//交易
Route::get('/transaction', 'TransactionController@transactionListPage')
    ->middleware(['user.auth']);

//訂單管理頁面(店家)
Route::get('/order', 'TransactionController@transactionOrderPage')
    ->middleware(['user.auth.admin']);

//訂單刪除系統(店家)
Route::get('/delete/{id}', 'TransactionController@transactionOrderProcess')
    ->middleware(['user.auth.admin']);

//訂單完成系統(店家)
Route::get('/complete/{id}', 'TransactionController@transactioncompleteProcess')
    ->middleware(['user.auth']);

//購買飲品確認(顧客)
Route::get('/buy_check', 'TransactionController@transactionbuycarPage')
    ->middleware(['user.auth']);

Route::get('/buy_delete/{id}', 'TransactionController@transactionbuycarProcess')
    ->middleware(['user.auth']);

Route::get('/check/{id}', 'TransactionController@transactioncheckProcess')
    ->middleware(['user.auth']);
