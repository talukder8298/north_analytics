<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Client;
use App\Models\ContactUs;
use App\Models\Industries;
use App\Models\Member;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $about = About::with('contents')->latest()->first();
        $blogs = Blog::where('status',1)->orderBy('sort')->take(3)->get();
        $categories = Category::where('status',1)->orderBy('sort')->take(6)->get();
        $services = Service::where('status', 1)->orderBy('sort')->take(3)->get();
        $sliders = Slider::where('status', 1)->get();
        $industries = Industries::where('status', 1)->orderBy('sort')->take(3)->get();
        $members = Member::where('status', 1)->orderBy('sort')->take(3)->get();
        $clients = Client::where('status', 1)->get();

        return view('frontend.layouts.home', compact(
            'sliders','blogs','categories','services','industries',
            'members','clients','about'
        ));
    }

    public function blog()
    {
        $blogs = Blog::where('status',1)->orderBy('sort')->get();
        return view('frontend.pages.blog', compact('blogs'));
    }

    public function blogDetails($slug) {
        $categories = Category::with('blogs')
            ->where('type_id', 1)
            ->where('status', 1)
            ->get();

        $blog = Blog::where('slug', $slug)->first();
        $latests = Blog::where('status', 1)->where('id', '!=', $blog->id)->orderBy('id', 'desc')->take(6)->get();

        if (!$blog) {
            abort(404);
        }

        return view('frontend.pages.blog_details', compact('blog', 'categories','latests'));
    }

    public function categoryWiseBlog($id)
    {
        $blogs = Blog::where('category_id', $id)->get();
        return view('frontend.pages.category_wise_insight', compact('blogs'));
    }

    public function contact()
    {
        return view('frontend.pages.contact_us');
    }

    public function services()
    {
        $services = Service::where('status', 1)->get();
        return view('frontend.pages.service', compact('services'));
    }

    public function servicesDetails($slug)
    {
        $service = Service::with('category')->where('slug', $slug)->first();
        $services = Service::with('category')
            ->where('status', 1)
            ->where('id', '!=', $service->id)
            ->get();

        return view('frontend.pages.service_details', compact('service','services'));
    }

    public function finance()
    {
        $finances = Industries::where('status', 1)->where('type', 1)->get();
        return view('frontend.pages.finance', compact('finances'));
    }

    public function financeDetails($slug, $type)
    {
        $industry = Industries::where('slug', $slug)->first();
        if (!$industry) {
            abort(404);
        }

        $industries = Industries::where('status', 1)->where('type', 2)->where('id', '!=', $industry->id)->get();
        $services = Service::with('category')
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->take(15)->get();

        $blogs = Blog::where('status', 1)->orderBy('id', 'desc')->take(6)->get();

        if ($type == 1){
            return view('frontend.pages.finance_details', compact('industry','services'));
        } else {
            return view('frontend.pages.construction_details', compact('industry','services','industries','blogs'));
        }
    }

    public function construction()
    {
        $constructions = Industries::where('status', 1)->where('type', 2)->get();
        return view('frontend.pages.construction', compact('constructions'));
    }

    public function about()
    {
        $about = About::with('contents')->latest()->first();
        $industries = Industries::where('status', 1)->orderBy('sort')->take(6)->get();
        $categories = Category::where('status',1)->orderBy('sort')->take(6)->get();
        $clients = Client::where('status', 1)->get();

        return view('frontend.pages.about', compact('about','industries','categories','clients'));
    }

    public function contactPost(Request $request)
    {
        $messages = [
            'subject.required' => 'The subject field is required.',
            'email.email' => 'The email must be a valid email address.',
            'phone.regex' => 'The phone number must be an 11-digit number.'
        ];
        $request->validate([
            //'name' => 'required|max:255',
            'email' => 'required|email',
            'subject' => 'required|max:255',
            'phone' => 'nullable|regex:/^\d{11}$/',
            'message' => 'nullable|max:5000',
        ], $messages);

        try {
            $data = [
                'name' => preg_replace('/[^a-zA-Z0-9]/', ' ', $request->name) ?? 'Unknown',
                'email' => $request->email,
                'subject' => $request->subject,
                'phone' => $request->phone,
                'message' => $request->message,
                'date' => $request->date,
            ];
            //Insert contact information
            $create = ContactUs::create($data);

            $message = 'Contact information send successfully.';
            $error = 'false';
            return back()->with(['message' => $message, 'error' => $error]);

        } catch (\Exception $e) {

            $message = $e->getMessage();
            $error = 'true';
            return back()->with(['message' => $message, 'error' => $error]);
        }
    }
}
