<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BloodDonation;

class DonationController extends Controller
{
    // user view all list of donation
    public function index()
    {
        $donations = BloodDonation::orderBy('created_at', 'asc')
                         ->paginate(6);

        return view('user.index', compact('donations'));
    }
}
