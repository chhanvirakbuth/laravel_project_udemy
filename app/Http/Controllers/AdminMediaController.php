<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Photo;

class AdminMediaController extends Controller
{
    //
    public function index(){
        $photos=Photo::all();
        return view('admin.media.index',compact('photos'));
    }

    public function create(){
        return view('admin.media.create');
    }

    public function store(Request $request){
        $input= $request->all();

        if($file=$request->file('photo_id')){

            $name=time().$file->getClientOriginalName();

            $file->move('images',$name);

            $photo=Photo::create(['file'=>$name]);

            $input['photo_id']=$photo->id;
            
        }
        return redirect('admin/media');
        
    }

    public function destroy($id){
        $photo=Photo::findOrFail($id);
        unlink(public_path().$photo->file);
        $photo->delete();
        return redirect('admin.media');
    }
}
