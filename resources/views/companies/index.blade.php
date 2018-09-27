@extends('layouts.app')

@section('content')

    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif

     <a class="btn btn-primary mb-3" href="/companies/create">Add new company</a>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Logo</th>
        <th>Name</th>
        <th>VAT</th>
        <th>Capital</th>
        <th>Owner</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach($companies as $company)
      <tr valign="middle">
        <td class="align-middle"><img src="{{$company['logo']}}" alt="" width="50" height="50" /></td>
        <td class="align-middle">{{$company['name']}}</td>
        <td class="align-middle">{{$company['vat']}}</td>
        <td class="align-middle text-right">kr. {{$company['capital']}}</td>
        <td class="align-middle text-center">{{$company['owner_id']}} %</td>
        <td class="align-middle"><a href="{{action('CompanyController@edit', $company['id'])}}" class="btn btn-warning">Edit</a></td>
        <td class="align-middle">
          <form action="{{action('CompanyController@destroy', $company['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endsection