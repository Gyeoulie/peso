<div class="bg-white shadow rounded-lg p-6">
    <div class="mb-10">
        <h1 class="text-2xl font-bold">Most Preferred Job Tags</h1>
        <hr class="h-px my-2 bg-gray-200 border-0">
    </div>
    <div class="flex h-full items-end">
        <livewire:livewire-column-chart key="{{ $prefJobTags->reactiveKey() }}" :column-chart-model="$prefJobTags" />
    </div>
</div>
