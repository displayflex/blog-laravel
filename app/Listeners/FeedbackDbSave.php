<?php

namespace App\Listeners;

use App\Events\FeedbackWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FeedbackDbSave
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

		User::findOrFail(Auth::user()->id)
			->feedbacks()
			->create([
				'name' => $data['name'],
				'email' => $data['email'],
				'message' => $data['message']
			]);
	}
}
