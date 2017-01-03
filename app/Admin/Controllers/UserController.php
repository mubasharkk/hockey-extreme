<?php

namespace App\Admin\Controllers;

use App\User;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
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

            $content->body($this->form($id)->edit($id));
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
        return Admin::grid(User::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->name('Name');
            $grid->username('Username');
            $grid->email('Email');

            $grid->created_at();
            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form ($id = null)
    {
        return Admin::form(User::class, function (Form $form) use ($id){

            $form->display('id', 'ID');
            $form->text('name', 'Name')->rules('required|min:6');
            $form->email('email', 'Email')->rules('required|email'); //|unique:users,email
            $form->text('username', 'Username')->rules('required|between:6,50|alpha_dash');
            $form->password('password', 'Password')->rules('required|between:6,50'); //|confirmed
//            $form->password('password_confirmation', 'Confirm Password')->rules('required');

            $form->saving(function(Form $form) {
                if($form->password && $form->model()->password != $form->password)
                {
                    $form->password = bcrypt($form->password);
                }
            });

            $form->disableDeletion();
        });
    }
}
