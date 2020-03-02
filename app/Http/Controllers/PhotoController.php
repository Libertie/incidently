<?php

namespace App\Http\Controllers;

use App\Incident;
use App\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /*
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }
    */

    public function store(Incident $incident)
    {
        request()->validate([
            'file' => 'required|image',
            'caption' => 'required'
        ]);

        $incident->addPhoto(request('file'), request('caption'));

        return redirect($incident->path());
    }

    /*
    public function show(Photo $photo)
    {
        //
    }

    public function edit(Photo $photo)
    {
        //
    }

    public function update(Request $request, Photo $photo)
    {
        //
    }

    public function destroy(Photo $photo)
    {
        //
    }
    */
}
