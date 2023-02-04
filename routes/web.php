<?php

use App\Http\Controllers\AccessController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PengambilanController;
use App\Http\Controllers\ReturController;

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

Route::get('/', [LoginController::class, 'index'])->middleware("is-not-login");

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware("is-not-login");
Route::get('/login/out', [LoginController::class, 'logout']);
Route::post('/login/in', [LoginController::class, 'login']);

Route::middleware("is-login")->group(function () {

  Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware("is-not-kepala");
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware("is-kepala");

  Route::prefix("/pegawai")->group(function () {
    Route::get('/', [PegawaiController::class, 'index'])->name('pegawai')->middleware("akses-crud:2,read");
    Route::get('/add', [PegawaiController::class, 'add'])->middleware("akses-crud:2,create");
    Route::post('/add/insert', [PegawaiController::class, 'insert'])->middleware("akses-crud:2,create");
    Route::post("/{id}/destroy", [PegawaiController::class, 'delete'])->middleware("akses-crud:2,delete");
    Route::get('/{id}/edit', [PegawaiController::class, 'edit'])->middleware("akses-crud:2,update");
    Route::post('/{id}/edit/update', [PegawaiController::class, 'update'])->middleware("akses-crud:2,update");
    //ajax methods
    Route::get("/listJabatan", [PegawaiController::class, 'optionEvent']);
  });

  Route::prefix("/barang")->group(function () {
    Route::get('/', [BarangController::class, 'index'])->name('barang')->middleware("akses-crud:0,read");
    Route::get('/add', [BarangController::class, 'add'])->middleware("akses-crud:0,create");
    Route::post('/add/insert', [BarangController::class, 'insert'])->middleware("akses-crud:0,create");
    Route::post("/{id}/destroy", [BarangController::class, 'delete'])->middleware("akses-crud:0,delete");
    Route::get('/{id}/edit', [BarangController::class, 'edit'])->middleware("akses-crud:0,update");
    Route::post('/{id}/edit/update', [BarangController::class, 'update'])->middleware("akses-crud:0,update");
    //ajax
    Route::get("/monthly", [BarangController::class, 'monthly']);
  });

  Route::prefix("/kategori")->group(function () {
    Route::get("/", [KategoriController::class, "index"])->name("kategori")->middleware("akses-crud:1,read");
    Route::get('/add', [KategoriController::class, 'add'])->middleware("akses-crud:1,create");
    Route::post('/add/insert', [KategoriController::class, 'insert'])->middleware("akses-crud:1,create");
    Route::post("/{id}/destroy", [KategoriController::class, 'delete'])->middleware("akses-crud:1,delete");
    Route::get('/{id}/edit', [KategoriController::class, 'edit'])->middleware("akses-crud:1,update");
    Route::post('/{id}/edit/update', [KategoriController::class, 'update'])->middleware("akses-crud:1,update");
    //ajax
    Route::get("/tiga", [KategoriController::class, 'tiga']);
  });

  Route::prefix("/gudang")->group(function () {
    Route::get("/", [GudangController::class, "index"])->name("gudang")->middleware("akses-crud:3,read");
    Route::get('/add', [GudangController::class, 'add'])->middleware("akses-crud:3,create");
    Route::post('/add/insert', [GudangController::class, 'insert'])->middleware("akses-crud:3,create");
    Route::post("/{id}/destroy", [GudangController::class, 'delete'])->middleware("akses-crud:3,delete");
    Route::get('/{id}/edit', [GudangController::class, 'edit'])->middleware("akses-crud:3,update");
    Route::post('/{id}/edit/update', [GudangController::class, 'update'])->middleware("akses-crud:3,update");
  });

  Route::prefix("/departemen")->group(function () {
    Route::get("/", [DepartemenController::class, "index"])->name("departemen")->middleware("akses-crud:4,read");
    Route::get('/add', [DepartemenController::class, 'add'])->middleware("akses-crud:4,create");
    Route::post('/add/insert', [DepartemenController::class, 'insert'])->middleware("akses-crud:4,create");
    Route::get("/{id}/detail", [DepartemenController::class, 'detail']);
    Route::post("/{id}/destroy", [DepartemenController::class, 'delete'])->middleware("akses-crud:4,delete");
    Route::get('/{id}/edit', [DepartemenController::class, 'edit'])->middleware("akses-crud:4,update");
    Route::post('/{id}/edit/update', [DepartemenController::class, 'update'])->middleware("akses-crud:4,update");
    //ajax methods
    Route::get("/filterByJabatan", [DepartemenController::class, "filterByJabatan"]);
    Route::get("/tiga", [DepartemenController::class, 'tiga']);
  });

  Route::prefix("/jabatan")->group(function () {
    Route::get("/", [JabatanController::class, "index"])->name("jabatan")->middleware("akses-crud:5,read");
    Route::get('/add', [JabatanController::class, 'add'])->middleware("akses-crud:5,create");
    Route::post('/add/insert', [JabatanController::class, 'insert'])->middleware("akses-crud:5,create");
    Route::get("/{id}/detail", [JabatanController::class, 'detail']);
    Route::post("/{id}/destroy", [JabatanController::class, 'delete'])->middleware("akses-crud:5,delete");
    Route::get('/{id}/edit', [JabatanController::class, 'edit'])->middleware("akses-crud:5,update");
    Route::post('/{id}/edit/update', [JabatanController::class, 'update'])->middleware("akses-crud:5,update");
    //ajax methods
    Route::get("/filterByDepartemen", [JabatanController::class, "filterByDepartemen"]);
  });

  Route::middleware("is-not-super")->group(function () {
    Route::prefix("/pengambilan")->group(function () {
      Route::get("/", [PengambilanController::class, "index"])->name("pengambilan");
      Route::get("/add", [PengambilanController::class, "add"]);
      Route::post("/add/insert", [PengambilanController::class, "insert"]);
      Route::get("/{id}/detail", [PengambilanController::class, 'detail'])->middleware("akses-transaksi:pengambilan");
      Route::post("/{id}/destroy", [PengambilanController::class, 'delete']);
      Route::get("/showAll", [PengambilanController::class, 'showAll']);
      Route::post("/{id}/notice", [PengambilanController::class, 'notice']);
      Route::post("/{id}/accept", [PengambilanController::class, 'accept']);
    });
    Route::prefix("/retur")->group(function () {
      Route::get("/", [ReturController::class, "index"])->name("retur");
      Route::get("/{id}/detail", [ReturController::class, 'detail'])->middleware("akses-transaksi:retur");
      Route::get("/showAll", [ReturController::class, 'showAll']);
      Route::post("/{id}/notice", [ReturController::class, 'notice']);
      Route::post("/{id}/accept", [ReturController::class, 'accept']);
    });
  });

  Route::middleware("is-super")->group(function () {
    Route::prefix("/access")->group(function () {
      Route::get("/", [AccessController::class, "index"])->name("access");
      Route::post("/grant", [AccessController::class, 'grant']);
      //ajax
      Route::get("/filterBy", [AccessController::class, 'filterBy']);
    });
  });
});
