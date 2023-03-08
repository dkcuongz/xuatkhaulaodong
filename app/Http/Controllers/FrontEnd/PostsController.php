<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Repositories\CategoriesRepository;
use App\Repositories\ImageRepository;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * @var PostRepository
     */
    protected $repository;

    /**
     * @var ImageRepository
     */
    protected $imageRepository;

    /**
     * The user repository implementation.
     *
     * @var CategoriesRepository
     */
    protected $categoryRepository;

    /**
     * postsController constructor.
     *
     * @param PostRepository $repository
     */
    public function __construct(PostRepository $repository, ImageRepository $imageRepository, CategoriesRepository $categoryRepository)
    {
        $this->repository = $repository;
        $this->imageRepository = $imageRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->repository->with('images')->whereHas('category', function ($query) {
            $query->whereHas('parent', function ($subQuery) {
                $subQuery->where(['id' => 2]);
            });
        })->get();
        return view('front-end.posts.index', compact('posts'));
    }


    public function byCategory($slug)
    {
        $posts = $this->repository->with('images')->where('status', 1)
            ->whereHas('category', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })->orderBy('created_at', 'DESC')->paginate(8);
        return view('front-end.posts.index', compact('posts'));
    }

    public function show($slug, $id)
    {
        $post = $this->repository->with('images')->where('status', 1)->orderBy('created_at', 'DESC')->find($id);
        return view('front-end.posts.detail', compact('post'));
    }
}
