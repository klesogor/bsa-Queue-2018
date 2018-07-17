<?php

namespace App\Jobs;

use App\User;
use App\Entity\Currency;
use App\Mail\RateChanged;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendRateChangedEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public $user;
    public $currency;
    public $oldRate;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, Currency $currency, float $old)
    {
        $this->user = $user;
        $this->currency = $currency;
        $this->oldRate = $old;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $mail = new RateChanged($this->user,$this->currency,$this->oldRate);
        Mail::send($mail);
    }

    public function fail($exception = null)
    {
        $message = ($exception instanceof \Exception) ? $exception->getMessage() : 'no exception caught';

        Log::warning("Failed to send currency rate change notification to email:{{$this->user->email}}.
                        \n Exception info:{{($message)}}");
    }
}
