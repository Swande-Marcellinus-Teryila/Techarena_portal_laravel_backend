<?php

namespace App\Http\Controllers;

use App\Models\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required'
        ]);

        $course_categories = [
            'category_name' => $request->category_name,
        ];
        $category = $request->category_name;
        try {
            if (CourseCategory::where('category_name', '=', $category)->exists()) {

                return response()->json([
                    'message' => $category . ' already exist!'
                ], 500);
            }
            CourseCategory:: create($course_categories);

            return response()->json([
                'message' => 'Record added successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Sorry, Something went wrong",
            ], 500);
        }
    }

   

    public function show($id)
    {
        try {

            $data = DB::table('course_categories')->find($id);
            if(is_null($data)){
                return response()->json([
                    'message' => "Record not found",
                    'status'  => 404,
                ],404);
            }
            $response['content'] = $data;
            return response()->json($response);

            
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Sorry, something went wrong',
            ],500);
        }
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

  
    public function update(Request $request,$id)
    {
        $course_categories = CourseCategory::find($id);
        $request->validate([
            'category_name' => 'required'
        ]);            
        $category = $request->category_name;
        try {
            if (CourseCategory::where('category_name','=', $category)->where('id','!=',$id)->exists()) {

                return response()->json([
                    'message' => $category . ' already exist!'
                ], 500);
            }
            
            $course_categories->category_name    = ucfirst($request->category_name);
            $course_categories->save();
            return response()->json([
                'message' => 'Record updated successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Sorry, Something went wrong",
            ], 500);
        }
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
