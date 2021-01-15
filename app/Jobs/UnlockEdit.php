<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
use App\Camaru;
class UnlockEdit implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $id_camaru;
    public $tries = 5;
    
    public function __construct($id)
    {
        $this->id_camaru = $id;

    }

    
    public function handle()
    {
        Camaru::find($this->id_camaru)->update(['on_editing'=>0]);
        
    }
}
