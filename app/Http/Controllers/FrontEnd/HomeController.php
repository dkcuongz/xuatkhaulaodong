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

    protected $systemRepository;

    protected $peopleRepository;

    /**
     * categoriesController constructor.
     *
     * @param PostRepository $postRepository
     * @param SystemRepository $systemRepository
     */
    public function __construct(PostRepository $postRepository, SystemRepository $systemRepository, IntroduceRepository $peopleRepository)
    {
        $this->postRepository = $postRepository;
        $this->systemRepository = $systemRepository;
        $this->peopleRepository = $peopleRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = $this->postRepository->with('images')->orderBy('created_at', 'DESC')->take(15)->get();
        $systems = $this->systemRepository->with('images')->orderBy('created_at', 'DESC')->take(15)->get();
        $peoples = $this->peopleRepository->with('image')->orderBy('created_at', 'DESC')->take(15)->get();
        return view('front-end.home.index', compact('posts', 'systems', 'peoples'));
    }
}
