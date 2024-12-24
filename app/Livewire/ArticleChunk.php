<?php

namespace App\Livewire;

use Livewire\Component;

class ArticleChunk extends Component
{
    public array $ids = [];

    public function render()
    {
        if (empty($this->ids)) {
            return view('livewire.article-chunk', ['articles' => collect()]);
        }

        $orderByCase = 'CASE id ' .
            collect($this->ids)
            ->map(fn($id, $index) => "WHEN ? THEN ? ")
            ->join('') .
            'END';

        $bindings = collect($this->ids)
            ->flatMap(fn($id, $index) => [$id, $index])
            ->all();

        return view('livewire.article-chunk', [
            'articles' => \App\Models\Article::whereIn('id', $this->ids)
                ->orderByRaw($orderByCase, $bindings)
                ->get()
        ]);
    }
}
