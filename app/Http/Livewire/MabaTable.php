<?php

namespace App\Http\Livewire;

use App\Models\Maba;
use Illuminate\Support\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class MabaTable extends PowerGridComponent
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


        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Header::make()->showToggleColumns(),

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
     * @return Builder<\App\Models\Maba>
     */
    public function datasource(): Builder
    {
        return Maba::query();
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
    public function header(): array
    {
        return [
            Button::add('konfirmasi')
                ->caption('Konfirmasi ')

                ->emit('handleKonfirmasi', ['type' => 'konf']),
            Button::add('reset')
                ->caption('Reset Password')

                ->emit('handleKonfirmasi', ['type' => 'reset']),

        ];
    }
    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    | ❗ IMPORTANT: When using closures, you must escape any value coming from
    |    the database using the `e()` Laravel Helper function.
    |
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()

            ->addColumn('bool_terbayar', function (Maba $maba) {
                return $maba->terbayar ? 'Terbayar' : 'Belum Terbayar';
            })
            ->addColumn('bool_terima', function (Maba $maba) {
                return $maba->terima ? 'Diterima' : 'Belum Diterima';
            })

            ->addColumn('created_at')
            ->addColumn('created_at_formatted', fn (Maba $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
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


            Column::make('NO REG', 'no_reg')
                ->searchable()
                ->makeInputText('no_reg')
                ->sortable(),
            Column::make('Email', 'email')
                ->searchable()
                ->makeInputText('email')
                ->sortable(),
            Column::make('Nama', 'nama')
                ->searchable()
                ->makeInputText('nama')
                ->sortable(),
            Column::make('Gender', 'jk')
                ->searchable()
                ->makeInputText('jk')
                ->sortable(),
            Column::make('Tempat Lahir', 'tl'),

            Column::make('Tanggal Lahir', 'ttl')

                ->sortable(),
            Column::make('Agama', 'agama')
                ->searchable()
                ->makeInputText('agama')
                ->sortable(),
            Column::make('Alamat', 'alamat'),

            Column::make('Telpon', 'tlp'),

            Column::make('Asal Sekolah', 'asal_sekolah'),

            Column::make('Jurusan', 'jurusan')
                ->searchable()
                ->makeInputText('jurusan')
                ->sortable(),
            Column::make('Pilihan Kelas', 'pk')
                ->searchable()
                ->makeInputText('pk')
                ->sortable(),
            Column::make('Prodi', 'prodi')
                ->searchable()
                ->makeInputSelect(Maba::prodis(), 'label', 'prodi')
                ->sortable(),
            Column::make('Ukuran Baju', 'ukuran_baju')
                ->searchable()

                ->sortable(),
            Column::make('Tanggal Pendaftaran', 'created_at')
                ->hidden(),
            Column::make('Status Pembayaran', 'terbayar')
                ->field('bool_terbayar')
                ->makeBooleanFilter(trueLabel: 'Telah Terbayar', falseLabel: 'Belum Terbayar'),
            Column::make('Status Formulir', 'terima')
                ->makeBooleanFilter(trueLabel: 'Telah Diterima', falseLabel: 'Belum Diterima'),
            Column::make('Tanggal Pendaftaran', 'created_at_formatted', 'created_at')
                ->makeInputDatePicker()
                ->searchable()
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
     * PowerGrid Maba Action Buttons.
     *
     * @return array<int, Button>
     */


    public function actions(): array
    {
        return [

            Button::make('bukti', 'Lihat Bukti Pembayaran ')
                ->class('px-2 py-1.5 bg-blue-500 rounded text-sm text-white')
                ->emit('handleBukti', ['id']),

            Button::make('Formulir', 'Download Formulir')
                ->class('px-2 py-1.5 bg-green-500 rounded text-sm text-white')
                ->route('formulir.download', ['id' => 'id'])

        ];
    }


    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid Maba Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($maba) => $maba->id === 1)
                ->hide(),
        ];
    }
    */
}
