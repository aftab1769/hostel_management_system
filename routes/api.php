<?php

use App\Http\Controllers\dashboard\api\RoomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::controller(RoomController::class)->group(function() {
    Route::get('/admin/rooms', 'index')->name('api.admin.rooms');

    Route::post('/admin/room/create', 'store')->name('api.admin.room.create');

    Route::get('/admin/{id}/room/show', 'show')->name('api.admin.room.show');

    Route::patch('/admin/{id}/room/update', 'update')->name('api.admin.room.update');

    Route::delete('/admin/{id}/room/destroy', 'destroy')->name('api.admin.room.destroy');
});