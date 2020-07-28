<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use App\Traits\UploadTrait;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    use UploadTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::select('id', 'slug', 'title', 'status', 'published_at')->paginate(15);
        return view('post-index', compact('posts'));
    }

    public function add()
    {
        return view('post-add');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:App\Post|max:255',
            'content' => 'required',
            'excerpt' => 'required|max:255',
            'thumbnail' => 'required|file|mimes:jpg,jpeg,png|dimensions:min_width=1200,min_height=600,ratio=2/1|max:2048',
            'status' => 'required|boolean',
        ]);

        $validatedData['title'] = ucwords($validatedData['title']);
        $validatedData['slug'] = Str::slug($validatedData['title'], '-');

        $validatedData['author'] = Auth::user()->name;

        $validatedData['thumbnail'] = $this->uploadThumbnail($validatedData['thumbnail'], $validatedData['slug']);

        $dom = new \DomDocument();
        $dom->loadHtml($validatedData['content'], LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        foreach($images as $k => $img){
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $type = Str::after($type, 'data:image/');
            $data = base64_decode($data);
            $directory_path = 'posts/'.$validatedData['slug'];
            $image_name= $directory_path.'/content-image-'.Str::random(4).".$type";
            $path = public_path().'/storage/'.$image_name;

            if (!Storage::disk('public')->exists($directory_path)) {
                Storage::disk('public')->makeDirectory($directory_path);
            }

            file_put_contents($path, $data);

            $img->removeAttribute('src');
            $img->setAttribute('src', asset('storage/'.$image_name));
        }

        $validatedData['content'] = $dom->saveHTML();

        if ($validatedData['status']) {
            $validatedData['published_at'] = now();
        }

        Post::create($validatedData);

        session()->flash('status', 'Your post has been added!');
        return redirect()->route('post.index');
    }

    public function edit($slug)
    {
        $post = Post::slug($slug);
        return view('post-edit', compact('post'));
    }

    public function switchStatus($slug)
    {
        $post = Post::slug($slug);
        $data = [
            'status' => $post->status ? 0 : 1,
            'published_at' => !$post->published_at && $post->status == 0 ? now() : $post->published_at
        ];
        $post->update($data);

        session()->flash('status', 'Your post status has been updated!');
        return redirect()->route('post.index');
    }

    public function update(Request $request, $slug)
    {
        $post = Post::slug($slug);
        $validatedData = $request->validate([
            'title' => 'required|unique:App\Post,title,'.$post->id.'|max:255',
            'content' => 'nullable',
            'excerpt' => 'required|max:255',
            'thumbnail' => 'nullable|file|mimes:jpg,jpeg,png|dimensions:min_width=1200,min_height=600,ratio=2/1|max:2048',
            'status' => 'required|boolean',
        ]);

        $validatedData['title'] = ucwords($validatedData['title']);
        $validatedData['slug'] = Str::slug($validatedData['title'], '-');

        $validatedData['author'] = Auth::user()->name;

        if (isset($validatedData['thumbnail'])) {
            $validatedData['thumbnail'] = $this->uploadThumbnail($validatedData['thumbnail'], $validatedData['slug'], $post->thumbnail);
        }

        if (isset($validatedData['content'])) {
            $content_images = Storage::disk('public')->files("posts/$post->slug");
            foreach ($content_images as $key => $value) {
                if (Str::contains($value, 'content-image-')) {
                    Storage::disk('public')->delete($value);
                }
            }

            $dom = new \DomDocument();
            $dom->loadHtml($validatedData['content'], LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getElementsByTagName('img');

            foreach($images as $k => $img){
                $data = $img->getAttribute('src');
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $type = Str::after($type, 'data:image/');
                $data = base64_decode($data);
                $directory_path = 'posts/'.$validatedData['slug'];
                $image_name= $directory_path.'/content-image-'.Str::random(4).".$type";
                $path = public_path().'/storage/'.$image_name;

                file_put_contents($path, $data);

                $img->removeAttribute('src');
                $img->setAttribute('src', asset('storage/'.$image_name));
            }

            $validatedData['content'] = $dom->saveHTML();
        }

        if ($validatedData['status'] && !$post->published_at) {
            $validatedData['published_at'] = now();
        }

        $post->update($validatedData);

        session()->flash('status', 'Your post has been updated!');
        return redirect()->route('post.index');
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);

        Storage::disk('public')->deleteDirectory("posts/$post->slug");
        $post->delete();

        session()->flash('status', 'Your post has been deleted!');
        return redirect()->route('post.index');
    }
}
