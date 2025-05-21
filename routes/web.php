<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/','welcome');

Route::view('/cobaaja','welcome',['nama' => 'Spongebob', 'alamat' => "UBAYA"]);

Route::get('/welcome', function() {
    return "Selamat Datang";
});

Route::get('/before_order', function() {
    return "Pilih Dine In atau Take Away";
});

Route::get('/menu/{opsi?}', function($opsi = "Dine-in") {
    return "Daftar menu ".$opsi;
});

Route::get('/admin/{cat}', function($cat) {
    $temp = "";
    if($cat == "categories")
    {
        $temp = 'Daftar Kategori';
    }
    else if($cat == 'order')
    {
        $temp = 'Daftar Order';
    }
    else
    {
        $temp = 'Daftar member';
    }
    return 'Portal Manajemen: '.$temp;
});

// Route::get('/coba', function(){
//     return "Hello guys";
// });

// Route::get('/user/{id}', function($id){
//     return "this is ID:".$id;
// });

Route::get('/users/{name?}', function($name="John Doe"){
    return "this is user with name:".$name;
})->name("tampilnama");

// Route::get("/nameRoute", function(){
//     $url = route("tampilnama",["name" => "Arif"]);
//     return $url;
// });

Route::resource("food", FoodController::class);
Route::resource('category', CategoryController::class);

Route::get('/totalFoods', [CategoryController::class, "totalFoods"]);
// Route::get('/totalFoods',"CategoryController@totalFoods");

Route::view('index2', 'index2');

Route::post('category/showInfo', [CategoryController::class, 'showInfo'])->name('category.showInfo');

Route::post("/category/showListFoods", [CategoryController::class, 'showListFoods'])->name("category.showListFoods");

Route::post('/ajax/category/getEditForm',[CategoryController::class,'getEditForm'])->name('kategori.getEditForm');

Route::post('/ajax/category/getEditFormB',[CategoryController::class,'getEditFormB'])
            ->name('kategori.getEditFormB');

Route::post('/ajax/category/saveDataUpdate',[CategoryController::class,'saveDataUpdate'])
            ->name('kategori.saveDataUpdate');

Route::post('/ajax/category/deleteData',[CategoryController::class,'deleteData'])
        ->name('kategori.deleteData');
    