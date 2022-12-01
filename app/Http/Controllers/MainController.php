<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    //

    public function welcome(Request $request)
    {
        $data = Image::all();
        return view('welcome', compact('data'));
    }
    public function save(Request $request)
    {
        $path = storage_path('app/public/uploads/images');
        if (!empty($request->image)) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move($path, $filename);
            $request['file'] = 'public/uploads/images/' . $filename;
            $image = new Image();
            $image->image = $request['file'];
            $image->save();
        }
        return redirect()->back()->with('Success!', 'file saved');
    }

    public function delete(Request $request)
    {
        $file = Image::find($request->id);
        if ($file->image) {
            if (Storage::exists($file->image)) {
                Storage::delete($file->image);
            }
            $file->delete();
        }
        return redirect()->back()->with('Success!', 'file delete');
    }

    public function download(Request $request)
    {
        $file = Image::find($request->id);
        if ($file->image) {
            if (Storage::exists($file->image)) {
                return  Storage::download($file->image);
            }
        }
    }
}
