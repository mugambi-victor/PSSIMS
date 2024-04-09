<?php

namespace App\Http\Controllers;

use App\Models\academicYear;
use Illuminate\Http\Request;
use App\Models\Term;
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
    // Validate the incoming request
    $this->validate($request, [
        'name' => 'required|string|unique',
    ]);

    // Create a new academic year instance
    $academicYear = new AcademicYear();
    $academicYear->name = $request->name;

    // Save the academic year
    $academicYear->save();

    // Assuming you have a Term model, create three terms and associate them with the academic year
    for ($i = 1; $i <= 3; $i++) {
        $term = new Term();
        $term->name = 'Term ' . $i;
        // Associate the term with the academic year
        $term->academic_year_id = $academicYear->id;
        $term->save();
    }

    // Optionally, you can redirect the user to a different page after successful creation
    return response()->json([
        'success' => true,
        'message' => 'Academic year and terms created successfully',
        'academic_year' => $academicYear,
        'terms' => $term,
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
