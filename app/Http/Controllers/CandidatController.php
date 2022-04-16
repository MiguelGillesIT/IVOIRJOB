<?php

namespace App\Http\Controllers;
use App\Mail\CandidateMail;
use App\Models\Candidat;
use App\Models\Certification;
use App\Models\Competence;
use App\Models\Document;
use App\Models\ExperienceProfessionnelle;
use App\Models\FichePoste;
use App\Models\formation;
use App\Models\Group;
use App\Models\Langue;
use App\Models\Parle;
use App\Models\Quiz;
use App\Models\Soumission;
use App\Models\Suivi;
use Database\Seeders\Langues;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CandidatController extends Controller
{

    //Function to research job offers with research
    public function ShowLandingPageRetrieve(Request $request){

        $fiches = FichePoste::all();
        $fichesNonFormat = [];

        if($request->input('recherche_offre') !== null){

            $fiches = FichePoste::where('libelle_Fiche','LIKE',"%{$request->input('recherche_offre')}%")->get();
        }

        if($request->input('type_offre') !== null && $request->input('type_offre') != "AUCUN" ){
            $fiches = $fiches->where('type_Offre',$request->input('type_offre'));
        }

        if($request->input('date_limite_de_soumission') !== null ){
            $fiches = $fiches->where('date_Limite_Candidature','<',$request->input('date_limite_de_soumission'). " 00:00:00");
        }

        $formatFiches = $fiches;

        return view('landing', ['formatFiches' => $formatFiches]);


    }

    //Function to research job offers with research
    public function ShowOffersPageRetrieve(Request $request){

        //if candidate is not authorized
        if(Auth::user()->cannot('ActOnJobOffers')){
            abort(403);
        }

        $fiches = FichePoste::all();
        $fichesNonFormat = [];
        if($request->input('recherche_offre') !== null){

            $fiches = FichePoste::where('libelle_Fiche','LIKE',"%{$request->input('recherche_offre')}%")->get();
        }

        if($request->input('type_offre') !== null && $request->input('type_offre') != "AUCUN" ){
            $fiches = $fiches->where('type_Offre',$request->input('type_offre'));
        }

        if($request->input('date_limite_de_soumission') !== null ){
            $fiches = $fiches->where('date_Limite_Candidature','<',$request->input('date_limite_de_soumission'). " 00:00:00");
        }


        $formatFiches = $fiches;

        return view('Candidat.offres', ['formatFiches' => $formatFiches]);


    }

    //function to return landing Page
    public function ShowLandingPage(){
        $fiches = FichePoste::orderBy('date_Limite_Candidature')->take(2)->get();
        $formatFiches = $fiches;
        return view('landing', ['formatFiches' => $formatFiches]);
    }

    //function to do interview with Admins
    public function ParticipateToInterview($id_suivi){
        $suivi = Suivi::find($id_suivi);
       return view('Candidat.Entretien', ['suivi' => $suivi]);
}

    //function to return job offers
    public function ShowOffersPage(){

        //if candidate is not authorized
        if(Auth::user()->cannot('ActOnJobOffers')){
            abort(403);
        }

        $fiches = FichePoste::all();
        // Put job offers in array of two elements
        $formatFiches = $fiches;


        return view('Candidat.offres', ['formatFiches' => $formatFiches]);
    }

    //function to return IVOIRJOB candidates form page to registrer
    public function show_Inscription_Page_Candidate(){

        return view('Candidat.inscription');

    }


    //function to return IVOIRJOB candidates form page to registrer
    public function show_Connexion_Page_Candidate(){

        return view('Candidat.connexion');

    }


    //function to authenticate IVOIRJOB candidates and redirect them to their dashboard Pages
    public function login_Candidate(Request $request){
        //Validate data send to IVOIRJOB
        $validate_data = Validator::make($request->all(),[
            'E_mail' => "bail | required | email |  max:35",
            'Mot_de_passe' => "bail | required |  max:20 | min:6",
        ]);



        //Verify that the credentials are candidate's credentials
        if(Auth::guard('candidat')->attempt(['e_mail_Candidat' => $request->input('E_mail'), 'password' => $request->input('Mot_de_passe')])) {
            $request->session()->regenerate();
            return redirect()->intended('/Candidat/Tableau_de_bord');
        }
        return back()->withErrors([
            'E-mail' => "Vos identifiants sont incorrects.",
        ]);
    }


    //function to register Candidates type hint
    public function Register_Candidate(Request $request){

            //Validate data send by candidate
            $validate_data = Validator::make($request->all(),[
                'Nom' => "bail | required  |  max:15 | min:1",
                'Prenoms' => "bail | required |  max:25 | min:1",
                'E-mail' => "bail | required | email |  max:35",
                'Telephone' => "bail | required | numeric | min: 0 | max: 999999999999",
                'Mot_de_passe' => "bail | required |  max:20 | min:6",
                'Confirmation_de_mot_de_passe' => "bail | required | same:Mot_de_passe"
            ])->validateWithBag('ErrorInscriptionCandidate');

            $Groupe = Group::where('libelle_Groupe','CANDIDAT')->first();
            //record data send by candidate and save them
            $Candidat = new Candidat;
            $Candidat->nom_Candidat = $request->input('Nom');
            $Candidat->prenoms_Candidat = $request->input('Prenoms');
            $Candidat->e_mail_Candidat = $request->input('E-mail');
            $Candidat->telephone_Candidat = $request->input('Telephone') ;
            $Candidat->groupe_id = $Groupe->id_Groupe;
            $Candidat->password = bcrypt($request->input('Mot_de_passe')) ;
            $Candidat->save();

            //Redirect Candidate to login Page
            return redirect('/Candidat/login');
        }


    //function to return IVOIRJOB candidates Dashboard page
    public function Tableau_de_bord_Candidate(){

        //if candidate account is lock
        if(Auth::user()->statut_Candidat){
            return view('compteBloque');
        }

        //if candidate is not authorized
        if(Auth::user()->cannot('ActOnDashboard')){
            abort(403);
        }

        //Retrieve the soumissions of a candidate
        $Soumissions = Auth::user()->Soumissions;
        $OffresSoumissions = [];

        //For each soumissions, retrieve the job offer
        foreach( $Soumissions as $Soumission){
            array_push($OffresSoumissions, [$Soumission->Offres, $Soumission->latestSuivis]);
        }


        return view('Candidat.tableau_de_bord', [ 'OffresSoumissions'=> $OffresSoumissions]);

    }


    //function to return IVOIRJOB candidates settings page
    public function Parametres_Candidate(){
        //if candidate account is lock
        if(Auth::user()->statut_Candidat){
            return view('compteBloque');
        }

        //if candidate is not authorized
        if(Auth::user()->cannot('ActOnSettings')){
            abort(403);
        }

        return view('Candidat.parametres');

    }


    //function to return IVOIRJOB candidates Profil page
    public function Profil_Candidate(){
        //if candidate account is lock
        if(Auth::user()->statut_Candidat){
            return view('compteBloque');
        }

        //if candidate is not authorized
        if(Auth::user()->cannot('ActOnProfile')){
            abort(403);
        }

        /*$ip_address = \Request::getClientIP("true"));
          $mac_address = exec("getmac");
        */

        $parles = Auth::user()->parles;
        $langues = Langue::orderBy('reference_Langue','asc')->get();
        $competences = Auth::user()->competences;
        $experiences = Auth::user()->experiences;
        $certifications = Auth::user()->certifications;
        $documents = Auth::user()->documents;
        $formations = Auth::user()->formations;
        return view('Candidat.profil', [ 'formations'=>$formations, 'documents' => $documents, 'experiences' => $experiences, 'certifications' => $certifications, 'competences' => $competences, 'langues' => $langues, 'parles'  => $parles]);
    }


    //function to return IVOIRJOB candidates offers page
    public function Offres_Candidate(){
        if(Auth::user()->statut_Candidat){
            return view('compteBloque');
        }
        $fiches = FichePoste::all();
        return view('Candidat.offres',['fiches' => $fiches]);

    }


    //function to modify candidate's password
    public function ModifyPasswordCandidate(Request $request){

        //if candidate is not authorized
        if(Auth::user()->cannot('ActOnSettings')){
            abort(403);
        }

        //Validate data send by candidate
        $validate_data = Validator::make($request->all(),[
            'Old_password' => "bail | required |  max:20 | min:6",
            'New_password' => "bail | required |  max:20 | min:6 | different: Old_password",
            'Confirm_new_password' => "bail | required | same:New_password"
        ])->validateWithBag('ModifyPasswordCandidate');

        if(Hash::check($request->input('Old_password'),Auth::user()->password)){
            $candidat =  Candidat::find(Auth::user()->id_Candidat);
            $candidat->password = bcrypt($request->input('New_password'));
            $candidat->save();
            return redirect()->route('Parametres_candiat')->with('SuccesMotdePasse','Votre mot de passe est correctement changé');
        }else{
            return redirect()->route('Parametres_candiat')->with('ErreurMotdePasse','Votre ancien mot de passe est incorrect');
        }
    }

    //function to register IVOIRJOB candidates personal informations
    public function RegistrerCandidatePersonnalInfo(Request $request){

        //if candidate is not authorized
        if(Auth::user()->cannot('ActOnProfile')){
            abort(403);
        }

        //Validate data send by candidate
        $validate_data = Validator::make($request->all(),[
            'Nom' => "bail | required  |  max:15 | min:1",
            'Prenoms' => "bail | required |  max:25 | min:1",
            'E-mail' => "bail | required | email |  max:35",
            'Telephone' => "bail | required | numeric | min: 0 | max: 999999999999",
            'Numero_Piece_Identite' => "max: 15",
            'Photo_Candidat' => 'mimes:jpg,jpeg,png',

        ])->validateWithBag('ErrorRegistrerCandidatePersonnalInfo');

        //Retrieve the candidate
        $Candidat = Candidat::find(Auth::user()->id_Candidat);


        //Register the photo only if candidate have provided a photo
        if($request->file('Photo_Candidat') != null){
            Storage::delete($Candidat->photo_Candidat);
            $Candidat->photo_Candidat = $request->file('Photo_Candidat')->store('public');
        }

        //Register the name only if candidate have typed hint a name and if it is different of which it is in Database
        if(Auth::user()->nom_Candidat != $request->input('Nom')){
            $Candidat->nom_Candidat = $request->input('Nom');
        }

        //Register the birthday only if candidate have typed hint a date and if it is different of which it is in Database
        if(Auth::user()->prenoms_Candidat != $request->input('Prenoms')){
            $Candidat->prenoms_Candidat = $request->input('Prenoms');
        }

        //Register the e_mail only if candidate have typed hint an e-mail and if it is different of which it is in Database
        if(Auth::user()->e_mail_Candidat != $request->input('E-mail')){
            $Candidat->e_mail_Candidat = $request->input('E-mail');
        }

        //Register the cellphone number only if candidate have typed hint a cellphone number and if it is different of which it is in Database
        if(Auth::user()->telephone_Candidat != $request->input('Telephone')){
            $Candidat->telephone_Candidat = $request->input('Telephone');
        }


        //Register the birthday only if candidate have typed hint a date and if it is different of which it is in Database
        if(Auth::user()->date_Naissance_Candidat != $request->input('Naissance_Candidat') &&  $request->input('Naissance_Candidat') != null){
            $Candidat->date_Naissance_Candidat = $request->input('Naissance_Candidat');
        }elseif(Auth::user()->updated_at == Auth::user()->created_at && $request->input('Naissance_Candidat') != null){
            $Candidat->date_Naissance_Candidat = $request->input('Naissance_Candidat');
        }

        //Register his nationality only if candidate have typed hint a date and if it is different of which it is in Database
        if(Auth::user()->nationalite_Candidat != $request->input('Nationalite_Candidat') &&  $request->input('Nationalite_Candidat') != 'AUCUNE'){
            $Candidat->nationalite_Candidat = $request->input('Nationalite_Candidat');
        }

        //Register his matrinonial situation only if candidate have typed hint a date and if it is different of which it is in Database
        if(Auth::user()->situation_Matrimoniale_Candidat != $request->input('Situation_Matrimoniale_Candidat') &&  $request->input('Situation_Matrimoniale_Candidat') != 'AUCUNE'){
            $Candidat->situation_Matrimoniale_Candidat = $request->input('Situation_Matrimoniale_Candidat');
        }

        //Register the gender only if candidate have typed hint a date and if it is different of which it is in Database
        if(Auth::user()->sexe_Candidat != $request->input('Sexe_Candidat') &&  $request->input('Sexe_Candidat') != 'AUCUN'){
            $Candidat->sexe_Candidat = $request->input('Sexe_Candidat');
        }

        //Register driver status only if candidate have typed hint a date or if it is different of which it is in Database
        if(Auth::user()->permis_Candidat != $request->input('Permis_Candidat') &&  $request->input('Permis_Candidat') != 'AUCUN'){
            $Candidat->permis_Candidat = $request->input('Permis_Candidat');
        }

        //Register residence place only if candidate have typed hint a date and if it is different of which it is in Database
        if(Auth::user()->lieu_Residence_Candidat != $request->input('lieu_residence_Candidat') &&  $request->input('lieu_residence_Candidat') != 'AUCUN'){
            $Candidat->lieu_Residence_Candidat = $request->input('lieu_residence_Candidat');
        }

        //Register the idendity card ID only if candidate have typed hint a date and if it is different of which it is in Database
        if(Auth::user()->numero_Piece_Candidat != $request->input('Numero_Piece_Identite') &&  $request->input('Numero_Piece_Identite') != ''){
            $Candidat->numero_Piece_Candidat = $request->input('Numero_Piece_Identite');
        }

        //Save user typed hint informations and redirect user to his Profil page
        $Candidat->save();
        return redirect()->route('Profil_candiat')->withErrors($validate_data, 'RegisterPersonalInfo');


    }


    //function to register IVOIRJOB candidates Formations
    public function RegistrerCandidateFormation(Request $request){

        //if candidate is not authorized
        if(Auth::user()->cannot('ActOnProfile')){
            abort(403);
        }

        //Validate data send by candidate
        $validate_data = Validator::make($request->all(),[
            'intitule_Formation' => "bail | required  |  max:75",
            'diplome_Formation' => "bail | required ",
            'lieu_Formation' => "bail | required  |  max:75",
            'date_Debut_Formation' => "bail | required",
            'date_Fin_Formation' => "bail | required",
            'etablissement_Formation' => "bail | required |  max:75",

        ])->validateWithBag('ErrorRegistrerCandidateFormation');


        //record formation's informations send by candidate and save them
        $Formation = new formation;
        $Formation->intitule_Formation = $request->input('intitule_Formation');
        $Formation->etablissement_Formation = $request->input('etablissement_Formation');
        $Formation->diplome_Formation = $request->input('diplome_Formation');
        $Formation->lieu_Formation = $request->input('lieu_Formation');
        $Formation->date_Debut_Formation = $request->input('date_Debut_Formation');
        $Formation->date_Fin_Formation = $request->input('date_Fin_Formation') ;
        $Formation->candidat_id = Auth::user()->id_Candidat ;
        $Formation->save();

        //Redirect the candidate to his profil Page
        return redirect()->route('Profil_candiat')->withErrors($validate_data, 'RegisterFormation');
    }


    //function to delete a formation add by the candidate
    public function DeleteCandidateFormation($id){

        //if candidate is not authorized
        if(Auth::user()->cannot('ActOnProfile')){
            abort(403);
        }

        //Retrieve the formation and delete him
        $formation = Formation::find($id)->delete();

        //Redirect the candidat to his profil
        return redirect()->route('Profil_candiat');
    }


    //function to modify a formation add by the candidate
    public function ModifyCandidateFormation($id, Request $request){

        //if candidate is not authorized
        if(Auth::user()->cannot('ActOnProfile')){
            abort(403);
        }

        //Validate informations about formations
        $validate_data = Validator::make($request->all(),[
            'intitule_Formation' => "bail | required  |  max:75",
            'etablissement_Formation' => "bail | required |  max:75",

        ])->validateWithBag('ErrorModifyCandidateFormation');

        //Retrieve the formation, record the informations about it and save them
        $formation = Formation::find($id);

        //Register the formation entitled only if candidate have typed hint formation entitled and if it is different of which it is in Database
        if($formation->intitule_Formation != $request->input('intitule_Formation') && $request->input('intitule_Formation') != ""){
            $formation->intitule_Formation = $request->input('intitule_Formation');
        }

        //Register the formation school only if candidate have typed hint formation school and if it is different of which it is in Database
        if($formation->etablissement_Formation != $request->input('etablissement_Formation') && $request->input('etablissement_Formation') != ""){
            $formation->etablissement_Formation = $request->input('etablissement_Formation');
        }

        //Register the degree only if candidate have typed hint degree and if it is different of which it is in Database
        if($formation->diplome_Formation != $request->input('diplome_Formation') && $request->input('diplome_Formation') != "AUCUN"){
            $formation->diplome_Formation = $request->input('diplome_Formation');
        }

        //Register the formation location only if candidate have typed hint location or if it is different and which it is in Database
        if($formation->lieu_Formation != $request->input('lieu_Formation') && $request->input('lieu_Formation') != "AUCUN"){
            $formation->lieu_Formation = $request->input('lieu_Formation');
        }

        //Register the begining date of the formation only if candidate have typed hint the begining date of the formation and if it is different of which it is in Database
        if($formation->date_Debut_Formation != $request->input('date_Debut_Formation') && $request->input('date_Debut_Formation') != null){
            $formation->date_Debut_Formation = $request->input('date_Debut_Formation');
        }

        //Register the ending date of the formation only if candidate have typed hint the ending date of the formation and if it is different of which it is in Database
        if($formation->date_Fin_Formation != $request->input('date_Fin_Formation') && $request->input('date_Fin_Formation') != null){
            $formation->date_Fin_Formation = $request->input('date_Fin_Formation');
        }

        //save the informations about formation
        $formation->save();

        //Redirect the candidate to his profile page
        return redirect()->route('Profil_candiat');
    }


    //function to register IVOIRJOB candidates professional experiecence
    public function RegistrerCandidateProfessionalExperience(Request $request){

        //if candidate is not authorized
        if(Auth::user()->cannot('ActOnProfile')){
            abort(403);
        }

        //Validate data send by candidate
        $validate_data = Validator::make($request->all(),[
            'poste_Occupe_Experience'  => 'bail | required | max : 45',
            'nom_Entreprise_Experience'  => 'bail | required | max : 75',
            'description_Experience'  => 'bail | required ',
            'taches_Realisees_Experience'  => 'bail | required ',
            'date_Debut_Experience'  => 'bail | required ',
            'date_Fin_Experience'  => 'bail | required ',
            'lieu_Travail_Experience'  => 'bail | required | max : 95 ',
            'secteur_Experience' => "bail | required  |  max:95",
            'type_Contrat_Experience' => "bail | required",

        ])->validateWithBag('ErrorRegistrerCandidateProfessionalExperience');


        //record professional experiecence's informations send by candidate and save them
        $Experience = new ExperienceProfessionnelle;
        $Experience->poste_Occupe_Experience = $request->input('poste_Occupe_Experience');
        $Experience->nom_Entreprise_Experience = $request->input('nom_Entreprise_Experience');
        $Experience->description_Experience = $request->input('description_Experience');
        $Experience->taches_Realisees_Experience = $request->input('taches_Realisees_Experience');
        $Experience->lieu_Travail_Experience = $request->input('lieu_Travail_Experience');
        $Experience->date_Debut_Experience = $request->input('date_Debut_Experience');
        $Experience->date_Fin_Experience = $request->input('date_Fin_Experience');
        $Experience->secteur_Experience = $request->input('secteur_Experience');
        $Experience->type_Contrat_Experience = $request->input('type_Contrat_Experience') ;
        $Experience->candidat_id = Auth::user()->id_Candidat ;
        $Experience->save();

        //Redirect the candidate to his profil Page
        return redirect()->route('Profil_candiat');
    }


    //function to delete a professional experiecence add by the candidate
    public function DeleteCandidateProfessionalExperience($id){

        //if candidate is not authorized
        if(Auth::user()->cannot('ActOnProfile')){
            abort(403);
        }

        //Retrieve the professional experiecence and delete him
        $experience = ExperienceProfessionnelle::find($id)->delete();

        //Redirect the candidat to his profil
        return redirect()->route('Profil_candiat');
    }


    //function to modify a professional experiecence add by the candidate
    public function ModifyCandidateProfessionalExperience($id, Request $request){

        //if candidate is not authorized
        if(Auth::user()->cannot('ActOnProfile')){
            abort(403);
        }

        //Validate informations about professional experiecence
        $validate_data = Validator::make($request->all(),[
            'poste_Occupe_Experience'  => 'bail |  max : 45',
            'nom_Entreprise_Experience'  => 'bail |  max : 75',
            'description_Experience'  => 'bail | max:250 ',
            'taches_Realisees_Experience'  => 'bail | max:250 ',
            'lieu_Travail_Experience'  => 'bail |  max : 95 ',
            'secteur_Experience' => "bail |  max:95",
            ])->validateWithBag('ErrorModifyCandidateProfessionalExperience');

        //Retrieve the professional experiecence, record the informations about it and save them
        $experience = ExperienceProfessionnelle::find($id);
        //Register the function in entreprise only if candidate have typed hint function and if it is different of which it is in Database
        if($experience->poste_Occupe_Experience != $request->input('poste_Occupe_Experience') && $request->input('poste_Occupe_Experience') !=""){
            $experience->poste_Occupe_Experience = $request->input('poste_Occupe_Experience');
        }

        //Register the name of entreprise only if candidate have typed hint the name of entreprise and if it is different of which it is in Database
        if($experience->nom_Entreprise_Experience != $request->input('nom_Entreprise_Experience') && $request->input('nom_Entreprise_Experience') != ""){
            $experience->nom_Entreprise_Experience = $request->input('nom_Entreprise_Experience');
        }

        //Register the description of experience only if candidate have typed hint experience and if it is different of which it is in Database
        if($experience->description_Experience != $request->input('description_Experience') && $request->input('description_Experience') != ""){
            $experience->description_Experience = $request->input('description_Experience');
        }

        //Register the works done in entreprise only if candidate have typed hint works done and if it is different of which it is in Database
        if($experience->taches_Realisees_Experience != $request->input('taches_Realisees_Experience') && $request->input('taches_Realisees_Experience') != ""){
            $experience->taches_Realisees_Experience = $request->input('taches_Realisees_Experience');
        }

        //Register the location entreprise only if candidate have typed hint location and if it is different of which it is in Database
        if($experience->lieu_Travail_Experience != $request->input('lieu_Travail_Experience') && $request->input('lieu_Travail_Experience')!= ""){
            $experience->lieu_Travail_Experience = $request->input('lieu_Travail_Experience');
        }

        //Register the begining date of experience  only if candidate have typed hint begining date of experience and if it is different of which it is in Database
        if($experience->date_Debut_Experience != $request->input('date_Debut_Experience') && $request->input('date_Debut_Experience') != null ){
            $experience->date_Debut_Experience = $request->input('date_Debut_Experience');
        }

        //Register the ending date of experience only if candidate have typed hint  the ending date of experience and if it is different of which it is in Database
        if($experience->date_Fin_Experience != $request->input('date_Fin_Experience') && $request->input('date_Fin_Experience') != null ){
            $experience->date_Fin_Experience = $request->input('date_Fin_Experience');
        }

        //Register the domain of job only if candidate have typed hintthe domain of job and if it is different of which it is in Database
        if($experience->secteur_Experience != $request->input('secteur_Experience') && $request->input('secteur_Experience') != ""){
            $experience->secteur_Experience = $request->input('secteur_Experience');
        }

        //Register the type of contract  only if candidate have typed hint type of contract and if it is different of which it is in Database
        if($experience->type_Contrat_Experience != $request->input('type_Contrat_Experience') && $request->input('type_Contrat_Experience') != "AUCUN" ){
            $experience->type_Contrat_Experience = $request->input('type_Contrat_Experience');
        }


        //save the informations about professionnal experience
        $experience->save();

        //Redirect the candidate to his profile page
        return redirect()->route('Profil_candiat');
    }


    //function to register IVOIRJOB candidates Certifications
    public function RegistrerCandidateCertification(Request $request){

        //if candidate is not authorized
        if(Auth::user()->cannot('ActOnProfile')){
            abort(403);
        }

        //Validate data send by candidate
        $validate_data = Validator::make($request->all(),[
            'intitule_Certification'  => 'bail | required | max : 55',
            'organisation_Certification'  => 'bail | required | max : 45',
            'date_Debut_Certification'  => 'bail | required ',
            'date_Fin_Certification'  => 'bail | required ',
        ])->validateWithBag('ErrorRegistrerCandidateCertification');


        //record Certification's informations send by candidate and save them
        $Certification = new Certification;
        $Certification->intitule_Certification = $request->input('intitule_Certification');
        $Certification->organisation_Certification = $request->input('organisation_Certification');
        $Certification->date_Debut_Certification = $request->input('date_Debut_Certification');
        $Certification->date_Fin_Certification = $request->input('date_Fin_Certification');
        $Certification->candidat_id = Auth::user()->id_Candidat ;
        $Certification->save();

        //Redirect the candidate to his profil Page
        return redirect()->route('Profil_candiat');
    }


    //function to delete a Certification add by the candidate
    public function DeleteCandidateCertification($id){

        //if candidate is not authorized
        if(Auth::user()->cannot('ActOnProfile')){
            abort(403);
        }

        //Retrieve the professional experiecence and delete him
        $Certification = Certification::find($id)->delete();

        //Redirect the candidat to his profil
        return redirect()->route('Profil_candiat');
    }


    //function to modify a Certification add by the candidate
    public function ModifyCandidateCertification($id, Request $request){

        //if candidate is not authorized
        if(Auth::user()->cannot('ActOnProfile')){
            abort(403);
        }

        //Validate informations about Certification
        $validate_data = Validator::make($request->all(),[
            'intitule_Certification'  => 'bail | required | max : 55',
            'organisation_Certification'  => 'bail | required | max : 45',
        ])->validateWithBag('ErrorModifyCandidateCertification');

        //Retrieve the Certification , record the informations about it and save them
        $certification = Certification::find($id);

        //Register the name of certification only if candidate have typed hint the name and if it is different of which it is in Database
        if($certification->intitule_Certification != $request->input('intitule_Certification') && $request->input('intitule_Certification') !=""){
            $certification->intitule_Certification = $request->input('intitule_Certification');
        }

        //Register the name of certification's organisation only if candidate have typed hint the name of certification's organisation and if it is different of which it is in Database
        if($certification->organisation_Certification != $request->input('organisation_Certification') && $request->input('organisation_Certification') != ""){
            $certification->organisation_Certification = $request->input('organisation_Certification');
        }

        //Register the begining date of certification only if candidate have typed hint and if it is different of which it is in Database
        if($certification->date_Debut_Certification != $request->input('date_Debut_Certification') && $request->input('date_Debut_Certification') != null){
            $certification->date_Debut_Certification = $request->input('date_Debut_Certification');
        }

        //Register the ending date of certification only if candidate have typed hint and if it is different of which it is in Database
        if($certification->date_Fin_Certification != $request->input('date_Fin_Certification') && $request->input('date_Fin_Certification') != null){
            $certification->date_Fin_Certification = $request->input('date_Fin_Certification');
        }


        //save the informations about professionnal experience
        $certification->save();

        //Redirect the candidate to his profile page
        return redirect()->route('Profil_candiat');
    }

    //function to register IVOIRJOB candidates skills
    public function RegistrerCandidateCompetence(Request $request){

        //if candidate is not authorized
        if(Auth::user()->cannot('ActOnProfile')){
            abort(403);
        }

        //Validate data send by candidate
        $validate_data = Validator::make($request->all(),[
            'libelle_Competence'  => 'bail | required | max : 45',
            'description_Competence'  => 'bail | required | max : 250',
        ])->validateWithBag('ErrorRegistrerCandidateCompetence');


        //record Certification's informations send by candidate and save them
        $Competence = new Competence;
        $Competence->libelle_Competence = $request->input('libelle_Competence');
        $Competence->description_Competence = $request->input('description_Competence');
        $Competence->candidat_id = Auth::user()->id_Candidat ;
        $Competence->save();

        //Redirect the candidate to his profil Page
        return redirect()->route('Profil_candiat');
    }


    //function to delete a skill add by the candidate
    public function DeleteCandidateCompetence($id){

        //if candidate is not authorized
        if(Auth::user()->cannot('ActOnProfile')){
            abort(403);
        }

        //Retrieve the skill of the candidate and delete him
        $Competence = Competence::find($id)->delete();

        //Redirect the candidat to his profil
        return redirect()->route('Profil_candiat');
    }


    //function to modify a skill add by the candidate
    public function ModifyCandidateCompetence($id, Request $request){

        //if candidate is not authorized
        if(Auth::user()->cannot('ActOnProfile')){
            abort(403);
        }

        //Validate informations about skill
        $validate_data = Validator::make($request->all(),[
            'libelle_Competence'  => 'bail | required | max : 45',
            'description_Competence'  => 'bail | required | max : 250',
        ])->validateWithBag('ErrorModifyCandidateCompetence');

        //Retrieve the Certification , record the informations about it and save them
        $Competence = Competence::find($id);

        //Register the entitled of skill only if candidate have typed hint the entitled and if it is different of which it is in Database
        if($Competence->libelle_Competence != $request->input('libelle_Competence') && $request->input('libelle_Competence') !=""){
            $Competence->libelle_Competence = $request->input('libelle_Competence');
        }

        //Register the description only if candidate have typed hint description and if it is different of which it is in Database
        if($Competence->description_Competence != $request->input('description_Competence') && $request->input('description_Competence') != ""){
            $Competence->description_Competence = $request->input('description_Competence');
        }

        //save the informations about skill
        $Competence->save();

        //Redirect the candidate to his profile page
        return redirect()->route('Profil_candiat');
    }


    //function to register IVOIRJOB candidates Documents
    public function RegistrerCandidateDocument(Request $request){

        //if candidate is not authorized
        if(Auth::user()->cannot('ActOnProfile')){
            abort(403);
        }

        //Validate informations about document
        $validate_data = Validator::make($request->all(),[
            'lien_Document' => 'required |mimes:pdf,docx',
        ])->validateWithBag('ErrorRegistrerCandidateDocument');

        //record document's informations send by candidate and save them



        $document = Document::firstOrCreate([
            'type_Document' => $request->input('type_Document'),
            'candidat_id' => Auth::user()->id_Candidat
        ]);
        $document->lien_Document =  $request->file('lien_Document')->store('public');
        $document->save();
        return redirect()->route('Profil_candiat');
    }


    //function to delete a document add by the candidate
    public function DeleteCandidateDocument($id){

        //if candidate is not authorized
        if(Auth::user()->cannot('ActOnProfile')){
            abort(403);
        }

        //Retrieve the document and delete him
        $document = Document::find($id);
        Storage::delete($document->lien_Document);
        $document->delete();

        //Redirect the candidat to his profil
        return redirect()->route('Profil_candiat');
    }


    //function to modify a document add by the candidate
    public function ModifyCandidateDocument($id, Request $request){

        //if candidate is not authorized
        if(Auth::user()->cannot('ActOnProfile')){
            abort(403);
        }

        //Retrieve the document, record the informations about it and save them
        $document = Document::find($id);


        //Register the type of document only if candidate have choosen  document's type and if it is different of which it is in Database
        if($document->type_Document != $request->input('type_Document') && $request->input('type_Document') != "AUCUN" ){
            $document->type_Document = $request->input('type_Document');
        }

        //Register the Candidate document only if candidate have provided a document
        if($request->file('lien_Document') != null){
            Storage::delete($document->lien_Document);
            $document->lien_Document = $request->file('lien_Document')->store('public');
        }


        //save the informations about formation
        $document->save();

        //Redirect the candidate to his profile page
        return redirect()->route('Profil_candiat');
    }


    //function to download candidate document
    public function DownloadCandidateDocument($id){

        //if candidate is not authorized
        if(Auth::user()->cannot('ActOnProfile')){
            abort(403);
        }

        //Retrieve the document and show them to candidate
        $document = Document::find($id);
        return Storage::download($document->lien_Document);
    }

    //function to register IVOIRJOB candidates language
    public function RegistrerCandidateLangue(Request $request){

        //if candidate is not authorized
        if(Auth::user()->cannot('ActOnProfile')){
            abort(403);
        }

        //record language informations send by candidate and save them

        $langue = Langue::where('reference_Langue',$request->input('langue_Selectionnee'))->first();

        $parle = Parle::firstOrCreate([
            'candidat_id' => Auth::user()->id_Candidat,
            'langue_id' => $langue->id_Langue,
        ]);

        $parle->niveau_Langue = $request->input('niveau_Langue');

        if( $request->input('statut_Langue') == "Oui"){
            $parle->statut_Langue = true;
        }else{
            $parle->statut_Langue = false;
        }

        $parle->save();
        return redirect()->route('Profil_candiat');
    }


    //function to delete a language add by the candidate
    public function DeleteCandidateLangue($id){

        //if candidate is not authorized
        if(Auth::user()->cannot('ActOnProfile')){
            abort(403);
        }

        //Retrieve the language and delete him
        $parle = Parle::find($id)->delete();

        //Redirect the candidat to his profil
        return redirect()->route('Profil_candiat');
    }


    //function to logout authenticated IVOIRJOB candidates
    public function Logout_Candidate(Request $request){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }


    //Candidate submit to a job offer only if he haven't do it earlier
    public function SoummissionOffre($idFiche){

        //if candidate is not authorized
        if(Auth::user()->cannot('ActOnJobOffers')){
            abort(403);
        }

        $fiche = FichePoste::find($idFiche);
        if(Carbon::createFromFormat('Y-m-d H:i:s',$fiche->date_Limite_Candidature)->lt(now())){
            return redirect()->back()->with('ErreurSoumission', "La date limite de soumission pour l'offre est dépassée");
        }else{
            Soumission::firstOrCreate([
                'fiche_id' =>$idFiche,
                'candidat_id' => Auth::user()->id_Candidat,

            ],[
                'date_Soumission' => today()
            ]);
            return redirect()->route('Offres_candiat');
       }
    }


    //function to show quiz to a candidate
    public function ShowQuiz($linkQuiz){
        $Suivi = Suivi::where('lien_Etape',$linkQuiz)->first();
        $Quiz = $Suivi->soumissions->Offres->Quiz;
        if($Suivi->date_Participation_Etape == null){
            $Suivi->date_Participation_Etape = now();
            $Suivi->Score_Etape = "0";
            $Suivi->save();
            return view('Candidat.Quiz', [ 'Quiz'=> $Quiz]);
        }else if(Carbon::createFromFormat('Y-m-d H:i:s',$Quiz->date_Limite_Quiz)->lt(now())){
            return redirect()->back()->with("ErrorFinParticipartion","La date de participation au quiz est passée");
        }
        else{
            return redirect()->back()->with("ErrorParticipartion","Vous avez déjà participé à ce quiz");
        }

    }

    public function  ResponsesQuiz($idQuiz, Request $request){
        $Quiz = Quiz::find($idQuiz);                                //Retrieve the correspunding quiz
        $Soumission = Soumission::where('fiche_id',$Quiz->fichePoste->id_Fiche)->where('candidat_id',Auth::user()->id_Candidat)->first();
        $Suivi = $Soumission->latestSuivis;
        $score = 0;                                                 //Variable which contain the score for this quiz
        $correctQuestionAnswer = true;                              //boolean variable to verify that question is correctly respunding
        foreach($Quiz->parties as $partie){
            foreach($partie->questions as $question){               //For each question
                foreach($question->propositions as $proposition ){  //Retrieve his correspundings responses
                    if($proposition->statut_Solution){              //Retrieve his respnse is true, verify that the field is fill else verify that the fied is not fill
                        if(Str::replace(' ','_',$proposition->reponse) == $request->input($proposition->id_Proposition)){
                            $correctQuestionAnswer = $correctQuestionAnswer && true;
                        }else{
                            $correctQuestionAnswer = $correctQuestionAnswer && false;
                        }
                    }else{
                        if($request->input($proposition->id_Proposition) == null){
                            $correctQuestionAnswer = $correctQuestionAnswer && true;
                        }else{
                            $correctQuestionAnswer = $correctQuestionAnswer && false;
                        }
                    }

                }
                if($correctQuestionAnswer){                             //calculate the score of the candidate after this question
                    $score = $score + (int)$question->point_Question;
                }
                $correctQuestionAnswer = true;
            }
        }
        $Suivi->Score_Etape = $score;
        if($Quiz->isGreatherThan($score)){
            $Suivi->validation_Etape = true;
        }else{
            $Suivi->validation_Etape = false;
        }
        $Suivi->save();

        return redirect()->route('Tableau_de_bord_candiat');

    }

    public function SendEmail(){
        $candidat = Candidat::find(1);
        Mail::to($candidat->e_mail_Candidat)->send(new CandidateMail($candidat));
    }

}
