<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contact;

class HomeController extends Controller
{
    public function index()
    {
        $contact = Contact::paginate(8);

        return view('sitemanager.index', compact('contact'));
    }
}
