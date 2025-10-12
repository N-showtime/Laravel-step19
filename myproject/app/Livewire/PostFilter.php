<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostFilter extends Component
{
    public $search = '';
    public function render()
    {
        $posts = Post::query()->when($this->search, fn($q) => $q->where('title', 'like', '%' . $this->search . '%')->orWhere('body', 'like', '%' . $this->search . '%'))->get();


        // $query = Post::query();
        // if(!empty($this->search)) {
        //     $query->where('title', 'like', '%' . $this->search . '%');
        // }
        // $posts = $query->get();
        return view('livewire.post-filter', compact('posts'));
    }
}
