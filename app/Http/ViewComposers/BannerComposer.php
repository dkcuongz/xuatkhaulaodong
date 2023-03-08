<?php

namespace App\Http\ViewComposers;

use App\Repositories\BannerRepository;
use  Illuminate\View\View;

class BannerComposer
{
    /**
     * The user repository implementation.
     *
     * @var BannerRepository
     */
    protected $bannerRepository;

    /**
     * Create a new profile composer.
     *
     * @param BannerRepository $bannerRepository
     */
    public function __construct(BannerRepository $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param \Illuminate\View\View $view
     * @return void
     */
    public function compose(View $view)
    {
        $banners = $this->bannerRepository->with('image')->where('status', 1)->orderBy('updated_at', 'DESC')->take(5)->get();
        $view->with('banners', $banners);
    }
}
