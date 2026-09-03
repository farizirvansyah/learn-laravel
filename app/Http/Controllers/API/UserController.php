<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $users = User::get();
            return response()->json([
                'status' => true,
                'message' => 'Fetch data success',
                'data' => $users,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Internal Server Error',
                'error' => $th->getMessage()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validation = Validator::make($request->all(), [
                'name' => 'required|string',
                'role_id' => 'required|int',
                'email' => 'required|email|unique:users,email,',
                'password' => 'required|min:3',
            ]);
            if ($validation->fails()) {
                return response()->json([
                    'message' => 'Validation Fail',
                    'errors' => $validation->errors()
                ], 422);
            }

            $user = User::create([
                'name' => $request->name,
                'role_id' => $request->role_id,
                'email' => $request->email,
                'password' => $request->password,
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Create user success',
                'data' => $user,
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Internal Server Error',
                'error' => $th->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $user = User::findOrFail($id);
            return response()->json([
                'status' => true,
                'message' => 'Show user success',
                'data' => $user,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Internal server error',
                'errors' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $user = User::findOrFail($id);
            return response()->json([
                'status' => true,
                'message' => 'Fetch edit user success',
                'data' => $user,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Internal server error',
                'errors' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validation = Validator::make($request->all(), [
                'name' => 'required|string',
                'role_id' => 'required|int',
                'email' => 'required|email|unique:users,email,' . $id,
                'password' => 'nullable|min:3',
            ]);
            if ($validation->fails()) {
                return response()->json([
                    'message' => 'Validation Fail',
                    'errors' => $validation->errors()
                ], 422);
            }

            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;

            if ($request->filled('password')) {
                $user->password = $request->password;
            }
            $user->save();
            return response()->json([
                'status' => true,
                'message' => 'Update user success',
                'data' => $user,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Internal server error',
                'errors' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return response()->json([
                'status' => true,
                'message' => 'Delete user success',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Internal server error',
                'errors' => $th->getMessage()
            ], 500);
        }
    }
}
