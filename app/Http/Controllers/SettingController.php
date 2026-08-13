<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $title = 'Settings';
        $setting = Setting::firstOrCreate(
            ['id' => 1],
            [
                'login_title' => 'Point Of Sales',
                'sidebar_title' => 'AdminPanel',
                'fav_icon' => null,
                'logo' => null,
            ]
        );

        return view('setting.index', compact('title', 'setting'));
    }

    public function update(Request $request, string $id)
    {
        $setting = Setting::findOrFail($id);

        $request->validate([
            'login_title' => 'nullable|string|max:255',
            'sidebar_title' => 'nullable|string|max:255',
            'fav_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,ico|max:2048',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $data = [
            'login_title' => $request->login_title,
            'sidebar_title' => $request->sidebar_title,
        ];

        // Handle Favicon upload
        if ($request->hasFile('fav_icon')) {
            if ($setting->fav_icon && Storage::disk('public')->exists($setting->fav_icon)) {
                Storage::disk('public')->delete($setting->fav_icon);
            }
            $data['fav_icon'] = $request->file('fav_icon')->store('settings', 'public');
        }

        // Handle Logo upload
        if ($request->hasFile('logo')) {
            if ($setting->logo && Storage::disk('public')->exists($setting->logo)) {
                Storage::disk('public')->delete($setting->logo);
            }
            $data['logo'] = $request->file('logo')->store('settings', 'public');
        }

        $setting->update($data);

        return redirect()->route('setting.index')->with('success', 'Setting updated successfully!');
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|min:3|confirmed',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = $request->password;
        }

        $user->update($data);

        return redirect()->route('setting.index')->with('success_user', 'Profil user berhasil diperbarui!');
    }
}
