<div class="bg-white shadow rounded-lg p-6">
    <div class="mb-10">
        <h1 class="text-2xl font-bold">Most Preferred Industries</h1>
        <hr class="h-px my-2 bg-gray-200 border-0">
    </div>
    <div class="flex h-full items-end">
        <livewire:livewire-column-chart key="{{ $industries_chart->reactiveKey() }}" :column-chart-model="$industries_chart" />
    </div>
</div>