<x-admin-master>
  @section('content')
  <h1>Categories</h1>
  <div class="row">
    <div class="col-sm-12">
      @if(session()->has('cat-deleted'))
      <div class="alert alert-danger">
        {{session('cat-deleted')}}
      </div>
      @endif
      @if(session()->has('cat-inserted'))
      <div class="alert alert-success">
        {{session('cat-inserted')}}
      </div>
      @endif
    </div>
  </div>
  <div class="row">
    
    <div class="col-sm-3">
      <form method="post" action="{{route('cat.store')}}">
        @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input id="name" name="name" 
          class="form-control @error('name') is-invalid @enderror" type="text">
          <div>
            @error('name')
              <span><strong>{{$message}}</strong></span>
            @enderror
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Save</button>
      </form>
    </div>
    <div class="col-sm-9">
      <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Slug</th>   
                            <th>Delete</th>
                        </tr>

                   </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Slug</th>  
                            <th>Delete</th>
                        </tr>
                        </tfoot>
                        <tbody>
@foreach ($cats as $cat)
    <tr>
      <td>{{$cat->id}}</td>
      <td><a href="{{route('cat.edit', $cat)}}">{{$cat->name}}</a></td>
      <td>{{$cat->slug}}</td>
      <td>
        <form action="{{route('cat.destroy', $cat)}}" method="post">
          @csrf
          @method("DELETE")
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </td>
    </tr>
@endforeach
                       


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  </div>
  @endsection
</x-admin-master>