<?php

namespace App\Http\Controllers;

use App\Helpers\helper;
use App\Models\About;
use App\Models\AboutContent;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Content;

class AboutUsController extends Controller
{
    public function viewInformation()
    {
        $about = About::with('contents')->latest()->first();
        $contents = AboutContent::get();

        return view('backend.pages.about_us',compact('about', 'contents'));
    }

    public function update(About $about,Request $request)
    {
        //dd($request->all());
        $messages = [
            //'image.dimensions' => 'The image dimension should be 1920x800 pixels',
        ];
        $request->validate([
            'name'=>'required|max:255',
            'image'=>'nullable|mimes:jpg,jpeg,png,webp',
            'cover_img'=>'nullable|mimes:jpg,jpeg,png,webp',
            //'image'=>' required|mimes:jpg,jpeg,png,webp|dimensions:width=1920,height=800',
            'short_description2'=>'nullable|max:600',
            'short_description1'=>'nullable|max:600',
            'description'=>'nullable|max:50000',
        ], $messages);

        if ($request->image) {
            if ($about->image) {
                $old_path = "public/pictures/about/" . $about->image;
                Helper::removeFile($old_path);
            }

            // Upload Image
            $imageSrc = $request->file('image');
            $about->image = Helper::uploadFile($imageSrc, Helper::imagePath()['pictures']['about']['path'], Helper::imagePath()['pictures']['about']['path'],  Helper::imagePath()['pictures']['about']['size']);
        }

        if ($request->cover_img) {
            if ($about->cover_img) {
                $old_path = "public/pictures/about/about_cover/" . $about->cover_img;
                Helper::removeFile($old_path);
            }

            // Upload Image
            $imageSrc = $request->file('cover_img');
            $about->cover_img = Helper::uploadFile($imageSrc, Helper::imagePath()['pictures']['about_cover']['path'], Helper::imagePath()['pictures']['about_cover']['path'],  Helper::imagePath()['pictures']['about_cover']['size']);
        }

        if ($request->description != $about->description){
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
                    $image_name= "/public/pictures/about/description_image/" . time().$item.'.png';
                    $path = public_path() . $image_name;
                    file_put_contents($path, $imageData);

                    $image->removeAttribute('src');
                    $image->setAttribute('src', asset($image_name));
                }
            }

            $about->description = $content = $dom->saveHTML();
        }

        $about->name = $request->name;
        $about->short_description1 = $request->short_description1;
        $about->short_description2 = $request->short_description2;

        if ($request->class_name != null) {
            foreach ($request->class_name as $key => $className) {
                $title = $request->title[$key] ?? null;
                $information = $request->information[$key] ?? null;
                if (!empty($className)) {
                    if (isset($request->id[$key]) && $request->id[$key] !== null) {
                        $content = AboutContent::find($request->id[$key]);
                        if ($content) {
                            $content->name = $className;
                            $content->title = $title;
                            $content->description = $information;
                            $content->save();
                        }
                    } else {
                        AboutContent::create([
                            'about_id' => $about->id,
                            'name' => $className,
                            'title' => $title,
                            'description' => $information,
                        ]);
                    }
                }
            }
        }

        if ($about->save()) {
            $message = 'About updated successfully.';
            $error = 'false';
            return redirect()->route('about.information')->with(['message' => $message, 'error' => $error]);
        }else {
            $message = 'Something went wrong!.';
            $error = 'true';
            return redirect()->route('about.information')->with(['message' => $message, 'error' => $error]);
        }
    }

    public function destroy($id)
    {
        $content = AboutContent::find($id);

        if ($content) {
            $content->delete();
            return response()->json(['success' => true, 'message' => 'Content deleted successfully.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Content not found.']);
        }
    }
}
