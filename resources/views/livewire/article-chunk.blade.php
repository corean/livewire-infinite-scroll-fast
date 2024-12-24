<div class="space-y-6">
    @foreach ($articles as $article)
        <div wire:key="{{ $article->id }}">
            <h2 class="text-xl font-bold">#{{ $article->id }} {{ $article->title }}</h2>
            <p class="text-gray-500">{{ $article->teaser }}</p>
        </div>
    @endforeach
</div>
