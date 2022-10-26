<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class CourseController extends Controller
{

    public function index()
    {
        try {
            $departments = Department::all();
            $courses = Department::rightJoin('courses','departments.id','=','courses.department_id')
            ->get(); 
            if (count($departments)>0) {
                return response()->json([
                    'courses' =>$courses,
                    'departments' =>$departments
                ]);
            } else {
                return response()->json([
                    'message' => "No record found",
                    'departments' => []
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Sorry, something went wrong',
            ]);
        }
    }


    public function create()
    {
        
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'course_name'   => 'required',
            'description'   => 'required',
            'department_id' => 'required'
        ]);

        $courses = [
            'course_name'   => $request->course_name,
            'description'   => $request->description,
            'department_id' => $request->department_id

        ];
        $course = $request->course_name;
        try {
            if (Course::where('course_name', '=', $course)
            ->where('department_id','=',$request->department_id)->exists()) {

                return response()->json([
                    'message' => $course . ' already exist!'
                ], 500);
            }
            Course:: create($courses);

            return response()->json([
                'message' => 'Record added successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Sorry, Something went wrong",
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $departments = Department::all();
            $data        = DB::table('courses')->find($id);
            if (is_null($data)) {
                return response()->json([
                    'message' => "Record not found",
                    'status'  => 404,
                ], 404);
            }
            return response()->json([
                'content'     => $data,
                'departments' => $departments
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Sorry, something went wrong',
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        $data = Course::find($id);
        $request->validate([
            'course_name'   => 'required',
            'description'   => 'required',
            'department_id' => 'required'
        ]);

        try {
            if (Course::where('course_name', '=', $request->course_name)
            ->where('id', '!=', $id)->where('department_id','=',$request->department_id)
            ->exists()) {

                return response()->json([
                    'message' => $request->course_name . ' already exist!'
                ], 500);
            }

            $data->course_name   = ucfirst($request->course_name);
            $data->description   = ucfirst($request->description);
            $data->department_id = $request->department_id;
            $data->save();

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
            $data = Course::WhereIn('id', explode(',', $id));
            if ($data) {
                $data->delete();
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
                'message' => "Sorry,something went wrong"
            ]);
        }
    }
}
