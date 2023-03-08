<?php

namespace App\Http\ViewComposers;

use App\Repositories\PostRepository;
use  Illuminate\View\View;

class NewsComposer
{
    /**
     * The user repository implementation.
     *
     * @var PostRepository
     */
    protected $postRepository;

    /**
     * Create a new profile composer.
     *
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param \Illuminate\View\View $view
     * @return void
     */
    public function compose(View $view)
    {
        $news = $this->postRepository->with('image')->take(8)->get();
        $view->with('news', $news);
    }
}
