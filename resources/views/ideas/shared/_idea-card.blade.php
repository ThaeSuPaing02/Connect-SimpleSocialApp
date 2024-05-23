<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="{{$idea->user->getImageURL()}}" alt="{{$idea->user->name}}">
                <div>
                    <h5 class="card-title mb-0"><a href="{{route('users.show',$idea->user->id)}}"> {{$idea->user->name}}
                        </a></h5>
                </div>
            </div>
            <div class="d-flex">
                <a href="{{route('idea.show',$idea->id)}}">view</a>
                @auth
                    @can('update',$idea)
                        <a href="{{route('idea.edit',$idea->id)}}" class="ms-1">edit</a>
                        <form action="{{route('idea.destroy',$idea->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm ms-1">X</button>
                        </form>
                    @endcan
                @endauth

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
            @include('ideas.shared._like-button')
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{$idea->created_at->diffForHumans()}}</span>
            </div>
        </div>
        @include('shared._comment-box')
    </div>
</div>
