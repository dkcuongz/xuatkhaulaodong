<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsCreateRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Repositories\CategoriesRepository;
use App\Repositories\ImageRepository;
use App\Repositories\NewsRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * @var NewsRepository
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
     * newsController constructor.
     *
     * @param NewsRepository $repository
     * @param ImageRepository $imageRepository
     * @param CategoriesRepository $categoryRepository
     */
    public function __construct(NewsRepository $repository, ImageRepository $imageRepository, CategoriesRepository $categoryRepository)
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
        $news = $this->repository->with('image')->whereHas('category', function ($query) {
            $query->whereHas('parent', function ($subQuery) {
                $subQuery->where(['id' => 5]);
            });
        })->get();
        return view('admin.news.index', compact('news'));
    }


    public function create()
    {
        $categories = $this->categoryRepository->with(['allLevelChildren'])->where('parent_id', '=', 5)->get();
        return view('admin.news.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewsCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(NewsCreateRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $new = $this->repository->create($data);
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = $file->hashName();
                Storage::put('images', $file, 'public');
                $dataImage['path'] = 'images/' . $filename;
                $dataImage['post_id'] = $new->id;
                $this->imageRepository->create($dataImage);

            }
            $response = [
                'message' => 'Tạo mới bài viết thành công.',
                'data' => $new->toArray(),
            ];
            DB::commit();
            return redirect(route('admin.news.index'))->with('success_message', $response['message']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error_message', $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = $this->categoryRepository->with(['allLevelChildren'])->where('parent_id', '=', 5)->get();
        $new = $this->repository->with('image')->find($id);
        return view('admin.news.detail', compact('new', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = $this->categoryRepository->with(['allLevelChildren'])->where('parent_id', '=', 5)->get();
        $new = $this->repository->with('image')->find($id);
        return view('admin.news.edit', compact('new', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NewsUpdateRequest $request
     * @param string $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(NewsUpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $new = $this->repository->update($data, $id);
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = $file->hashName();
                Storage::put('images', $file, 'public');
                $dataImage['path'] = 'images/' . $filename;
                $dataImage['post_id'] = $new->id;
                $this->imageRepository->where('post_id', $new->id)->delete();
                $this->imageRepository->create($dataImage);
            }
            $response = [
                'message' => 'Cập nhật bài viết thành công',
                'data' => $new->toArray(),
            ];
            DB::commit();
            return redirect(route('admin.news.index'))->with('success_message', $response['message']);
        } catch (\Exception $e) {
            DB::rollBack();
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
        $new = $this->repository->find($id);
        $new->images()->delete();
        $new->delete();
        return redirect()->back()->with('success_message', 'Xóa bài viết thành công');
    }
}
