<div class="space-y-6">
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

    @for($chunk = 0; $chunk < $page; $chunk ++)
       <livewire:article-chunk :ids="$chunks[$chunk]" :key="$chunk" />
    @endfor

    @if ($this->hasMorePages())
        <button wire:click="loadMore()">
            load more
        </button>
    @endif

</div>
