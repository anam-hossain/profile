<?php

namespace App\Http\Controllers\Users;

use Image;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['photo' => 'required|image']);

        $user = $request->user();

        $image = Image::make($request->file('photo'));

        Storage::disk('local')->put("images/users/{$user->id}.jpg", (string) $image->fit(300, 300)->encode('jpg'));

        return redirect()->route('users.show', $user)
            ->withSuccess("Avatar uploaded successfully.");
    }
}
