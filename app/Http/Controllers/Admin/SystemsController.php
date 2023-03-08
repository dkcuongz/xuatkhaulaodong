<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SystemCreateRequest;
use App\Http\Requests\SystemUpdateRequest;
use App\Repositories\ImageRepository;
use App\Repositories\SystemRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/**
 * Class SystemsController.
 *
 * @package namespace App\Http\Controllers;
 */
class SystemsController extends Controller
{
    /**
     * @var SystemRepository
     */
    protected $repository;

    /**
     * @var ImageRepository
     */
    protected $imageRepository;

    /**
     * SystemsController constructor.
     *
     * @param SystemRepository $repository
     * @param $
     * @param ImageRepository $imageRepository
     */
    public function __construct(SystemRepository $repository, ImageRepository $imageRepository)
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
        $systems = $this->repository->with('images')->all();
        return view('admin.systems.index', compact('systems'));
    }


    public function create()
    {
        return view('admin.systems.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SystemCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(SystemCreateRequest $request)
    {

        DB::beginTransaction();
        try {
            $data = $request->all();
            $system = $this->repository->create($data);
            $images = $request->file('images');
            $dataImage = [];
            if ($request->hasfile('images')) {
                foreach ($images as $image) {
                    $filename = $image->hashName();
                    Storage::put('images/systems', $image, 'public');
                    $newImage['path'] = 'images/systems/' . $filename;
                    $newImage['post_id'] = $system->id;
                    array_push($dataImage, $newImage);
                }
                $this->imageRepository->insert($dataImage);
            }
            $response = [
                'message' => 'Tạo mới bài viết hệ thống thành công.',
                'data' => $system->toArray(),
            ];
            DB::commit();
            return redirect(route('admin.systems.index'))->with('success_message', $response['message']);
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
        $system = $this->repository->with('images')->find($id);
        return view('admin.systems.detail', compact('system'));
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
        $system = $this->repository->with('images')->find($id);
        return view('admin.systems.edit', compact('system'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SystemUpdateRequest $request
     * @param string $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(SystemUpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $system = $this->repository->update($data, $id);
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
                    Storage::put('images/systems', $image, 'public');
                    $newImage['path'] = 'images/systems/' . $filename;
                    $newImage['post_id'] = $system->id;
                    array_push($dataImage, $newImage);
                }
                $this->imageRepository->insert($dataImage);
            }
            $response = [
                'message' => 'Cập nhật bài viết hệ thống thành công',
                'data' => $system->toArray(),
            ];
            DB::commit();
            return redirect(route('admin.systems.index'))->with('success_message', $response['message']);
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
        $system = $this->repository->find($id);
        $system->images()->delete();
        $system->delete();
        return redirect()->back()->with('success_message', 'Xóa bài viết hệ thống thành công');
    }
}
