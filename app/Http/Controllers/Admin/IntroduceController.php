<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\IntroduceCreateRequest;
use App\Http\Requests\IntroduceUpdateRequest;
use App\Repositories\ImageRepository;
use App\Repositories\IntroduceRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/**
 * Class introduceController.
 *
 * @package namespace App\Http\Controllers;
 */
class IntroduceController extends Controller
{
    /**
     * @var IntroduceRepository
     */
    protected $repository;

    /**
     * @var ImageRepository
     */
    protected $imageRepository;


    /**
     * IntroduceController constructor.
     *
     * @param IntroduceRepository $repository
     * @param ImageRepository $imageRepository
     */
    public function __construct(IntroduceRepository $repository, ImageRepository $imageRepository)
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
        $introduces = $this->repository->with('image')->get();
        return view('admin.introduces.index', compact('introduces'));
    }


    public function create()
    {
        return view('admin.introduces.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param IntroduceCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(IntroduceCreateRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $data['category_id'] = $data['category_id'] ?? 3;
            $introduce = $this->repository->create($data);

            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = $file->hashName();
                Storage::put('images/introduces', $file, 'public');
                $dataImage['path'] = 'images/introduces/' . $filename;
                $dataImage['introduce_id'] = $introduce->id;
                $this->imageRepository->create($dataImage);

            }
            $response = [
                'message' => 'Tạo mới giới thiệu thành công',
                'data' => $introduce->toArray(),
            ];
            DB::commit();
            return redirect(route('admin.introduces.index'))->with('success_message', $response['message']);
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

        $introduce = $this->repository->with('image')->find($id);
        return view('admin.introduces.detail', compact('introduce'));
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
        $introduce = $this->repository->with('image')->find($id);

        return view('admin.introduces.edit', compact('introduce'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param IntroduceUpdateRequest $request
     * @param string $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(IntroduceUpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $data['category_id'] = $data['category_id'] ?? 3;
            $introduce = $this->repository->update($data, $id);
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = $file->hashName();
                Storage::put('images/introduces', $file, 'public');
                $dataImage['path'] = 'images/introduces/' . $filename;
                $dataImage['introduce_id'] = $introduce->id;
                $this->imageRepository->where('introduce_id', $introduce->id)->delete();
                $this->imageRepository->create($dataImage);
            }

            $response = [
                'message' => 'Cập nhật giới thiệu thành công',
                'data' => $introduce->toArray(),
            ];
            DB::commit();
            return redirect(route('admin.introduces.index'))->with('success_message', $response['message']);
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
        $introduce = $this->repository->find($id);
        $introduce->image()->delete();
        $introduce->delete();
        return redirect()->back()->with('success_message', 'Xóa giới thiệu thành công');
    }
}
