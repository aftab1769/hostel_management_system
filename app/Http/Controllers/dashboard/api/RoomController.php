<?php

namespace App\Http\Controllers\dashboard\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Room;
use Validator;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'rooms' => Room::all()
        ]);
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
    
        $validator = Validator::make($request->all(), [
            'room_no' => ['required', 'unique:rooms,room_no'],
            'room_seater' => ['required'],
            'room_status' => ['required'],
            'rent' => ['required'],
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ]);
        }
    
        $data = [
            'room_no' => $request->room_no,
            'room_seater' => $request->room_seater,
            'room_status' => $request->room_status,
            'rent' => $request->rent,
        ];
    
        if (Room::create($data)) {
            return response()->json([
                'success' => 'Successfully stored info!'
            ]); 
        } else {
            return response()->json([
                'failure' => 'Oops, operation failed!'
            ]);
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json([
            'room' => Room::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'room_no' => ['required'],
            'room_seater' => ['required'],
            'room_status' => ['required'],
            'rent' => ['required'],
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ]);
        }
    
        $data = [
            'room_no' => $request->room_no,
            'room_seater' => $request->room_seater,
            'room_status' => $request->room_status,
            'rent' => $request->rent,
        ];

        $room = Room::find($request->id);
        
        if ($room->update($data)) {
            return response()->json([
                'success' => 'Successfully Updated info!'
            ]); 
        } else {
            return response()->json([
                'failure' => 'Oops, operation failed!'
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if(Room::find($id)->delete()) {
            return response()->json([
                'success' => "Successfully Deleted Info!"
            ]);
        } else {
            return response()->json([
                'failure' => "Oops, Operation Failed!!"
            ]);
        }
    }
}
