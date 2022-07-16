<?php

namespace App\Http\Livewire\customer;

use App\Models\user\Refund;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class AllRefunds extends PowerGridComponent
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
     * @return Builder<\App\Models\user\Refund>
     */
    public function datasource(): Builder
    {
        return Refund::query()->where('customer_id', auth()->user()->id);
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
            ->addColumn('id')
            ->addColumn('user_id')
            ->addColumn('rma_link', function (Refund $model) {
                return "<a href=" . route('customer.rma.show', ['rma' => $model->rma_id]) . ">Go to RMA</a>";
            })
            ->addColumn('customer_id')
            ->addColumn('amount')
            ->addColumn('method')
            ->addColumn('txid')
            ->addColumn('attachment_download', function (Refund $model) {
                return "<a href=" . asset('attachments/refunds') . '/' . $model->attachment . ">Download</a>";
            })
            ->addColumn('note')
            ->addColumn('created_at_formatted', fn (Refund $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
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
            Column::make('RMA', 'rma_link'),

            Column::make('AMOUNT', 'amount')
                ->sortable()
                ->searchable()
                ->makeInputRange(),

            Column::make('METHOD', 'method')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('TXID', 'txid')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('ATTACHMENT', 'attachment_download')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('NOTE', 'note')
                ->sortable()
                ->searchable(),

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
     * PowerGrid Refund Action Buttons.
     *
     * @return array<int, Button>
     */

    /*
    public function actions(): array
    {
       return [
           Button::make('edit', 'Edit')
               ->class('btn btn-primary btn-sm')
               ->route('refund.edit', ['refund' => 'id']),

           Button::make('destroy', 'Delete')
               ->class('btn btn-danger btn-sm')
               ->route('refund.destroy', ['refund' => 'id'])
               ->method('delete')
        ];
    }
    */

    /*

    public function onUpdatedEditable(string $id, string $field, string $value): void
    {
        Refund::query()->find($id)->update([
            $field => $value,
        ]);
    }

    public function onUpdatedToggleable(string $id, string $field, string $value): void
    {
        Refund::query()->find($id)->update([
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
     * PowerGrid Refund Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($refund) => $refund->id === 1)
                ->hide(),
        ];
    }
    */
}
