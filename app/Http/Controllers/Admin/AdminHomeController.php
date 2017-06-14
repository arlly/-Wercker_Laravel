<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin;

/**
 * 管理画面ホームコントローラ
 *
 * @author Kuniyasu Wada
 */
class AdminHomeController extends AdminController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        parent::__construct();
    }

    /**
     * Index...
     *
     * @method GET
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        return view('admin.index', [
            'breadcrumb' => $this->breadcrumb
        ]);
    }
}
