<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\infoEcoleController;
use App\Http\Controllers\insertionNoteController;
use App\Http\Controllers\matiereController;
use App\Http\Controllers\personnalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\salleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\YearSchoolController;
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


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/personnals/disable', [personnalController::class, 'index']);
    Route::resource('personnals', personnalController::class);
    Route::resource('infoEcoles', infoEcoleController::class);
    Route::resource('year-schools', YearSchoolController::class);
    Route::resource('salles', salleController::class);
    Route::resource('students', StudentController::class);
    Route::get('/listeStudents/{salle_id}', [StudentController::class, 'listeStudents'])->name('listeStudents');
    Route::get('/listeMatiere/{salle_id}', [matiereController::class, 'listeMatieres'])->name('listeMatieres');
    Route::get('bulletins/{eleve}', [insertionNoteController::class, 'bulletins'])->name('bulletins');
    //Route::post('insertionNotes/{eleve_id}', [insertionNoteController::class, 'store']);
    Route::get('insertionNotes/{eleve}', [insertionNoteController::class, 'index']);
    Route::resource('insertionNotes', insertionNoteController::class);
    Route::get('insertionNotes/{eleve}/create', [insertionNoteController::class, 'create']);
    Route::resource('matieres', matiereController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::get('/creer-admin', [UtilisateurController::class, 'createSuperAdminAccount']);



require __DIR__.'/auth.php';
