<?php

namespace App\Listeners;

use App\Events\FeedbackWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackMail;

class FeedbackMailNotify
{
	/**
	 * Create the event listener.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  FeedbackWasCreated  $event
	 * @return void
	 */
	public function handle(FeedbackWasCreated $event)
	{
		$data = $event->getInputData();

		Mail::to('3ton2004@mail.ru')
			->send(new FeedbackMail($data));
	}
}
