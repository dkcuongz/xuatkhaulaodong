<?php
namespace App\Http\ViewComposers;

use App\Repositories\CategoriesRepository;
use  Illuminate\View\View;

class CategoryComposer
{
    /**
     * The user repository implementation.
     *
     * @var CategoriesRepository
     */
    protected $categoryRepository;

    /**
     * Create a new profile composer.
     *
     * @param CategoriesRepository $categoryRepository
     */
    public function __construct(CategoriesRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param \Illuminate\View\View $view
     * @return void
     */
    public function compose(View $view)
    {
        $categories = $this->categoryRepository->with(['allLevelChildren'])->where('parent_id', '=', 0)->get();
        $view->with('categories', $categories);
    }
}
