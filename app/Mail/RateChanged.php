<?php

namespace App\Mail;

use App\User;
use App\Entity\Currency;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RateChanged extends Mailable
{
    use Queueable, SerializesModels;


    private $user;
    private $currency;
    private $oldRate;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user,Currency $currency, float $oldRate)
    {
        $this->user = $user;
        $this->currency = $currency;
        $this->oldRate = $oldRate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('Mail.CurrencyRateChanged',['userName' => $this->user->name, 
                                                            'currencyName' => $this->currency->name,
                                                            'old' => $this->oldRate,
                                                            'new' => $this->currency->rate])
                                                            ->to($this->user->email);
    }
}
