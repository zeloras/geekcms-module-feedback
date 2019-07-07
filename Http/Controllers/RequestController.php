<?php

namespace GeekCms\Feedback\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use GeekCms\Feedback\Models\Lead;

class RequestController extends Controller
{
    public function request(Request $request)
    {
        if ($request->get('email')) {
            $lead = Lead::create([
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'phone_second' => $request->get('phone_second'),
                'message' => $request->get('message'),
                'notify' => 0,
            ]);

            $this->sendEmail($lead);

            return response()->json([
                'result' => true,
            ], 200);
        }

        return response()->json([
            'result' => false,
        ], 400);
    }

    /**
     * Send email.
     *
     * @param $leed
     *
     * @return array|bool
     */
    public function sendEmail($leed)
    {
        $errors = [];

        try {
            Mail::send('feedback::email', ['lead' => $leed], function ($mail) use ($leed) {
                $mail->from(config('mail.from.address'), config('app.name'));

                $mail->to(config('feedback.email'), $leed)
                    ->subject('Новое сообщение')
                ;
            });
        } catch (\Swift_TransportException $e) {
            $errors[] = $e->getMessage();
        }

        if (\count($errors)) {
            return $errors;
        }

        return true;
    }
}
