<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListItem;

class ToDoListController extends Controller
{
    public function index()
    {
        return view("welcome", ['listItems' => ListItem::where('is_complete', 0)->get()]);
    }
    public function saveItem(Request $request)
    {
        $newListItem = new ListItem();
        $newListItem->name = $request->listItem;
        $newListItem->is_complete = 0;
        $newListItem->save();
        return redirect('/');
    }
    public function markAsComplete($id)
    {
        $listItem = ListItem::find($id);
        $listItem->is_complete = 1;
        $listItem->save();

        return redirect('/');
    }
}
