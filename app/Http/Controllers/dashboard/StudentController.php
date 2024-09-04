<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Room;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.student.index', [
            'students' => Student::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.student.create', [
            'rooms' => Room::with('students')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_no' => ['required'],
            'date' => ['required'],
            'name' => ['required'],
            'rent' => ['required'],
            'cnic' => ['required', 'unique:students,cnic'],
            'guadian_name' => ['required'],
            'guadian_cnic' => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
            'address' => ['nullable'],
            'picture' => ['image', 'mimes:png,jpg,jpeg,webp', 'nullable'],
        ]);

        if($request->picture) {
            $name = microtime(true) . $request->picture->hashName();
            $request->picture->move(public_path('/template/std_img'), $name);
        } else {
            $name = null;
        }
        
        $data = [
            'room_no' => $request->room_no,
            'date' => $request->date,
            'name' => $request->name,
            'rent' => $request->rent,
            'cnic' => $request->cnic,
            'guadian_name' => $request->guadian_name,
            'guadian_cnic' => $request->guadian_cnic,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'picture' => $name,
        ];

        if(Student::create($data)) {
            return redirect()->back()->with(['success' => "Successfully, stored information"]);
        } else {
            return redirect()->back()->with(['failure' => "Oops, Operation failed"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('admin.student.show', [
            'student' => $student,
            
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('admin.student.edit', [
            'student' => $student,
            'rooms' => Room::with('students')->get(),
            // 'rooms' => Room::where('id', '=', Auth::id())->get(),

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'room_no' => ['required'],
            'rent' => ['required'],
            'date' => ['required'],
            'name' => ['required'],
            'cnic' => ['required'],
            'guadian_name' => ['required'],
            'guadian_cnic' => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
            'address' => ['required'],
        ]);

        $data = [
            'room_no' => $request->room_no,
            'rent' => $request->rent,
            'date' => $request->date,
            'name' => $request->name,
            'cnic' => $request->cnic,
            'guadian_name' => $request->guadian_name,
            'guadian_cnic' => $request->guadian_cnic,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ];

        // dd($student->update($data));

        if($student->update($data)) {
            return redirect()->back()->with(['success' => 'Successfully updated!']);
        } else {
            return redirect()->back()->with(['failure' => 'Oops operation failed!']);
        }

    }

    public function picture(Request $request, Student $student)
    {
        $request->validate([
            'picture' => ['required', 'image', 'mimes:png,jpg,jpeg,webp'],
        ]);

        $old_picture_path = 'template/std_img/' . $student->picture;
        $name = microtime(true) . $request->picture->hashName();

        $request->picture->move(public_path('template/std_img/'), $name);

        if ($student->picture && File::exists(public_path($old_picture_path))) {
            unlink(public_path($old_picture_path));
        }

        $data = [
            'picture' => $name,
        ];

        if ($student->update($data)) {
            return back()->with(['success' => 'Magic has been spelled!']);
        } else {
            return back()->with(['failure' => 'Magic has failed to spell!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        if ($student->delete()) {
            return redirect()->route('admin.student')->with(['success' => 'Delete Successfully!']);
        } else {
            return redirect()->route('admin.student')->with(['failure' => 'Oops, Operation Failed!']);
        }
    }
}
