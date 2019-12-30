<?php

namespace App\Mail\Account;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendActivationEmail extends Mailable implements ShouldQueue
{

	use Queueable, SerializesModels;

	public $token;
	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct($token)
	{

		$this->token = $token;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{

		return $this->markdown('emails.activateAccount');
	}
}
