<?php

namespace App\Http\Controllers;

use App\Models\ProductEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    /**
     * Display the user dashboard with enquiries.
     */
    public function index()
    {
        // If user is admin, redirect to admin dashboard
        if (Auth::user()->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }
        
        $userId = Auth::id();
        
        // Get all enquiries for stats
        $allEnquiries = ProductEnquiry::where('user_id', $userId)->get();
        
        // Get paginated enquiries for table
        $enquiries = ProductEnquiry::where('user_id', $userId)
            ->with('product')
            ->latest()
            ->paginate(10);

        // Calculate stats
        $stats = [
            'pending' => $allEnquiries->where('status', 'pending')->count(),
            'reserved' => $allEnquiries->where('status', 'reserved')->count(),
            'shipped' => $allEnquiries->where('status', 'shipped')->count(),
            'delivered' => $allEnquiries->where('status', 'delivered')->count(),
        ];

        return view('user.dashboard', compact('enquiries', 'stats'));
    }
}
