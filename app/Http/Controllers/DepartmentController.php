<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{

    public function index()
    {
        try {

            $departments = Department::all();
            if (count($departments) > 0) {
                return response()->json($departments);
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
            'dept_name' => 'required'
        ]);

        $departments = [
            'dept_name'        => $request->dept_name,

        ];
        $dept = $request->dept_name;
        try {
            if (Department::where('dept_name', '=', $dept)->exists()) {

                return response()->json([
                    'message' => $dept . ' already exist!'
                ], 500);
            }
            Department::create($departments);

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

            $data = DB::table('departments')->find($id);
            if (is_null($data)) {
                return response()->json([
                    'message' => "Record not found",
                    'status'  => 404,
                ], 404);
            }
            $response['content'] = $data;
            return response()->json($response);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Sorry, something went wrong',
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $data = Department::find($id);
        $request->validate([
            'dept_name' => 'required'
        ]);

        $department = $request->dept_name;
        try {
            if (Department::where('dept_name', '=', $department)->where('id', '!=', $id)->exists()) {

                return response()->json([
                    'message' => $department . ' already exist!'
                ], 500);
            }

            $data->dept_name        = ucfirst($request->dept_name);
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
            $course_categories = Department::WhereIn('id', explode(',', $id));
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
                'message' => "Sorry,something went wrong"
            ]);
        }
    }
}
