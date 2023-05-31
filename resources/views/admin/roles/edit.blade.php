<x-admin-master>
    @section('content')
        <div class="row">
            <div class="col-sm-12">
            @if(session()->has('role-updated'))
            <div class="alert alert-success">
                {{session('role-updated')}}
            </div>
            @endif
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <h1>Edit Role: {{$role->name}}</h1>
        
        <form method="post" action="{{route('role.update', $role->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text"
                       name="name"
                       class="form-control"
                       id="name"
                       aria-describedby=""
                       placeholder="Enter Role Name"
                       value="{{$role->name}}"

                >
            </div>
            

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Permissions</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                        <th>Options</th>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Slug</th>   
                            <td>Attach</td>
                            <td>Detach</td>
                        </tr>

                   </thead>
                        <tfoot>
                        <tr>
                        <th>Options</th>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Slug</th>    
                            <td>Attach</td>
                            <td>Detach</td>
                        </tr>
                        </tfoot>
                        <tbody>
@foreach ($permissions as $permission)
    <tr>
        <td><input type="checkbox" @if($role->permissions->contains($permission))
                    checked
                    @endif
                    disabled /></td>
      <td>{{$permission->id}}</td>
      <td>{{$permission->name}}</td>
      <td>{{$permission->slug}}</td>
      <td>
                    <form method="post" action="{{route('role.permission.attach', $role)}}">
                      @csrf
                      @method('PUT')
                      <input type="hidden" value="{{$permission->id}}" name="permission" />
                      <button type="submit" class="btn btn-success" @if($role->permissions->contains($permission))
                        disabled
                        @endif

                        >Attach</button>
                    </form>
                  </td>
                  <td>
                    <form method="post" action="{{route('role.permission.detach', $role)}}">
                      @csrf
                      @method('PUT')
                      <input type="hidden" value="{{$permission->id}}" name="permission" />
                      <button type="submit" class="btn btn-danger" @if(!$role->permissions->contains($permission))
                        disabled
                        @endif
                        >Detach</button>
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