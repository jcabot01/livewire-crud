<div class="container my-3">
    <div class="row border-bottom py-2">
        <div class="col-xl-11">
            <h4 class="text-center fw-bold">CRUD App with Livewire3.5 + Laravel 11 + Bootstrap</h4>
        </div>

        <div class="col-xl-1">
            <a wire:navigate href="{{ route('posts.create') }}" class="btn btn-primary btn-sm">Add Post</a>
        </div>
    </div>

    <!-- Alert Component -->
    <div class="my-2">
        @if (session('success'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            {{ session('success')}}
        </div>
        @elseif (session('error'))
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            {{ session('error')}}
        </div>
        @endif
    </div>

    <!-- Table Component -->
    <div class="card shadow">
        <div class="table-responsive">
            <table class="table table-striped">

                <thead>
                    <th>#</th>
                    <th>Featured Image</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Date</th>
                    <th>Actions</th>
                </thead>

                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><img src="{{ Storage::url($post->featured_image) }}" alt="" class="img-fluid" width="200px"></td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->content}}</td>
                        <td>
                            <p><small><strong>Posted:</strong> {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</small></p>
                            <p><small><strong>Updated:</strong> {{ \Carbon\Carbon::parse($post->updated_at)->diffForHumans()}}</small></p>
                        </td>
                        <td>
                            <a href="" class="btn btn-success btn-sm">Edit</a>
                            <button type="button" class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>