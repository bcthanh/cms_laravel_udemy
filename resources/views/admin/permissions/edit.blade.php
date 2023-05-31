<x-admin-master>
    @section('content')
        <div class="row">
            <div class="col-sm-12">
            @if(session()->has('permission-updated'))
            <div class="alert alert-success">
                {{session('permission-updated')}}
            </div>
            @endif
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <h1>Edit Permission: {{$permission->name}}</h1>
        
        <form method="post" action="{{route('permission.update', $permission->id)}}">
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
                       value="{{$permission->name}}"

                >
            </div>
            

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
            </div>
        </div>
        
       


    @endsection
</x-admin-master>