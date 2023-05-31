<x-home-master>

    @section('content')
        <!-- Title -->
            <h1 class="mt-4">{{$post->title}}</h1>

            <!-- Author -->
            <p class="lead">
                by
                <a href="#">{{$post->user->name}}</a>
            </p>

            <hr>

            <!-- Date/Time -->
            <p>Posted on {{$post->created_at->diffForHumans()}} </p>

            <hr>

            <!-- Preview Image -->
            <img class="img-fluid rounded" src="{{$post->post_image}}" alt="">

            <hr>

            <!-- Post Content -->
            <p>{{$post->body}}</p>

            <hr>

            <!-- Comments Form -->
            <div class="card my-4">
                <h5 class="card-header">Leave a Comment:</h5>
                <div class="card-body">
                    <form method="post" action="{{route('comment.store', $post)}}">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="body"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

           
            

            <!-- Comment with nested comments -->
            @foreach ($post->comments as $comment)
            <div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                    <h5 class="mt-0">{{$comment->author}}</h5>
                    {{$comment->body}}
                        
                    {{-- form cho reply --}}
                    <button type="button" class="btn btn-primary showreplyform">Reply</button>
                    <form action="{{route('comment.reply.store')}}" method='post' class="replyform hide">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="comment_id" value="{{$comment->id}}" id="">
                        <div class="form-group">
                            <textarea class="form-control" rows="1" name="body"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Reply</button>
                    </form>
                    @foreach ($comment->replies as $reply)
                    <div class="media mt-4">
                        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                        <div class="media-body">
                            <h5 class="mt-0">{{$reply->author}}</h5>
                            {{$reply->body}}
                        </div>
                    </div>
                    @endforeach
                    
                    

                </div>
            </div>
            @endforeach
            



        @endsection

        @section('script')
            <script>
                let replyButtons = document.querySelectorAll('.showreplyform');
                console.log(replyButtons);
                replyButtons.forEach( replyBt => replyBt.addEventListener('click', ()=>{
                    // alert("Thanh");
                    //tim form gan nhat va hien thi len
                    console.log(replyBt.closest('.media-body').querySelector('.replyform'));
                }))
            </script>
        @endsection
</x-home-master>