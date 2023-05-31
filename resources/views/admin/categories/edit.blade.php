<x-admin-master>
    @section('content')
        <div class="row">
            <div class="col-sm-12">
            @if(session()->has('cat-updated'))
            <div class="alert alert-success">
                {{session('cat-updated')}}
            </div>
            @endif
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <h1>Edit cat: {{$cat->name}}</h1>
        
                <form method="post" action="{{route('cat.update', $cat->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text"
                            name="name"
                            class="form-control"
                            id="name"
                            aria-describedby=""
                            placeholder="Enter Category Name"
                            value="{{$cat->name}}"

                        >
                    </div>
                    

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    @endsection
</x-admin-master>