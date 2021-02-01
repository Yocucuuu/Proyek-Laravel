<?php

namespace App\Mail;

use App\siswa;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewSiswaMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $siswa;
    public $nis;
    public $pass;
    public $nama;
    public function __construct($paramNis,$paramPass)
    {
        // tak kitim pass e soal e dee hashing , jadi aku ngirim dari registre
        //atau edit e
        $this->siswa = siswa::find($paramNis);
        $this->nama = $this->siswa->Nama_siswa;
        $this->nis = $paramNis;
        $this->pass = $paramPass;
        // dd($siswa);
        // mungkin nanti butuh
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Registrasi Siswa")
        ->view('email.registrasiMail')
        ->with([
            'nis' => $this->nis,
            'pass' => $this->pass,
            'nama'=>$this->nama,
            'siswa'=>$this->siswa,
        ]);
    }
}
