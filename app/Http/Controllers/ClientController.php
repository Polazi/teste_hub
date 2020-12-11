<?php

namespace App\Http\Controllers;

use App\Client;
use App\Exports\ClientsExport;
use App\Http\Requests\StoreClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('export')) {
            return Excel::download(new ClientsExport(), 'Relatório_clientes.xlsx');
        }

        $clients = Client::select('id', 'name', 'instalation_address', 'speed')->paginate();

        return view('client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = new Client();
        $action = URL::route('client.store');
        $method = 'POST';

        return view('client/create-edit', compact(
            'action',
            'method',
            'client'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClient $request)
    {
        try{
            $client = new Client($request->all());
            $client->save();
        }catch(\Exception $e){
            return back()->with('toast_error', $e->getMessage())->withInput();
        }

        return redirect()->to('client')->withToastSuccess('Cliente criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $action = URL::route('client.update', ['client' => $client->id]);
        $method = 'PUT';

        return view('client/create-edit', compact(
            'action',
            'method',
            'client'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(StoreClient $request, Client $client)
    {
        try{
            $client->fill($request->all());
            $client->save();
        }catch(\Exception $e){
            return back()->with('toast_error', $e->getMessage())->withInput();
        }

        return redirect()->to('client')->withToastSuccess('Cliente atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        try{
            $client->delete();
        }catch(\Exception $e){
            return back()->with('toast_error', $e->getMessage())->withInput();
        }

        return redirect()->to('client')->withToastSuccess('Cliente deletado com sucesso');
    }
}
