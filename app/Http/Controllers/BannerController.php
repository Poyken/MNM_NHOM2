<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::orderBy('id', 'DESC')->paginate(10);
        return view('backend.banner.index')->with('banners', $banner);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:63',
            'photo' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->all();
        $slug = Str::slug($request->title);
        $count = Banner::where('slug', $slug)->count();

        if ($count > 0) {
            $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
        }

        $data['slug'] = $slug;
        $status = Banner::create($data);

        if ($status) {
            request()->session()->flash('success', 'Thêm banner thành công!');
        } else {
            request()->session()->flash('error', 'Đã xảy ra lỗi! Vui lòng thử lại.');
        }

        return redirect()->route('banner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('backend.banner.edit')->with('banner', $banner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);
        $this->validate($request, [
            'title' => 'string|required|max:63',
            'photo' => 'string|required',
            'description' => 'string|nullable',
            'status' => 'required|in:active,inactive',
        ]);
        $data = $request->all();
        $slug = Str::slug($request->title);
        $count = Banner::where('slug', $slug)->count();

        if ($count > 0) {
            $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
        }

        $data['slug'] = $slug;
        $status = $banner->fill($data)->save();

        if ($status) {
            request()->session()->flash('success', 'Sửa banner thành công!');
        } else {
            request()->session()->flash('error', 'Đã xảy ra lỗi! Vui lòng thử lại.');
        }

        return redirect()->route('banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $status = $banner->delete();
        if ($status) {
            request()->session()->flash('success', 'Xoá banner thành công!');
        } else {
            request()->session()->flash('error', 'Đã xảy ra lỗi! Vui lòng thử lại.');
        }
        return redirect()->route('banner.index');
    }
}