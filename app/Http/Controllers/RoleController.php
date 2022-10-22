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
        $request->validate([
            'role_name' => 'required'
        ]);

        $roles = [
            'role_name'        => $request->role_name,
            'role_description' => empty($request->role_description) ? ' ' : $request->role_description,
        ];
        $role = $request->role_name;
        try {
            if (Role::where('role_name', '=', $role)->exists()) {

                return response()->json([
                    'message' => $role . ' already exist!'
                ], 500);
            }
            Role:: create($roles);

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

            $data = DB::table('roles')->find($id);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {   
        $roles = Role::find($id);
        $request->validate([
            'role_name' => 'required'
        ]);

            
        $role = $request->role_name;
        try {
            if (Role::where('role_name','=', $role)->where('id','!=',$id)->exists()) {

                return response()->json([
                    'message' => $role . ' already exist!'
                ], 500);
            }
            
            $roles->role_name        = ucfirst($request->role_name);
            $roles->role_description = empty($request->role_description) ? ' ' : $request->role_description;
            $roles->save();
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
            $roles = Role::WhereIn('id', explode(',', $id));
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
