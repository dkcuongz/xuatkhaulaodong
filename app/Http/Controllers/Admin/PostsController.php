<?php

namespace App\Http\Controllers\Admin;

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
        return view('admin.posts.index', compact('posts'));
    }


    public function create()
    {
        $categories = $this->categoryRepository->with(['allLevelChildren'])->where('parent_id', '=', 2)->get();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {

        DB::beginTransaction();
        try {
            $data = $request->all();
            $data['type'] = config('constants.post.type.post');
            $post = $this->repository->create($data);
            $images = $request->file('images');
            $dataImage = [];
            if ($request->hasfile('images')) {
                foreach ($images as $image) {
                    $filename = $image->hashName();
                    Storage::put('images/posts', $image, 'public');
                    $newImage['path'] = 'images/posts/' . $filename;
                    $newImage['post_id'] = $post->id;
                    array_push($dataImage, $newImage);
                }
                $this->imageRepository->insert($dataImage);
            }
            $response = [
                'message' => 'Tạo mới bài viết thành công.',
                'data' => $post->toArray(),
            ];
            DB::commit();
            return redirect(route('admin.posts.index'))->with('success_message', $response['message']);
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
        $categories = $this->categoryRepository->with(['allLevelChildren'])->where('parent_id', '=', 3)->get();
        $post = $this->repository->with('image')->find($id);
        return view('admin.posts.detail', compact('post', 'categories'));
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
        $categories = $this->categoryRepository->with(['allLevelChildren'])->where('parent_id', '=', 2)->get();
        $post = $this->repository->with('images')->find($id);
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostUpdateRequest $request
     * @param string $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $post = $this->repository->update($data, $id);
            $images = $request->file('images');
            if (count($data['images_uploaded']) > 0) {
                $pathsRemove = array_diff($data['images_uploaded_origin'], $data['images_uploaded']);
            } else {
                $pathsRemove = $data['images_uploaded_origin'];
            }
            if (count($pathsRemove) > 0) {
                $this->imageRepository->deleteWhereIn('path', $pathsRemove);
            }
            $dataImage = [];
            if ($request->hasfile('images')) {
                foreach ($images as $image) {
                    $filename = $image->hashName();
                    Storage::put('images/posts', $image, 'public');
                    $newImage['path'] = 'images/posts/' . $filename;
                    $newImage['post_id'] = $post->id;
                    array_push($dataImage, $newImage);
                }
                $this->imageRepository->insert($dataImage);
            }
            $response = [
                'message' => 'Cập nhật bài viết thành công',
                'data' => $post->toArray(),
            ];
            DB::commit();
            return redirect(route('admin.posts.index'))->with('success_message', $response['message']);
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
        $post = $this->repository->find($id);
        $post->images()->delete();
        $post->delete();
        return redirect()->back()->with('success_message', 'Xóa bài viết thành công');
    }
}
