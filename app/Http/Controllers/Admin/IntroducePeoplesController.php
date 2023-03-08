<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\IntroducePeopleCreateRequest;
use App\Http\Requests\IntroducePeopleUpdateRequest;
use App\Repositories\ImageRepository;
use App\Repositories\IntroducePeopleRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/**
 * Class IntroducePeoplesController.
 *
 * @package namespace App\Http\Controllers;
 */
class IntroducePeoplesController extends Controller
{
    /**
     * @var IntroducePeopleRepository
     */
    protected $repository;

    /**
     * @var ImageRepository
     */
    protected $imageRepository;


    /**
     * IntroducePeoplesController constructor.
     *
     * @param IntroducePeopleRepository $repository
     * @param ImageRepository $imageRepository
     */
    public function __construct(IntroducePeopleRepository $repository, ImageRepository $imageRepository)
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
        $introducePeoples = $this->repository->with('image')->get();
        return view('admin.introduce-peoples.index', compact('introducePeoples'));
    }


    public function create()
    {
        return view('admin.introduce-peoples.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param IntroducePeopleCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(IntroducePeopleCreateRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $data['status'] = $data['status'] ?? 1;
            $introducePeople = $this->repository->create($data);

            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = $file->hashName();
                Storage::put('images/introduce-peoples', $file, 'public');
                $dataImage['path'] = 'images/introduce-peoples/' . $filename;
                $dataImage['post_id'] = $introducePeople->id;
                $this->imageRepository->create($dataImage);

            }
            $response = [
                'message' => 'Tạo mới giới thiệu con người thành công',
                'data' => $introducePeople->toArray(),
            ];
            DB::commit();
            return redirect(route('admin.introduce-peoples.index'))->with('success_message', $response['message']);
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

        $introducePeople = $this->repository->with('image')->find($id);
        return view('admin.introduce-peoples.detail', compact('introducePeople'));
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
        $introducePeople = $this->repository->with('image')->find($id);

        return view('admin.introduce-peoples.edit', compact('introducePeople'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param IntroducePeopleUpdateRequest $request
     * @param string $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(IntroducePeopleUpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $introducePeople = $this->repository->update($request->all(), $id);
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = $file->hashName();
                Storage::put('images/introduce-peoples', $file, 'public');
                $dataImage['path'] = 'images/introduce-peoples/' . $filename;
                $dataImage['post_id'] = $introducePeople->id;
                $this->imageRepository->where('post_id', $introducePeople->id)->delete();
                $this->imageRepository->create($dataImage);
            }

            $response = [
                'message' => 'Cập nhật giới thiệu con người thành công',
                'data' => $introducePeople->toArray(),
            ];
            DB::commit();
            return redirect(route('admin.introduce-peoples.index'))->with('success_message', $response['message']);
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
        $introducePeople = $this->repository->find($id);
        $introducePeople->image()->delete();
        $introducePeople->delete();
        return redirect()->back()->with('success_message', 'Xóa giới thiệu con người thành công');
    }
}
