<?php

namespace App\Http\Controllers\menu;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Menu;

use Illuminate\View\View;

class MenusController extends Controller
{
  /**
   *
   * index
   *
   * @return View
   *
   */

  public function index(): View
  {
    $menus = Menu::latest()->paginate(5);

    return view('content.master.menu.master-menu', compact('menus'));
  }
}
