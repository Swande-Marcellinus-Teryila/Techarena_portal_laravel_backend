<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseDuration;
use App\Models\Department;
use App\Models\EduQualification;
use App\Models\marital_status;
use App\Models\sex;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        try {

            
            $students = Department::leftjoin('students', 'departments.id', '=', 'students.department_id')
                //->join('courses','courses.id','=','students.course_id')
                ->join('course_durations', 'course_durations.id', '=', 'students.course_duration_id')
                ->join('sexes', 'sexes.id', '=', 'students.sex_id')
                ->join('marital_statuses', 'marital_statuses.id', '=', 'students.marital_status_id')
                ->join('states', 'states.id', '=', 'students.state_id')
                ->join('lgas', 'lgas.id', '=', 'students.lga_id')
                ->join('edu_qualifications', 'edu_qualifications.id', '=', 'students.edu_qualification_id')
                ->join('employment_statuses', 'employment_statuses.id', '=', 'students.employment_status_id')
                ->select('*', 'students.id as student_id')
                ->get();

         $coursesWithDepartmentsWithPrices = Department::Join('courses', 'departments.id', '=', 'courses.department_id')
         ->join('course_prices','courses.id','=','course_prices.course_id')->get();
            $course_durations = CourseDuration::all();
            $edu_qualification = EduQualification::all();
            $sex = sex::all();
            $marital_status = marital_status::all();
            if (count($students) > 0) {
                return response()->json([
                    'students'                         => $students,
                    'course_durations'                 => $course_durations,
                    'coursesWithDepartmentsWithPrices' =>$coursesWithDepartmentsWithPrices,
                    'eduQualification' =>$edu_qualification,
                    'sex' =>$sex,
                    'maritalStatus' =>$marital_status,
                ]);
            } else {
                return response()->json([
                    'message'  => "No record found",
                    'students' => [],
                    'eduQualification'=>[],
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Sorry, something went wrong' . $th,
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
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    public function destroy($id)
    {
        try {
            $students = Student::find($id);
            if ($students) {
                $students->delete();
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
                'message' => "Sorry,something went wrong"
            ]);
        }
    }

    public function statusSetter($id, $status, $targetc)
    {
        try {
            $student           = Student::find($id);
            $student->$targetc = $status;
            $student->save();
            return response()->json([
                'message' => "success"
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "Sorry,something went wrong"
            ]);
        }
    }
}
