<?php

namespace App\Http\Controllers;

use App\Helpers\helper;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort')->get();
        return view('backend.pages.service.index',compact('services'));
    }

    public function create()
    {
        $maxSort = Service::max('sort') ?? 0;
        $categories = Category::where('type_id', 2)->where('status', 1)->get();

        return view('backend.pages.service.create',compact('maxSort','categories'));
    }

    public function store(Request $request)
    {
        $messages = [
            //'image.dimensions' => 'The image dimension should be 1920x800 pixels',
            'radio.required' => 'The status field is required.'
        ];
        $request->validate([
            'name'=>'required|max:255',
            'sort'=>'required|integer',
            'link'=>' nullable|max:255',
            'image'=>' required|mimes:jpg,jpeg,png,webp',
            //'image'=>' required|mimes:jpg,jpeg,png,webp|dimensions:width=1920,height=800',
            'short_description'=>' nullable|max:600',
            'description'=>' nullable|max:50000',
            'radio'=>' required',
        ], $messages);

        $imageSrc = $request->file('image');
        if ($imageSrc) {
            $image = Helper::uploadFile($imageSrc, Helper::imagePath()['pictures']['service']['path'], Helper::imagePath()['pictures']['service']['path'],  Helper::imagePath()['pictures']['service']['size']);
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
                $image_name= "/public/pictures/service/description_image/" . time().$item.'.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $imgeData);

                $image->removeAttribute('src');
                $image->setAttribute('src', asset($image_name));
            }
            $description = $dom->saveHTML();
        } else{
            $description = '';
        }

        $service = new Service();
        $service->name = $request->name;
        $service->category_id = $request->category_id;
        $service->link = $request->link;
        $service->sort = $request->sort;
        $service->image = $image;
        $service->short_description = $request->short_description;
        $service->description = $description;
        $service->status = $request->radio;
        $service->save();

        $serviceCheck = Service::where('id', '!=', $service->id)
            ->where('name', $request->name)
            ->first();

        if ($serviceCheck){
            $service->slug = preg_replace('/\s+/', '-', strtolower($request->name)).'-'.$service->id;
        }else{
            $service->slug = preg_replace('/\s+/', '-', strtolower($request->name));
        }

        if ($service->save()) {
            $message = 'Service created successfully.';
            $error = 'false';
            return redirect()->route('service')->with(['message' => $message, 'error' => $error]);
        }else {
            $message = 'Something went wrong!.';
            $error = 'true';
            return redirect()->route('service')->with(['message' => $message, 'error' => $error]);
        }
    }

    public function edit(Service $service)
    {
        $categories = Category::where('type_id', 2)->where('status', 1)->get();
        return view('backend.pages.service.edit',compact('service','categories'));
    }

    public function update(Service $service, Request $request)
    {
        $messages = [
            //'image.dimensions' => 'The image dimension should be 1920x800 pixels',
            'radio.required' => 'The status field is required.'
        ];
        $request->validate([
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
            if ($service->image) {
                $old_path = "public/pictures/service/" . $service->image;
                Helper::removeFile($old_path);
            }

            // Upload Image
            $imageSrc = $request->file('image');
            $service->image = Helper::uploadFile($imageSrc, Helper::imagePath()['pictures']['service']['path'], Helper::imagePath()['pictures']['service']['path'],  Helper::imagePath()['pictures']['service']['size']);
        }

        if ($request->description != $service->description){
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
                    $image_name= "/public/pictures/service/description_image/" . time().$item.'.png';
                    $path = public_path() . $image_name;
                    file_put_contents($path, $imageData);

                    $image->removeAttribute('src');
                    $image->setAttribute('src', asset($image_name));
                }
            }

            $service->description = $content = $dom->saveHTML();
        }

        $service->category_id = $request->category_id;
        $service->link = $request->link;
        $service->name = $request->name;
        $service->sort = $request->sort;
        $service->short_description = $request->short_description;
        $service->status = $request->radio;
        $service->save();

        $serviceCheck = Service::where('id', '!=', $service->id)
            ->where('name', $request->name)
            ->first();

        if ($serviceCheck){
            $service->slug = preg_replace('/\s+/', '-', strtolower($request->name)).'-'.$service->id;
        }else{
            $service->slug = preg_replace('/\s+/', '-', strtolower($request->name));
        }

        if ($service->save()) {
            $message = 'Service updated successfully.';
            $error = 'false';
            return redirect()->route('service')->with(['message' => $message, 'error' => $error]);
        }else {
            $message = 'Something went wrong!.';
            $error = 'true';
            return redirect()->route('service')->with(['message' => $message, 'error' => $error]);
        }
    }
}
