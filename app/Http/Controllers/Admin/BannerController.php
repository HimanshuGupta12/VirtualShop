<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function banners()
    {
        $banners = Banner::get()->toArray();
        //dd($banner); die;
        return view('admin.banners.banners')->with(compact('banners'));
    }

    public function updateBannerStatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if($data['status']=="Active"){
                $status = 0;
            }
            else {
                $status = 1;
            }
            Banner::where('id' , $data['banner_id'])->update(['status' => $status]);
            return response()->json(['status' => $status , 'banner_id' => $data['banner_id']]);
        }
    }


    //Delete Banner Image
    public function deleteBanner($id)
    {
        //Find banner image with id
        $banner_Image= Banner::where('id' , $id)->first();

        //Get BannerImage path
        $banner_path = 'front/images/banner_images/';

        //check if banner exists in folder , it it exists then we are going to delete it
        if (file_exists($banner_path.$banner_Image->image)) {
            unlink($banner_path.$banner_Image->image);

        }

        //delete from banner table in DB
        Banner::where('id' , $id)->delete();

        return redirect()->back()->with('success_message' , 'Banner has been deleted successfully');

    }










}
