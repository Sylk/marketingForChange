<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = DB::table('companies')->paginate(10);

        return view('companies.index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required|string',
            'email' => 'email',
            'logo' => 'dimensions:min_width=100,min_height=100',
            'website' => 'url'
        ]);

        Storage::put('photos', new File('storage/app/public'));

        /** @var Company $company */
        $company = Company::firstOrCreate();

        $company->save();

        return view('companies.show')->with('message', 'Company created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::where('id',$id)->firstOrFail();

        return view('companies.edit')->with('company', $company);
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
        $input = $request->validate([
            'name' => 'required|string',
            'email' => 'email',
            'logo' => 'dimensions:min_width=100,min_height=100',
            'website' => 'url'
        ]);

        Storage::put('photos', new File('storage/app/public'));

        /** @var Company $company */
        $company = Company::where($input->id)->firstOrFail();

        $company->save();

        return view('companies.show')->with('message', 'Company updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//      TODO: Collect employees and then purge them alongside the company
        Company::destroy($id);

        return view('companies.index');
    }
}
