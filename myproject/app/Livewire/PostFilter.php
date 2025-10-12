<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostFilter extends Component
{
    public function render()
    {
        $posts = Post::all();
        return view('livewire.post-filter', compact('posts'));
    }
}
