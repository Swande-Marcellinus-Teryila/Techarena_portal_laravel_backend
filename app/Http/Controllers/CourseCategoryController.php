<?php

namespace App\Http\Controllers;

use App\Models\CourseCategory;
use Illuminate\Http\Request;

class CourseCategoryController extends Controller
{
   
    public function index()
    {
        try {

            $course_categories = CourseCategory::all();
            if (count($course_categories) > 0) {
                return response()->json($course_categories);
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
     * @param  \App\Models\CourseCategory  $courseCategory
     * @return \Illuminate\Http\Response
     */
    public function show(CourseCategory $courseCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseCategory  $courseCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseCategory $courseCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseCategory  $courseCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseCategory $courseCategory)
    {
        //
    }


    public function destroy($id)
    {
        try {
            $course_categories = CourseCategory::WhereIn('id', explode(',', $id));
            if ($course_categories) {
                $course_categories->delete();
                return response()->json([
                    'message' => "Record(s) deleted successfully"
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
