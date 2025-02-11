<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $foundDocumentsRecord = [
        ['name' => 'Eric Gikungu Nyokabi', 'document_type' => 'Passport', 'document_id' => 'AK0252450', 'location' => 'Muranga'],
        ['name' => 'Jane Doe', 'document_type' => 'National ID', 'document_id' => 'ID123456', 'location' => 'Nairobi'],
        ['name' => 'John Smith', 'document_type' => 'Birth Certificate', 'document_id' => 'BC987654', 'location' => 'Mombasa'],
        ['name' => 'Alice Johnson', 'document_type' => 'Passport', 'document_id' => 'AK0252451', 'location' => 'Kisumu'],
        ['name' => 'Bob Brown', 'document_type' => 'National ID', 'document_id' => 'ID123457', 'location' => 'Eldoret'],
        ['name' => 'Charlie Davis', 'document_type' => 'Birth Certificate', 'document_id' => 'BC987655', 'location' => 'Nakuru'],
        ['name' => 'Diana Evans', 'document_type' => 'Passport', 'document_id' => 'AK0252452', 'location' => 'Nyeri'],
        ['name' => 'Ethan Foster', 'document_type' => 'National ID', 'document_id' => 'ID123458', 'location' => 'Meru'],
        ['name' => 'Fiona Green', 'document_type' => 'Birth Certificate', 'document_id' => 'BC987656', 'location' => 'Kitui'],
        ['name' => 'George Harris', 'document_type' => 'Passport', 'document_id' => 'AK0252453', 'location' => 'Machakos'],
        ['name' => 'Hannah Ivers', 'document_type' => 'National ID', 'document_id' => 'ID123459', 'location' => 'Bomet'],
        ['name' => 'Ian Johnson', 'document_type' => 'Birth Certificate', 'document_id' => 'BC987657', 'location' => 'Kajiado'],
        ['name' => 'Jack King', 'document_type' => 'Passport', 'document_id' => 'AK0252454', 'location' => 'Embu'],
        ['name' => 'Kathy Lee', 'document_type' => 'National ID', 'document_id' => 'ID123460', 'location' => 'Lamu'],
        ['name' => 'Liam Miller', 'document_type' => 'Birth Certificate', 'document_id' => 'BC987658', 'location' => 'Taita Taveta'],
        ['name' => 'Mia Nelson', 'document_type' => 'Passport', 'document_id' => 'AK0252455', 'location' => 'Nakuru'],
        ['name' => 'Noah O’Brien', 'document_type' => 'National ID', 'document_id' => 'ID123461', 'location' => 'Narok'],
        ['name' => 'Olivia Parker', 'document_type' => 'Birth Certificate', 'document_id' => 'BC987659', 'location' => 'Uasin Gishu'],
        ['name' => 'Paul Quinn', 'document_type' => 'Passport', 'document_id' => 'AK0252456', 'location' => 'West Pokot'],
        ['name' => 'Quinn Roberts', 'document_type' => 'National ID', 'document_id' => 'ID123462', 'location' => 'Trans Nzoia'],
        ['name' => 'Rachel Smith', 'document_type' => 'Birth Certificate', 'document_id' => 'BC987660', 'location' => 'Bungoma'],
        ['name' => 'Steve Taylor', 'document_type' => 'Passport', 'document_id' => 'AK0252457', 'location' => 'Kericho'],
    ];
    
    return view('welcome', ['foundDocumentsRecord' => $foundDocumentsRecord]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
