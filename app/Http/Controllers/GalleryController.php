<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;


class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = array(
            'id' => "posts",
            'menu' => "Gallery",
            'galleries' => Post::where('picture', '!=', '')->whereNotNull('picture')->orderBy('created_at', 'desc')->paginate(30)
        );

        return view('gallery.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'picture' => 'image|nullable|max:1999'
        ]);

        if ($request->hasFile('picture')) {
            $filenameWithExt = $request->file('picture')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('picture')->getClientOriginalExtension();
            $basename = uniqid() . time();
            $smallFileName = "small_{$basename}.{$extension}";
            $mediumFileName = "medium_{$basename}.{$extension}";
            $largeFileName = "large_{$basename}.{$extension}";
            $filenameSimpan = "{$basename}.{$extension}";
            $path = $request->file('picture')->storeAs('posts_image', $filenameSimpan);
        } else {
            $filenameSimpan = 'noimage.png';
        }
        // dd($request->input());
        $post = new Post();
        $post->picture = $filenameSimpan;
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->save();

        return redirect('gallery')->with('success', 'berhasil menambahkan data baru');
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
        $post = Post::findOrFail($id);
        return view('gallery.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'picture' => 'image|nullable|max:1999'
        ]);

        $post = Post::findOrFail($id);

        if ($request->hasFile('picture')) {
            // Process image
            $filenameWithExt = $request->file('picture')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('picture')->getClientOriginalExtension();
            $basename = uniqid() . time();
            $filenameSimpan = "{$basename}.{$extension}";
            $path = $request->file('picture')->storeAs('posts_image', $filenameSimpan);

            // Delete the old image if it exists
            if ($post->picture && $post->picture != 'noimage.png') {
                Storage::delete('posts_image/' . $post->picture);
            }

            $post->picture = $filenameSimpan;
        }

        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->save();

        return redirect('gallery')->with('success', 'Image updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        if ($post->picture && $post->picture != 'noimage.png') {
            Storage::delete('posts_image/' . $post->picture);
        }
        $post->delete();

        return redirect('gallery')->with('success', 'Image deleted successfully');
    }


    /**
     * @OA\Get(
     *     path="/api/galleries",
     *     tags={"Galleries"},
     *     summary="Get list of galleries",
     *     description="Returns a paginated list of galleries",
     *     @OA\Response(
     *         response=200,
     *         description="A list of galleries",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="current_page", type="integer"),
     *             @OA\Property(property="data", type="array",
     *                 @OA\Items(ref="#/components/schemas/Gallery")
     *             ),
     *             @OA\Property(property="last_page", type="integer"),
     *             @OA\Property(property="total", type="integer"),
     *         )
     *     ),
     *     @OA\Response(response=404, description="Not Found"),
     * )
     */


    public function apiIndex()
    {
        $galleries = Post::where('picture', '!=', '')->whereNotNull('picture')->orderBy('created_at', 'desc')->paginate(30);

        return response()->json($galleries);
    }

    /**
     * @OA\Schema(
     *     schema="Gallery",
     *     type="object",
     *     @OA\Property(property="id", type="integer"),
     *     @OA\Property(property="title", type="string"),
     *     @OA\Property(property="description", type="string"),
     *     @OA\Property(property="picture", type="string"),
     *     @OA\Property(property="created_at", type="string", format="date-time"),
     *     @OA\Property(property="updated_at", type="string", format="date-time"),
     * )
     */

}