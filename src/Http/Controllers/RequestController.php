<?php

namespace GeekCms\Feedback\Http\Controllers;

use ConfigManager;
use GeekCms\Feedback\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Swift_TransportException;
use function count;

class RequestController extends Controller
{
    public function request(Request $request)
    {
        if ($request->get('email')) {
            $lead = Lead::create([
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'email' => $request->get('email'),
                'message' => $request->get('message'),
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
            Mail::send(ConfigManager::get('mail.template', 'clear tmp'), ['lead' => $leed], function ($mail) use ($leed) {
                $mail->from(ConfigManager::get('mail.from.address', 'geekcms@localhost'), ConfigManager::get('mail.from.name', 'Geekcms'));

                $mail->to(ConfigManager::get('mail.to.address', 'geekcms@localhost'))
                    ->subject(ConfigManager::get('mail.from.title', 'New message'));
            });
        } catch (Swift_TransportException $e) {
            $errors[] = $e->getMessage();
        }

        if (count($errors)) {
            return $errors;
        }

        return true;
    }
}
