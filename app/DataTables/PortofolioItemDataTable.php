<?php

namespace App\DataTables;

use App\Models\PortofolioItem;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PortofolioItemDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('image', function($query) {
                return '<img style="width:75px;" src="'.asset($query->image).'"></img>';
            })
            ->addColumn('created_at', function($query) {
                return date('d-m-Y', strtotime($query->created_at));
            })
            ->addColumn('category', function($query) {
                return $query->category->name;
            })
            ->addColumn('action', function($query) {
                return '<a href="' . route('admin.portofolio-item.edit', $query->id) . '" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="' . route('admin.portofolio-item.destroy', $query->id) . '" class="btn btn-danger delete-item"><i class="fa-solid fa-trash"></i></a>';
            })
            ->rawColumns(['image', 'action'])  // Ensure HTML is rendered in these columns
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PortofolioItem $model): QueryBuilder
    {
        return $model->newQuery()->with('category');  // Include the category relationship to avoid N+1 issues
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('portofolioitem-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->width(100),
            Column::make('image')->width(100),
            Column::make('title'),
            Column::make('category'),
            Column::make('created_at'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(200)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'PortofolioItem_' . date('YmdHis');
    }
}
