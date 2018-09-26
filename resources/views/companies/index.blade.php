    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Logo</th>
        <th>Name</th>
        <th>Description</th>
        <th>Capital</th>
        <th>Shares</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach($companies as $company)
      <tr>
        <td>{{$company['logo']}}</td>
        <td>{{$company['name']}}</td>
        <td>{{$company['description']}}</td>
        <td>{{$company['capital']}}</td>
        <td>{{$company['shares']}}</td>
        <td><a href="{{action('CompanyController@edit', $company['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
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
