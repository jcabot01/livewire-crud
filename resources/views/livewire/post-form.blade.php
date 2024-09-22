<div class="container pt-5">
    <div class="row">
        <div class="col-8 m-auto">
            <form wire:submit="savePost">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-xl-6">
                                <h5 class="fw-bold">Create Post</h5>
                            </div>
                            <div class="col-xl-6 text-end">
                                <a wire:navigate href="{{ route('posts')}}" class="btn btn-primary btn-sm">Back to Posts</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <!-- Post Title -->
                        <div class="form-group mb-2">
                            <label for="title">Title<span class="text-danger">*</span></label>
                            <input type="text" wire:model="title" class="form-control" id="title" placeholder="Post Title">

                            @error('title')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Post Content -->
                        <div class="form-group mb-2">
                            <label for="content">Content<span class="text-danger">*</span></label>
                            <textarea class="form-control" wire:model="content" id="content" placeholder="Post Content"></textarea>

                            @error('content')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Post Featured Image -->
                        <div class="form-group mb-2">
                            <label for="featuredImage">Featured Image<span class="text-danger">*</span></label>
                            <input type="file" wire:model="featuredImage" class="form-control" id="featuredImage">

                            <!-- Preview Image  -->
                            @if ($featuredImage)
                            <div>
                                <img src="{{ $featuredImage->temporaryUrl() }}" alt="preview image" class="img-fluid" width="200px">
                            </div>
                            @endif

                            @error('featuredImage')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="form-group mb-2">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>