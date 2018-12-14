<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FeedbackRequest;
use App\Events\FeedbackWasCreated;

class ApiController extends Controller
{
	public function feedback(FeedbackRequest $request)
	{
		event(new FeedbackWasCreated($request->all()));

		return view('parts.api.feedback-success');
	}
}
