<?php

use App\Http\Controllers\AdresseController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CandidatureController;
use App\Http\Controllers\CompetenceController;
use App\Http\Controllers\CritiqueController;
use App\Http\Controllers\CvController;
use App\Http\Controllers\DomaineController;
use App\Http\Controllers\EmploiController;
use App\Http\Controllers\EmploiTypeController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\LangueController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ReponseController;
use App\Http\Controllers\SecteurActiviteController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Users\AdminController;
use App\Http\Controllers\Users\CandidatController;
use App\Http\Controllers\Users\EmployeurController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Getting all of the data
Route::get('/admins',[AdminController::class,'index']);
Route::get('/employeurs',[EmployeurController::class,'index']);
Route::get('/candidats',[CandidatController::class,'index']);
Route::get('/emplois',[EmploiController::class,'index']);



// Users registrations
Route::post('/registerAdmin',[AuthController::class,'registerAdmin']);
Route::post('/registerEmployeur',[AuthController::class,'registerEmployeur']);
Route::post('/registerCandidat',[AuthController::class,'registerCandidat']);

// Loging in
Route::post('/loginAdmin',[AuthController::class,'logInAdmin']);
Route::post('/loginEmployeur',[AuthController::class,'logInEmployeur']);
Route::post('/loginCandidat',[AuthController::class,'logInCandidat']);




// Showing one of the
Route::get('admin/{id}',[AdminController::class,'show']);
Route::get('employeur/{id}',[EmployeurController::class,'show']);
Route::get('candidat/{id}',[CandidatController::class,'show']);
Route::get('cv/{id}',[CvController::class,'show']);



// Searching for data
Route::get('/cv/search/{nv}',[CvController::class,'search']);
Route::get('emploi/{id}',[EmploiController::class,'show']);



/*
|--------------------------------------------------------------------------
| Proected Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => ['auth:sanctum']], function () {


    // Adding data
    Route::post('emploi',[EmploiController::class,'store']);
    Route::post('emploi_type',[EmploiTypeController::class,'store']);
    Route::post('secteur_activite',[SecteurActiviteController::class,'store']);

    Route::post('candidature',[CandidatureController::class,'store']);
    Route::post('critique',[CritiqueController::class,'store']);

    Route::post('/cv',[CvController::class,'store']);
    Route::post('competence',[CompetenceController::class,'store']);
    Route::post('domaine',[DomaineController::class,'store']);
    Route::post('experience',[ExperienceController::class,'store']);

    Route::post('profile',[ProfileController::class,'store']);
    Route::post('adresse',[AdresseController::class,'store']);
    Route::post('langue',[LangueController::class,'store']);

    Route::post('test',[TestController::class,'store']);
    Route::post('note',[NoteController::class,'store']);
    Route::post('question',[QuestionController::class,'store']);
    Route::post('reponse',[ReponseController::class,'store']);


    // Modifying data
    Route::put('/admin/{id}',[AdminController::class,'update']);
    Route::put('/employeur/{id}',[EmployeurController::class,'update']);
    Route::put('/candidat/{id}',[CandidatController::class,'update']);
    Route::put('cv/{id}',[CvController::class,'update']);

    Route::put('emploi/{id}',[EmploiController::class,'update']);
    Route::put('emploi_type/{id}',[EmploiTypeController::class,'update']);
    Route::put('secteur_activite/{id}',[SecteurActiviteController::class,'update']);

    Route::put('candidature/{id}',[CandidatureController::class,'update']);
    Route::put('critique/{id}',[CritiqueController::class,'update']);

    Route::put('competence/{id}',[CompetenceController::class,'update']);
    Route::put('domaine/{id}',[DomaineController::class,'update']);
    Route::put('experience/{id}',[ExperienceController::class,'update']);

    Route::put('profile/{id}',[ProfileController::class,'update']);
    Route::put('adresse/{id}',[AdresseController::class,'update']);
    Route::put('langue/{id}',[LangueController::class,'update']);

    Route::put('test/{id}',[TestController::class,'update']);
    Route::put('note/{id}',[NoteController::class,'update']);
    Route::put('question/{id}',[QuestionController::class,'update']);
    Route::put('reponse/{id}',[ReponseController::class,'update']);


    // Deleting data
    Route::delete('admin/{id}',[AdminController::class,'destroy']);
    Route::delete('employeur/{id}',[EmployeurController::class,'destroy']);
    Route::delete('candidat/{id}',[CandidatController::class,'destroy']);
    Route::delete('cv/{id}',[CvController::class,'destroy']);

    Route::delete('emploi/{id}',[EmploiController::class,'destroy']);
    Route::delete('emploi_type/{id}',[EmploiTypeController::class,'destroy']);
    Route::delete('secteur_activite/{id}',[SecteurActiviteController::class,'destroy']);

    Route::delete('candidature/{id}',[CandidatureController::class,'destroy']);
    Route::delete('critique/{id}',[CritiqueController::class,'destroy']);

    Route::delete('competence/{id}',[CompetenceController::class,'destroy']);
    Route::delete('domaine/{id}',[DomaineController::class,'destroy']);
    Route::delete('experience/{id}',[ExperienceController::class,'destroy']);

    Route::delete('profile/{id}',[ProfileController::class,'destroy']);
    Route::delete('adresse/{id}',[AdresseController::class,'destroy']);
    Route::delete('langue/{id}',[LangueController::class,'destroy']);

    Route::delete('test/{id}',[TestController::class,'destroy']);
    Route::delete('note/{id}',[NoteController::class,'destroy']);
    Route::delete('question/{id}',[QuestionController::class,'destroy']);
    Route::delete('reponse/{id}',[ReponseController::class,'destroy']);


    // Getting all of the data in a table
    Route::get('/cvs',[CvController::class,'index']);
    Route::get('candidatures',[CandidatureController::class,'index']);
    Route::get('critiques',[CritiqueController::class,'index']);

    Route::get('emploi_types',[EmploiTypeController::class,'index']);
    Route::get('secteur_activites',[SecteurActiviteController::class,'index']);

    Route::get('competences',[CompetenceController::class,'index']);
    Route::get('domaines',[DomaineController::class,'index']);
    Route::get('experiences',[ExperienceController::class,'index']);

    Route::get('profiles',[ProfileController::class,'index']);
    Route::get('adresses',[AdresseController::class,'index']);
    Route::get('langues',[LangueController::class,'index']);

    Route::get('tests',[TestController::class,'index']);
    Route::get('notes',[NoteController::class,'index']);
    Route::get('questions',[QuestionController::class,'index']);
    Route::get('reponses',[ReponseController::class,'index']);


    // Showing one row of a table
    Route::get('admin/{id}',[AdminController::class,'show']);
    Route::get('employeur/{id}',[EmployeurController::class,'show']);
    Route::get('candidat/{id}',[CandidatController::class,'show']);
    Route::get('cv/{id}',[CvController::class,'show']);

    Route::get('emploi_type/{id}',[EmploiTypeController::class,'show']);
    Route::get('secteur_activite/{id}',[SecteurActiviteController::class,'show']);

    Route::get('candidature/{id}',[CandidatureController::class,'show']);
    Route::get('critique/{id}',[CritiqueController::class,'show']);

    Route::get('competence/{id}',[CompetenceController::class,'show']);
    Route::get('domaine/{id}',[DomaineController::class,'show']);
    Route::get('experience/{id}',[ExperienceController::class,'show']);

    Route::get('profile/{id}',[ProfileController::class,'show']);
    Route::get('adresse/{id}',[AdresseController::class,'show']);
    Route::get('langue/{id}',[LangueController::class,'show']);

    Route::get('test/{id}',[TestController::class,'show']);
    Route::get('note/{id}',[NoteController::class,'show']);
    Route::get('question/{id}',[QuestionController::class,'show']);
    Route::get('reponse/{id}',[ReponseController::class,'show']);

    // Logging out
    Route::post('/logout',[AuthController::class,'logOut']);


});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

