<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sub_category;
use App\Http\Requests\sub_categoryrequest;

class sub_categorycontroller extends Controller
{
    //
    public function index($categoryid)
    {
        $sub_categorydata = sub_category::select('id','category_id','sub_category_ar','sub_category_en')->where('category_id',$categoryid)->paginate(paginationcount);
        return view('sub_category.index', ['sub_categorydata' => $sub_categorydata,'category_id'=>$categoryid]);
    }
    public function create($categoryid)
    {
        return view('sub_category.create',['category_id'=>$categoryid]);
    }

    public function store(sub_categoryrequest $request)
    {
         //insert

        sub_category::create([
            'category_id'=> $request->category_id,
            'sub_category_ar'=> $request->sub_category_ar,
            'sub_category_en'=> $request->sub_category_en,
        ]);
        return redirect('sub_category/index/'.$request->category_id)->with(['message' => __('msg.sub category added successfully')]);
    }
    public function edit($sub_categoryid)
    {
            $sub_categorydata = sub_category::select('id','category_id','sub_category_ar', 'sub_category_en')->find($sub_categoryid);
            return view('sub_category.edit', ['sub_categorydata' => $sub_categorydata]);
    }

    public function update(sub_categoryrequest $request, $sub_categoryid)
    {
         //update
        $sub_category = sub_category::find($sub_categoryid);
        if (!$sub_category) {
            return redirect('sub_category/index/'.$request->category_id)->with(['message' => __('msg.sub category doesn\'t exist')]);
        }
        $data = [
            'sub_category_ar'=> $request->sub_category_ar,
            'sub_category_en'=> $request->sub_category_en,
        ];
        $op = sub_category::where('id', $sub_categoryid)->update($data);
        if ($op) {
            $message = __('msg.user data updated successfully');
        } else {
            $message = __("msg.no change in data happened");
        }

        session()->flash('message', $message);
        return redirect('sub_category/index/'.$request->category_id);
    }
    public function destroy($sub_categoryid)
    {
        //
        $op = sub_category::find($sub_categoryid)->delete();

        if ($op) {
            $message = __("msg.sub category deleted");
        } else {
            $message = __("msg.error try again");
        }

        session()->flash('message1', $message);
        return redirect()->back();
    }
}
