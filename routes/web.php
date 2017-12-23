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
//
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::get('top-menu',          'HomeController@topmenu');
Route::get('two-menu-1',        'HomeController@twomenu1');
Route::get('two-menu-2',        'HomeController@twomenu2');
Route::get('mobile-menu-1',     'HomeController@mobilemenu1');
Route::get('mobile-menu-2',     'HomeController@mobilemenu2');
Route::get('mobile-menu-3',     'HomeController@mobilemenu3');
Route::get('typography',        'HomeController@typography');
Route::get('elements',          'HomeController@elements');
Route::get('buttons',           'HomeController@buttons');
Route::get('content-slider',    'HomeController@contentslider');
Route::get('treeview',          'HomeController@treeview');
Route::get('jquery-ui',         'HomeController@jqueryui');
Route::get('nestable-list',     'HomeController@nestablelist');

Route::get('tables',            'HomeController@tables');
Route::get('jqgrid',            'HomeController@jqgrid');

Route::get('form-elements',     'HomeController@formelements');
Route::get('form-elements-2',   'HomeController@formelements2');
Route::get('form-wizard',       'HomeController@formwizard');
Route::get('wysiwyg',           'HomeController@wysiwyg');
Route::get('dropzone',          'HomeController@dropzone');

Route::get('widgets',           'HomeController@widgets');

Route::get('calendar',          'HomeController@calendar');
Route::get('gallery',           'HomeController@gallery');

Route::get('profile',           'HomeController@profile');
Route::get('inbox',             'HomeController@inbox');
Route::get('pricing',           'HomeController@pricing');
Route::get('invoice',           'HomeController@invoice');
Route::get('timeline',          'HomeController@timeline');
Route::get('search',            'HomeController@search');
Route::get('email',             'HomeController@email');
Route::get('email-confirmation','HomeController@emailconfirmation');
Route::get('email-navbar',      'HomeController@emailnavbar');
Route::get('email-newsletter',  'HomeController@emailnewsletter');
Route::get('email-contrast',    'HomeController@emailcontrast');

Route::get('faq',               'HomeController@faq');
Route::get('error-404',         'HomeController@error404');
Route::get('error-500',         'HomeController@error500');
Route::get('grid',              'HomeController@grid');
Route::get('blank',             'HomeController@blank');

Route::get('dompdf',            'HomeController@dompdf');
Route::get('webcamera',         'HomeController@webcamera');
Route::get('qr',                'HomeController@qr');
Route::get('excel',             'HomeController@excel');
Route::get('pos',               'POS\PosController@pos');

Route::match(['get', 'post'], 'PDFAdmin', 			'PdfController@PDFMarker');
Route::match(['get', 'post'], 'ExcelExport',		'ExcelController@excelexport');
Route::match(['get', 'post'], 'ExcelImport',		'ExcelController@excelimport');

Route::get('multiauth',           'MultiAuthController@multiauth');


Route::post('/web/logout', 'Auth\LoginController@weblogout')->name('web.logout');

Route::prefix('member')->group(function(){
  Route::get('/login',    'Auth\MemberLoginController@showLoginForm')->name('member.login');
  Route::post('/login',   'Auth\MemberLoginController@login')->name('member.login.submit');
  Route::post('/logout',  'Auth\MemberLoginController@web2logout')->name('member.logout');
  Route::get('/',         'MemberController@index')->name('member.dasboard');
});

Route::prefix('bank')->group(function(){
  Route::get('/trxharian',  'Bank\BankController@trxharian');
  Route::get('/',           'Bank\BankController@index');
});
