<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ArticleIndex extends Component
{

    public $chunks = [];
    public $page   = 1;

    public function mount(): void
    {
        $this->chunks = Article::latest()
            ->pluck('id')
            ->chunk(10)
            ->toArray();

        ray($this->chunks);
    }

    public function loadMore()
    {
        return $this->page++;
    }

    public function hasMorePages(): bool
    {
        return count($this->chunks) > $this->page;
    }

    public function render(): View
    {
        return view('livewire.article-index');
    }
}
