<div class="p-6 bg-white rounded-lg shadow">
    <div class="mb-10">
        <h1 class="text-2xl font-bold">Most Preferred Job Tags</h1>
        <hr class="h-px my-2 bg-gray-200 border-0">
    </div>
    <div class="flex items-end h-full">
        <livewire:livewire-column-chart key="{{ $prefJobTags->reactiveKey() }}" :column-chart-model="$prefJobTags" />
    </div>
</div>
