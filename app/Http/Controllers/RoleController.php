<?php

namespace App\Http\Controllers;

use App\Models\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index()
    {
        try {

            $roles = Role::all();
            if (count($roles) > 0) {
                return response()->json($roles);
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
        
    }

   
    public function store(Request $request)
    {
        $data = $request->validate([
            'role_name' => 'required',
            'role_description' => 'required'
        ]);
        $roles = [
            'role_name' => $request->role_name,
            'role_description' => $request->role_description,
        ];
        $role = $request->role_name;
        try {
            $count_record =Role::where('role_name','=',$role)->first();
            if ($count_record == 0) {
                DB::table('roles')->insert($roles);
                return response()->json([
                    'message' => 'Record added successfully'
                ]);
            } else {
                return response()->json([
                    'message' => $role.' already exist!'
                ], 500);
            }

        } catch (\Exception $e) {
            return response()->json([
                'message' => $role . ' al'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $roles = Role::WhereIn('id',explode(',',$id));
            if ($roles) {
                $roles->delete();
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
