<?php

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

// Route::get('user', function () {
//     User::create([
//         'name' => 'jaime',
//         'father_lastname' => 'Martinez',
//         'mother_lastname' => 'Ortega',
//         'state' => '1',
//         'unity' => '1',
//         'job' => '1',
//        'character' => 'J',
//         'reason' => '1',
//         'position' => '1',
//         'email' => 'jaime@gmail.com',
//         'password' => Hash::make('123'),
//         'role_id' => 1,
//         'assignment_id'=>1
//     ]);
//
 //    return 'listo';
 //});

Route::get('login', function () {
    if(Auth::check()) {
        return redirect('/');
    }
    return view('auth.login');
});

Route::post('authentication', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if(Auth::attempt($credentials)) {
        return redirect()->intended('/');
    }

    return redirect('login');
});

Route::group(['middleware' => ['admin']], function () {
    Route::get('/', function () {
        return view('home');
    });

    Route::get('logout', function () {
        Auth::logout();

        return redirect('login');
    });

    Route::resource('users', 'UserController');
    Route::resource('assignments', 'AssignmentController');
    Route::resource('properties', 'PropertyController');
    Route::resource('property_type', 'PropertyTypeController');
    Route::resource('zone_coordinator', 'ZoneCoordinatorController');
});
