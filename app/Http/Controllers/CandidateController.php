<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;

class CandidateController extends Controller
{
    public function create()
    {
        return view('candidates.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email' => 'required|email|max:255',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'phone_number' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:255',
            // Add validation rules for other fields
        ]);

        if ($request->hasFile('picture')) {
            $data['picture'] = $request->file('picture')->store('uploads', 'public');
        }

        if ($request->hasFile('resume')) {
            $data['resume'] = $request->file('resume')->store('resumes', 'public');
        }

        Candidate::create($data);

        return redirect()->route('products.index');
    }
}
