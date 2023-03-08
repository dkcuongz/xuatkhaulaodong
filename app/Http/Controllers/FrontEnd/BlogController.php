<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * @var PostRepository
     */
    protected $repository;

    /**
     * @var PostRepository
     */
    protected $imageRepository;

    /**
     * BannerController constructor.
     * @param PostRepository $repository
     */
    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front-end.news.index');
    }

    public function byCategory($slug)
    {
        return view('front-end.news.by-category');
    }

    public function show($slug, $id)
    {
        $new = $this->repository->with('image')->where('status', 1)
            ->where('type', config('constants.post.type.new'))->orderBy('created_at', 'DESC')->find($id);
        return view('front-end.news.detail', compact('new'));
    }
}
