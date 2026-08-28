<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function sidebar()
    {
        $menus = Menu::all();
        $title = '';
        return view('app', compact('title', 'menus'));
    }
    public function index()
    {
        $menus = Menu::get();
        $title = 'Data Menu';
        return view('menu.index', compact('title', 'menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create Data';
        return view('menu.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'sort_order' => $request->sort_order,
            'url' => $request->url,
            'is_active' => $request->is_active
        ];

        Menu::create($data);
        return redirect()->to('menu')->with('success', 'Create menu successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = 'Show Data';
        return view('menu.index', compact('title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Edit Data';
        $menu = Menu::findOrFail($id);
        return view('menu.edit', compact('title', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $data = [
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'sort_order' => $request->sort_order,
            'url' => $request->url,
            'is_active' => $request->is_active
        ];

        if ($request->hasFile('icon')) {
            if ($menu->icon) {
                Storage::disk('public')->delete($menu->icon);
            }
            $data['icon'] = $request->file('icon')->store('menu', 'public');
        }
        $menu->update($data);
        return redirect()->to('menu')->with('success', 'Update menu successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        return redirect()->to('menu')->with('success', 'Delete menu successfully!');
    }
}
