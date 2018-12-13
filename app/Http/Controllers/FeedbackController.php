<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FeedbackRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use App\Mail\FeedbackMail;

class FeedbackController extends Controller
{
	public function feedback()
	{
		return view('layouts.secondary', [
			'page' => 'pages.feedback',
			'title' => 'Laravel-blog | Обратная связь'
		]);
	}

	public function feedbackPost(FeedbackRequest $request)
	{
		Mail::to('3ton2004@mail.ru')
			->send(new FeedbackMail($request->all()));

		return view('layouts.secondary', [
			'page' => 'parts.feedback-success',
			'title' => 'Laravel-blog | Сообщение отправлено'
		]);
	}
}
