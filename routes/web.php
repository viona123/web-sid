<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function() {
    return view('login');
});
Route::get('/admin', function() {
    return view('admin');
});

Route::post('/login', function(Request $request) {
    $nama_input = $request->input('pengguna');
    $password_input = $request->input('password');

    $password = User::where('name', $nama_input)->first()->password;

    if (password_verify($password_input, $password)) {
        return redirect('/admin');
    } else {
        return redirect('/login');
    }
});