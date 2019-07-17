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
        $errors_logs = [];
        if ($request->get('email')) {
            $lead = Lead::create([
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'email' => $request->get('email'),
                'message' => $request->get('message'),
            ]);

            $errors_logs = $this->sendEmail($lead);
            if (!count($errors_logs)) {
                return redirect()->back()->with(['message_feedback_send' => true]);
            }
        }

        return redirect()->back()->withErrors($errors_logs);
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
                $mail->from([
                    'address' => ConfigManager::get('mail.from.address', 'geekcms@localhost'),
                    'name' => ConfigManager::get('mail.from.name', 'Geekcms')
                ]);

                $mail->to([
                    'address' => ConfigManager::get('mail.to.address', 'geekcms@localhost'),
                    'name' => ConfigManager::get('mail.to.name', 'localhost')
                ])->subject(ConfigManager::get('mail.from.title', 'New message'));
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
