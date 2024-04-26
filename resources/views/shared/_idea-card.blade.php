<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed={{$idea->user->name}}" alt="{{$idea->user->name}}">
                <div>
                    <h5 class="card-title mb-0"><a href="#"> {{$idea->user->name}}
                        </a></h5>
                </div>
            </div>
            <div class="">
                <form action="{{route('idea.destroy',$idea->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <a href="{{route('idea.show',$idea->id)}}">view</a>
                    @if (auth()->id() == $idea->user->id)

                    <a href="{{route('idea.edit',$idea->id)}}" class="ms-1">edit</a>
                    <button class="btn btn-danger btn-sm ms-1">X</button>
                    @endif
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)
            <form action="{{route('idea.update',$idea->id)}}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea class="form-control" id="content" rows="3" name="content">{{$idea->content}}</textarea>
                    @error('idea')
                        <span class="d-block fs-6 text-danger mt-2">{{$message}}</span>
                    @enderror
                </div>
                <div class="">
                    <button class="btn btn-dark mb-2" type="submit"> Update </button>
                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{$idea->content}}
            </p>
        @endif

        <div class="d-flex justify-content-between">
            <div>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{$idea->likes}} </a>
            </div>
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{$idea->created_at}}</span>
            </div>
        </div>
        @include('shared._comment-box')
    </div>
</div>
