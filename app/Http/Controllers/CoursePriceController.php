<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CoursePrice;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class CoursePriceController extends Controller
{

    public function index()
    {
        try {
            $coursesWithDepartments= Department::rightJoin('courses','departments.id','=','courses.department_id')
            ->get(); 
            $course_prices =Department::rightJoin('courses','departments.id','=','courses.department_id')
            ->join('course_prices','courses.id','=','course_prices.course_id')
            ->get();
           
            if (count($coursesWithDepartments)>0) {
                return response()->json([
                    'course_prices'=>$course_prices,
                    'coursesWithDepartments' =>$coursesWithDepartments,
                ]);
            } else {
                return response()->json([
                    'message' => "No record found",
                    'coursesWithDepartments' =>[]
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
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'cost'          => 'required',
            'course_id'     => 'required',
            'department_id' => 'required',
        ]);

        $course_prices = [
            
            'cost'          =>  $request->cost,
            'course_id'     => $request->course_id,
            'department_id' => $request->department_id

        ];
        $course = $request->course_id;
        try {
            if (CoursePrice::where('course_id', '=', $course)
            ->where('department_id','=',$request->department_id)->exists()) {

                return response()->json([
                    'message' =>'This info already exist!'
                ], 500);
            }
            CoursePrice:: create($course_prices);

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
            $coursesWithDepartments= Department::rightJoin('courses','departments.id','=','courses.department_id')
            ->get(); 
            $data        = DB::table('course_prices')->find($id);
            if (is_null($data)) {
                return response()->json([
                    'message' => "Record not found",
                    'status'  => 404,
                ], 404);
            }
            return response()->json([
                'content'     => $data,
                'coursesWithDepartments' =>$coursesWithDepartments,
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
     * @param  \App\Models\CoursePrice  $coursePrice
     * @return \Illuminate\Http\Response
     */
    public function edit(CoursePrice $coursePrice)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $data = CoursePrice::find($id);
        $request->validate([
            'cost'          => 'required',
            'course_id'     => 'required',
            'department_id' => 'required'
        ]);

        try {
            if (CoursePrice::where('course_id', '=', $request->course_id)
            ->where('id', '!=', $id)->where('department_id','=',$request->department_id)
            ->exists()) {

                return response()->json([
                    'message' =>'already exist!',
                ], 500);
            }

            $data->cost          =$request->cost;
            $data->course_id      = $request->course_id;
            $data->department_id = $request->department_id;
            $data->save();

            return response()->json([
                'message' => 'Record updated successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Sorry, Something went wrong".$e,
            ], 500);
        }
        
    }


    public function destroy($id)
    {
        try {
            $data = CoursePrice::WhereIn('id', explode(',', $id));
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
