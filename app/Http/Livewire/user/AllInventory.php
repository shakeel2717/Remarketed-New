<?php

namespace App\Http\Livewire\user;

use App\Models\user\Inventory;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class AllInventory extends PowerGridComponent
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
        return Inventory::query();
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
            ->addColumn('customer_id')
            ->addColumn('serial')
            ->addColumn('model')
            ->addColumn('issue')
            ->addColumn('rma_id')
            ->addColumn('price_format', function (Inventory $model) {
                return number_format($model->price, 2);
            })
            ->addColumn('attachment_link', function (Inventory $model) {
                if ($model->attachment != 'default.jpg') {
                    return "<a href=" . asset('attachments/') . "/" . $model->attachment . " >Download</a>";
                } else {
                    return "No Attachment";
                }
            })
            ->addColumn('reason_id')
            ->addColumn('status_badge', function (Inventory $model) {
                switch ($model->status) {
                    case 'approved':
                        return "<span class='badge badge-primary text-uppercase'>" . $model->status . "</span>";
                        break;

                    case 'pending':
                        return "<span class='badge badge-info text-uppercase'>" . $model->status . "</span>";
                        break;

                    case 'rejected':
                        return "<span class='badge badge-danger text-uppercase'>" . $model->status . "</span>";
                        break;

                    default:
                        # code...
                        break;
                }
            })
            ->addColumn('added_by')
            ->addColumn('created_at_formatted', fn (Inventory $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
            ->addColumn('updated_at_formatted', fn (Inventory $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'));
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
            Column::make('SERIAL', 'serial'),

            Column::make('MODEL', 'model'),

            Column::make('ISSUE', 'issue'),

            Column::make('Reason', 'reason_id'),

            Column::make('PRICE', 'price_format'),

            Column::make('ATTACHMENT', 'attachment_link'),

            Column::make('STATUS', 'status')
                ->bodyAttribute('text-primary text-uppercase'),

            Column::make('CREATED AT', 'created_at_formatted', 'created_at'),

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

    public function header(): array
    {
        return [
            Button::add('mark-as-approved')
                ->caption(__('Approved'))
                ->class('btn btn-primary btn-sm')
                ->emit('bulkStatusApprovedEvent', []),

            Button::add('mark-as-rejected')
                ->caption(__('Rejected'))
                ->class('btn btn-danger btn-sm')
                ->emit('bulkStatusRejectedEvent', []),
        ];
    }

    public function bulkStatusApprovedEvent($ids)
    {
        foreach ($this->checkboxValues as $row) {
            $warehouse = Inventory::find($row);
            $warehouse->status = "approved";
            $warehouse->save();
        }
        $this->dispatchBrowserEvent('showAlert', ['message' => 'All Selected Inventories are now Approved']);
    }


    public function bulkStatusRejectedEvent($ids)
    {
        foreach ($this->checkboxValues as $row) {
            $warehouse = Inventory::find($row);
            $warehouse->status = "rejected";
            $warehouse->save();
        }
        $this->dispatchBrowserEvent('showAlert', ['message' => 'All Selected Inventories are now Rejected']);
    }

    protected function getListeners()
    {
        return array_merge(
            parent::getListeners(),
            [
                'bulkStatusApprovedEvent',
                'bulkStatusRejectedEvent',
            ]
        );
    }

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
