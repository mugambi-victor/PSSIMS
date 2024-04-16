<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Term;
use App\Models\academicYear;
use App\Models\Grade;

class StudentController extends Controller
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
            'name' => 'required|string',
            'registration_number' => 'required|unique:students,registration_number|string',
            'guardian_name' => 'required|string',
            'year_of_joining' => 'required|date',
            'grade_id' => [
                'required',
                Rule::exists('grades', 'id')->where(function ($query) {
                    return $query->where('deleted_at', null);
                }),
            ],
            'term_id' => [
                'required',
                Rule::exists('terms', 'id')->where(function ($query) {
                    return $query->where('deleted_at', null);
                }),
            ],
            'academic_year_id' => [
                'required',
                Rule::exists('academic_years', 'id')->where(function ($query) {
                    return $query->where('deleted_at', null);
                }),
            ],
            'guardian_password' => 'required|string'
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
