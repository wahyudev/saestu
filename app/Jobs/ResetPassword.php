<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
class ResetPassword implements ShouldQueue
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
        $this->data=$data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $user_data=$this->data;
        Mail::send('email.email-new-akun', ['user_data'=>$user_data], function ($message) use ($user_data)
              {
                  $message->subject('Reset Akun Calon Mahasiswa Baru Universitas Jambi ');
                  $message->from('pmb@unja.ac.id', 'Universitas Jambi');
                  $message->to($user_data->email);
              });
    }
}
