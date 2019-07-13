<?php

namespace GeekCms\Feedback\Http\Controllers;

use GeekCms\Feedback\Models\Lead;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $leads = Lead::orderBy('created_at', 'desc')
            ->paginate(15);

        return view('feedback::index', [
            'leads' => $leads,
        ]);
    }
}
