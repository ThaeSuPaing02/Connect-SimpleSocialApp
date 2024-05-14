<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form action="{{route('users.update',$user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                        src="{{$user->getImageURL()}}" alt="Mario Avatar">
                    <div>
                        @if($editing ?? false)
                            <input type="text" name="name" class="form-control" value="{{$user->name}}">
                            @error('name')
                                <span class="text-danger fs-6"> {{$message}} </span>
                            @enderror
                        @endif
                    </div>
                </div>
                <div class="">
                    @auth()
                        @if(auth()->id() === $user->id)
                            <a href="{{route('users.show',$user->id)}}">View</a>
                        @endif
                    @endauth
                </div>
            </div>
                <div class="mt-3">
                    <label for="">Profile Picture</label>
                    <input type="file" name="image" class="form-control">
                </div>
            <div class="px-2 mt-4">
                <h5 class="fs-5"> Bio : </h5>
                        <div class="mb-3">
                            <textarea class="form-control" id="bio" rows="3" name="bio"></textarea>
                            @error('bio')
                                    <span class="d-block fs-6 text-danger mt-2">{{$message}}</span>
                            @enderror
                        </div>
                        <button class="btn btn-sm btn-dark mb-3">Save</button>
                        @include('users.shared._user-stats')
            </div>
        </form>
    </div>
</div>
<hr>
