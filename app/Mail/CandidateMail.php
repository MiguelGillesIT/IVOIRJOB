<?php

namespace App\Mail;

use App\Models\Candidat;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CandidateMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $Candidat;

    public function __construct(Candidat $candidat)
    {
        //
        $this->Candidat = $candidat;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('francoismetal80@gmail.com')->markdown('emails.InformCandidate',[
            'candidatePrename' => $this->Candidat->prenoms_Candidat,
            'candidateName' => $this->Candidat->nom_Candidat,
        ]);
    }
}
