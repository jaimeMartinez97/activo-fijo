<?php
use App\State;
use App\Municipality;
use App\Locality;
use App\User;
use App\Assignment;
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
    return view('home');
});

// Route::get('state', function () {
//     $array = array();
//     $fp = fopen("../public/localidadesbcs.txt", "r");
//     while (!feof($fp)){
//         $linea = fgets($fp);
//         array_push($array, explode("\t", mb_convert_encoding($linea, 'UTF-8', 'UTF-8')));
//     }
//     fclose($fp);
//
//     foreach ($array as $row) {
//         Locality::create([
//             'name' => str_replace('"', "", $row[1]),
//             'urban' => (int) $row[2],
//             'municipality_id' => $row[3],
//         ]);
//     }
//
//     return "listo";
//     $array = array();
//     $fp = fopen("../public/empleados.txt", "r");
//     while (!feof($fp)){
//         $linea = fgets($fp);
//         array_push($array, explode("\t", mb_convert_encoding($linea, 'UTF-8', 'UTF-8')));
//     }
//     fclose($fp);
//
//     foreach ($array as $row) {
//         User::create([
//             'position' => $row[1],
//             'job' => (int) $row[2],
//             'father_lastname' => $row[3],
//             'mother_lastname' => $row[4],
//             'name' => $row[5],
//             'reason' => $row[6],
//             'character' => $row[7],
//             'unity' => $row[8],
//             'state' => $row[10],
//         ]);
//     }
//
//     return "listo";
//
//     $array = array();
//     $fp = fopen("../public/adscripciones.txt", "r");
//     while (!feof($fp)){
//         $linea = fgets($fp);
//         array_push($array, explode("\t", mb_convert_encoding($linea, 'UTF-8', 'UTF-8')));
//     }
//     fclose($fp);
//
//     foreach ($array as $row) {
//         Assignment::create([
//             'unity' => (int) $row[0],
//             'description' => $row[2],
//             'state_id' => 1
//         ]);
//     }
//
//     return "listo";
// });

Route::resource('users', 'UserController');
Route::resource('assignments', 'AssignmentController');
