<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ConsultationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\EtatCivilController;
use App\Http\Controllers\Root\RootController;
use App\Http\Controllers\TypeHandicapController;
use App\Http\Controllers\DossierPatientController;
use App\Http\Controllers\NiveauScolaireController;
use App\Http\Controllers\CouvertureMedicalController;
use App\Http\Controllers\RendezVousController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::post('login',[LoginController::class,'login'])->name("login");

Route::resource('projects', App\Http\Controllers\ProjectController::class);
// Route::resource('tasks', App\Http\Controllers\TaskController::class);
// Route::resource('members', App\Http\Controllers\MemberController::class);
// couvertureMedicals
Route::resource('couvertureMedicals', App\Http\Controllers\CouvertureMedicalController::class);
Route::get('/export_couvertureMedicals',[CouvertureMedicalController::class,'export'])->name('couvertureMedicals.export');
Route::post('/import_couvertureMedicals',[CouvertureMedicalController::class,'import'])->name('couvertureMedicals.import');
Route::resource('typeHandicaps', App\Http\Controllers\TypeHandicapController::class);
Route::resource('services', App\Http\Controllers\ServiceController::class);
Route::get('/export_service',[ServiceController::class,'export'])->name('services.export');
Route::post('/import_service',[ServiceController::class,'import'])->name('services.import');

//employes routes
Route::resource('employes', App\Http\Controllers\EmployeController::class);
Route::get('/export_employes',[EmployeController::class,'export'])->name('employes.export');
Route::post('/import_employes',[EmployeController::class,'import'])->name('employes.import');

Route::resource('reclamations', App\Http\Controllers\ReclamationController::class);
Route::resource('fonctions', App\Http\Controllers\FonctionController::class);
Route::resource('patients', App\Http\Controllers\PatientController::class);
Route::resource('dossier-patients', App\Http\Controllers\DossierPatientController::class);
Route::resource('orientation-externes', App\Http\Controllers\OrientationExterneController::class);

//consultation
Route::get('/consultations/{model}', [ConsultationController::class, 'index'])->middleware(['ModelExists'])->name('consultations.index');
Route::get('/consultations/create/{model}',[ConsultationController::class,'create'])->middleware(['ModelExists'])->name('consultations.create');
Route::post('/consultations/store/{model}',[ConsultationController::class,'store'])->middleware(['ModelExists'])->name('consultations.store');
Route::delete('/consultations/{id}',[ConsultationController::class,'destroy'])->name('consultations.destroy');
Route::get('/consultations/show/{model}/{id}',[ConsultationController::class,'show'])->middleware(['ModelExists'])->name('consultations.show');
Route::get('/consultations/edit',[ConsultationController::class,'edit'])->name('consultations.edit');
Route::post('/consultations/update',[ConsultationController::class,'update'])->name('consultations.update');

Route::get('/consultations/rendezVous/{model}', [ConsultationController::class, 'Ajouter_RendezVous'])->middleware(['ModelExists'])->name('consultations.rendezVous');
Route::get('/consultations/patient/{model}', [ConsultationController::class, 'patient'])->middleware(['ModelExists'])->name('consultations.patient');




Route::resource('etatCivils', EtatCivilController::class);
// Route::resource('rendez-vouses', App\Http\Controllers\RendezVousController::class);
Route::get('/rendez-vous',[RendezVousController::class,'index'])->name('rendez-vous.index');
Route::get('/rendez-vous/list_dossier',[RendezVousController::class,'list_dossier'])->name('rendez-vous.list_dossier');
Route::post('rendez-vous/createe',[RendezVousController::class,'create'])->name('rendez-vous.create');
Route::delete('rendez-vous/destroy/{id}',[RendezVousController::class,'destroy'])->name('rendez-vous.destroy');
Route::get('rendez-vous/show/{id}',[RendezVousController::class,'show'])->name('rendez-vous.show');
Route::get('rendez-vous/edit/{id}',[RendezVousController::class,'edit'])->name('rendez-vous.edit');
Route::post('rendez-vous/store',[RendezVousController::class,'store'])->name('rendez-vous.store');

Route::prefix('/root')->group(function() {
    Route::controller(RootController::class)->group(function() {
        Route::get('/', 'index');
    });
    Route::resource('menu-items', App\Http\Controllers\Root\MenuItemController::class);
    Route::resource('menu-groups', App\Http\Controllers\Root\MenuGroupController::class);
});
Route::get('/export_typehandicap',[TypeHandicapController::class,'export'])->name('typehandicap.export');
Route::post('/import_typehandicap',[TypeHandicapController::class,'import'])->name('typehandicap.import');


Route::resource('niveauScolaires', App\Http\Controllers\NiveauScolaireController::class);
Route::get('/export_niveauScolaires',[NiveauScolaireController::class,'export'])->name('niveauScolaires.export');
Route::post('/import_niveauScolaires',[NiveauScolaireController::class,'import'])->name('niveauScolaires.import');

// EtatCivil export and import
Route::get('/export_etatCivils',[EtatCivilController::class,'export'])->name('etatCivils.export');
Route::post('/import_etatCivils',[EtatCivilController::class,'import'])->name('etatCivils.import');
Route::resource('tuteurs', App\Http\Controllers\TuteurController::class);

Route::get('/parentForm',[DossierPatientController::class,'parent'])->name('dossier-patients.parent');
Route::get('/patientForm',[DossierPatientController::class,'patient'])->name('dossier-patients.patient');
Route::get('/entretien/{query}',[DossierPatientController::class,'entretien'])->name('dossier-patients.entretien');
Route::post('/storeEntetien',[DossierPatientController::class,'storeEntetien'])->name('dossier-patients.storeEntetien');
Route::get('/export',[DossierPatientController::class,'export'] )->name('dossier-patients.export');
