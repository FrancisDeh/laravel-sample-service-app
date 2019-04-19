<?php

namespace App\Http\Controllers;

use App\Service;
use App\ServiceUser;
use Illuminate\Http\Request;

class ServiceUserController extends Controller
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
        $serviceUsers = ServiceUser::all();
        $services = Service::all();
        return view('pages.service_users')->with(
            [
                'serviceUsers' => $serviceUsers,
                'services' => $services
            ]
        );
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
                'name' => 'required|string',
                'email' => 'required|string|unique:service_users,email',
                'tel' => 'required|digits:10',
                'service_id' => 'required|integer'
            ]
        );

        ServiceUser::create($validatedValues);
        $this->success("Service User successfully created.");
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
        //validate request based on the email of the service user
        //if service user's email has not changed, do not check for uniqueness of
        //email in the database
        //if email has changed, ensure the service user's email is not already taken
        $serviceUser = ServiceUser::find($id);

        if($request['email'] == $serviceUser->email) {
            $validatedValues = request()->validate(
                [
                    'name' => 'required|string',
                    'email' => 'required|string',
                    'tel' => 'required|digits:10',
                    'service_id' => 'required|integer'
                ]
            );
        } else {
            $validatedValues = request()->validate(
                [
                    'name' => 'required|string',
                    'email' => 'required|string|unique:service_users,email',
                    'tel' => 'required|digits:10',
                    'service_id' => 'required|integer'
                ]
            );
        }

        $serviceUser->update($validatedValues);
        $this->success("Service user updated successfully");
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
        ServiceUser::find($id)->delete();
        $this->success("Service User successfully deleted.");
        return back();
    }

    public function exportUsersToExcel() {
        $serviceUser = ServiceUser::all();
        $csvExporter = new \Laracsv\Export();

        // Register the hook before building
        $csvExporter->beforeEach(function ($user) {

            $user->service_id = $user->service->name;
        });

        $csvExporter->build($serviceUser, ['name' => 'Full Name', 'email' => 'Email', 'tel' => 'Telephone', 'service_id' => 'Service Name', 'created_at' => 'Created' ])->download();
    }

    public function exportUsersToPdf() {
        return view('pages.pdf')->withServiceUsers(ServiceUser::all());
    }

}
