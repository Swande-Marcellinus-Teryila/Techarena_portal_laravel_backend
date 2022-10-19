<?php

namespace App\Http\Controllers;

use App\Models\StaffAssignedCourse;
use Illuminate\Http\Request;

class StaffAssignedCourseController extends Controller
{
    public function index()
    {
        try {

            $staff_assigned_courses= StaffAssignedCourse::all();
            if (count($staff_assigned_courses) > 0) {
                return response()->json($staff_assigned_courses);
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
     * @param  \App\Models\StaffAssignedCourse  $StaffAssignedCourse
     * @return \Illuminate\Http\Response
     */
    public function show(StaffAssignedCourse $StaffAssignedCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StaffAssignedCourse  $StaffAssignedCourse
     * @return \Illuminate\Http\Response
     */
    public function edit(StaffAssignedCourse $StaffAssignedCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StaffAssignedCourse  $StaffAssignedCourse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StaffAssignedCourse $StaffAssignedCourse)
    {
        //
    }
    public function destroy($id)
    {
        try {
            $staff_assigned_courses = StaffAssignedCourse::find($id);
            if ($staff_assigned_courses) {
                $staff_assigned_courses->delete();
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
