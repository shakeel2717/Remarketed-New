<?php

namespace App\Http\Livewire\customer;

use App\Models\user\Inventory;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class AllInventories extends PowerGridComponent
{
    use ActionButton;


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
     * @return Builder<\App\Models\user\Inventory>
     */
    public function datasource(): Builder
    {
        return Inventory::query()->where('customer_id', auth()->user()->id)
            ->join('reasons', 'reasons.id', '=', 'inventories.reason_id')
            ->select('inventories.*', 'reasons.value as reason_name');
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
            ->addColumn('serial')
            ->addColumn('model')
            ->addColumn('issue')
            ->addColumn('rma_link', function (Inventory $inventory) {
                return "RMA#: {$inventory->rma_id}";
            })
            ->addColumn('price')
            ->addColumn('attachment_download', function (Inventory $model) {
                return "<img src='" . asset('attachments/') . '/' . $model->attachment . "' alt='Download' width='50'>";
            })
            ->addColumn('reason_id')
            ->addColumn('created_at_formatted', fn (Inventory $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
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
            Column::make('SERIAL', 'serial')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('MODEL', 'model')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('ISSUE', 'issue')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('RMA', 'rma_link'),

            Column::make('PRICE', 'price')
                ->sortable()
                ->searchable()
                ->makeInputRange(),

            Column::make('ATTACHMENT', 'attachment_download')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('REASON', 'reason_name')
                ->makeInputRange(),

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
     * PowerGrid Inventory Action Buttons.
     *
     * @return array<int, Button>
     */

    /*
    public function actions(): array
    {
       return [
           Button::make('edit', 'Edit')
               ->class('btn btn-primary btn-sm')
               ->route('inventory.edit', ['inventory' => 'id']),

           Button::make('destroy', 'Delete')
               ->class('btn btn-danger btn-sm')
               ->route('inventory.destroy', ['inventory' => 'id'])
               ->method('delete')
        ];
    }
    */

    /*

    public function onUpdatedEditable(string $id, string $field, string $value): void
    {
        Inventory::query()->find($id)->update([
            $field => $value,
        ]);
    }

    public function onUpdatedToggleable(string $id, string $field, string $value): void
    {
        Inventory::query()->find($id)->update([
            $field => $value,
        ]);
    }

    */

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid Inventory Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($inventory) => $inventory->id === 1)
                ->hide(),
        ];
    }
    */
}
