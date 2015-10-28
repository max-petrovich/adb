<?php

namespace App\Http\Controllers;

use App\Models\UserContacts;
use App\Models\UserLocation;
use App\Models\UserPassport;
use App\Models\UserSocialInfo;
use App\Models\UserWork;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\StoreClientRequest;
use JsValidator;
use Session;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = User::with('contacts')->get();

        return view('client.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        $client = User::create($request->all());

        $client->contacts()->save(new UserContacts($request->get('contacts')));
        $client->location()->save(new UserLocation($request->get('location')));
        $client->passport()->save(new UserPassport($request->get('passport')));
        $client->socialInfo()->save(new UserSocialInfo($request->get('socialInfo')));
        $client->work()->save(new UserWork($request->get('work')));

        return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = User::eagerLoadAll()->findOrFail($id);

        return view('client.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $client = User::eagerLoadAll()->findOrFail($id);

        return view('client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreClientRequest $request, $id)
    {
        $client = User::findOrFail($id);

        $client->fill($request->all());

        $client->contacts->fill($request->get('contacts'));
        $client->location->fill($request->get('location'));
        $client->passport->fill($request->get('passport'));
        $client->socialInfo->fill($request->get('socialInfo'));
        $client->work->fill($request->get('work'));

        $client->push();


        Session::flash('flash_message', 'Информация клиента успешно обновлена!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = User::findOrFail($id);
        $client->delete();

        Session::flash('flash_message', 'Клиент успешно удалён!');

        return redirect()->route('client.index');
    }
}
