<?php

namespace App\Jobs;

use App\Mail\AlertLoginMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class AlertLoginJob implements ShouldQueue
{
    use Queueable,Dispatchable,InteractsWithQueue,SerializesModels;

   protected $user;
    public function __construct( $user)
    {
       $this->user= $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to('ramoskent12@gmail.com')->send(new AlertLoginMail($this->user));
    }
}
