<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isNull;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::all();
        return view('admin.comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $valData = $request->validate(
            [
                'title' => 'required|bail|min:3|max:80',
                'price' => 'required|min:1|max:10',
                'description' => 'required|min:3|max:1000',
                'series' => 'nullable|min:1|max:20',
                'type' => 'nullable|min:2|max:50',
                'artists' => 'nullable|max:500',
                'writers' => 'nullable|max:500',
                'sale_date' => 'nullable',
                'thumb' => 'nullable|image|max:2000',
            ]
        );

        if ($request->has('thumb')) {
            $file_path = Storage::put('comics_images', $request->thumb);
            $valData['thumb'] = $file_path;
        }

        $newComic = Comic::create($valData);

        return to_route('comics.show', $newComic);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comic $comic)
    {
        return view('admin.comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comic $comic)
    {
        return view('admin.comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comic $comic)
    {
        $valData = $request->validate(
            [
                'title' => 'required|bail|min:3|max:80',
                'price' => 'required|min:1|max:10',
                'description' => 'required|min:3|max:1000',
                'series' => 'nullable|min:1|max:20',
                'type' => 'nullable|min:2|max:50',
                'artists' => 'nullable|max:500',
                'writers' => 'nullable|max:500',
                'sale_date' => 'nullable',
                'thumb' => 'nullable|image|max:2000',
            ]
        );

        if ($request->has('thumb')) {

            $newImage = $request->thumb;

            $imagePath = Storage::put('comics_images', $newImage);

            if (!is_null($comic->thumb) && Storage::fileExists($comic->thumb)) {

                Storage::delete($comic->thumb);
            }

            $valData['thumb'] = $imagePath;
        }

        $comic->update($valData);
        return to_route('comics.show', $comic)->with('message', 'You updated file!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        if (!is_null($comic->thumb)) {
            Storage::delete($comic->thumb);
        }

        $comic->delete();

        return to_route('comics.index')->with('message', 'You removed the record!');
    }
}
