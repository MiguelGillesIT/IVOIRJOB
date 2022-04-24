<?php

namespace App\Http\Controllers;

use App\Models\Acces;
use App\Models\Administrateur;
use App\Models\Candidat;
use App\Models\Critere;
use App\Models\Document;
use App\Models\Etape;
use App\Models\FichePoste;
use App\Models\Fonctionnalite;
use App\Models\Group;
use App\Models\Log;
use App\Models\Partie;
use App\Models\Proposition;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Soumission;
use App\Models\Suivi;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class AdministrateurControlleur extends Controller
{

    //function to show details of candidates for a job offer
    public function DetailsFiche($idFiche){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnFichePoste')){
            abort(403);
        }

        $fichePoste = FichePoste::find($idFiche);
        $nombreApprouves = 0;
        $nombreNonApprouves = 0;
        foreach($fichePoste->Soumissions as $soumission){
            if(isset($soumission->suivis->etape_id) && isset($soumission->suivis->validation_Etape)){
                if($soumission->suivis->etape_id == "1" && $soumission->suivis->validation_Etape == "1"){
                    $nombreApprouves++;
                }
                if($soumission->suivis->etape_id == "1" && $soumission->suivis->validation_Etape == "0"){
                    $nombreNonApprouves++;
                }

            }
        }

        return view('Administrateur.DetailsFiche',[ 'fichePoste' => $fichePoste, 'nombreApprouves' => $nombreApprouves , "nombreNonApprouves" => $nombreNonApprouves]);
    }

    //function to download candidates files
    public function DownloadCandidateDocumentAdmin($idDocument){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnFichePoste')){
            abort(403);
        }

        //Retrieve the document and show them to candidate
        $document = Document::find($idDocument);
        return Storage::download($document->lien_Document);

    }


    //function to return page where Interview will be scheduled
    public function ShowScheduleEntretien(){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnScheduleEntretien')){
            abort(403);
        }

        //if Admin account is lock
        if(Auth::user()->statut_Administrateur){
            return view('compteBloque');
        }
        $fiches = FichePoste::all();
        return view('Administrateur.entretien',['fiches'  => $fiches]);
    }

    //function to schedule a interview with a candidate
    public function ScheduleEntretien($idSoumission, Request $request){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnScheduleEntretien')){
            abort(403);
        }


        //Validate groupe entitled
        $validate_data = Validator::make($request->all(),[
            'Schedule_interview' => 'required',
        ])->validateWithBag('ErrorScheduleEntretien');


        $SuiviEntretien = Suivi::firstOrCreate([
            'etape_id' => '3',
            'soumission_id' => $idSoumission
        ],[
            'date_Participation_Etape' => $request->input('Schedule_interview'),
            'lien_Etape' => Str::random(40),
        ]);

        return redirect()->back();

    }

    //function to participate to an interview with Administrator
    public function ParticipateTOinterview($id_suivi){
        $suivi = Suivi::find($id_suivi);
        return view('Administrateur.EntretienVisio', ['suivi' => $suivi]);
    }

    //function to show details of candidates
    public function ShowAllUsers(){

        //if Admin account is lock
        if(Auth::user()->statut_Administrateur){
            return view('compteBloque');
        }

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnProfilUsers')){
            abort(403);
        }

        $Candidats = Candidat::all();
        $Recruteurs = Administrateur::where('groupe_id','3')->get();
        $Validateurs = Administrateur::where('groupe_id','8')->get();
        $Administrateurs = Administrateur::where('groupe_id','2')->get();
        return view('Administrateur.Profil',['Candidats' => $Candidats, 'Recruteurs' => $Recruteurs, 'Validateurs' => $Validateurs, 'Administrateurs' => $Administrateurs]);
    }

    //function to unlock a Candidate Account
    public function UnlockCandidate($idCandidate){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnProfilUsers')){
            abort(403);
        }

        $Candidat = Candidat::find($idCandidate);
        $Candidat->statut_Candidat = true;
        $Candidat->save();
        return redirect()->back();
    }

    //function to lock a Admin Account
    public function LockCandidate($idCandidate){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnProfilUsers')){
            abort(403);
        }

        $Candidat = Candidat::find($idCandidate);
        $Candidat->statut_Candidat = false;
        $Candidat->save();
        return redirect()->back();
    }

    //function to unlock a Candidate Account
    public function UnlockAdmin($idAdmin){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnProfilUsers')){
            abort(403);
        }

        $Admin = Administrateur::find($idAdmin);
        $Admin->statut_Administrateur = true;
        $Admin->save();
        return redirect()->back();
    }

    //function to lock a Admin Account
    public function LockAdmin($idAdmin){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnProfilUsers')){
            abort(403);
        }

        $Admin = Administrateur::find($idAdmin);
        $Admin->statut_Administrateur = false;
        $Admin->save();
        return redirect()->back();
    }


    //function to return IVOIRJOB Admins form page to registrer
    public function show_Connexion_Page_Admin(){

        return view('Administrateur.connexion');

    }

    //function to return job offer Page to Admin
    public function Show_Fiche_Poste_Page(){
        //if Admin account is lock
        if(Auth::user()->statut_Administrateur){
            return view('compteBloque');
        }

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnFichePoste')){
            abort(403);
        }

        $fichePostes = FichePoste::all();
        return view('Administrateur.fichePoste',[ 'fichePostes' => $fichePostes]);
    }

    //function to return job offer Page to Admin
    public function Show_Quiz_Page(){

        //if Admin account is lock
        if(Auth::user()->statut_Administrateur){
            return view('compteBloque');
        }

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnQuiz')){
            abort(403);
        }

        $quizz = Quiz::all();
        $fichePostes = FichePoste::all();
        return view('Administrateur.quiz', ['quizz' => $quizz, 'fichePostes' => $fichePostes]);
    }

    //function to return security Page of IVOIRJOB
    public function securite_Admin_acces_group(){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnSecurite')){
            abort(403);
        }

        $fonctionnalites_Groupe = [];                               //Contain fonctionnalities of a group
        $fonctionnalites_Groupes = [];                              //Contain fonctionnalities of all groups
        $fonctionnalites = Fonctionnalite::all();
        $groupes = Group::all();
        foreach($groupes as $group){
            foreach($group->fonctionnalites as $fonctionnalities){
                $fonctionnalites_Groupe = Arr::collapse([$fonctionnalites_Groupe,[$fonctionnalities->libelle]]);
            }
           array_push($fonctionnalites_Groupes,$fonctionnalites_Groupe);
            $fonctionnalites_Groupe = [];
        }
        $acces = Acces::all();
        $admins = Administrateur::all();
        return view('Administrateur.Accès',['groupes' => $groupes, 'fonctionnalites' => $fonctionnalites, 'acces' => $acces, 'fonctionnalites_Groupes'  =>$fonctionnalites_Groupes ]);
    }

    //function to authenticate IVOIRJOB Admins and redirect them to their dashboard Pages
    public function login_Admin(Request $request){
        //Validate data send to IVOIRJOB

        $validate_data = Validator::make($request->all(),[
            'E_mail_admin' => "bail | required | email |  max:35",
            'Mot_de_passe_admin' => "bail | required |  max:20 | min:6",
        ]);


        //Verify that the credentials are candidate's credentials
        if(Auth::guard('administrateur')->attempt(['e_mail_Administrateur' => $request->input('E_mail_admin'), 'password' => $request->input('Mot_de_passe_admin')])) {
            $request->session()->regenerate();
            $AdminGroupe = Administrateur::where('e_mail_Administrateur',$request->input('E_mail_admin'))->first()->groupe_id;
            if($AdminGroupe == 3 ){
                return redirect()->intended('/Admin/FichePoste');
            }else if($AdminGroupe == 8){
                return redirect()->intended('/Admin/FichePoste');
            }elseif($AdminGroupe == 2){
                return redirect()->intended('/Admin/Profil');
            }

        }
        return back()->withErrors([
            'E-mail' => "Vos identifiants sont incorrects.",
        ]);
    }

    //function to show all Admin's groups and thier details
    public function show_Admin_Group(){
        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnSecurite')){
            abort(403);
        }
        $groupes = Group::all();
        return view('Administrateur.Groupe',['groupes' => $groupes]);
    }

    //function to create Admins groups
    public function RegistrerGroupe(Request $request){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnSecurite')){
            abort(403);
        }

        //Validate groupe entitled
        $validate_data = Validator::make($request->all(),[
            'libelle_Groupe' => 'required | max : 45',
        ])->validateWithBag('ErrorRegistrerGroup');

        $groupe = new Group;
        $groupe->libelle_Groupe = $request->input('libelle_Groupe');
        $groupe->save();

        //Redirect the candidate Admin to security Page
        return redirect()->back();
    }

    //function to show Validation Page to Admin
    public function ShowValidationPage(){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnValidation')){
            abort(403);
        }

        //if Admin account is lock
        if(Auth::user()->statut_Administrateur){
            return view('compteBloque');
        }
        $fiches = FichePoste::all();
        return view('Administrateur.validation',['fiches' => $fiches ]);
    }

    //function to approve admission of a candidate
    public function ApproveAdmissionCandidate($idSoumission){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnValidation')){
            abort(403);
        }

        $Soumission = Soumission::find($idSoumission);
        Suivi::firstOrCreate([
            'etape_id' => '4',
            'soumission_id' =>  $Soumission->id_Soumission,

        ],[
            'date_Participation_Etape'  => now(),
            'validation_Etape' => true,
        ]);
        return redirect()->back();
    }

    //function to approve admission of a candidate
    public function DisapproveAdmissionCandidate($idSoumission){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnValidation')){
            abort(403);
        }

        $Soumission = Soumission::find($idSoumission);
        Suivi::firstOrCreate([
            'etape_id' => '4',
            'soumission_id' =>  $Soumission->id_Soumission,

        ],[
            'date_Participation_Etape'  => now(),
            'validation_Etape' => false,
        ]);
        return redirect()->back();
    }


    //function to modify Admins groups
    public function ModifyGroupe($id, Request $request){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnSecurite')){
            abort(403);
        }

        //Validate groupe entitled
        $validate_data = Validator::make($request->all(),[
            'libelle_Groupe' => 'required | max : 45',
        ])->validateWithBag('ErrorModifyGroup');

        //Retrieve the group
        $groupe = Group::find($id);

        //Register the title only if is different of which it is in Database
        if($groupe->libelle_Groupe != $request->input('libelle_Groupe')){
            $groupe->libelle_Groupe = $request->input('libelle_Groupe');
        }

        //save the group
        $groupe->save();

        //Redirect the candidate Admin to security Page
        return redirect()->back();

    }

    //function to delete Admins groups
    public function DeleteGroupe($id, Request $request){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnSecurite')){
            abort(403);
        }

        $groupe = Group::find($id);
        //Retrieve the group and delete the group
        $groupe->delete();

        //Redirect the candidate Admin to security Page
        return redirect()->back();
    }

    //function to create new Admin
    public function RegistrerNewAdmin(Request $request, $idGroup){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnSecurite')){
            abort(403);
        }

        $validate_data = Validator::make($request->all(),[
            //Validate informations about new Admin
            'nom_Administrateur' => 'bail | required | max : 18',
            'prenoms_Administrateur' => 'bail | required | max : 25',
            'e_mail_Administrateur' => 'bail | required | email | max : 35',
            'service_Administrateur' => 'bail | required | max : 30',
            'password' => 'bail | required | max:20 | min:6',
            'Confirm_password' => 'bail | required | same:password',
        ])->validateWithBag('ErrorRegistrerAdmin');

        //seek correspunding group for new Admin
        $groupe = Group::find($idGroup);

        //Create new Admin and save him
        $Admin = new Administrateur;
        $Admin->nom_Administrateur = $request->input('nom_Administrateur');
        $Admin->prenoms_Administrateur = $request->input('prenoms_Administrateur');
        $Admin->e_mail_Administrateur = $request->input('e_mail_Administrateur');
        $Admin->service_Administrateur = $request->input('service_Administrateur');
        $Admin->statut_Administrateur = false;
        $Admin->groupe_id = $groupe->id_Groupe;
        $Admin->password = bcrypt($request->input('password'));
        $Admin->save();
        //Redirect the candidate Admin to security Page
        return redirect()->route('show_Admin_Group');
    }

    //function to modify Admin
    public function ModifyAdmin(Request $request, $id){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnSecurite')){
            abort(403);
        }

        $validate_data = Validator::make($request->all(),[
            //Validate informations about new Admin
            'nom_Administrateur' => 'bail | required | max : 18',
            'prenoms_Administrateur' => 'bail | required | max : 25',
            'e_mail_Administrateur' => 'bail | required | email | max : 35',
            'service_Administrateur' => 'bail | required | max : 30',
        ])->validateWithBag('ErrorModifyAdmin');

        //retrieve correspunding admin
        $admin = Administrateur::find($id);

        //Register the admin name only if is different of which it is in Database
        if($admin->nom_Administrateur != $request->input('nom_Administrateur')){
            $admin->nom_Administrateur = $request->input('nom_Administrateur');
        }

        //Register the admin's service only if is different of which it is in Database
        if( $admin->service_Administrateur != $request->input('service_Administrateur')){
            $admin->service_Administrateur = $request->input('service_Administrateur');
        }

        //Register the admin's e-mail only if is different of which it is in Database
        if( $admin->e_mail_Administrateur != $request->input('e_mail_Administrateur')){
            $admin->e_mail_Administrateur = $request->input('e_mail_Administrateur');
        }

        //Register the admin's prename only if is different of which it is in Database
        if($admin->prenoms_Administrateur != $request->input('prenoms_Administrateur')){
            $admin->prenoms_Administrateur = $request->input('prenoms_Administrateur');
        }

        $admin->save();
        //Redirect the candidate Admin to security Page
        return redirect()->route('show_Admin_Group');
    }

    //function to delete Admin
    public function DeleteAdmin($id,Request $request){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnSecurite')){
            abort(403);
        }

        $Admin = Administrateur::find($id)->delete();
        return redirect()->back();
    }

    //function to register new job offer
    public function RegistrerFichePoste(Request $request){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnFichePoste')){
            abort(403);
        }

        //Validate data send by Admin
        $validate_data = Validator::make($request->all(),[
            'libelle_Fiche' => "bail | required | min:10 |  max:55",
            'description_Fiche' => "bail | required | min:20",
            'date_Limite_Candidature' => "bail | required",
        ])->validateWithBag('ErrorRegistrerFichePoste');

        //record job offer informations send by Admin and save them
        $fichePoste = new FichePoste;
        $fichePoste->libelle_Fiche = $request->input('libelle_Fiche');
        $fichePoste->description_Fiche = $request->input('description_Fiche');
        $fichePoste->type_Offre = $request->input('type_Offre');
        $fichePoste->date_Limite_Candidature = $request->input('date_Limite_Candidature');
        $fichePoste->administrateur_id = Auth::user()->id_Administrateur;
        $fichePoste->save();

        //Redirect Admin to Job Offer Page
        return redirect()->route('ShowFichePostePage');

    }

    //function to modify a job offer
    public function ModifyFichePoste($id, Request $request){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnFichePoste')){
            abort(403);
        }

        //Validate data send by Admin
        $validate_data = Validator::make($request->all(),[
            'libelle_Fiche' => "bail | required | min:10 |  max:55",
            'description_Fiche' => "bail | required | min:20 ",
            'type_Offre' => "bail | required",
            'date_Limite_Candidature' => "bail | required",
        ])->validateWithBag('ErrorModifyFichePoste');

        //Retrieve job offer
        $fichePoste = FichePoste::find($id);

        if($fichePoste->libelle_Fiche != $request->input('libelle_Fiche')){
            $fichePoste->libelle_Fiche = $request->input('libelle_Fiche');
        }

        if( $fichePoste->description_Fiche != $request->input('description_Fiche')){
            $fichePoste->description_Fiche = $request->input('description_Fiche');
        }

        if($fichePoste->type_Offre != $request->input('type_Offre') && $request->input('type_Offre') != "AUCUN" ){
            $fichePoste->type_Offre = $request->input('type_Offre');
        }

        if($fichePoste->date_Limite_Candidature != $request->input('date_Limite_Candidature')){
            $fichePoste->date_Limite_Candidature = $request->input('date_Limite_Candidature');
        }

        //save Job Offer
        $fichePoste->save();

        //Redirect Admin to Job Offer Page
        return redirect()->route('ShowFichePostePage');
    }

    //function to delete a job offer
    public function DeleteFichePoste($id){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnFichePoste')){
            abort(403);
        }

        //Retrieve job offer and delete him
        $fichePoste = FichePoste::find($id)->delete();

        //Redirect Admin to Job Offer Page
        return redirect()->route('ShowFichePostePage');
    }

    //function to register critera
    public function RegisterCritere($idFiche,Request $request){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnFichePoste')){
            abort(403);
        }

        //Validate data send by Admin
        $validate_data = Validator::make($request->all(),[
            'libelle_Critere' => "bail | required |  max:45",
            'valeur_Critere' => "bail | required | max:90",
            'type_Critere' => "bail | required | min:4 | max: 30 | different:'AUCUN'",
        ])->validateWithBag('ErrorRegistrerCritere');



        //Verify that critera type and critera title are suitable
        if(in_array($request->input('libelle_Critere'),["Compétence","Certification","Poste précedemment occupé","secteur de l'experience","type de contrat de l'experience","intitule de la formation","etablissement de la formation","diplome de la formation","situation matrimoniale du candidat","permis du candidat","langue parlée par le candidat","niveau de la langue parlée candidat"]) && $request->input('type_Critere') != "ÉGAL"){
            return redirect()->route('ShowFichePostePage')->with('ErrorTypeCritera', "Ce critère et ce type ne sont pas compatibles");

        }

        $fiche = FichePoste::find($idFiche);

        //record critera informations send by Admin and save them
        $critere = new Critere;
        $critere->libelle_Critere = $request->input('libelle_Critere');

        if($request->input('statut_Critere') == 'Oui'){
            $critere->statut_Critere = true;
        }
        $critere->valeur_Critere = $request->input('valeur_Critere');
        $critere->type_Critere = $request->input('type_Critere');
        $critere->fiche_id = $fiche->id_Fiche;
        $critere->save();

        //Redirect Admin to Job Offer Page
        return redirect()->route('ShowFichePostePage');

    }

    //function to modify critera
    public function ModifyCritere($id, Request $request){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnFichePoste')){
            abort(403);
        }

        //Validate data send by Admin
        $validate_data = Validator::make($request->all(),[
            'libelle_Critere' => "bail | required |  max:45 | different:AUCUN",
            'valeur_Critere' => "bail | required | max:90",
            'type_Critere' => "bail | required | min:4 | max: 30 | different:'AUCUN'",
        ])->validateWithBag('ErrorModifyCritere');


        //Verify that critera type and critera title are suitable
        if(in_array($request->input('libelle_Critere'),["Compétence","Certification","Poste précedemment occupé","secteur de l'experience","type de contrat de l'experience","intitule de la formation","etablissement de la formation","diplome de la formation","situation matrimoniale du candidat","permis du candidat","langue parlée par le candidat","niveau de la langue parlée candidat"]) && $request->input('type_Critere') != "ÉGAL"){
            return redirect()->route('ShowFichePostePage')->with('ErrorModifyTypeCritera', "Ce critère et ce type ne sont pas compatibles");

        }

        //Retrieve critera
        $critere = Critere::find($id);

        if($critere->libelle_Critere != $request->input('libelle_Critere')){
            $critere->libelle_Critere = $request->input('libelle_Critere');
        }

        if($request->input('statut_Critere') == "Oui"){
            $critere->statut_Critere = true;
        }else{
            $critere->statut_Critere = false;
        }

        if($critere->valeur_Critere != $request->input('valeur_Critere')){
            $critere->valeur_Critere = $request->input('valeur_Critere');
        }

        if($critere->type_Critere != $request->input('type_Critere')){
            $critere->type_Critere = $request->input('type_Critere');
        }

        //save Job Critere
        $critere->save();

        //Redirect Admin to Job Offer Page
        return redirect()->route('ShowFichePostePage');
    }

    //function to delete critera
    public function DeleteCritere($id){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnFichePoste')){
            abort(403);
        }

        //Retrieve job offer and delete him
        $critere = Critere::find($id)->delete();

        //Redirect Admin to Job Offer Page
        return redirect()->route('ShowFichePostePage');
    }

    //Function to register new Quiz
    public function RegistrerQuiz(Request $request){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnQuiz')){
            abort(403);
        }

        //Validate data send by Admin
        $validate_data = Validator::make($request->all(),[
            'intitule_Quiz' => "bail | required | min:5 |  max:45",
            'date_Limite_Quiz' => "bail | required",
            'score_Minimal_Quiz' => "bail | required | numeric | min:10 |  max:1000",
        ])->validateWithBag('ErrorRegistrerQuiz');

        //Retrieve the correspunding job offer
        $fichePoste = FichePoste::where('libelle_Fiche',$request->input('Fiche_Poste'))->first();

        //record Quiz informations send by Admin and save them
        $quiz = Quiz::firstOrCreate([
            'fiche_id' => $fichePoste->id_Fiche
        ],[
            'intitule_Quiz' => $request->input('intitule_Quiz'),
            'date_Limite_Quiz' => $request->input('date_Limite_Quiz'),
            'score_Minimal_Quiz' => $request->input('score_Minimal_Quiz'),
            'fiche_id' => $fichePoste->id_Fiche
        ]);

        //Redirect Admin to Quiz Page
        return redirect()->route('ShowQuizPage');
    }

    //function to show a quiz partie to admin
    public function ShowPartie($idPartie){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnQuiz')){
            abort(403);
        }

        $Partie = Partie::find($idPartie);
        return view("Administrateur.DetailsPartie",['Partie' => $Partie]);
    }

    //function to show a responses possibility to admin
    public function ShowQuestion($idQuestion){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnQuiz')){
            abort(403);
        }

        $question = Question::find($idQuestion);
        return view("Administrateur.DetailsQuestion",['question' => $question]);
    }

    //function to modify an existing Quiz
    public function ModifyQuiz($id, Request $request){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnQuiz')){
            abort(403);
        }

        //Validate data send by Admin
        $validate_data = Validator::make($request->all(),[
            'intitule_Quiz' => "bail | required | min:5 |  max:45",
            'date_Limite_Quiz' => "bail | required",
            'score_Minimal_Quiz' => "bail | required | numeric | min:10 |  max:1000",
        ])->validateWithBag('ErrorModifyQuiz');


        //Retrieve the correspunding job offer
        $fichePoste = FichePoste::where('libelle_Fiche',$request->input('Fiche_Poste'))->first();

        //Retrieve the Quiz
        $quiz = Quiz::find($id);

        //Register quiz title only if it is different to which is in database
        if($quiz->intitule_Quiz != $request->input('intitule_Quiz')){
            $quiz->intitule_Quiz = $request->input('intitule_Quiz');
        }

        //Register quiz limit date only if it is different to which is in database
        if($quiz->date_Limite_Quiz != $request->input('date_Limite_Quiz')){
            $quiz->date_Limite_Quiz = $request->input('date_Limite_Quiz');
        }

        //Register quiz job's offer ID only if it is different to which is in database
        if($quiz->fiche_id != $fichePoste->id_Fiche){
            $quiz->fiche_id = $fichePoste->id_Fiche;
        }

        //Register quiz minimum score only if it is different to which is in database
        if($quiz->score_Minimal_Quiz != $request->input('score_Minimal_Quiz')){
            $quiz->score_Minimal_Quiz= $request->input('score_Minimal_Quiz');
        }

        $quiz->save();

        //Redirect Admin to Quiz Page
        return redirect()->route('ShowQuizPage');
    }

    //function to delete a job offer
    public function DeleteQuiz($id){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnQuiz')){
            abort(403);
        }

        //Retrieve Quiz and delete him
        $quiz = Quiz::find($id)->delete();

        //Redirect Admin to Quiz Page
        return redirect()->route('ShowQuizPage');
    }

    //Function to register new Quiz
    public function RegistrerPartie($idQuiz,Request $request){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnQuiz')){
            abort(403);
        }

        //Validate data send by Admin
        $validate_data = Validator::make($request->all(),[
            'libelle_Partie' => "bail | required | min:5 |  max:20",
            'description_Partie' => "bail | required | min:5 |  max:195",
        ])->validateWithBag('ErrorRegistrerPartie');

        //Retrieve the correspunding quiz
        $quiz = Quiz::find($idQuiz);
        //record Part informations send by Admin and save them
        $partie = new Partie;
        $partie->libelle_Partie = $request->input('libelle_Partie');
        $partie->description_Partie = $request->input('description_Partie');
        $partie->quiz_id = $quiz->id_Quiz;
        $partie->save();

        //Redirect Admin to Quiz Page
        return redirect()->back();
    }


    //function to modify an existing Quiz
    public function ModifyPartie($id, Request $request){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnQuiz')){
            abort(403);
        }

        //Validate data send by Admin
        $validate_data = Validator::make($request->all(),[
            'libelle_Partie' => "bail | required | min:5 |  max:22",
            'description_Partie' => "bail | required | min:5 |  max:195",
        ])->validateWithBag('ErrorModifyPartie');

        //Retrieve the Quiz
        $partie = Partie::find($id);

        //Register quiz part title only if it is different to which is in database
        if($partie->libelle_Partie != $request->input('libelle_Partie')){
            $partie->libelle_Partie = $request->input('libelle_Partie');
        }

        //Register quiz  description only if it is different to which is in database
        if($partie->description_Partie != $request->input('description_Partie')){
            $partie->description_Partie = $request->input('description_Partie');
        }

        $partie->save();

        //Redirect Admin to Quiz Page
        return redirect()->back();
    }

    //function to delete a part of quiz
    public function DeletePartie($id){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnQuiz')){
            abort(403);
        }

        //Retrieve part and delete him
        $partie = Partie::find($id)->delete();

        //Redirect Admin to Quiz Page
        return redirect()->back();
    }

    //Function to register new Question
    public function RegistrerQuestion($idPart,Request $request){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnQuiz')){
            abort(403);
        }

        //Validate data send by Admin
        $validate_data = Validator::make($request->all(),[
            'libelle_Question' => "bail | required | min:10",
            'photo_Question' => "mimes:jpg,jpeg,png",
            'duree_Question' => "bail | required",
            'point_Question' => "bail | required | numeric | min:1 |  max:5",
        ])->validateWithBag('ErrorRegistrerQuestion');

        //Retrieve the correspunding part
        $partie = Partie::find($idPart);

        //record Question informations send by Admin and save them
        $question = new Question;

        //Register the photo only if Admin have provided a photo
        if($request->file('photo_Question') != null){
            $question->photo_Question = $request->file('photo_Question')->store('public/photoQuestion');
        }

        $question->type_Question = $request->input('type_Question');
        $question->libelle_Question = $request->input('libelle_Question');
        $question->duree_Question = $request->input('duree_Question');
        $question->point_Question = $request->input('point_Question');
        $question->partie_id = $partie->id_Partie;


        $question->save();

        //Redirect Admin to Quiz Page
        return redirect()->back();
    }

    //Function to evaluate a candidate after a interview
    public function EvaluateCandidate($id_suivi, Request $request){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnScheduleEntretien')){
            abort(403);
        }

        $suivi = Suivi::find($id_suivi);
        $suivi->Score_Etape = $request->input('Note_Interview');
        $suivi->save();
        return redirect()->route('ShowScheduleEntretien');
    }

    //function to disapprove admission of a candidate
    public function DisapproveCandidate($id_suivi){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnScheduleEntretien')){
            abort(403);
        }


        $suivi = Suivi::find($id_suivi);
        $suivi->validation_Etape = false;
        $suivi->save();
        return redirect()->route('ShowScheduleEntretien');
    }

    //function to approve admission of a candidate
    public function ApproveCandidate($id_suivi){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnScheduleEntretien')){
            abort(403);
        }

        $suivi = Suivi::find($id_suivi);
        $suivi->validation_Etape = true;
        $suivi->save();
        return redirect()->route('ShowScheduleEntretien');
    }

    //function to modify an existing Question
    public function ModifyQuestion($id, Request $request){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnQuiz')){
            abort(403);
        }

        //Validate data send by Admin
        $validate_data = Validator::make($request->all(),[
            'libelle_Question' => "bail | required | min:10 |",
            'photo_Question' => "mimes:jpg,jpeg,png",
            'duree_Question' => "bail | required",
            'point_Question' => "bail | required | numeric | min:1 |  max:5",
        ])->validateWithBag('ErrorModifyQuestion');
        //Retrieve the Question


        $question =  Question::find($id);
        //Register the photo only if Admin have provided a photo

        if($request->file('photo_Question') != null){
            Storage::delete($question->photo_Question);
            $question->photo_Question = $request->file('photo_Question')->store('public/photoQuestion');
        }

        //Register Question type only if it is different to which is in database
        if($question->type_Question != $request->input('type_Question') &&  $request->input('type_Question') != "AUCUN"){
            $question->type_Question = $request->input('type_Question');
        }

        //Register question only if it is different to which is in database
        if($question->libelle_Question != $request->input('libelle_Question')){
            $question->libelle_Question = $request->input('libelle_Question');
        }

        //Register question duration only if it is different to which is in database
        if($question->duree_Question != $request->input('duree_Question')){
            $question->duree_Question = $request->input('duree_Question');
        }

        //Register question notation only if it is different to which is in database
        if( $question->point_Question != $request->input('point_Question')){
            $question->point_Question = $request->input('point_Question');
        }

        $question->save();

        //Redirect Admin to Quiz Page
        return redirect()->back();
    }

    //function to delete a part of Question
    public function DeleteQuestion($id){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnQuiz')){
            abort(403);
        }

        //Retrieve question
        $question = Question::find($id);

        //Delete the image and the question
        Storage::delete($question->photo_Question);
        $question->delete();

        //Redirect Admin to Quiz Page
        return redirect()->back();
    }

    //Function to register new Proposition
    public function RegistrerProposition($idQuestion,Request $request){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnQuiz')){
            abort(403);
        }

        //Validate data send by Admin
        $validate_data = Validator::make($request->all(),[
            'reponse' => "bail | required |  max:95",
            'photo_Proposition' => "mimes:jpg,jpeg,png",
        ])->validateWithBag('ErrorRegistrerProposition');
        //Retrieve the correspunding part
        $question = Question::find($idQuestion);

        //record proposition informations send by Admin and save them
        $proposition = new Proposition;

        //Register the photo only if Admin have provided a photo
        if($request->file('photo_Proposition') != null){
            $proposition->photo_Proposition = $request->file('photo_Proposition')->store('public/photoProposition');
        }

        $proposition->reponse = $request->input('reponse');

        if($request->input('statut_Solution') == 'Vrai'){
            $proposition->statut_Solution = true;
        }
        $proposition->question_id = $question->id_Question;
        $proposition->save();

        //Redirect Admin to Quiz Page
        return redirect()->back();
    }

    //function to modify an existing Proposition
    public function ModifyProposition($id, Request $request){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnQuiz')){
            abort(403);
        }

        //Validate data send by Admin
        $validate_data = Validator::make($request->all(),[
            'reponse' => "bail | required |  max:95",
            'photo_Proposition' => "mimes:jpg,jpeg,png",
        ])->validateWithBag('ErrorModifyProposition');


        $proposition = Proposition::find($id);

        if($request->file('photo_Proposition') != null){
            Storage::delete($proposition->photo_Proposition);
            $proposition->photo_Proposition = $request->file('photo_Proposition')->store('public/photoProposition');
        }

        if($request->input('statut_Solution') == 'Vrai'){
            $proposition->statut_Solution = true;
        }else{
            $proposition->statut_Solution = false;
        }

        //Register response only if it is different to which is in database
        if( $proposition->reponse != $request->input('reponse')){
            $proposition->reponse = $request->input('reponse');
        }

        $proposition->save();

        //Redirect Admin to Quiz Page
        return redirect()->back();
    }

    //function to delete a part of DeleteProposition
    public function DeleteProposition($id){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnQuiz')){
            abort(403);
        }

        //Retrieve proposition and delete him
        $proposition = Proposition::find($id)->delete();

        //Redirect Admin to Quiz Page
        return redirect()->back();
    }

    //function to register acces for a group
    public function RegistrerAccesGroup($idGroup,Request $request){

        //if Admin is not authorized
        if(Auth::user()->cannot('ActOnSecurite')){
            abort(403);
        }

        $Group = Group::find($idGroup);
        $fonctionnalites = Fonctionnalite::all();
        foreach($fonctionnalites as $fonctionnalite){
            if($request->input($fonctionnalite->libelle) == $fonctionnalite->libelle){
                $acces = Acces::firstOrCreate([
                    'fonctionnalite_id' => $fonctionnalite->id_Fonctionnalite,
                    'groupe_id' => $Group->id_Groupe
                ]);
            }
            else{
                $acces = Acces::where('fonctionnalite_id',$fonctionnalite->id_Fonctionnalite)->where('groupe_id',$Group->id_Groupe)->delete();
            }
        }

        return redirect()->back();
    }

    //function to sort Soumissions of candidate regarding critera
    public function SortSoumission($idFiche){

        $RespectAllCriteras = true;
        $RespectCritera = false;
        $ScoreCritereTotal = 0;

        $etape = Etape::where('intitule_Etape','TRI_PROFIL')->first();

        $fiche = FichePoste::find($idFiche);

        $critere_array = [[],[],[]];
        foreach($fiche->criteres as $critere){
            array_push($critere_array[0],$critere->libelle_Critere);
            array_push($critere_array[1],$critere->type_Critere);
            array_push($critere_array[2],$critere->statut_Critere);
        }

        foreach($fiche->Soumissions as $soumission){
            $candidat = $soumission->candidats;


                foreach($fiche->criteres as $critere){

                    if($RespectAllCriteras){
                        if($critere->libelle_Critere == 'Compétence' && $critere->type_Critere == "ÉGAL"){

                                foreach ($candidat->competences as $competence) {

                                    if (Str::contains($critere->valeur_Critere , $competence->libelle_Competence)) {
                                        $RespectCritera = true;
                                    }

                                }


                                if($critere->statut_Critere){
                                    $RespectAllCriteras =  $RespectAllCriteras && $RespectCritera;
                                } else{
                                    if($RespectCritera){
                                        $ScoreCritereTotal = $ScoreCritereTotal + 1;
                                    }
                                }

                            $RespectCritera = false;
                        }
                        elseif($critere->libelle_Critere == 'Certification' && $critere->type_Critere == "ÉGAL"){

                            foreach ($candidat->certifications as $certification) {

                                if (Str::contains($critere->valeur_Critere , $certification->intitule_Certification)) {
                                    $RespectCritera = true;
                                }

                            }


                            if($critere->statut_Critere){
                                $RespectAllCriteras =  $RespectAllCriteras && $RespectCritera;
                            } else{
                                if($RespectCritera){
                                    $ScoreCritereTotal = $ScoreCritereTotal + 1;
                                }
                            }

                            $RespectCritera = false;

                        }elseif($critere->libelle_Critere == 'Poste précedemment occupé' && $critere->type_Critere == "ÉGAL"){

                            foreach ($candidat->experiences as $experiences) {

                                if (Str::contains($critere->valeur_Critere , $experiences->poste_Occupe_Experience)) {
                                    $RespectCritera = true;
                                }                                   //Dès que je retrouve le diplome, je cherche directement récupère le libellé de la formation

                            }


                            if($critere->statut_Critere){
                                $RespectAllCriteras =  $RespectAllCriteras && $RespectCritera;
                            } else{
                                if($RespectCritera){
                                    $ScoreCritereTotal = $ScoreCritereTotal + 1;
                                }
                            }

                            $RespectCritera = false;

                        }elseif($critere->libelle_Critere == "Nombre d'années d'experience"){

                            $nombre_annee_experience = 0;
                            foreach ($candidat->experiences as $experience) {
                                $nombre_annee_experience = $nombre_annee_experience + $experience->experienceDuration();

                            }
                            if($critere->type_Critere == "ÉGAL"){
                                if($critere->valeur_Critere ==  $nombre_annee_experience){
                                    $RespectCritera = true;
                                }
                            }elseif($critere->type_Critere == "SUPÉREUR"){
                                if($critere->valeur_Critere <  $nombre_annee_experience){
                                    $RespectCritera = true;
                                }
                            }elseif($critere->type_Critere == "INFÉRIEUR"){
                                if($critere->valeur_Critere >  $nombre_annee_experience){
                                    $RespectCritera = true;
                                }
                            }elseif($critere->type_Critere == "SUPÉREUR OU ÉGAL"){
                                if($critere->valeur_Critere <=  $nombre_annee_experience){
                                    $RespectCritera = true;
                                }
                            }elseif($critere->type_Critere == "INFÉRIEUR OU ÉGAL"){
                                if($critere->valeur_Critere >=  $nombre_annee_experience){
                                    $RespectCritera = true;
                                }
                            }

                            if($critere->statut_Critere){
                                $RespectAllCriteras =  $RespectAllCriteras && $RespectCritera;
                            } else{
                                if($RespectCritera){
                                    $ScoreCritereTotal = $ScoreCritereTotal + 1;
                                }
                            }

                            $RespectCritera = false;

                        }elseif($critere->libelle_Critere == "secteur de l'experience" && $critere->type_Critere == "ÉGAL"){

                            foreach ($candidat->experiences as $experiences) {

                                if (Str::contains($critere->valeur_Critere , $experiences->secteur_Experience)) {
                                    $RespectCritera = true;
                                }

                            }


                            if($critere->statut_Critere){
                                $RespectAllCriteras =  $RespectAllCriteras && $RespectCritera;
                            } else{
                                if($RespectCritera){
                                    $ScoreCritereTotal = $ScoreCritereTotal + 1;
                                }
                            }

                            $RespectCritera = false;

                        }elseif($critere->libelle_Critere == "type de contrat de l'experience" && $critere->type_Critere == "ÉGAL"){

                            foreach ($candidat->experiences as $experiences) {

                                if (Str::contains($critere->valeur_Critere , $experiences->type_Contrat_Experience)) {
                                    $RespectCritera = true;
                                }

                            }


                            if($critere->statut_Critere){
                                $RespectAllCriteras =  $RespectAllCriteras && $RespectCritera;
                            } else{
                                if($RespectCritera){
                                    $ScoreCritereTotal = $ScoreCritereTotal + 1;
                                }
                            }

                            $RespectCritera = false;

                        }elseif($critere->libelle_Critere == "intitule de la formation" && $critere->type_Critere == "ÉGAL"){

                            foreach ($candidat->formations as $formation) {

                                if (Str::contains($critere->valeur_Critere , $formation->intitule_Formation)) {
                                    $RespectCritera = true;
                                }

                            }


                            if($critere->statut_Critere){
                                $RespectAllCriteras =  $RespectAllCriteras && $RespectCritera;
                            } else{
                                if($RespectCritera){
                                    $ScoreCritereTotal = $ScoreCritereTotal + 1;
                                }
                            }

                            $RespectCritera = false;

                        }elseif($critere->libelle_Critere == "etablissement de la formation" && $critere->type_Critere == "ÉGAL"){

                            foreach ($candidat->formations as $formation) {

                                if (Str::contains($critere->valeur_Critere , $formation->etablissement_Formation)) {
                                    $RespectCritera = true;
                                }

                            }


                            if($critere->statut_Critere){
                                $RespectAllCriteras =  $RespectAllCriteras && $RespectCritera;
                            } else{
                                if($RespectCritera){
                                    $ScoreCritereTotal = $ScoreCritereTotal + 1;
                                }
                            }

                            $RespectCritera = false;

                        }elseif($critere->libelle_Critere == "diplome de la formation" && $critere->type_Critere == "ÉGAL"){

                            foreach ($candidat->formations as $formation) {

                                if (Str::contains($critere->valeur_Critere , $formation->diplome_Formation)) {
                                    $RespectCritera = true;
                                }

                            }


                            if($critere->statut_Critere){
                                $RespectAllCriteras =  $RespectAllCriteras && $RespectCritera;
                            } else{
                                if($RespectCritera){
                                    $ScoreCritereTotal = $ScoreCritereTotal + 1;
                                }
                            }

                            $RespectCritera = false;

                        }elseif($critere->libelle_Critere == "age du candidat"){

                            if($critere->type_Critere == "ÉGAL"){
                                if($critere->valeur_Critere ==  $candidat->age){
                                    $RespectCritera = true;
                                }
                            }elseif($critere->type_Critere == "SUPÉREUR"){
                                if($critere->valeur_Critere <  $candidat->age){
                                    $RespectCritera = true;
                                }
                            }elseif($critere->type_Critere == "INFÉRIEUR"){
                                if($critere->valeur_Critere >  $candidat->age){
                                    $RespectCritera = true;
                                }
                            }elseif($critere->type_Critere == "SUPÉREUR OU ÉGAL"){
                                if($critere->valeur_Critere <=  $candidat->age){
                                    $RespectCritera = true;
                                }
                            }elseif($critere->type_Critere == "INFÉRIEUR OU ÉGAL"){
                                if($critere->valeur_Critere >=  $candidat->age){
                                    $RespectCritera = true;
                                }
                            }

                            if($critere->statut_Critere){
                                $RespectAllCriteras =  $RespectAllCriteras && $RespectCritera;
                            } else{
                                if($RespectCritera){
                                    $ScoreCritereTotal = $ScoreCritereTotal + 1;
                                }
                            }

                            $RespectCritera = false;

                        }elseif($critere->libelle_Critere == "situation matrimoniale du candidat" && $critere->type_Critere == "ÉGAL"){


                                if (Str::contains($critere->valeur_Critere , $candidat->situation_Matrimoniale_Candidat)) {
                                    $RespectCritera = true;
                                }


                            if($critere->statut_Critere){
                                $RespectAllCriteras =  $RespectAllCriteras && $RespectCritera;
                            } else{
                                if($RespectCritera){
                                    $ScoreCritereTotal = $ScoreCritereTotal + 1;
                                }
                            }

                        }elseif($critere->libelle_Critere == "permis du candidat" && $critere->type_Critere == "ÉGAL"){


                            if (Str::contains($critere->valeur_Critere , $candidat->permis_Candidat)) {
                                $RespectCritera = true;
                            }


                            if($critere->statut_Critere){
                                $RespectAllCriteras =  $RespectAllCriteras && $RespectCritera;
                            } else{
                                if($RespectCritera){
                                    $ScoreCritereTotal = $ScoreCritereTotal + 1;
                                }
                            }

                        }elseif($critere->libelle_Critere == "langue parlée par le candidat" && $critere->type_Critere == "ÉGAL"){

                            foreach ($candidat->parles as $parle) {

                                if (Str::contains($critere->valeur_Critere , $parle->langues->reference_Langue)) {
                                    $RespectCritera = true;
                                }

                            }


                            if($critere->statut_Critere){
                                $RespectAllCriteras =  $RespectAllCriteras && $RespectCritera;
                            } else{
                                if($RespectCritera){
                                    $ScoreCritereTotal = $ScoreCritereTotal + 1;
                                }
                            }


                        }elseif($critere->libelle_Critere == "niveau de la langue parlée candidat" && $critere->type_Critere == "ÉGAL"){

                        }

                    } else{
                        Suivi::firstOrCreate([
                           'etape_id'  =>  $etape->id_Etape,
                           'soumission_id' => $soumission->id_Soumission,
                           'validation_Etape'  => false,
                           'Score_Etape' => '0'],
                            [
                                'date_Participation_Etape' => now()
                            ]);


                    }

                }


            Suivi::firstOrCreate(
                [
                'etape_id'  =>  $etape->id_Etape,
                'soumission_id' => $soumission->id_Soumission],
                [
                'validation_Etape'  => true,
                'Score_Etape' => $ScoreCritereTotal,
                'date_Participation_Etape' => now()]
            );

            $ScoreCritereTotal = 0;
            $RespectAllCriteras = true;
            $RespectCritera = false;
        }

        return redirect()->back();
    }

    //function to trigger a quiz
    public function TriggerQuiz($idQuiz){
        if(Auth::user()->cannot('ActOnQuiz')){
            abort(403);
        }

        $idquiz = Quiz::find($idQuiz);
        $fiche = $idquiz->fichePoste;
        foreach($fiche->Soumissions as $soumission){
            if($soumission->latestSuivis->etape_id == 1 && $soumission->latestSuivis->validation_Etape){
                Suivi::firstOrCreate([
                    'etape_id' => "2",
                    'soumission_id' => $soumission->id_Soumission,
                    'lien_Etape' => Str::random(50)
                ]);
            }
        }

        return redirect()->back();
    }

    public function Show_Log_Page(){
        if(Auth::user()->cannot('ActOnLogs')){
            abort(403);
        }

        $Logs = Log::all();
        return view('Administrateur.log',['Logs'  => $Logs]);
    }

}
