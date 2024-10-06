<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination, WithoutUrlPagination;

    #[Title('Posts List')]

    public function render()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(5);
        return view('livewire.post-list', compact('posts'));
    }

    public function deletePost(Post $post)
    {
        if ($post) {

            //delete stored image
            if (Storage::exists($post->featured_image)) {
                Storage::delete($post->featured_image);
            }

            $deleteResponse = $post->delete();

            if ($deleteResponse) {
                session()->flash('success', 'Post deleted successfully.');
            } else {
                session()->flash('error', 'Unable to delete Post.  Try again later.');
            }
        } else {
            session()->flash('error', 'Post not found.');
        }

        return $this->redirect('/posts', navigate: true);
    }
}
