<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Applications') }}
        </h2>
    </x-slot>

    @livewire('employer.jobpost.jobpost-application')




    @livewire('employer.jobpost.job-positions-modal')
    @livewire('employer.jobpost.industry-modal')





</x-app-layout>
