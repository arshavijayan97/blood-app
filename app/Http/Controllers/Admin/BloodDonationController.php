<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BloodDonationRequest;
use App\Models\BloodDonation;

class BloodDonationController extends Controller
{
    //for view all donation
    public function index()
    {
        $donations = BloodDonation::orderBy('created_at', 'asc')
                         ->paginate(6);

        return view('admin.index', compact('donations'));
    }
    //for donation add from
    public function create()
    {
        return view('admin.blood-donations-create');
    }
    //for Save donations
    public function store(BloodDonationRequest $request)
    {
        try {
        
            $validatedData = $request->validated();

            $bloodDonation = new BloodDonation([
                'donor_name' => $validatedData['donor_name'],
                'blood_group' => $validatedData['blood_group'],
                'donation_date' => $validatedData['donation_date'],
                'quantity_ml' => $validatedData['quantity_ml'],
            ]);
    
            $bloodDonation->save();
    
            return redirect()->route('donation.index')->with('success', 'Blood donation added successfully');
        } catch (\Exception $e) {
            //  dd($e);
            return redirect()->back()->with('error', 'Error adding blood donation: ' . $e->getMessage());
        }
    }
    // for to view edit page
    public function edit($id)
    {
        try {
            $bloodDonation = BloodDonation::findOrFail($id);
            return view('admin.edit', compact('bloodDonation'));
        } catch (\Exception $e) {
            return redirect()->route('donation.index')->with('error', 'Error fetching blood donation: ' . $e->getMessage());
        }
    }
    //update the donation

    public function update(BloodDonationRequest $request, $id)
    {
        try {
            $bloodDonation = BloodDonation::findOrFail($id);
    
            // Validate the incoming data
            $validatedData = $request->validated();
            $bloodDonation->update($validatedData);
    
            return redirect()->route('donation.index')->with('success', 'Blood donation updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating blood donation: ' . $e->getMessage());
        }
    }
    
// soft delete donation
    public function destroy($id)
    {
        try {
            $bloodDonation = BloodDonation::findOrFail($id);
            $bloodDonation->delete();

            return redirect()->route('donation.index')->with('success', 'Blood donation deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('donation.index')->with('error', 'Error deleting blood donation: ' . $e->getMessage());
        }
    }
}

