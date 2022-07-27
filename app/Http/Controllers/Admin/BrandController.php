<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;


class BrandController extends Controller
{
    public function brands()
    {
        $brands = Brand::where('status' ,'!=' ,'2')->get()->toArray();
        //dd($brands);
        return view('admin.brands.brand')->with(compact('brands'));

    }

    public function updateBrandStatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if($data['status']=="Active") {
                 $status = 0;
            }
            else {
                $status = 1;
            }
            Brand::where('id' , $data['brand_id'])->update(['status' => $status]);
            return response()->json(['status' => $status , 'brand_id' => $data['brand_id']]);

        }
    }

    public function deleteBrand($id)
    {
        //Delete brand
        // brand::where('id' , $id)->delete();
        // $message = "brand has been deleted successfully";
        // return redirect()->back()->with('success_message' , $message);

        //delete brand (2nd method)
        $brand = Brand::find($id);
        $brand->status = "2";
        $brand->update();
        return redirect()->back()->with('success_message' , 'Brand has been deleted successfully');
    }

    public function addEditBrand(Request $request , $id = null)
    {
        if($id == "")
        {
            $title = "Add Brand";
            $brand = new Brand;
            $message = "Brand Added Successfully";

        }
        else{
            $title = "Edit Brand";
            $brand = Brand::find($id);
            $message = "Brand Updated Successfully";
        }
        if($request->isMethod('post'))
        {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

            $rules =[
                    'brand_name' => 'required' ,

                ];

                $customMessages = [
                    //Add custom message here
                    'brand_name.required' => 'Brand Name is required !',


                ];
                $this->validate($request , $rules , $customMessages);

                $brand->brand_name = $data['brand_name'];
                $brand->status = 1;
                $brand->save();
                return redirect('admin/brands')->with('success_message' , $message);


        }
        return view('admin.brands.add_edit_brand')->with(compact('title' , 'brand'));
    }

    public function deletedBrands()
    {
        $brands = Brand::where('status' , '2')->get();
        return view('admin.brands.deleted_brands')->with(compact('brands'));
    }
    public function restoreBrands($id)
    {
        $brand = Brand::find($id);
        $brand->status = "1"; //0->inactive 1->active 2->delete
        $brand->update();
        return redirect('admin/brands')->with('success_message' , 'Brand Restored successfully');

    }
}
