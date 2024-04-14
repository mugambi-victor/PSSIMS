<?php

namespace App\Http\Controllers;

use App\Models\academicYear;
use Illuminate\Http\Request;
use App\Models\Term;
use App\Models\Result;
use App\Http\Controllers\ResultController;
class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:academic_years,name'
        ]);
    
        // Check if academic year with the same name already exists
        if (AcademicYear::where('name', $request->name)->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'An academic year with the same name already exists'
            ], 422);
        }    

        // Create a new academic year
        $academicYear = new AcademicYear();
        $academicYear->name = $request->name;
        $academicYear->save();
    
        // Create terms for the academic year
        $termNames = ['Term One', 'Term Two', 'Term Three']; // Provide unique names for terms
        foreach ($termNames as $termName) {
            $term = new Term();
            $term->name = $termName;
            $term->academic_year_id = $academicYear->id;
            $term->save();
    
            // Create exam results for each term
            $examResults = [
                'Opener Exam Result',
                'Midterm Exam Result',
                'Endterm Exam Result'
            ];
            foreach ($examResults as $resultName) {
                $examResult = new Result();
                $examResult->term_id = $term->id;
                $examResult->result_name = $resultName;
                $examResult->save();
            }
        }
    
        // Return response with created academic year and terms
        return response()->json([
            'success' => true,
            'message' => 'Academic year, terms, and exam results created successfully',
            'academic_year' => $academicYear,
        ]);
    }
    


    /**
     * Display the specified resource.
     */
    public function show(academicYear $academicYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(academicYear $academicYear)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, academicYear $academicYear)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(academicYear $academicYear)
    {
        //
    }
}
