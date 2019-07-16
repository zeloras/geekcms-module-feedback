<?php

namespace GeekCms\Feedback\Http\Controllers;

use Exception;
use GeekCms\Feedback\Models\Lead;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index()
    {
        $leads = Lead::orderBy('created_at', 'desc')
            ->paginate(15);

        return view('feedback::index', [
            'mails' => $leads,
        ]);
    }

    /**
     * Show message
     *
     * @param Request $request
     * @param Lead $message
     *
     * @return Factory|View
     */
    public function view(Request $request, Lead $message)
    {
        $message_id = object_get($message, 'id');

        return view('feedback::view', [
            'message' => $message
        ]);
    }

    /**
     * Delete message.
     *
     * @param Lead $message
     *
     * @return RedirectResponse
     * @throws Exception
     *
     */
    public function delete(Lead $message)
    {
        $message->delete();

        return redirect()->route('admin.feedback');
    }

    /**
     * Delete selected data.
     *
     * @param Request $request
     *
     * @return RedirectResponse
     * @throws Exception
     *
     */
    public function deleteAll(Request $request)
    {
        $get_messages = $request->get('items', '');
        $get_messages = explode(',', $get_messages);

        if (count($get_messages)) {
            $find_messages = Lead::whereIn('id', $get_messages);
            if ($find_messages->count()) {
                $find_messages->delete();
            }
        }

        return redirect()->route('admin.feedback');
    }
}
