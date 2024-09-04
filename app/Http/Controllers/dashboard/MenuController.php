<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.menu.index', [
            'menus' => Menu::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'day' => ['required'],
            'breakfast' => ['required'],
            'lunch' => ['required'],
            'dinner' => ['required'],
        ]);

        $data = [
            'day' => $request->day,
            'breakfast' => $request->breakfast,
            'lunch' => $request->lunch,
            'dinner' => $request->dinner,
        ];

        if (Menu::create($data)) {
            return redirect()->back()->with(['success' => "Successfully added menu!"]);
        } else {
            return redirect()->back()->with(['failure' => "Oops Operation Failed!"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        return view('admin.menu.edit', [
            'menu' => $menu
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'day' => ['required'],
            'breakfast' => ['required'],
            'lunch' => ['required'],
            'dinner' => ['required'],
        ]);

        $data = [
            'day' => $request->day,
            'breakfast' => $request->breakfast,
            'lunch' => $request->lunch,
            'dinner' => $request->dinner,
        ];

        if ($menu->update($data)) {
            return redirect()->back()->with(['success' => "Succesfully Updated!"]);
        } else {
            return redirect()->back()->with(['failure' => "Oops, Operation Failed!"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        if ($menu->delete()) {
            return redirect()->back()->with(['success' => "Successfully Deleted!"]);
        } else {
            return redirect()->back()->with(['failure' => "Oops, Operation Failed"]);
        }
    }
}
