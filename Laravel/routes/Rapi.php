<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ChatsPeopleController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\InvitesController;
use App\Http\Controllers\Api\SocialsController;

use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    });

    Route::controller(ChatsAuthController::class)->group(function () {
    Route::resource('UserChat', ChatsAuthController::class);
    });
*/


Route::controller(AuthController::class)->group(function () {
    Route::resource('product', ProductController::class);

    });


    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
        });

        Route::controller(ChatsAuthController::class)->group(function () {
        });

        Route::post('/authChatsUsers', function (Request $request) {

            header('Access-Control-Allow-Origin: http://localhost:5173');
            // Verificar si el usuario está autenticado

                // Obtener el usuario autenticado
                $user = Auth::user();

                // Obtener el token de autenticación del usuario desde la base de datos
                $auth = Auths::where('id', $user->id)->first();

                // Si no se encuentra el registro de autenticación en la base de datos, devolver una respuesta de error
                if (!$auth) {
                    return response()->json(['error' => 'Unauthorized'], 401);
                }

                // Devolver la respuesta con el token de autenticación
                return response()->json(['token' => $auth->token]);


            // Si el usuario no está autenticado, devolver una respuesta de error o denegar el acceso al canal de chat
            return response()->json(['error' => 'Unauthorized'], 401);
            Route::resource('UserChat', ChatsPeopleController::class);
        });

    Route::post('/socials', [SocialsController::class, 'store']);
    Route::get('/socials', [SocialsController::class, 'index']);


    Route::post('/client', [AuthController::class, 'createUser']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/invite', [InvitesController::class, 'store']);
    Route::get('/invite', [InvitesController::class, 'index']);


