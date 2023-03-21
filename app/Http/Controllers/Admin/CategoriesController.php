<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesCreateRequest;
use App\Http\Requests\CategoriesUpdateRequest;
use App\Repositories\CategoriesRepository;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * @var CategoriesRepository
     */
    protected $repository;

    /**
     * categoriesController constructor.
     *
     * @param CategoriesRepository $repository
     */
    public function __construct(CategoriesRepository $repository)
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
        $categories = $this->repository->isChild()->get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = $this->repository->hasChild()->get();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoriesCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesCreateRequest $request)
    {
        try {
            $data = $request->all();
            $data['slug'] = Str::slug($request->name);
            $category = $this->repository->create($data);
            $response = [
                'message' => 'category created.',
                'data' => $category->toArray(),
            ];
            return redirect(route('admin.categories.index'))->with('success_message', $response['message']);
        } catch (\Exception $e) {
            return redirect()->back()->with('error_message', $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $category = $this->repository->where('slug', $slug)->first();
        $categories = $this->repository->hasChild()->get();
        return view('admin.categories.show', compact('category', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $category = $this->repository->where('slug', $slug)->first();
        $categories = $this->repository->hasChild()->get();
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoriesUpdateRequest $request
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriesUpdateRequest $request, $slug)
    {
        try {

            $category = $this->repository->where('slug', $slug)->first();
            $data = $request->all();
            $data['slug'] = Str::slug($request->name);
            $categoryUpdate = $this->repository->update($data, $category->id);
            $response = [
                'message' => 'Category updated.',
                'data' => $categoryUpdate->toArray(),
            ];
            return redirect(route('admin.categories.index'))->with('success_message', $response['message']);
        } catch (\Exception $e) {
            return redirect()->back()->with('error_message', $e->getMessage())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->repository->where('parent_id', 2)->where('slug', $id);
        $category->delete();
        return redirect(route('admin.categories.index'))->with('message', 'Category deleted.');
    }
}
