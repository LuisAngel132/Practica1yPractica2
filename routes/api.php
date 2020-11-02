<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controller\controlador;

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



Route::post('insertar','cruid\controlador@Insertar')->middleware(['Edadmiddleware','Personasconcategoriamiddleware']);
Route::middleware('auth:sanctum')->get('ver', 'cruid\controlador@Vista');
Route::middleware('auth:sanctum')->delete('borrar/{id}','cruid\controlador@Borrarpersona')->where (['id'=>'[0-9]+']);
Route::middleware('auth:sanctum')->put('actualizar/{id}','cruid\controlador@Actualizarpersona')->where (['id'=>'[0-9]+'])->middleware(['Edadmiddleware','Personasconcategoriamiddleware']);
Route::middleware('auth:sanctum')->post('insertarproducto','cruid\controlador@Insertarproducto')->middleware('Esradodelproductomiddleware');
Route::middleware('auth:sanctum')->get('verproducto','cruid\controlador@Verproducto');
Route::middleware('auth:sanctum')->delete('borrarproducto/{id}','cruid\controlador@Eliminarproducto')->where (['id'=>'[0-9]+']);
Route::middleware('auth:sanctum')->put('actualizarproducto/{id}','cruid\controlador@Actualizarproducto')->where (['id'=>'[0-9]+'])->middleware('Esradodelproductomiddleware');;
Route::middleware('auth:sanctum')->post('insertarcomentario','cruid\controlador@Insertarcomentario')->middleware('categoriadelforo');
Route::middleware('auth:sanctum')->get('vercomentarios','cruid\controlador@Vercomentarios');
Route::middleware('auth:sanctum')->get('vercomentariosporproducto/{id?}','cruid\controlador@Vercomentariosporproducto')->where (['id'=>'[0-9]+']);
Route::middleware('auth:sanctum')->get('vercomentariosporpersona/{id?}','cruid\controlador@Vercomentariosporpersona')->where (['id'=>'[0-9]+']);
Route::middleware('auth:sanctum')->delete('borrarcomentario/{id}','cruid\controlador@Eliminarcomentario')->where (['id'=>'[0-9]+']);
Route::middleware('auth:sanctum')->put('actualizarcomentario/{id}','cruid\controlador@Actualizarcomentario')->where (['id'=>'[0-9]+'])->middleware('categoriadelforo');
Route::post('iniciodesesion','cruid\controlador@LogIn');
Route::middleware('auth:sanctum')->get('verpermisos','cruid\controlador@verpermisos');
Route::middleware('auth:sanctum')->put('cambiarpermisos/{id}','cruid\controlador@cambiarpermisos')->where (['id'=>'[0-9]+']);
Route::post('iniciodesesionadministradores','cruid\controlador@LogInadministrador');
Route::middleware('auth:sanctum')->delete('salirdesesion','cruid\controlador@LogOut');
Route::middleware('auth:sanctum')->put('quitarpermisos/{id}','cruid\controlador@quitarpermisos')->where (['id'=>'[0-9]+']);
