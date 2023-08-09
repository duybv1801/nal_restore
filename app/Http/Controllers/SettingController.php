<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SettingService;


class SettingController extends Controller
{
    protected $settingService;

    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }

    public function index()
    {
        $settings = $this->settingService->getAllSettings();
        return view('setting', compact('settings'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'key' => 'required|string',
            'value' => 'required|string',
        ]);

        $setting = $this->settingService->create($data);
        return response()->json($setting, 201);
    }


    public function update($id, Request $request)
    {
        $data = $request->validate([
            'key' => 'required|string',
            'value' => 'required|string',
        ]);

        $this->settingService->update($data, $id);
        return response()->json(['message' => 'Setting updated successfully']);
    }

    public function destroy($id)
    {
        $this->settingService->delete($id);
        return response()->json(['message' => 'Setting deleted successfully']);
    }
}
