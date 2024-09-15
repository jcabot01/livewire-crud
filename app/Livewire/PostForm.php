<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;

class PostForm extends Component
{
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


    public function savePost()
    {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.post-form');
    }
}
