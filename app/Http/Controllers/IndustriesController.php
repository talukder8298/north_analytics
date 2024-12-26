<?php

namespace App\Http\Controllers;

use App\Helpers\helper;
use App\Models\Category;
use App\Models\Industries;
use App\Models\Service;
use Illuminate\Http\Request;

class IndustriesController extends Controller
{
    public function index()
    {
        $industries = Industries::orderBy('sort')->get();
        return view('backend.pages.industries.index',compact('industries'));
    }

    public function create()
    {
        $maxSort = Industries::max('sort') ?? 0;
        return view('backend.pages.industries.create',compact('maxSort'));
    }

    public function store(Request $request)
    {
        $messages = [
            //'image.dimensions' => 'The image dimension should be 1920x800 pixels',
            'radio.required' => 'The status field is required.'
        ];
        $request->validate([
            'type'=>'required',
            'name'=>'required|max:255',
            'sort'=>'required|integer',
            'link'=>' nullable|max:255',
            'image'=>' required|mimes:jpg,jpeg,png,webp',
            //'image'=>' required|mimes:jpg,jpeg,png,webp|dimensions:width=1920,height=800',
            'short_description'=>' nullable|max:2000',
            'description'=>' nullable|max:50000',
            'radio'=>' required',
        ], $messages);

        $imageSrc = $request->file('image');
        if ($imageSrc) {
            $image = Helper::uploadFile($imageSrc, Helper::imagePath()['pictures']['industries']['path'], Helper::imagePath()['pictures']['industries']['path'],  Helper::imagePath()['pictures']['industries']['size']);
        } else {
            $image = '';
        }
        //text Editor to save image
        if($request->description) {
            $dom = new \DomDocument();
            @$dom->loadHtml($request->description,true);
            $imageFile = $dom->getElementsByTagName('img');

            foreach($imageFile as $item => $image){
                $data = $image->getAttribute('src');
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $imgeData = base64_decode($data);
                $image_name= "/public/pictures/industries/description_image/" . time().$item.'.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $imgeData);

                $image->removeAttribute('src');
                $image->setAttribute('src', asset($image_name));
            }
            $description = $dom->saveHTML();
        } else{
            $description = '';
        }

        $industries = new Industries();
        $industries->name = $request->name;
        $industries->type = $request->type;
        $industries->link = $request->link;
        $industries->sort = $request->sort;
        $industries->image = $image;
        $industries->short_description = $request->short_description;
        $industries->description = $description;
        $industries->status = $request->radio;
        $industries->save();

        $serviceCheck = Industries::where('id', '!=', $industries->id)
            ->where('name', $request->name)
            ->first();

        if ($serviceCheck){
            $industries->slug = preg_replace('/\s+/', '-', strtolower($request->name)) .'-'. $industries->id;
        }else{
            $industries->slug = preg_replace('/\s+/', '-', strtolower($request->name));
        }

        if ($industries->save()) {
            $message = 'Industries created successfully.';
            $error = 'false';
            return redirect()->route('industries')->with(['message' => $message, 'error' => $error]);
        }else {
            $message = 'Something went wrong!.';
            $error = 'true';
            return redirect()->route('industries')->with(['message' => $message, 'error' => $error]);
        }
    }

    public function edit(Industries $industries)
    {
        return view('backend.pages.industries.edit',compact('industries'));
    }

    public function update(Industries $industries, Request $request)
    {
        $messages = [
            //'image.dimensions' => 'The image dimension should be 1920x800 pixels',
            'radio.required' => 'The status field is required.'
        ];
        $request->validate([
            'type'=>'required',
            'name'=>'required|max:255',
            'sort'=>'required|integer',
            'link'=>'nullable|max:255',
            'image'=>'nullable|mimes:jpg,jpeg,png,webp',
            //'image'=>' required|mimes:jpg,jpeg,png,webp|dimensions:width=1920,height=800',
            'short_description'=>'nullable|max:600',
            'description'=>'nullable|max:50000',
            'radio'=>'required',
        ], $messages);

        if ($request->image) {
            if ($industries->image) {
                $old_path = "public/pictures/industries/" . $industries->image;
                Helper::removeFile($old_path);
            }

            // Upload Image
            $imageSrc = $request->file('image');
            $industries->image = Helper::uploadFile($imageSrc, Helper::imagePath()['pictures']['industries']['path'], Helper::imagePath()['pictures']['industries']['path'],  Helper::imagePath()['pictures']['industries']['size']);
        }

        if ($request->description != $industries->description){
            //text Editor to save image
            $dom = new \DomDocument();
            @$dom->loadHtml($request->description,true);
            $imageFile = $dom->getElementsByTagName('img');

            foreach($imageFile as $item => $image){
                $data = $image->getAttribute('src');

                if(!getimagesize($data)){
                    list($type, $data) = explode(';', $data);
                    list(, $data)      = explode(',', $data);
                    $imageData = base64_decode($data);
                    $image_name= "/public/pictures/industries/description_image/" . time().$item.'.png';
                    $path = public_path() . $image_name;
                    file_put_contents($path, $imageData);

                    $image->removeAttribute('src');
                    $image->setAttribute('src', asset($image_name));
                }
            }

            $industries->description = $content = $dom->saveHTML();
        }

        $industries->type = $request->type;
        $industries->link = $request->link;
        $industries->name = $request->name;
        $industries->sort = $request->sort;
        $industries->short_description = $request->short_description;
        $industries->status = $request->radio;
        $industries->save();

        $serviceCheck = Industries::where('id', '!=', $industries->id)
            ->where('name', $request->name)
            ->first();

        if ($serviceCheck){
            $industries->slug = preg_replace('/\s+/', '-', strtolower($request->name)).'-'.$industries->id;
        }else{
            $industries->slug = preg_replace('/\s+/', '-', strtolower($request->name));
        }

        if ($industries->save()) {
            $message = 'Industries updated successfully.';
            $error = 'false';
            return redirect()->route('industries')->with(['message' => $message, 'error' => $error]);
        }else {
            $message = 'Something went wrong!.';
            $error = 'true';
            return redirect()->route('industries')->with(['message' => $message, 'error' => $error]);
        }
    }
}
