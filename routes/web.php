<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\InventoryController;

Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');

Route::get('/inventory/store', [InventoryController::class, 'inventorystore']);
Route::get('/inventory/kitchenware', [InventoryController::class, 'kitchenware'])->name('inventory.kitchenware');
