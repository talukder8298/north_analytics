<?php

namespace App\Http\Controllers;

use App\Helpers\helper;
use App\Models\Slider;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SliderController extends Controller
{
    public function index() {
        $sliders = Slider::orderBy('sort')->get();

        return view('backend.pages.slider.index', compact('sliders'));
    }

    public function add() {
        $maxSort = Slider::max('sort') ?? 0;
        return view('backend.pages.slider.create',compact('maxSort'));
    }

    public function addPost(Request $request) {
        $messages = [
            //'image.dimensions' => 'The image dimension should be 1920x800 pixels',
            'radio.required'   => 'The status field is required.'
        ];
        $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png',
            //'image' => 'required|mimes:jpeg,jpg,png|dimensions:width=1920,height=800',
            'title' => 'required|max:255',
            'sub_title' => 'required|max:255',
            'sort' => 'required|integer|min:1',
            'radio' => 'required',
        ],$messages);

        // Upload Image
        $imageSrc = $request->file('image');
        $image = Helper::uploadFile($imageSrc, Helper::imagePath()['pictures']['sliders']['path'], Helper::imagePath()['pictures']['sliders']['path'],  Helper::imagePath()['pictures']['sliders']['size']);

        $slider = new Slider();
        $slider->image = $image;
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->sort = $request->sort;
        $slider->status = $request->radio;

        if ($slider->save()) {
            $message = 'Slider created successfully.';
            $error = 'false';
            return redirect()->route('slider')->with(['message' => $message, 'error' => $error]);
        }else {
            $message = 'Something went wrong!.';
            $error = 'true';
            return redirect()->route('slider')->with(['message' => $message, 'error' => $error]);
        }
    }

    public function edit(Slider $slider) {
        return view('backend.pages.slider.edit', compact('slider'));
    }

    public function editPost(Slider $slider, Request $request) {
        $messages = [
            //'image.dimensions' => 'The image dimension should be 1920x800 pixels',
            'radio.required'   => 'The status field is required.'
        ];
        $request->validate([
            //'image' => 'nullable|mimes:jpeg,jpg,png|dimensions:width=1920,height=800',
            'image' => 'nullable|mimes:jpeg,jpg,png',
            'title' => 'nullable|max:255',
            'sub_title' => 'nullable',
            'sort' => 'required|integer|min:1',
            'radio' => 'required',
        ],$messages);

        if ($request->image) {
            if ($slider->image) {
                $old_path = "public/pictures/sliders/" . $slider->image;
                Helper::removeFile($old_path);
            }

            $imageSrc = $request->file('image');
            $slider->image = Helper::uploadFile($imageSrc, Helper::imagePath()['pictures']['sliders']['path'], Helper::imagePath()['pictures']['sliders']['path'],  Helper::imagePath()['pictures']['sliders']['size']);
        }

        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->sort = $request->sort;
        $slider->status = $request->radio;

        if ($slider->save()) {
            $message = 'Slider updated successfully.';
            $error = 'false';
            return redirect()->route('slider')->with(['message' => $message, 'error' => $error]);
        }else {
            $message = 'Something went wrong!.';
            $error = 'true';
            return redirect()->route('slider')->with(['message' => $message, 'error' => $error]);
        }
    }

    public function delete(Request $request) {
        $slider = Slider::find($request->id);

        if ($slider->image) {
            $old_path = "public/pictures/sliders/" . $slider->image;
            Helper::removeFile($old_path);
        }
        $slider->delete();
    }
}
