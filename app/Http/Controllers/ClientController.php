<?php

namespace App\Http\Controllers;

use App\Helpers\helper;
use App\Models\Client;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::where('status', 1)->get();
        return view('backend.pages.client.index',compact('clients'));
    }

    public function create()
    {
        $maxSort = Client::max('sort') ?? 0;
        return view('backend.pages.client.create', compact('maxSort'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $messages = [
            //'image.dimensions' => 'The image dimension should be 1920x800 pixels',
            'radio.required' => 'The status field is required.'
        ];
        $request->validate([
            'name'=>'required|max:255',
            'sort'=>'required|integer',
            'link'=>' nullable|max:255',
            'image'=>' required|mimes:jpg,jpeg,png,webp',
            'logo' => 'nullable|mimes:jpeg,jpg,png,webp',
            'short_description'=>' nullable|max:3000',
            'radio'=>' required',
        ], $messages);

        $imageSrc = $request->file('image');
        if ($imageSrc) {
            $image = Helper::uploadFile($imageSrc, Helper::imagePath()['pictures']['client']['path'], Helper::imagePath()['pictures']['client']['path'],  Helper::imagePath()['pictures']['client']['size']);
        } else {
            $image = '';
        }

        $image_src = $request->file('logo');
        if ($imageSrc) {
            $logo = Helper::uploadFile($image_src, Helper::imagePath()['pictures']['client_logo']['path'], Helper::imagePath()['pictures']['client_logo']['path'],  Helper::imagePath()['pictures']['client_logo']['size']);
        } else {
            $logo = '';
        }

        $client = new Client();
        $client->name = $request->name;
        $client->link = $request->link;
        $client->sort = $request->sort;
        $client->image = $image;
        $client->logo = $logo;
        $client->short_description = $request->short_description;
        $client->status = $request->radio;

        if ($client->save()) {
            $message = 'Client created successfully.';
            $error = 'false';
            return redirect()->route('client')->with(['message' => $message, 'error' => $error]);
        }else {
            $message = 'Something went wrong!.';
            $error = 'true';
            return redirect()->route('client')->with(['message' => $message, 'error' => $error]);
        }
    }

    public function edit(Client $client)
    {
        return view('backend.pages.client.edit',compact('client'));
    }

    public function update(Client $client,Request $request)
    {
        $messages = [
            //'image.dimensions' => 'The image dimension should be 1920x800 pixels',
            'radio.required' => 'The status field is required.'
        ];
        $request->validate([
            'name'=>'required|max:255',
            'sort'=>'required|integer',
            'link'=>' nullable|max:255',
            'image'=>' nullable|mimes:jpg,jpeg,png,webp',
            'short_description'=>' nullable|max:3000',
            'radio'=>' required',
        ], $messages);

        if ($request->image) {
            if ($client->image) {
                $old_path = "public/pictures/client/" . $client->image;
                Helper::removeFile($old_path);
            }

            // Upload Image
            $imageSrc = $request->file('image');
            $client->image = Helper::uploadFile($imageSrc, Helper::imagePath()['pictures']['client']['path'], Helper::imagePath()['pictures']['client']['path'],  Helper::imagePath()['pictures']['client']['size']);
        }

        if ($request->logo) {
            if ($client->logo) {
                $old_path = "public/pictures/client/client_logo/" . $client->logo;
                Helper::removeFile($old_path);
            }

            // Upload Image
            $image_src = $request->file('logo');
            $client->logo = Helper::uploadFile($image_src, Helper::imagePath()['pictures']['client_logo']['path'], Helper::imagePath()['pictures']['client_logo']['path'],  Helper::imagePath()['pictures']['client_logo']['size']);
        }

        $client->name = $request->name;
        $client->link = $request->link;
        $client->sort = $request->sort;
        $client->short_description = $request->short_description;
        $client->status = $request->radio;

        if ($client->save()) {
            $message = 'Client updated successfully.';
            $error = 'false';
            return redirect()->route('client')->with(['message' => $message, 'error' => $error]);
        }else {
            $message = 'Something went wrong!.';
            $error = 'true';
            return redirect()->route('client')->with(['message' => $message, 'error' => $error]);
        }
    }
}
