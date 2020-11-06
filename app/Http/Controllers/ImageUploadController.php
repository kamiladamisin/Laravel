<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\ImagesModel;
use Illuminate\Support\Facades\Auth;

class ImageUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function imageUpload()
    {
        return view('imageUpload');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function imageUploadPost(Request $request)
    {
        $image = new ImagesModel();
        $image->name = Auth::user()->name;


        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);
        $image->path = $imageName;

        $image->save();
        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
    }

    public function getImages(){
        $images = ImagesModel::all();
        return view('gallery')->with('images',$images);
    }

    public function delete($id,$name){
        $image = ImagesModel::find($id);
        $image->delete();
        $images = ImagesModel::where('name',$name)->get();
        return view('gallery')->with('images',$images);
    }
    public function myImages($name)
    {
        if (empty(Auth::user())){
            return view('auth/login');
        }else{
            $images = ImagesModel::where('name',$name)->get();
            return view('gallery')->with('images',$images);
        }
    }

    public function showImage($imageID){
        $image = ImagesModel::where('id',$imageID)->get();
        return view('image')->with('image',$image);
    }
}
