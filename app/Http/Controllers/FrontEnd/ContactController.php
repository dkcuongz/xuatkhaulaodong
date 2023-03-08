<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesCreateRequest;
use App\Http\Requests\ContactCreateRequest;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $repository;

    /**
     * categoriesController constructor.
     *
     * @param ContactRepository $repository
     */
    public function __construct(ContactRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('front-end.contact.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ContactCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ContactCreateRequest $request)
    {
        try {
            $data = $request->all();
            $contact = $this->repository->create($data);
            $response = [
                'message' => 'Đã lưu thông tin, chúng tôi sẽ liên hệ sau.',
                'data' => $contact->toArray(),
            ];
            return redirect()->back()->with('message', $response['message']);
        } catch (\Exception $e) {
            return redirect()->back()->with('error_message',$e->getMessage())->withInput();
        }
    }
}
