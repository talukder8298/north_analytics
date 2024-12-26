<?php

namespace App\Http\Controllers;

use App\Helpers\helper;
use App\Models\Client;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::where('status', 1)->get();
        return view('backend.pages.member.index',compact('members'));
    }

    public function create()
    {
        $maxSort = Member::max('sort') ?? 0;
        return view('backend.pages.member.create', compact('maxSort'));
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
            'short_description'=>' nullable|max:3000',
            'radio'=>' required',
        ], $messages);

        $imageSrc = $request->file('image');
        if ($imageSrc) {
            $image = Helper::uploadFile($imageSrc, Helper::imagePath()['pictures']['member']['path'], Helper::imagePath()['pictures']['member']['path'],  Helper::imagePath()['pictures']['member']['size']);
        } else {
            $image = '';
        }

        $member = new Member();
        $member->name = $request->name;
        $member->link = $request->link;
        $member->sort = $request->sort;
        $member->image = $image;
        $member->short_description = $request->short_description;
        $member->status = $request->radio;

        if ($member->save()) {
            $message = 'Member created successfully.';
            $error = 'false';
            return redirect()->route('member')->with(['message' => $message, 'error' => $error]);
        }else {
            $message = 'Something went wrong!.';
            $error = 'true';
            return redirect()->route('member')->with(['message' => $message, 'error' => $error]);
        }
    }

    public function edit(Member $member)
    {
        return view('backend.pages.member.edit',compact('member'));
    }

    public function update(Member $member, Request $request)
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
            'short_description'=>'nullable|max:3000',
            'radio'=>' required',
        ], $messages);

        if ($request->image) {
            if ($member->image) {
                $old_path = "public/pictures/member/" . $member->image;
                Helper::removeFile($old_path);
            }

            // Upload Image
            $imageSrc = $request->file('image');
            $member->image = Helper::uploadFile($imageSrc, Helper::imagePath()['pictures']['member']['path'], Helper::imagePath()['pictures']['member']['path'],  Helper::imagePath()['pictures']['member']['size']);
        }

        $member->name = $request->name;
        $member->link = $request->link;
        $member->sort = $request->sort;
        $member->short_description = $request->short_description;
        $member->status = $request->radio;

        if ($member->save()) {
            $message = 'Member updated successfully.';
            $error = 'false';
            return redirect()->route('member')->with(['message' => $message, 'error' => $error]);
        }else {
            $message = 'Something went wrong!.';
            $error = 'true';
            return redirect()->route('member')->with(['message' => $message, 'error' => $error]);
        }
    }
}
