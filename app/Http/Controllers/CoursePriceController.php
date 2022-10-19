<?php

namespace App\Http\Controllers;

use App\Models\CoursePrice;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class CoursePriceController extends Controller
{

    public function index()
    {
        try {

            $course_prices = CoursePrice::all();
            if (count($course_prices)>0) {
                return response()->json($course_prices);
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


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show(CoursePrice $coursePrice)
    {
        //
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CoursePrice  $coursePrice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CoursePrice $coursePrice)
    {
        //
    }


    public function destroy($id)
    {
        try {
            $course_prices = CoursePrice::find($id);
            if ($course_prices) {
                $course_prices->delete();
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
