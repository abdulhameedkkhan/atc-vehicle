<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('order')->get();
        return view('sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,ico,tiff,tif|max:5120',
            'button_text_1' => 'nullable|string|max:255',
            'button_link_1' => 'nullable|string|max:255',
            'button_text_2' => 'nullable|string|max:255',
            'button_link_2' => 'nullable|string|max:255',
            'order' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('sliders', 'public');
        }

        Slider::create($data);

        return redirect()->route('admin.sliders.index')->with('success', 'Slider created successfully!');
    }

    public function edit(Slider $slider)
    {
        return view('sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,ico,tiff,tif|max:5120',
            'button_text_1' => 'nullable|string|max:255',
            'button_link_1' => 'nullable|string|max:255',
            'button_text_2' => 'nullable|string|max:255',
            'button_link_2' => 'nullable|string|max:255',
            'order' => 'required|integer',
            'is_active' => 'boolean',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Delete old image
            if ($slider->image) {
                Storage::disk('public')->delete($slider->image);
            }
            $data['image'] = $request->file('image')->store('sliders', 'public');
        }

        $slider->update($data);

        return redirect()->route('admin.sliders.index')->with('success', 'Slider updated successfully!');
    }

    public function destroy(Slider $slider)
    {
        if ($slider->image) {
            Storage::disk('public')->delete($slider->image);
        }

        $slider->delete();

        return redirect()->route('admin.sliders.index')->with('success', 'Slider deleted successfully!');
    }
}
