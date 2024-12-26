<?php

namespace App\Http\Controllers;

use App\Models\Univarsity;
use App\Models\UnivarsityGellary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'short_name'    => 'nullable|string|max:255',
            'logo'          => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'cover_photo'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description'   => 'nullable|string',
            'address'       => 'nullable|string|max:255',
            'gallery.*'     => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $logoPath = $request->file('logo') ? $request->file('logo')->store('logos', 'public') : null;
        $coverPhotoPath = $request->file('cover_photo') ? $request->file('cover_photo')->store('cover_photos', 'public') : null;

        // Create the university
        $university = Univarsity::create([
            'name'          => $request->input('name'),
            'short_name'    => $request->input('short_name'),
            'logo'          => $logoPath,
            'cover_photo'   => $coverPhotoPath,
            'description'   => $request->input('description'),
            'address'       => $request->input('address'),
        ]);

        // Handle gallery images
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $galleryPath = $image->store('galleries', 'public');

                // Save gallery image in the database
                UnivarsityGellary::create([
                    'univarsity_id' => $university->id,
                    'image_path' => $galleryPath,
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'University and gallery images created successfully!',
            'data' => $university->load('gallery'),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function uploadGallery(Request $request, $universityId)
    {
        $request->validate([
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate images
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('galleries', 'public'); // Save to 'storage/app/public/galleries'

                UnivarsityGellary::create([
                    'university_id' => $universityId,
                    'image_path' => $path,
                ]);
            }
        }

        return back()->with('success', 'Images uploaded successfully!');
    }
}
