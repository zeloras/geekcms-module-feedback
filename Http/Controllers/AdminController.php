<?php

namespace GeekCms\Feedback\Http\Controllers;

use Illuminate\Routing\Controller;
use GeekCms\Feedback\Models\Lead;

class AdminController extends Controller
{
    public function index()
    {
        $leads = Lead::orderBy('created_at', 'desc')
            ->paginate(15)
        ;

        return view('feedback::index', [
            'leads' => $leads,
        ]);
    }
}
