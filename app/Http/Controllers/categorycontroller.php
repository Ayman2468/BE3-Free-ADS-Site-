<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Requests\categoryrequest;

class categorycontroller extends Controller
{
    //
    public function index()
    {
        $categorydata = category::select('id', 'category_ar', 'category_en')->paginate(paginationcount);
        return view('category.index', ['categorydata' => $categorydata]);
    }
    public function create()
    {
        return view('category.create');
    }

    public function store(categoryrequest $request)
    {
         //insert

        category::create([
            'category_ar'=> $request->category_ar,
            'category_en'=> $request->category_en,
        ]);
        return redirect('category/index')->with(['message' => __('msg.Category added successfully')]);
    }
    public function edit($categoryid)
    {
            $categorydata = category::select('id', 'category_ar', 'category_en')->find($categoryid);
            return view('category.edit', ['categorydata' => $categorydata]);
    }
    public function update(categoryrequest $request, $categoryid)
    {
         //update
        $category = category::find($categoryid);
        if (!$category) {
            return redirect('category/index')->with(['message' => __('msg.Category doesn\'t exist')]);
        }
        $data = [
            'category_ar'=> $request->category_ar,
            'category_en'=> $request->category_en,
        ];
        $op = category::where('id', $categoryid)->update($data);
        if ($op) {
            $message = __('msg.category data updated successfully');
        } else {
            $message = __("msg.no change in data happened");
        }

        session()->flash('message', $message);
        return redirect('category/index');
    }
    public function destroy($categoryid)
    {
        //
        $op = category::find($categoryid)->delete();

        if ($op) {
            $message = __("msg.Category deleted");
        } else {
            $message = __("msg.error try again");
        }

        session()->flash('message1', $message);
        return redirect('category/index');
    }
}
