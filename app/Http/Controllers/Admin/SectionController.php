<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;

class SectionController extends Controller
{
    public function sections()
    {
        $sections = Section::where('status' ,'!=' ,'2')->get()->toArray();
        //dd($sections);
        return view('admin.sections.section')->with(compact('sections'));

    }

    public function updateSectionStatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if($data['status']=="Active")
            {
                $status = 0;
                // return redirect()->back()->with('error_message' , 'You are not allowed . ');

            }
            else
            {
                $status = 1;
            }
            Section::where('id' , $data['section_id'])->update(['status' => $status]);
            return response()->json(['status' => $status , 'section_id' => $data['section_id']]);

        }
    }

    public function deletesection($id)
    {
        //Delete Section
        // Section::where('id' , $id)->delete();
        // $message = "section has been deleted successfully";
        // return redirect()->back()->with('success_message' , $message);

        //delete section (2nd method)
        $section = Section::find($id);
        $section->status = "2";
        $section->update();
        return redirect()->back()->with('success_message' , 'Section has been deleted successfully');

    }

    public function addEditSection(Request $request , $id = null)
    {
        if($id == "")
        {
            $title = "Add Section";
            $section = new Section;
            $message = "Section Added Successfully";

        }
        else{
            $title = "Edit Section";
            $section = Section::find($id);
            $message = "Section Updated Successfully";
        }
        if($request->isMethod('post'))
        {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

            $rules =[
                    'section_name' => 'required' ,

                ];

                $customMessages = [
                    //Add custom message here
                    'section_name.required' => 'Section Name is required !',


                ];
                $this->validate($request , $rules , $customMessages);

                $section->name = $data['section_name'];
                $section->status = 1;
                $section->save();
                return redirect('admin/sections')->with('success_message' , $message);


        }
        return view('admin.sections.add_edit_section')->with(compact('title' , 'section'));
    }

    //to restore the deleted section
    public function deletedSection()
    {
        $sections = Section::where('status' , '2')->get();
        return view('admin.sections.deleted_sections')->with(compact('sections'));
    }
    public function restoreSection($id)
    {
        $section = Section::find($id);
        $section->status = "1"; //0->inactive 1->active 2->delete
        $section->update();
        return redirect('admin/sections')->with('success_message' , 'Section Restored successfully');

    }
}
