<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    // 1. GET List all student
    public function index()
    {
        $students = Student::all();
        return response()->json(['message' => 'Success', 'data' => $students], 200);
    }

    // 2. GET Get student by ID
    public function show($id)
    {
        $student = Student::find($id);
        if ($student) {
            return response()->json(['message' => 'Success', 'data' => $student], 200);
        }
        return response()->json(['message' => 'Not found'], 404);
    }

    // 3. POST Create a student
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'nim' => 'required|unique:students',
            'major' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Failed', 'errors' => $validator->errors()], 400);
        }

        $student = Student::create($request->all());
        return response()->json(['message' => 'Success', 'data' => $student], 201);
    }

    // 4. PUT Edit a student
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Not found'], 404);
        }

        $student->update($request->all());
        return response()->json(['message' => 'Success', 'data' => $student], 200);
    }

    // 5. DEL Delete a student
    public function destroy($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Not found'], 404);
        }

        $student->delete();
        return response()->json(['message' => 'Success'], 200);
    }
    
}
