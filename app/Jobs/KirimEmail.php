<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
class KirimEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $data;
    public $tries = 5;
    public function __construct($data)
    {
        $this->data = $data;
    }

    
    public function handle()
    {
        
        $data_pendaftar=$this->data;
        Mail::send('email.akun-pendaftaran-email', ['data'=>$this->data], function ($message) use($data_pendaftar){   

            $message->subject('Akun Login Sistem E-Registration Universitas JAmbi');
            $message->from('pmb@unja.ac.id', 'Universitas Jambi');
            $message->to($data_pendaftar['email']);
        });
    }
}
