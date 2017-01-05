<?php

namespace App\Admin\Controllers;

use App\Country;
use App\Federation;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Mapper;

class FederationController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Federation::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->name('Name')->sortable();
            $grid->country('Country')->name('Country')->sortable();

            $grid->president_name('President');
            $grid->address('Address');
            $grid->email('Email');
            $grid->phone('Phone');
            $grid->website('Website');
            $grid->established_date('Established Since');
            $grid->phone('Phone');

            $grid->created_at();
            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Federation::class, function (Form $form) {
            $form->display('id', 'ID');
            $form->text('name', 'Name')->rules('required');
            $form->select('country_id', 'Country')->options(Country::all()->pluck('name', 'id'))->rules('required');
            $form->text('president_name', 'Current President');
            $form->textarea('address', 'Address');
            $form->url('website', 'Website');
            $form->email('email', 'Email');
            $form->mobile('phone', 'Phone');
            $form->date('established_date', 'Established Date');
        });
    }
}
