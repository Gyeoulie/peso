<?php

namespace App\Livewire;

use App\Models\Job_Positions;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Support\Carbon;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\PowerGridFields;

final class JobPositions extends PowerGridComponent
{
    public string $primaryKey = 'job_positions.position_id';
    public string $sortField = 'job_positions.position_id';
    public function datasource(): Builder
    {
        return Job_Positions::query();
    }

    public function setUp(): array
    {

        return [
            // Exportable::make('export')
            //     ->striped()
            //     ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            //Header::action('Action'),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('position_Title')
            ->add('position_Code')
            ->add('created_at', function ($entry) {
                return Carbon::parse($entry->created_at)->format('d/m/Y');
            });
    }

    public function columns(): array
    {
        return [
            Column::make('Position Code', 'position_Code')
                ->searchable()
                ->sortable(),

            Column::make('Title', 'position_Title')
                ->searchable()
                ->sortable(),

            Column::make('Created', 'created_at'),

        ];
    }
}
