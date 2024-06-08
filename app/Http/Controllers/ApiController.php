<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
     
    public function store(Request $request)
    {
        try {
            // Validate request data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:employee,email|max:255',  
                'e_id' => 'required|numeric|unique:employee,e_id',  
                'phone' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'resume' => 'required|mimes:pdf|max:2048', // Assuming maximum file size is 2MB (2048 KB)
            ]);
    
            // Handling file upload for resume
            if ($request->hasFile('resume')) {
                $resume = $request->file('resume');
                $fileName = time() . '_' . $resume->getClientOriginalName(); 
                $resume->move(public_path('uploads/resumes'), $fileName); 
                $validatedData['resume'] = '/uploads/resumes/' . $fileName;
            }
    
            // Save the student record
            Student::create($validatedData);
    
            return response()->json(['success' => true, 'message' => 'Student added successfully'], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $failedRules = $e->validator->failed();
            if (isset($failedRules['email']['Unique'])) { 
                return response()->json(['success' => false, 'message' => 'Email already exists. Please use a different email.'], 422);
            } elseif (isset($failedRules['e_id']['Unique'])) { 
                return response()->json(['success' => false, 'message' => 'E_ID already exists. Please use a different E_ID.'], 422);
            } 
            return response()->json(['success' => false, 'message' => 'Validation failed', 'errors' => $e->validator->errors()], 422);
        } catch (\Exception $e) { 
            Log::error('Failed to create student: ' . $e->getMessage());
    
            return response()->json(['success' => false, 'message' => 'Failed to create student'], 500);
        }
    }
    

}
