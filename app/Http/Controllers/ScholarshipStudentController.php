<?php

namespace App\Http\Controllers;

use App\Models\ScholarshipStudent;
use Illuminate\Http\Request;

class ScholarshipStudentController extends Controller
{
    public function index()
    {
        try {

            $scholarship_students = ScholarshipStudent::all();
            if (count($scholarship_students) > 0) {
                return response()->json($scholarship_students);
            } else {
                return response()->json([
                    'message' => "No record found",
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Sorry, something went wrong',
            ]);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ScholarshipStudent  $scholarshipStudent
     * @return \Illuminate\Http\Response
     */
    public function show(ScholarshipStudent $scholarshipStudent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ScholarshipStudent  $scholarshipStudent
     * @return \Illuminate\Http\Response
     */
    public function edit(ScholarshipStudent $scholarshipStudent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ScholarshipStudent  $scholarshipStudent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ScholarshipStudent $scholarshipStudent)
    {
        //
    }

    public function destroy($id)
    {
        try {
            $scholarship_students = ScholarshipStudent::find($id);
            if ($scholarship_students) {
                $scholarship_students->delete();
                return response()->json([
                    'message' => "Record deleted successfully"
                ]);
            } else {
                return response()->json([
                    'message' => "Record does not exist"
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "Sorry,somthing went wrong"
            ]);
        }
    }
}
