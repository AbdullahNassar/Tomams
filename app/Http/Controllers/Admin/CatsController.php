<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cat;
use Alert;
use DB;

class CatsController extends Controller
{
    public function getIndex() {
    	$categories = Cat::all();
        return view('admin.pages.category.index', compact('categories'));
    }

    public function getAdd() {
        return view('admin.pages.category.add');
    }

    public function insert(Request $request) {
    	$name = $request->input('name');
    	$active = $request->input('active');
    	$data = array('c_name' => $name ,'active' => $active);
    	$category = Cat::create($data);

        if ($category){
            Alert::success(' The Data Inserted successfully', 'Done!');
            $categories = Cat::all();
            return view('admin.pages.category.index', compact('categories'));
        }else{
            Alert::error('Something went wrong!', 'Error!');
        }
    	
    }

    public function getEdit($id) {
    	if (isset($id)) {
	        $categories = DB::table('cats')
	            ->select('cats.*')
	            ->where('id','=', $id)
	            ->get();
	        return view('admin.pages.category.edit', compact('categories'));
        }        
    }

    public function postEdit(Request $request) {
    	$id = $request->input('s_id');
    	$name = $request->input('name');
        $active = $request->input('active');
        $data = array('c_name' => $name ,'active' => $active);
    	$category = DB::table('cats')->where('id','=', $id)->update($data);
    	if ($category){
            Alert::success(' The Data Updated successfully', 'Done!');
            $categories = Cat::all();
            return view('admin.pages.category.index', compact('categories'));
        }else{
            Alert::error('Something went wrong!', 'Error!');
        }
    }

    public function delete($id) {
    	if (isset($id)) {
	    	$category = DB::table('cats')->where('id','=', $id)->delete();
	    	if ($category){
                Alert::success(' The Data Deleted successfully', 'Done!');
                $categories = Cat::all();
                return view('admin.pages.category.index', compact('categories'));
            }else{
                Alert::error('Something went wrong!', 'Error!');
            }
	    }
    }

}
