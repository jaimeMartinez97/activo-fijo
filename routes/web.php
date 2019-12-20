<?php

use App\User;
use App\Role;
use App\Property;
use App\PropertyType;
use App\ObjectExpense;
use App\Inventary;

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

// Route::get('role', function () {
//     Role::create([
//         'role' => 'empleado',
//     ]);
//
//     return 'listo';
//  });
//
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
//         'password' => Hash::make('12345'),
//         'role_id' => 2,
//         'assignment_id'=>2
//     ]);
//
//     return 'listo';
//  });

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

Route::group(['middleware' => ['user']], function () {
    Route::get('/', function () {
        return view('home');
    });

    Route::get('logout', function () {
        Auth::logout();

        return redirect('login');
    });
    Route::get('my_properties', 'UserController@my_properties');
});

Route::group(['middleware' => ['admin']], function () {
    Route::resource('users', 'UserController');
    Route::get('users_properties/{id}', function ($id) {
        $user = User::find($id);
        $properties = $user->properties()->get();

        return response()->json($properties);
    });
    Route::post('users_add_property/{id}', function (Request $request, $id) {
        $user = User::find($id);
        $user->properties()->attach($request->property_id);

        return response()->json(['response' => 'OK']);
    });

    Route::post('properties_add_inventary/{id}', function (Request $request, $id) {
        $request->merge([
            'property_id' => $id
        ]);
        Inventary::create($request->all());

        return response()->json(['response' => 'OK']);
    });

    Route::get('properties_inventaries/{id}', function ($id) {
        $property = Property::find($id);
        $inventaries = $property->inventaries()->get();

        return response()->json($inventaries);
    });

    Route::resource('assignments', 'AssignmentController');
    Route::resource('properties', 'PropertyController');
    Route::post('properties_filter', function (Request $request) {
        if(empty($request->serial_number)) {
            $properties = Property::with(['property_type', 'object_expense', 'inventaries' => function($q) use ($request) {
                $q->where('inventary_number', $request->inventary_number);
            }])->whereHas('inventaries', function($q) use ($request) {
                $q->where('inventary_number', $request->inventary_number);
            })->get();
        }else{
            if(empty($request->inventary_number)) {
                $properties = Property::with(['property_type', 'object_expense', 'inventaries' => function($q) use ($request) {
                    $q->where('serial_number', $request->serial_number);
                }])->whereHas('inventaries', function($q) use ($request) {
                    $q->where('serial_number', $request->serial_number);
                })->get();
            }else{
                $properties = Property::with(['property_type', 'object_expense', 'inventaries' => function($q) use ($request) {
                    $q->where('inventary_number', $request->inventary_number)->where('serial_number', $request->serial_number);
                }])->whereHas('inventaries', function($q) use ($request) {
                    $q->where('inventary_number', $request->inventary_number)->where('serial_number', $request->serial_number);
                })->get();
            }
        }

        $property_types = PropertyType::all();
        $object_expenses = ObjectExpense::all();
        $serial_number = $request->serial_number;
        $inventary_number = $request->inventary_number;
        $filter = true;

        return view('properties.index', compact('properties', 'property_types', 'object_expenses', 'filter', 'serial_number', 'inventary_number'));
    });
    Route::resource('property_type', 'PropertyTypeController');
    Route::resource('zone_coordinator', 'ZoneCoordinatorController');
});
