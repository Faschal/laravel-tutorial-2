<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Image;

class StudentController extends Controller
{
    public function showAddStudent()
    {
        return view('add-student');
    }

    public function addStudent(Request $request)
    {
        $name = $request->name;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(300, 300);    
        $image_resize->save(public_path('images/'.$imageName));
        
        $student = new Student();
        $student->name = $name;
        $student->profile_image = $imageName; 
        $student->save();

        return back()->with('student_added', 'Student record has been inserted');
    }

    public function showStudents()
    {
        $students = Student::all();
        return view('all-students', compact('students'));
    }
    
    public function showEditStudent($id)
    {
        $student = Student::find($id);

        return view('edit-student', compact('student'));
    }

    public function editStudent(Request $request)
    {
        $student = Student::find($request->id);
        unlink(public_path('images').'/'.$student->profile_image);

        $name = $request->name;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(300, 300);    
        $image_resize->save(public_path('images/'.$imageName));

        $student = Student::find($request->id);
        $student->name = $name;
        $student->profile_image = $imageName;
        $student->save();

        return back()->with('student_updated', 'Student has been updated');
    }

    public function deleteStudent($id)
    {
        $student = Student::find($id);
        unlink(public_path('images').'/'.$student->profile_image);
        $student->delete();
        
        return back()->with('student_deleted', 'Student has been deleted');
    }
}
