<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::getAllProduct();
        return view('backend.product.index')->with('products', $products);
    }

    public function create()
    {
        $brands = Brand::get();
        $categories = Category::get();
        return view('backend.product.create')->with('categories', $categories)->with('brands', $brands);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'photo' => 'required|string|max:255',
            'summary' => 'required|string',
            'description' => 'nullable|string',
            'stock' => "required|numeric",
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'cat_id' => 'required|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->all();
        $slug = Str::slug($request->title);
        $count = Product::where('slug', $slug)->count();

        if ($count > 0) {
            $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
        }

        $data['slug'] = $slug;
        $status = Product::create($data);

        if ($status) {
            request()->session()->flash('success', 'Thêm sản phẩm thành công!');
        } else {
            request()->session()->flash('error', 'Đã xảy ra lỗi! Vui lòng thử lại.');
        }

        return redirect()->route('product.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $items = Product::where('id', $id)->get();
        $brands = Brand::get();
        $products = Product::findOrFail($id);
        $categories = Category::get();

        return view('backend.product.edit')
            ->with('categories', $categories)
            ->with('product', $products)
            ->with('brands', $brands)
            ->with('items', $items);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'photo' => 'required|string|max:255',
            'summary' => 'required|string',
            'description' => 'nullable|string',
            'stock' => "required|numeric",
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'cat_id' => 'required|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->all();
        $status = $product->fill($data)->save();

        if ($status) {
            request()->session()->flash('success', 'Sửa sản phẩm thành công!');
        } else {
            request()->session()->flash('error', 'Đã xảy ra lỗi! Vui lòng thử lại.');
        }

        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $status = $product->delete();

        if ($status) {
            request()->session()->flash('success', 'Xoá sản phẩm thành công!');
        } else {
            request()->session()->flash('error', 'Đã xảy ra lỗi! Vui lòng thử lại.');
        }

        return redirect()->route('product.index');
    }
}
