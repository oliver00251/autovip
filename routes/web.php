<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VeiculoController;
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


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/cadastro', [CadastroController::class, 'index'])->name('cadastro.index');
    Route::resource('alunos', AlunoController::class);
    Route::resource('funcionarios', FuncionarioController::class);
 
});
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/funcionario/cadastro', function () {
    return view('cadastro.form.funcionario');
});
/* Route::get('/veiculo/cadastro', function () {
    return view('cadastro.form.veiculo');
}); */
Route::get('/veiculos', [VeiculoController::class, 'index'])->name('veiculos.index');
Route::post('/salvar-veiculo', [VeiculoController::class, 'store'])->name('veiculos.store');
Route::get('/veiculos/{veiculo}', [VeiculoController::class, 'show'])->name('veiculos.show');
Route::put('/veiculos/{veiculo}', [VeiculoController::class, 'update'])->name('veiculos.update');
Route::delete('/veiculos/{veiculo}', [VeiculoController::class, 'destroy'])->name('veiculos.destroy');

