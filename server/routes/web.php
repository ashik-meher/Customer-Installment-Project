<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OkController;

use Illuminate\Support\Facades\Auth;

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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/ok', [OkController::class, 'okText'])->name('okt');

Route::get('/okt', [App\Http\Controllers\OkController::class, 'okView'])->name('okview');


//3. New Phase of Dev






Route::resource('articles', App\Http\Controllers\ArticleBoardController::class)->middleware('auth');

Route::post('/articles/custom', [App\Http\Controllers\ArticleBoardController::class, 'customAction'])->middleware('auth');

Route::get('/articles/search/{keyword}', [\App\Http\Controllers\ArticleBoardController::class, 'search']);


// 2. New Phase of Dev

Route::get('/minimal', function () {

    $resp = [
        "Id" => "23",
        "Guy D" => "28"
    ];

    $elems = [52, 27, 298, 27682, 90];

    function increment($elem)
    {
        $incre = 5;
        $elem = $elem + $incre;
        return $elem;
    };

    print_r(array_map('increment', $elems));


    //return $resp;
    return $elems;
});




// Mail Service Implementation

Route::resource(
    'mail',
    App\Http\Controllers\MailController::class
)->middleware('auth');




/**
 * Session settings in runtime
 */

// Test Route for Session Check

/*
Route::get('ses/{skey?}', function (Request $request, $skey = null) {

    //$val = $request->session()->all();

    //dd($val);

    if ($skey == "tl") {

        session(['TL' => 'DE']);
    }

    if ($skey != 'tl') {

        session(['imposter' => 'yes']);
    }

    if ($request->session()->has('TL')) {
        if (session('TL') == 'DE') {
            session(['GL' => 'Yes']);
        } else {
            $request->session()->forget(['GL']);
        }
    }



    $val = $request->session()->all();



    dd($val);
})->name('loga');


// Flush 

Route::get('sesf', function (Request $request) {
    $request->session()->flush();

    return redirect()->route('loga');
})->name('logouti');

*/
/**
 * End of Session settings in runtime
 */

//Let us inspect the HTTP Request, inject the special status

/*
Route::get('/inspect', function (Request $request) {

    $specialStatus = Auth::user()->special_status;

    session(['user' => $specialStatus]);

    //dd($request->session()->all());

    return redirect('home');
});

*/



/**
 * USER MANAGEMENT MIDDLEWARE
 * Middleware on top of autherticated middleware
 * Check if user's special status is set to superadmin
 */


Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->middleware(['auth', 'superadmin']);



// User Role Assignment View


Route::get('users/role-assign/{user}', [App\Http\Controllers\UserController::class, 'assignRoleView'])
    ->name('assign.role.view');


//Roles

Route::resource('role', App\Http\Controllers\RoleController::class);
