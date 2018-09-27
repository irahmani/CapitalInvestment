<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Company;
use App\Repositories\CompanyRepository;

class CompanyController extends Controller {
    /**
     * The Company repository instance
     *
     * @var CompanyRepository
     */
    protected $companies;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
        $this->companies = new CompanyRepository();
    }
    /**
     * Display a list of all companies.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $companies = $this->companies->getAll();

        return view('companies.index', compact('companies'));
    }

    /**
     * Create a new Company.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->companies->create($request->all());
        return redirect('/companies');
    }
    /**
     * Display an Company
     *
     * @param type $id
     * @return type
     */
    public function show($id) {
        $Company = $this->companies->find($id);
        return view('companies.show', compact('Company'));
    }

    /**
     * Update an Company.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->companies->update($request->all(), $id);
        return redirect('/companies');
    }
    /**
     * Delete an Company
     *
     * @param type $id
     * @return \Illuminate\Http\Response
     */
    public function destory($id) {
        $this->companies->delete($id);
        return redirect('/companies');
    }
}
