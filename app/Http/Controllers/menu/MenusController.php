<?php

namespace App\Http\Controllers\menu;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Menu;

use Illuminate\View\View;

use Illuminate\Http\RedirectResponse;

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

    return view('content.master.menu.index', compact('menus'));
  }

  /**
   * create
   *
   * @return View
   */
  public function create(): View
  {
    return view('content.master.menu.create');
  }

  /**
   * store
   *
   * @param  mixed $request
   * @return RedirectResponse
   */
  public function store(Request $request): RedirectResponse
  {
    //validate form
    $this->validate($request, [
      'title' => 'required|min:5',
      'desc' => 'required|min:10',
    ]);

    //create post
    Menu::create([
      'title' => $request->title,
      'desc' => $request->desc,
    ]);

    //redirect to index
    return redirect()
      ->route('master-menu')
      ->with(['success' => 'Data Berhasil Disimpan!']);
  }

  /**
   * destroy
   *
   * @param  mixed $post
   * @return void
   */
  public function destroy($id): RedirectResponse
  {
    //get post by ID
    $menus = Menu::findOrFail($id);

    //delete post
    $menus->delete();

    //redirect to index
    return redirect()
      ->route('master-menu')
      ->with(['success' => 'Data Berhasil Dihapus!']);
  }
}
