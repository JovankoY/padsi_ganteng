<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function edit($id)
{
    $menu = Menu::find($id);
    if (!$menu) {
        abort(404);
    }
    return view('menus.edit', compact('menu'));
}

}

