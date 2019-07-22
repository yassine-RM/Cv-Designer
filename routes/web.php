<?php

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

//---------------------------Route Auth----------------------

Route::get('/login', 'AuthController@login');
Route::post('/login', 'AuthController@verifierLogin');
Route::get('/logout', 'AuthController@logout');
Route::get('/register', 'AuthController@register');
Route::post('/register', 'AuthController@store');
//----------------------profile------------------
Route::get('/getProfile', 'AuthController@getProfile')->middleware('authCon');;
Route::put('/updateProfile', 'AuthController@updateProfile')->middleware('authCon');;


//---------------------------Route de cv template dans Controller-----------
Route::get('/cvView', 'CvController@cvView');
Route::get('/mesCvs', 'CvController@mesCvs');
Route::delete('/deleteCv/{id}', 'CvController@deleteCv');
Route::get('/createCv', 'CvController@createCv');
Route::get('/cvTemplate/{id}', 'CvController@cvTemplate');
Route::get('/showCv/{id}', 'CvController@showCv');
Route::get('/', 'CvController@accueil');
Route::get('/storeCv', 'CvController@storeCv');
Route::post('/storeCv1', 'CvController@storeCv1');

//---------------------------Competences-------------------------------------------
Route::post('/addCompetence/{id}', 'CompetenceController@addCompetence');
Route::get('/getCompetences/{id}', 'CompetenceController@getCompetences');
Route::delete('/deleteCompetence/{id}', 'CompetenceController@deleteCompetence');
Route::put('/updateCompetence/{id}', 'CompetenceController@UpdateCompetence');

//---------------------------Formations-------------------------------------------
Route::post('/addFormation/{id}', 'FormationController@addFormation');
Route::get('/getFormations/{id}', 'FormationController@getFormations');
Route::delete('/deleteFormation/{id}', 'FormationController@deleteFormation');
Route::put('/updateFormation/{id}', 'FormationController@updateFormation');

//---------------------------Experiences-------------------------------------------
Route::post('/addExperience/{id}', 'ExperienceController@addExperience');
Route::get('/getExperiences/{id}', 'ExperienceController@getExperiences');
Route::delete('/deleteExperience/{id}', 'ExperienceController@deleteExperience');
Route::put('/updateExperience/{id}', 'ExperienceController@updateExperience');

//---------------------------Langues-------------------------------------------
Route::post('/addLangue/{id}', 'LangueController@addLangue');
Route::get('/getLangues/{id}', 'LangueController@getLangues');
Route::delete('/deleteLangue/{id}', 'LangueController@deleteLangue');
Route::put('/updateLangue/{id}', 'LangueController@updateLangue');
//---------------------------Liens-------------------------------------------
Route::post('/addLien/{id}', 'LienController@addLien');
Route::get('/getLiens/{id}', 'LienController@getLiens');
Route::delete('/deleteLien/{id}', 'LienController@deleteLien');
Route::put('/updateLien/{id}', 'LienController@updateLien');

//---------------------------Loisires-------------------------------------------
Route::post('/addLoisire/{id}', 'LoisireController@addLoisire');
Route::get('/getLoisires/{id}', 'LoisireController@getLoisires');
Route::delete('/deleteLoisire/{id}', 'LoisireController@deleteLoisire');
Route::put('/updateLoisire/{id}', 'LoisireController@updateLoisire');

//---------------------------Informations-------------------------------------------
Route::get('/getInfos/{id}', 'CvController@getInfos');
Route::put('/updateInfos', 'CvController@updateInfos');
Route::put('/updateCv/{id}', 'CvController@updateCv');

//-----------------------getvilles-----------------
Route::get('/getVilles/{paye}', 'AuthController@getVilles');

//-----------------------getPayes-----------------
Route::get('/getPayes', 'AuthController@getPayes');


//--------------------------recherch----------------
Route::get('search/{search}', 'CvController@search');
//--------------------------recherch----------------
Route::get('searchCvs', 'CvController@searchCvs');

//--------------------------alltitre des cv----------------
Route::get('allTitre', 'CvController@allTitre');

//--------------------------serach cv----------------

//--------------------------update like cv----------------
Route::put('updateLike/{id}', 'CvController@updateLike');
//--------------------------add comment----------------
Route::post('addComment/{id}', 'CvController@addComment');
//--------------------------get comment----------------
Route::get('getComments/{id}', 'CvController@getComments');
//--------------------------get notif----------------
Route::get('getNotif', 'CvController@getNotif');
//--------------------------liste listeNotification----------------
Route::get('listeNotification', 'CvController@listeNotification');
//------------------------------------------
Route::put('editState/{id}', 'CvController@editState');

//-------------------------------------------------
Route::get('email', 'CvController@sentMail');

//-------------------------------------------------
Route::delete('deleteComment/{id}', 'CvController@deleteComment');

//-------------------------------------------------
Route::put('editComment/{id}', 'CvController@editComment');
//-------------------------------------------------
Route::put('editDownload/{id}', 'CvController@editDownload');


//-----------------------------countUsers----------------------
Route::get('CountUsers', 'CvController@CountUsers');
//-----------------------------countCvs----------------------
Route::get('CountCvs', 'CvController@CountCvs');

//-----------------------------Dashboard----------------------
Route::get('Dashboard', 'CvController@Dashboard')->middleware('adminMiddl');
//-----------------------------Notifications----------------------
Route::get('Notifications', 'CvController@Notifications');
//-----------------------------Notifications----------------------
Route::get('showCvs/{id}', 'CvController@showCvs');
//-----------------------------Notifications----------------------
Route::put('EditState/{id}', 'CvController@EditState');
//-----------------------------Notifications----------------------
Route::put('/admin/{id}', 'CvController@admin');
//-----------------------------deleteUser----------------------
Route::delete('deleteUser/{id}', 'CvController@deleteUser');