<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Artisan;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key');
        return view('admin.settings.index', compact('settings'));
    }

    public function store(Request $request)
    {
        $data = [
            'site_name',
            'admin_email',
            'currency',
            'timezone',
            'maintenance_mode',
        ];

        foreach ($data as $key) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $request->$key]
            );
        }

        // Maintenance mode ON/OFF
        if ($request->maintenance_mode == 1) {
            Artisan::call('down');
        } else {
            Artisan::call('up');
        }

        // cache clear (agar helper cache use kar rahe ho)
        cache()->flush();

        return back()->with('success', 'Settings updated successfully');
    }
}
