<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
 use App\Models\Post;

Route::controller(CrudController::class)->group(function () {
//    table ka liya hia
    Route::get('/', 'index'); 

// register ka form open k aliya hai
    Route::get('/register', 'create');
// register ka through database ma insert karna 
    Route::post('/registerdetail', 'store')->name('registerdetail');

    Route::get('{id}/edit', [CrudController::class, 'edit']);

    Route::get('{id}/delete', [CrudController::class, 'destroy']);

    Route ::put('{id}/update',[CrudController::class,'update']);
    


    
});
