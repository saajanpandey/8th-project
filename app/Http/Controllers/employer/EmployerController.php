<?php

namespace App\Http\Controllers\employer;

use App\Events\AccountCreated;
use App\Events\EmployerAccountCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployerRequest;
use App\Http\Requests\FrontendEmployerRequest;
use App\Models\City;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use File;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeers = Employer::orderBy('id', 'DESC')->paginate(10);
        return view('employer.index', compact('employeers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::get();
        return view('employer.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployerRequest $request)
    {
        $data = $request->except('_token');
        $data['password'] = Hash::make($request->password);
        Employer::create($data);
        event(new EmployerAccountCreated($data));
        return redirect()->route('employer.index')->with('create', '');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employeer = Employer::find($id);
        return view('employer.view', compact('employeer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employeer = Employer::find($id);
        $cities = City::get();
        return view('employer.edit', compact('employeer', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployerRequest $request, $id)
    {
        $employeer = Employer::find($id);
        $data = $request->except('_token');
        $data['status'] = 0;
        $employeer->fill($data);
        $employeer->save();
        return redirect()->route('employer.dash')->with('update', '');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employeer = Employer::find($id);
        $logo = public_path() . '/uploads/logo/' . $employeer->image;
        $pan = public_path() . '/uploads/pan/' . $employeer->pan_image;
        if (file_exists($logo)) {
            File::delete($logo);
        }
        if (file_exists($pan)) {
            File::delete($pan);
        }
        $employeer->delete();
        return redirect()->route('employer.index')->with('delete', '');
    }

    public function logoUpload(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $employeer = Employer::find($id);

        $image_path = public_path() . '/uploads/logo/' . $employeer->image;
        if (file_exists($image_path)) {
            File::delete($image_path);
        }

        $image = $request->file('image');
        $name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/uploads/logo/');
        $image->move($destinationPath, $name);
        $employeer->image = $name;
        $employeer->save();
        return redirect()->route('employer.dash')->with('image', '');
    }
    public function panUpload(Request $request, $id)
    {
        $request->validate([
            'pan_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $employeer = Employer::find($id);

        $image_path = public_path() . '/uploads/pan/' . $employeer->pan_image;
        if (file_exists($image_path)) {
            File::delete($image_path);
        }

        $image = $request->file('pan_image');
        $name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/uploads/pan/');
        $image->move($destinationPath, $name);
        $employeer->pan_image = $name;
        $employeer->save();
        return redirect()->route('employer.dash')->with('image', '');
    }
    public function adminEdit($id)
    {
        $employeer = Employer::find($id);
        $cities = City::get();
        return view('admin.employerEdit', compact('employeer', 'cities'));
    }
    public function adminUpdate(EmployerRequest $request, $id)
    {
        $employeer = Employer::find($id);
        $data = $request->except('_token');
        $employeer->fill($data);
        $employeer->save();
        return redirect()->route('employer.index')->with('update', '');
    }
    public function signup()
    {
        $cities = City::get();
        return view('frontend.employersignup', compact('cities'));
    }

    public function register(FrontendEmployerRequest $request)
    {
        $data = $request->except('_token');
        $data['password'] = Hash::make($request->password);

        $logo_image = $request->file('image');
        $pan_image = $request->file('pan_image');

        if ($logo_image) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/logo/');
            $image->move($destinationPath, $name);
            $data['image'] = $name;
        }
        if ($pan_image) {
            $image = $request->file('pan_image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/pan/');
            $image->move($destinationPath, $name);
            $data['pan_image'] = $name;
        }
        $data['status'] = 0;
        Employer::create($data);
        event(new EmployerAccountCreated($data));
        return redirect()->to('/')->with('store', '');
    }
}
