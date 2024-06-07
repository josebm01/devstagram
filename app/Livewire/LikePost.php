<?php

namespace App\Livewire;

use Livewire\Component;

class LikePost extends Component
{

    public $post;
    public $isLiked;
    public $likes;

    public function mount( $post )
    {
        $this->isLiked = $post->checkLike( auth()->user() );
        $this->likes = $post->likes->count();
    }

    public function click()
    {

        // se actualizan los valores en base al cambio que se haga en la vista

        $post = $this->post;

        if ( $post->checkLike(auth()->user()) ) {
            $post->likes()->where('post_id', $post->id)->delete();
            $this->isLiked = false;
            $this->likes--;
        } else {
            $post->likes()->create([
                'user_id' => auth()->user()->id
            ]);
            $this->isLiked = true;
            $this->likes++;
        }

    }

    public function render()
    {
        return view('livewire.like-post');
    }
}
