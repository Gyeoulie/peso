<?php

namespace App\Livewire;

use App\Models\Province as ModelsProvince;
use Illuminate\Contracts\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\PowerGridFields;

final class Province extends PowerGridComponent
{

    public string $primaryKey = 'province.province_id';
    public string $sortField = 'province.province_id';
    public function datasource(): Builder
    {
        return ModelsProvince::query();
    }

    public function setUp(): array
    {

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('province_Name')
            ->add('province_Code')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Name', 'province_Name')
                ->searchable()
                ->sortable(),

            Column::make('Price', 'province_Code')
                ->sortable(),

            Column::make('Created', 'created_at'),

            Column::action('Action'),
        ];
    }

 
}
