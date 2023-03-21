<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Repositories\IntroduceRepository;
use App\Repositories\PostRepository;
use App\Repositories\SystemRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $postRepository;

    /**
     * categoriesController constructor.
     *
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = $this->postRepository->with('image')->orderBy('created_at', 'DESC')->take(15)->get();
        return view('front-end.home.index', compact('posts', 'systems', 'peoples'));
    }
}
