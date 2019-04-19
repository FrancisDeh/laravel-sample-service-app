<?php

namespace App\Http\Controllers;

use App\FileUpload;
use FontLib\EOT\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    private function success($message) {
        session()->flash("success", $message);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = FileUpload::all();
        return view('pages.file_uploads')->withFiles($files);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        request()->validate(
            [
                'file' => 'required|file',
                'name' => 'required|string|unique:file_uploads,name'
            ]
        );

        //variables to hold path of file and the file format
        $path = null;
        $format = null;

        if($request->hasFile('file')){
            $format = $request->file('file')->getClientOriginalExtension();
            $path = $request->file('file')->store('public/uploads');
        }

        FileUpload::create(
            [
                'name' => ucwords($request['name']),
                'format' => $format,
                'url' => $path
            ]
        );

        $this->success("File successfully uploaded");
        return back();
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate request based on the name of the file
        //if file name has not changed, do not check for uniqueness of
        //name in the database
        //if name has changed, ensure the name is not already taken


        $file = FileUpload::find($id);

        if($file->name == $request['name']) {
            request()->validate(
                [
                    'file' => 'required|file',
                    'name' => 'required|string'
                ]
            );
        } else {
            request()->validate(
                [
                    'file' => 'required|file',
                    'name' => 'required|string|unique:file_uploads,name'
                ]
            );
        }

        //variables to hold path of file and the file format
        $path = null;
        $format = null;

        if($request->hasFile('file')){

            //delete old file from disk
            $this->deleteFile($file);

            //save new file
            $format = $request->file('file')->getClientOriginalExtension();
            $path = $request->file('file')->store('public/uploads');
        }

        //if no file was uploaded, update the file info with the current database info
        $file->update(
            [
                'name' => ucwords($request['name']),
                'format' => $format == null ? $file->format : $format,
                'url' => $path == null ? $file->url : $path
            ]
        );

        $this->success("File successfully updated");
        return back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = FileUpload::find($id);

        //delete file from disk
        $this->deleteFile($file);

        //delete the database record
        $file->delete();

        $this->success("File successfully deleted.");
        return back();
    }

    private function deleteFile(FileUpload $file) {
        //if file url is not null and the file really exist, delete it
        if ($file->url != null && Storage::disk('local')->exists($file->url)) {
            if (!Storage::disk('local')->delete($file->url)) {

                session()->flash('error', 'An error occurred in deleting data. Please try again');
                return redirect()->back();
            }

            return true;
        }

        return false;
    }
}
