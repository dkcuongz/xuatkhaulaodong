<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerCreateRequest;
use App\Http\Requests\BannerUpdateRequest;
use App\Repositories\BannerRepository;
use App\Repositories\ImageRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * @var BannerRepository
     */
    protected $repository;

    /**
     * @var ImageRepository
     */
    protected $imageRepository;

    /**
     * BannerController constructor.
     * @param BannerRepository $repository
     * @param ImageRepository $imageRepository
     */
    public function __construct(BannerRepository $repository, ImageRepository $imageRepository)
    {
        $this->repository = $repository;
        $this->imageRepository = $imageRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = $this->repository->with('image')->get();
        return view('admin.banners.index', compact('banners'));
    }


    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BannerCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BannerCreateRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $data['status'] = $data['status'] ?? 1;
            $banner = $this->repository->create($data);

            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = $file->hashName();
                Storage::put('images/banner', $file, 'public');
                $dataImage['path'] = 'images/banner/' . $filename;
                $dataImage['post_id'] = $banner->id;
                $this->imageRepository->create($dataImage);

            }
            $response = [
                'message' => 'Tạo mới banner thành công',
                'data' => $banner->toArray(),
            ];
            DB::commit();
            return redirect(route('admin.banners.index'))->with('success_message', $response['message']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error_message',$e->getMessage())->withInput();
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

        $banner = $this->repository->with('image')->find($id);
        return view('admin.banners.detail', compact('banner'));
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
        $banner = $this->repository->with('image')->find($id);

        return view('admin.banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BannerUpdateRequest $request
     * @param string $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(BannerUpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $banner = $this->repository->update($request->all(), $id);
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = $file->hashName();
                Storage::put('images/banner', $file, 'public');
                $dataImage['path'] = 'images/banner/' . $filename;
                $dataImage['post_id'] = $banner->id;
                $this->imageRepository->where('post_id', $banner->id)->delete();
                $this->imageRepository->create($dataImage);
            }

            $response = [
                'message' => 'Cập nhật banner thành công',
                'data' => $banner->toArray(),
            ];
            DB::commit();
            return redirect(route('admin.banners.index'))->with('success_message', $response['message']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error_message',$e->getMessage())->withInput();
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
        $banner = $this->repository->find($id);
        $banner->images()->delete();
        $banner->delete();
        return redirect()->back()->with('success_message', 'Xóa banner thành công');
    }
}
