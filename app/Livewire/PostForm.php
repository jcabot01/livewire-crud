<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostForm extends Component
{
    use WithFileUploads;

    public $isView = false;
    public $post = null;

    #[Validate('required', message: 'Post title is required')]
    #[Validate('min:3', message: 'Post title must be 3 chars long')]
    #[Validate('max:150', message: 'Post title must be 150 chars longs')]
    public $title;

    #[Validate('required', message: 'Post content is required')]
    #[Validate('min:10', message: 'Post content must be minimum 10 chars long')]
    public $content;

    #[Validate('required', message: 'Featured Image is required')]
    #[Validate('image', message: 'Featured Image must be a valid image')]
    #[Validate('mimes:jpg,jpeg,png,svg,bmp,webp,gif', message: 'Featured Imag accepts only jpg, jpeg, png, svg, bmp, webp, and gif')]
    #[Validate('max:2048', message: 'Featured Image must not be larger than 2MB')]
    public $featuredImage;


    public function mount(Post $post)
    {
        $this->isView = request()->routeIs('posts.view');

        if ($post->id) {
            $this->post = $post;
            $this->title = $post->title;
            $this->content = $post->content;
        }
    }

    public function savePost()
    {
        $this->validate();

        $imagePath = null;

        if ($this->featuredImage) {
            $imageName = time() . '.' . $this->featuredImage->extension();
            $imagePath = $this->featuredImage->storeAs('public/uploads', $imageName);
        }

        $post = Post::create([
            'title' => $this->title,
            'content' => $this->content,
            'featured_image' => $imagePath,
        ]);

        if ($post) {
            session()->flash('success', 'Post has been published successfully!');
        } else {
            session()->flash('error', 'Unable to create Post. Please try again.');
        }

        return $this->redirect('/posts', navigate: true); //navigage: true doesnt refresh the page.
    }

    public function render()
    {
        return view('livewire.post-form');
    }
}
