<?php

namespace App\Http\Livewire\user;

use App\Models\user\Warehouse;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class AllWarehouse extends PowerGridComponent
{
    use ActionButton;

    public $name;
    public $location;


    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        $this->showCheckBox();

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

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
     * PowerGrid datasource.
     *
     * @return Builder<\App\Models\user\Warehouse>
     */
    public function datasource(): Builder
    {
        return Warehouse::query();
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('name')
            ->addColumn('location')
            ->addColumn('status')
            ->addColumn('created_at_formatted', fn (Warehouse $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
            ->addColumn('updated_at_formatted', fn (Warehouse $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'));
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

    /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::make('NAME', 'name')
                ->sortable()
                ->editOnClick()
                ->searchable()
                ->makeInputText(),

            Column::make('LOCATION', 'location')
                ->sortable()
                ->editOnClick()
                ->searchable()
                ->makeInputText(),

            Column::make('STATUS', 'status')
                ->toggleable(),

            Column::make('CREATED AT', 'created_at_formatted', 'created_at')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker(),

        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

    /**
     * PowerGrid Warehouse Action Buttons.
     *
     * @return array<int, Button>
     */


    public function actions(): array
    {
        return [
            //    Button::make('edit', 'Edit')
            //        ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
            //        ->route('warehouse.edit', ['warehouse' => 'id']),

            Button::make('destroy', 'Delete')
                ->class('btn btn-primary btn-sm')
                ->emit('deleteWarehouse', ['warehouse' => 'id'])
        ];
    }

    public function header(): array
    {
        return [
            Button::add('mark-as-active')
                ->caption(__('Active'))
                ->class('btn btn-primary btn-sm')
                ->emit('bulkStatusEvent', []),
            Button::add('mark-as-inactive')
                ->caption(__('Inactive'))
                ->class('btn btn-primary btn-sm')
                ->emit('bulkInActiveStatusEvent', [])
        ];
    }

    public function onUpdatedEditable($id, $field, $value): void
    {
        $this->validate();
        Warehouse::query()->find($id)->update([
            $field => $value,
        ]);
    }


    public function bulkStatusEvent($ids)
    {
        foreach ($this->checkboxValues as $row) {
            $warehouse = Warehouse::find($row);
            $warehouse->status = true;
            $warehouse->save();
        }
        $this->dispatchBrowserEvent('showAlert', ['message' => 'All Selected Warehouses are now Active']);
    }

    public function bulkInActiveStatusEvent($ids)
    {
        foreach ($this->checkboxValues as $row) {
            $warehouse = Warehouse::find($row);
            $warehouse->status = false;
            $warehouse->save();
        }
        $this->dispatchBrowserEvent('showAlert', ['message' => 'All Selected Warehouses are now InActive']);
    }

    protected function getListeners()
    {
        return array_merge(
            parent::getListeners(),
            [
                'deleteWarehouse',
                'bulkStatusEvent',
                'bulkInActiveStatusEvent',
            ]
        );
    }

    public function deleteWarehouse($warehouse)
    {
        dd($warehouse);
    }



    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid Warehouse Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($warehouse) => $warehouse->id === 1)
                ->hide(),
        ];
    }
    */
}
