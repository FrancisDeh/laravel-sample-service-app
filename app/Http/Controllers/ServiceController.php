<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
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
        $services = Service::all();

        return view('pages.services')->withServices($services);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedValues = request()->validate(
            [
                'name' => 'required|string|unique:services,name',
                'description' => 'required|string'
            ]
        );

        Service::create($validatedValues);

        $this->success("Service created successfully");

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
        $service = Service::find($id);

        //validate request based on the name of the service
        //if service name has not changed, do not check for uniqueness of
        //name in the database
        //if name has changed, ensure the service name is not already taken

        if($request['name'] == $service->name) {
            $validatedValues = request()->validate(
                [
                    'name' => 'required|string',
                    'description' => 'required|string'
                ]
            );
        } else {
            $validatedValues = request()->validate(
                [
                    'name' => 'required|string|unique:services,name',
                    'description' => 'required|string'
                ]
            );
        }

        //update service
        $service->update($validatedValues);

        $this->success("Service successfully updated.");
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
        $service = Service::find($id);

        //if service has users, send error message, prevent delete
        if($service->service_user->count()) {
            session()->flash('error', "You cannot delete a service that has users.");
            return back();
        }

        //delete the service
        $service->delete();


        $this->success("Service deleted successfully.");
        return back();
    }
}
