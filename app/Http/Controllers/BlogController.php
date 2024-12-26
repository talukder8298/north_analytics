<?php

namespace App\Http\Controllers;

use App\Helpers\helper;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('sort')->get();
        return view('backend.pages.blog.index',compact('blogs'));
    }

    public function create()
    {
        $maxSort = Blog::max('sort') ?? 0;
        $categories = Category::where('type_id', 1)->where('status', 1)->get();

        return view('backend.pages.blog.create',compact('maxSort','categories'));
    }

    public function store(Request $request)
    {
        $messages = [
            //'image.dimensions' => 'The image dimension should be 1920x800 pixels',
            'radio.required' => 'The status field is required.'
        ];
        $request->validate([
            'category_id'=>'required',
            'create_date'=>'required',
            'name'=>'required|max:255',
            'sort'=>'required|integer',
            //'image'=>' required|mimes:jpg,jpeg,png,webp|dimensions:width=1920,height=800',
            'image'=>' required|mimes:jpg,jpeg,png,webp',
            'description'=>' required|max:600',
            'long_description'=>' required|max:50000',
            'radio'=>' required',
        ], $messages);

        $imageSrc = $request->file('image');
        if ($imageSrc) {
            $image = Helper::uploadFile($imageSrc, Helper::imagePath()['pictures']['blog']['path'], Helper::imagePath()['pictures']['blog']['path'],  Helper::imagePath()['pictures']['blog']['size']);
        } else {
            $image = '';
        }

        //text Editor to save image
        if($request->description) {
            $dom = new \DomDocument();
            @$dom->loadHtml($request->long_description,true);
            $imageFile = $dom->getElementsByTagName('img');

            foreach($imageFile as $item => $image){
                $data = $image->getAttribute('src');
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $imgeData = base64_decode($data);
                $image_name= "/public/pictures/blog/description_image/" . time().$item.'.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $imgeData);

                $image->removeAttribute('src');
                $image->setAttribute('src', asset($image_name));
            }
            $description = $dom->saveHTML();
        } else{
            $description = '';
        }

        $blog = new Blog();
        $blog->category_id = $request->category_id;
        $blog->create_date = $request->create_date;
        $blog->name = $request->name;
        $blog->sort = $request->sort;
        $blog->image = $image;
        $blog->short_description = $request->description;
        $blog->description = $description;
        $blog->status = $request->radio;
        $blog->save();

        $blogCheck = Blog::where('id', '!=', $blog->id)
            ->where('name', $request->name)
            ->first();

        if ($blogCheck){
            $blog->slug = preg_replace('/\s+/', '-', strtolower($request->name)).'-'.$blog->id;
        }else{
            $blog->slug = preg_replace('/\s+/', '-', strtolower($request->name));
        }

        if ($blog->save()) {
            $message = 'Blog created successfully.';
            $error = 'false';
            return redirect()->route('blog')->with(['message' => $message, 'error' => $error]);
        }else {
            $message = 'Something went wrong!.';
            $error = 'true';
            return redirect()->route('blog')->with(['message' => $message, 'error' => $error]);
        }
    }

    public function edit(Blog $blog)
    {
        $categories = Category::where('type_id', 1)->where('status', 1)->get();
        return view('backend.pages.blog.edit',compact('blog','categories'));
    }

    public function update(Blog $blog,Request $request)
    {
        $messages = [
            //'image.dimensions' => 'The image dimension should be 1920x800 pixels',
            'radio.required' => 'The status field is required.'
        ];
        $request->validate([
            'category_id'=>'required',
            'name'=>'required|max:255',
            'create_date'=>'required',
            'sort'=>'required|integer',
            //'image'=>' required|mimes:jpg,jpeg,png,webp|dimensions:width=1920,height=800',
            'image'=>' nullable|mimes:jpg,jpeg,png,webp',
            'description'=>' required|max:600',
            'long_description'=>' required|max:50000',
            'radio'=>' required',
        ], $messages);

        if ($request->image) {
            if ($blog->image) {
                $old_path = "public/pictures/blog/" . $blog->image;
                Helper::removeFile($old_path);
            }

            // Upload Image
            $imageSrc = $request->file('image');
            $blog->image = Helper::uploadFile($imageSrc, Helper::imagePath()['pictures']['blog']['path'], Helper::imagePath()['pictures']['blog']['path'],  Helper::imagePath()['pictures']['blog']['size']);
        }

        if ($request->long_description != $blog->description){
            //text Editor to save image
            $dom = new \DomDocument();
            @$dom->loadHtml($request->long_description,true);
            $imageFile = $dom->getElementsByTagName('img');

            foreach($imageFile as $item => $image){
                $data = $image->getAttribute('src');

                if(!getimagesize($data)){
                    list($type, $data) = explode(';', $data);
                    list(, $data)      = explode(',', $data);
                    $imageData = base64_decode($data);
                    $image_name= "/public/pictures/blog/description_image/" . time().$item.'.png';
                    $path = public_path() . $image_name;
                    file_put_contents($path, $imageData);

                    $image->removeAttribute('src');
                    $image->setAttribute('src', asset($image_name));
                }
            }

            $blog->description = $content = $dom->saveHTML();
        }

        $blog->category_id = $request->category_id;
        $blog->create_date = $request->create_date;
        $blog->name = $request->name;
        $blog->sort = $request->sort;
        $blog->short_description = $request->description;
        $blog->status = $request->radio;
        $blog->save();

        $blogCheck = Blog::where('id','!=',$blog->id)
            ->where('name',$request->name)
            ->first();

        if ($blogCheck){
            $blog->slug = preg_replace('/\s+/', '-', strtolower($request->name)).'-'.$blog->id;
        }else{
            $blog->slug = preg_replace('/\s+/', '-', strtolower($request->name));
        }

        if ($blog->save()) {
            $message = 'Blog updated successfully.';
            $error = 'false';
            return redirect()->route('blog')->with(['message' => $message, 'error' => $error]);
        }else {
            $message = 'Something went wrong!.';
            $error = 'true';
            return redirect()->route('blog')->with(['message' => $message, 'error' => $error]);
        }
    }
}
