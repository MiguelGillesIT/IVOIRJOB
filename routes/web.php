<?php

use App\Http\Controllers\AdministrateurControlleur;
use App\Http\Controllers\CandidatController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|show_Connexion_Page_Candidate
*/

Route::get('/',[CandidatController::class,'ShowLandingPage'])->name('page_Acceuil');
Route::post('/',[CandidatController::class,'ShowLandingPageRetrieve'])->name('ShowLandingPageRetrieve');    //Route to show landing Page after research

////////////////////////////////************** Candidates's ROUTES***************////////////////////////////////////////////////////

Route::post('/Candidat/Inscription',[CandidatController::class,'Register_Candidate'])->name('Inscription_Candiat');                  //Route to send type hint informations of candidates to  CandidatController
Route::get('/Candidat/Inscription',[CandidatController::class,'show_Inscription_Page_Candidate'])->name('Show_inscription_candiat'); //Route to get IVOIRJOB candidates form page to registrer



Route::get('/Candidat/login',[CandidatController::class,'show_Connexion_Page_Candidate'])->name('Show_connexion_candiat');           //Route to get IVOIRJOB candidates form page to login
Route::post('/Candidat/login',[CandidatController::class,'login_Candidate'])->name('login_Candiat');                                 //Route to send type hint informations of candidates to  CandidatController for login


Route::get('/Candidat/Tableau_de_bord',[CandidatController::class,'Tableau_de_bord_Candidate'])->middleware('auth:candidat')->name('Tableau_de_bord_candiat');   //Route to get IVOIRJOB candidates dashboard
Route::get('/Candidat/Parametres',[CandidatController::class,'Parametres_Candidate'])->middleware('auth:candidat')->name('Parametres_candiat');                  //Route to get IVOIRJOB candidates Settings
Route::get('/Candidat/Profil',[CandidatController::class,'Profil_Candidate'])->middleware('auth:candidat')->name('Profil_candiat');                              //Route to get IVOIRJOB candidates profil
Route::get('/Candidat/Offres',[CandidatController::class,'ShowOffersPage'])->middleware('auth:candidat')->name('Offres_candiat');                              //Route to get IVOIRJOB candidates offers
Route::post('/Candidat/Offres',[CandidatController::class,'ShowOffersPageRetrieve'])->middleware('auth:candidat')->name('ShowOffersPageRetrieve');             //Route to retrieve some offers
Route::get('/Candidat/Entretien/{id_suivi}',[CandidatController::class,'ParticipateToInterview'])->middleware('auth:candidat')->name('ParticipateToInterview');                       //Route to participate to an interview on IVOIRJOB
Route::post('/Candidat/ModifyPassword',[CandidatController::class,'ModifyPasswordCandidate'])->middleware('auth:candidat')->name('ModifyPasswordCandidate');                       //Route to do interviw on IVOIRJOB



Route::post('/Candidat/Profil/InformationsPersonnelles', [CandidatController::class, 'RegistrerCandidatePersonnalInfo'])->middleware('auth:candidat')->name('RegisterCandidateInfo');        //Route to register Candidate Personnal Informations



Route::post('/Candidat/Profil/Formation', [CandidatController::class, 'RegistrerCandidateFormation'])->middleware('auth:candidat')->name('RegisterCandidateFormation');                     //Route to register Candidate Formations
Route::post('/Candidat/Profil/ModifyFormation/{id}', [CandidatController::class, 'ModifyCandidateFormation'])->middleware('auth:candidat')->name('ModifyCandidateFormation');               //Route to modify Candidate Formations
Route::get('/Candidat/Profil/DeleteFormation/{id}', [CandidatController::class, 'DeleteCandidateFormation'])->middleware('auth:candidat')->name('DeleteCandidateFormation');                //Route to delete Candidate Formations



Route::post('/Candidat/Profil/ProfessionalExperiecence', [CandidatController::class, 'RegistrerCandidateProfessionalExperience'])->middleware('auth:candidat')->name('RegisterCandidateProfessionalExperience');                     //Route to register Candidate Professional Experiecence
Route::post('/Candidat/Profil/ModifyProfessionalExperiecence/{id}', [CandidatController::class, 'ModifyCandidateProfessionalExperience'])->middleware('auth:candidat')->name('ModifyCandidateProfessionalExperience');               //Route to modify Candidate Professional Experiecence
Route::get('/Candidat/Profil/DeleteProfessionalExperiecence/{id}', [CandidatController::class, 'DeleteCandidateProfessionalExperience'])->middleware('auth:candidat')->name('DeleteCandidateProfessionalExperience');                //Route to delete Candidate Professional Experiecence


Route::post('/Candidat/Profil/Certification', [CandidatController::class, 'RegistrerCandidateCertification'])->middleware('auth:candidat')->name('RegisterCandidateCertification');                     //Route to register Candidate Certification
Route::post('/Candidat/Profil/ModifyCertification/{id}', [CandidatController::class, 'ModifyCandidateCertification'])->middleware('auth:candidat')->name('ModifyCandidateCertification');               //Route to modify Candidate Certification
Route::get('/Candidat/Profil/DeleteCertification/{id}', [CandidatController::class, 'DeleteCandidateCertification'])->middleware('auth:candidat')->name('DeleteCandidateCertification');               //Route to delete Candidate Certification



Route::post('/Candidat/Profil/Competence', [CandidatController::class, 'RegistrerCandidateCompetence'])->middleware('auth:candidat')->name('RegisterCandidateCompetence');                     //Route to register Candidate skills
Route::post('/Candidat/Profil/ModifyCompetence/{id}', [CandidatController::class, 'ModifyCandidateCompetence'])->middleware('auth:candidat')->name('ModifyCandidateCompetence');               //Route to modify Candidate skills
Route::get('/Candidat/Profil/DeleteCompetence/{id}', [CandidatController::class, 'DeleteCandidateCompetence'])->middleware('auth:candidat')->name('DeleteCandidateCompetence');               //Route to delete Candidate skills



Route::post('/Candidat/Profil/Langue', [CandidatController::class, 'RegistrerCandidateLangue'])->middleware('auth:candidat')->name('RegisterCandidateLangue');                     //Route to register Candidate language
Route::get('/Candidat/Profil/DeleteLangue/{id}', [CandidatController::class, 'DeleteCandidateLangue'])->middleware('auth:candidat')->name('DeleteCandidateLangue');               //Route to delete Candidate language



Route::post('/Candidat/Profil/Document', [CandidatController::class, 'RegistrerCandidateDocument'])->middleware('auth:candidat')->name('RegisterCandidateDocument');                     //Route to register Candidate Documents
Route::post('/Candidat/Profil/ModifyDocument/{id}', [CandidatController::class, 'ModifyCandidateDocument'])->middleware('auth:candidat')->name('ModifyCandidateDocument');               //Route to modify Candidate Documents
Route::get('/Candidat/Profil/DeleteDocument/{id}', [CandidatController::class, 'DeleteCandidateDocument'])->middleware('auth:candidat')->name('DeleteCandidateDocument');                //Route to delete Candidate Documents
Route::get('/Candidat/Profil/DownloadDocument/{id}', [CandidatController::class, 'DownloadCandidateDocument'])->middleware('auth:candidat')->name('DownloadCandidateDocument');          //Route to download Candidate Documents


Route::get('/Candidat/offres/Soumission/{idFiche}', [CandidatController::class, 'SoummissionOffre'])->middleware('auth:candidat')->name('SoummissionOffre');          //Route to download Candidate suscribe to a job offer


Route::get('/Candidat/Quiz/Show/{linkQuiz}', [CandidatController::class, 'ShowQuiz'])->middleware('auth:candidat')->name('showQuiz');                               //Route to show Quiz to candidate
Route::post('/Candidat/Quiz/Send/{idQuiz}', [CandidatController::class, 'ResponsesQuiz'])->middleware('auth:candidat')->name('SendQuiz');                          //Route to show Quiz to candidate

Route::get('/Candidat/Email/send',[CandidatController::class,'SendEmail']);
Route::get('/Candidat/Email/',function (){
    return view('emails.InformCandidate');
});


////////////////////////////////************** ADMIN's ROUTES***************////////////////////////////////////////////////////


Route::get('CValidation', [AdministrateurControlleur::class, 'ShowValidationPage'])->middleware('auth:administrateur')->name('Validation_Admin');                      //Route to return validation page to admin
Route::get('Admin/Validation/ApproveAdmissionCandidate/{idSoumission}', [AdministrateurControlleur::class, 'ApproveAdmissionCandidate'])->middleware('auth:administrateur')->name('ApproveAdmissionCandidate');                      //Route to approve Admission of a candidate
Route::get('Admin/Validation/DisapproveAdmissionCandidate/{idSoumission}', [AdministrateurControlleur::class, 'DisapproveAdmissionCandidate'])->middleware('auth:administrateur')->name('DisapproveAdmissionCandidate');             //Route to disapprove Admission of a candidate


Route::get('/Admin/login',[AdministrateurControlleur::class,'show_Connexion_Page_Admin'])->name('Show_connexion_Admin');                                                              //Route to get IVOIRJOB Admins form page to login
Route::post('/Admin/login',[AdministrateurControlleur::class,'login_Admin'])->name('login_Admin');                                                                                    //Route to send type hint informations of Admins to  AdministrateurControlleur for login
Route::get('/Admin/Securite/Acces',[AdministrateurControlleur::class,'securite_Admin_acces_group'])->middleware('auth:administrateur')->name('Securite_acces_group_Admin');                              //Route to show Security space of Admins
Route::get('/Admin/Securite/Groupe',[AdministrateurControlleur::class,'show_Admin_Group'])->middleware('auth:administrateur')->name('show_Admin_Group');                              //Route to show Security space of Admins
Route::post('/Admin/Securite/RegisterGroupe', [AdministrateurControlleur::class, 'RegistrerGroupe'])->middleware('auth:administrateur')->name('RegisterGroupe');                   //Route to register Admins Group
Route::post('/Admin/Securite/ModifyGroupe/{id}', [AdministrateurControlleur::class, 'ModifyGroupe'])->middleware('auth:administrateur')->name('ModifyGroupe');             //Route to modify AdminsGroups
Route::get('/Admin/DeleteGroupe/{id}', [AdministrateurControlleur::class, 'DeleteGroupe'])->middleware('auth:administrateur')->name('DeleteGroupe');                       //Route to delete AdminsGroups



Route::get('/Admin/Profil', [AdministrateurControlleur::class, 'ShowAllUsers'])->middleware('auth:administrateur')->name('ShowAllCandidates');                            //Route to show all candidates of the plateform
Route::get('/Admin/Profil/lock/{idCandidate}', [AdministrateurControlleur::class, 'UnlockCandidate'])->middleware('auth:administrateur')->name('UnlockCandidate');                  //Route to unlock Candidate Account
Route::get('/Admin/Profil/unlock/{idCandidate}', [AdministrateurControlleur::class, 'LockCandidate'])->middleware('auth:administrateur')->name('LockCandidate');                      //Route to lock candidates account


Route::get('/Admin/Profil/lock/Admin/{idAdmin}', [AdministrateurControlleur::class, 'UnlockAdmin'])->middleware('auth:administrateur')->name('UnlockAdmin');                  //Route to unlock Admins Account
Route::get('/Admin/Profil/unlock/Admin/{idAdmin}', [AdministrateurControlleur::class, 'LockAdmin'])->middleware('auth:administrateur')->name('LockAdmin');                      //Route to lock Admins account



Route::get('/Admin/FichePoste', [AdministrateurControlleur::class, 'Show_Fiche_Poste_Page'])->middleware('auth:administrateur')->name('ShowFichePostePage');                            //Route to show FichePoste page
Route::post('/Admin/FichePoste/RegisterFiche', [AdministrateurControlleur::class, 'RegistrerFichePoste'])->middleware('auth:administrateur')->name('RegisterFichePoste');               //Route to register FichePoste
Route::post('/Admin/FichePoste/ModifyFichePoste/{id}', [AdministrateurControlleur::class, 'ModifyFichePoste'])->middleware('auth:administrateur')->name('ModifyFichePoste');            //Route to modify FichePoste
Route::get('/Admin/FichePoste/DeleteFichePoste/{id}', [AdministrateurControlleur::class, 'DeleteFichePoste'])->middleware('auth:administrateur')->name('DeleteFichePoste');             //Route to delete FichePoste


Route::get('/Admin/FichePoste/Details/{idFiche}', [AdministrateurControlleur::class, 'DetailsFiche'])->middleware('auth:administrateur')->name('DetailsFiche');                            //Route to show FichePoste page
Route::get('/Admin/FichePoste/Details/DownloadDocument/{idDocument}', [AdministrateurControlleur::class, 'DownloadCandidateDocumentAdmin'])->middleware('auth:administrateur')->name('DownloadCandidateDocumentAdmin');      //Route to Download candidate Documents


Route::get('Admin/FichePoste/SortSoumission/{idFiche}', [AdministrateurControlleur::class, 'SortSoumission'])->middleware('auth:administrateur')->name('SortSoumissions');                  //Route to sort soumissions to a job offer


Route::post('/Admin/FichePoste/Critere/RegisterCritere/{idFiche}', [AdministrateurControlleur::class, 'RegisterCritere'])->middleware('auth:administrateur')->name('RegisterCritere');                             //Route to register Critere
Route::post('/Admin/FichePoste/Critere/ModifyCritere/{id}', [AdministrateurControlleur::class, 'ModifyCritere'])->middleware('auth:administrateur')->name('ModifyCritere');                                         //Route to modify Critere
Route::get('/Admin/FichePoste/Critere/DeleteCritere/{id}', [AdministrateurControlleur::class, 'DeleteCritere'])->middleware('auth:administrateur')->name('DeleteCritere');                                          //Route to delete Critere



Route::get('/Admin/Quiz/Trigger/{idQuiz}', [AdministrateurControlleur::class, 'TriggerQuiz'])->middleware('auth:administrateur')->name('TriggerQuiz');                        //Route make quiz available to users



Route::get('/Admin/Quiz', [AdministrateurControlleur::class, 'Show_Quiz_Page'])->middleware('auth:administrateur')->name('ShowQuizPage');                        //Route to show Quiz page
Route::post('/Admin/Quiz/', [AdministrateurControlleur::class, 'RegistrerQuiz'])->middleware('auth:administrateur')->name('RegisterQuiz');                       //Route to register Quiz
Route::post('/Admin/Quiz/ModifyQuiz/{id}', [AdministrateurControlleur::class, 'ModifyQuiz'])->middleware('auth:administrateur')->name('ModifyQuiz');             //Route to modify Quiz
Route::get('/Admin/Quiz/DeleteQuiz/{id}', [AdministrateurControlleur::class, 'DeleteQuiz'])->middleware('auth:administrateur')->name('DeleteQuiz');              //Route to delete Quiz


Route::get('/Admin/Quiz/ShowPartie/{idPartie}', [AdministrateurControlleur::class, 'ShowPartie'])->middleware('auth:administrateur')->name('ShowPartie');                                     //Route to show Partie
Route::post('/Admin/Quiz/RegisterPartie{idQuiz}', [AdministrateurControlleur::class, 'RegistrerPartie'])->middleware('auth:administrateur')->name('RegisterPartie');                       //Route to register Partie
Route::post('/Admin/Quiz/ModifyPartie/{id}', [AdministrateurControlleur::class, 'ModifyPartie'])->middleware('auth:administrateur')->name('ModifyPartie');                                 //Route to modify Partie
Route::get('/Admin/Quiz/DeletePartie/{id}', [AdministrateurControlleur::class, 'DeletePartie'])->middleware('auth:administrateur')->name('DeletePartie');                                  //Route to delete Partie



Route::get('/Admin/Quiz/ShowQuestion/{idQuestion}', [AdministrateurControlleur::class, 'ShowQuestion'])->middleware('auth:administrateur')->name('ShowQuestion');                                     //Route to show Question
Route::post('/Admin/Quiz/RegisterQuestion/{idPart}', [AdministrateurControlleur::class, 'RegistrerQuestion'])->middleware('auth:administrateur')->name('RegisterQuestion');                       //Route to register Question
Route::post('/Admin/Quiz/ModifyQuestion/{id}', [AdministrateurControlleur::class, 'ModifyQuestion'])->middleware('auth:administrateur')->name('ModifyQuestion');                                 //Route to modify Question
Route::get('/Admin/Quiz/DeleteQuestion/{id}', [AdministrateurControlleur::class, 'DeleteQuestion'])->middleware('auth:administrateur')->name('DeleteQuestion');                                  //Route to delete Question



Route::post('/Admin/Quiz/RegisterProposition/{idQuestion}', [AdministrateurControlleur::class, 'RegistrerProposition'])->middleware('auth:administrateur')->name('RegisterProposition');                   //Route to register answer
Route::post('/Admin/Quiz/ModifyProposition/{id}', [AdministrateurControlleur::class, 'ModifyProposition'])->middleware('auth:administrateur')->name('ModifyProposition');                                 //Route to modify answer
Route::get('/Admin/Quiz/DeleteProposition/{id}', [AdministrateurControlleur::class, 'DeleteProposition'])->middleware('auth:administrateur')->name('DeleteProposition');                                  //Route to delete answer



Route::post('/Admin/Securite/Acces/{idGroup}', [AdministrateurControlleur::class, 'RegistrerAccesGroup'])->middleware('auth:administrateur')->name('RegisterAccessGroup');                   //Route to register group Access
Route::post('/Admin/Securite/Administrateur/{idGroup}', [AdministrateurControlleur::class, 'RegistrerNewAdmin'])->middleware('auth:administrateur')->name('RegisterNewAdmin');                         //Route to register new Admin
Route::get('/Admin/Securite/DeleteAdministrateur/{id}', [AdministrateurControlleur::class, 'DeleteAdmin'])->middleware('auth:administrateur')->name('DeleteAdmin');                          //Route to delete Admin
Route::post('/Admin/Securite/ModifyAdministrateur/{id}', [AdministrateurControlleur::class, 'ModifyAdmin'])->middleware('auth:administrateur')->name('ModifyAdmin');                          //Route to Modify Admin


Route::get('/Admin/Entretien', [AdministrateurControlleur::class, 'ShowScheduleEntretien'])->middleware('auth:administrateur,')->name('ShowScheduleEntretien');                                             //Route to SHOW schedule interviews details
Route::post('/Admin/Entretien/Schedule/{idSoumission}', [AdministrateurControlleur::class, 'ScheduleEntretien'])->middleware('auth:administrateur')->name('ScheduleEntretien');                                             //Route to SHOW schedule interviews details
Route::get('/Admin/Entretien/{id_suivi}', [AdministrateurControlleur::class, 'ParticipateTOinterview'])->middleware('auth:administrateur')->name('ParticipateTOinterview');                                             //Route to SHOW schedule interviews details
Route::get('/Admin/Entretien/DisapproveCandidate/{id_suivi}', [AdministrateurControlleur::class, 'DisapproveCandidate'])->middleware('auth:administrateur')->name('DisapproveCandidate');                                             //Route to SHOW schedule interviews details
Route::get('/Admin/Entretien/ApproveCandidate/{id_suivi}', [AdministrateurControlleur::class, 'ApproveCandidate'])->middleware('auth:administrateur')->name('ApproveCandidate');                                             //Route to SHOW schedule interviews details
Route::post('/Admin/Entretien/Mark/{id_suivi}', [AdministrateurControlleur::class, 'EvaluateCandidate'])->middleware('auth:administrateur')->name('EvaluateCandidate');                                             //Route to mark a candidate who have passed an interview

Route::get('/Admin/Log', [AdministrateurControlleur::class, 'Show_Log_Page'])->middleware('auth:administrateur')->name('ShowLogPage');                                                       //Route to show Logs page


Route::get('/DECONNEXION',[CandidatController::class,'Logout_Candidate'])->name('DECONNEXION');

