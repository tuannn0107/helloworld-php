<?php

namespace App\Http\Controllers;

use App\Http\Controllers\converter\req\RequestToPostReqConverter;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class PostController extends Controller
{
    protected $postService;
    protected $requestToPostReqConverter;

    /**
     * PostController constructor.
     * @param PostService $postService
     * @param RequestToPostReqConverter $requestToPostReqConverter
     */
    public function __construct(PostService $postService, RequestToPostReqConverter $requestToPostReqConverter)
    {
        $this->postService = $postService;
        $this->requestToPostReqConverter = $requestToPostReqConverter;
    }


    /**
     * index
     */
    public function index()
    {
        $posts = $this->postService->getAll();
        return view('post.index', compact('posts'));
    }


    /**
     * init create a Post
     */
    public function create()
    {
        return view('post.create');
    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Application|Factory|RedirectResponse|Redirector|View
     */
    public function store(Request $request)
    {
        $request->validate([
            'denotation'=>'required',
            'description'=>'required'
        ]);

        $post = $this->requestToPostReqConverter->convert($request);

        try {
            $this->postService->create($post);
        } catch (\Throwable $e) {
            Log::error('Could not create post. Error occured ' . $e->getMessage());
            return view('post.index', compact('post'))->with('error', 'Post could not save!');
        }

        return redirect('/post')->with('success', 'Post saved!');
    }


    /**
     * @param $id
     * @return Application|Factory|RedirectResponse|Redirector|View
     */
    public function edit(PostRequest $request, Post $post)
    {
        $post = null;
        try {
            $post = new Post(['id'=>$id]);
            $post = $this->postService->read($post);
        } catch (\Throwable $e) {
            Log::error('Could not read post. Error occured ' . $e->getMessage());
            return redirect('/post')->with('error', 'Post does not exist!');
        }
        return view('post.edit', compact('post'));
    }


    /**
     * @param Request $request
     * @param $id
     * @return Application|Factory|RedirectResponse|Redirector|View
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'denotation'=>'required',
            'description'=>'required'
        ]);

        $post = $this->requestToPostReqConverter->convert($request);
        $post->id = $id;

        try {
            $this->postService->update($post);
        } catch (\Throwable $e) {
            Log::error('Could not update post. Error occured ' . $e->getMessage());
            return view('post.edit', compact('post'))->with('error', 'Post could not update!');
        }

        return redirect('/post')->with('success', 'Post updated!');
    }


    /**
     * @param $id
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        try {
            $this->postService->delete(new Post(['id'=>$id]));
        } catch (\Throwable $e) {
            Log::error('Could not delete post. Error occured ' . $e->getMessage());
            return redirect('/post')->with('error', 'Post does not exist!');
        }

        return redirect('/post')->with('success', 'Post deleted!');
    }
}
