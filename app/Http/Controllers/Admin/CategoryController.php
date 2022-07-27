<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Section;
use Illuminate\Support\Str;
use Image;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories()
    {
        $categories = Category::with(['section' , 'parentcategory'])->where('status' ,'!=' ,'2')->get()->ToArray();
        //  dd($categories);
        return view('admin.categories.category')->with(compact('categories'));
    }

    public function updateCategoryStatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if($data['status']=="Active") {
                $status = 0;
            }
            else{
                $status = 1;
            }
            Category::where('id' , $data['category_id'])->update(['status' => $status]);
            return response()->json(['status' => $status , 'category_id' => $data['category_id']]);
        }
    }

    public function addEditCategory(Request $request , $id = null)
    {
        if($id == "")
        {
            //Add Category
            $title = "Add Category";
            $category = new Category;
            $getCategories = array(); // get all the parent categories
            $message = "Category Added Successfully";
        }
        else{
            //edit category
            $title = "Edit Category";
            $category = Category::find($id);
            $getCategories = Category::with('subcategories')->where(['parent_id'=> 0 , 'section_id' => $category['section_id']] )->get();
            $message = "Category Updated Successfully";
        }

        if($request->isMethod('post'))
        {
            $data =$request->all();
            // echo "<pre>"; print_r($data); die;
            $rules = [
                'category_name' => 'required',
                'section_id' => 'required',
                'category_url' => 'required',
            ];
            $this->validate($request , $rules);

            if($data['category_discount'] == "")
            {
                $data['category_discount'] = 0;
            }

             //upload Category image
             if($request->hasFile('category_image'))
             {
                 $image_tmp = $request->file('category_image');
                 if($image_tmp->isValid())
                 {
                     //Get Image Extension
                     $extension = $image_tmp->getClientOriginalExtension();

                     //Generate new image name
                     $imageName = rand(1111,99999).'.'.$extension;
                     $imagepath = 'front/images/category_images/'.$imageName;

                     //upload the image
                     Image::make($image_tmp)->save($imagepath);
                     $category->category_image = $imageName;
                 }
             }
             else{
                $category->category_image = "";
             }
             $category->parent_id = $data['parent_id'];
             $category->section_id = $data['section_id'];
             $category->category_name = $data['category_name'];
            //  $category->category_image = $data['category_image'];
             $category->category_discount = $data['category_discount'];
             $category->category_discription = $data['category_discription'];
             $category->category_url  = Str::slug($data['category_url']);
             $category->meta_title = $data['meta_title'];
             $category->meta_keywords = $data['meta_keywords'];
             $category->meta_description = $data['meta_description'];
             $category->status = 1;
             $category->save();

            return redirect('admin/categories')->with('success_message' , $message);
        }
        //Get All the sections
        $getSections = Section::get()->toArray();
        return view('admin.categories.add_edit_categories')->with(compact('title' , 'category' , 'getSections' , 'getCategories'));
    }

    public function appendCategoryLevel(Request $request)
    {
        if($request->ajax())
        {
            $data =$request->all();
            // echo "<pre>"; print_r($data); die;
            $getCategories = Category::with('subcategories')->where(['parent_id'=>0 , 'section_id' => $data['section_id']] )->get()->toArray();
            return view('admin.categories.append_categories_level')->with(compact('getCategories'));
        }
    }

    //delete category
    public function deleteCategory($id)
    {
        //To permanently delete the category
        // Category::where('id' ,$id )->delete();
        // $message = "Category has been deleted successfully ";
        // return redirect()->back()->with('success_message' , $message);

        //to delete category from dashboard and frontend but not actually from database
        $category = Category::find($id);
        $category->status = "2";
        $category->update();
        return redirect()->back()->with('success_message' , 'Category has been deleted successfully');
    }

    public function deleteCategoryImage($id)
    {
        $categoryImage = Category::select('category_image')->where('id' , $id)->first();

        //get category image path
        $category_image_path = 'front/images/category_images/';
        //Delete Category image  from category_image folder if exists
        if(file_exists($category_image_path.$categoryImage->category_image))
        {
            unlink($category_image_path.$categoryImage->category_image);
        }
        //delete category image from categories table in database
        Category::where('id' , $id)->update(['category_image' => '']);
        $message = "Category image has been deleted successfully";
        return redirect()->back()->with('success_message' , $message);
    }

    //to restore the deleted Category
    public function deletedCategory()
    {
        $categories = Category::where('status' , '2')->get();
        return view('admin.categories.deleted_categories')->with(compact('categories'));
    }
    public function restoreCategory($id)
    {
        $categories = Category::find($id);
        $categories->status = "1"; //0->inactive 1->active 2->delete
        $categories->update();
        return redirect('admin/categories')->with('success_message' , 'Category Restored successfully');
    }
}
