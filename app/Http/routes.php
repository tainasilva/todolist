<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | This route group applies the "web" middleware group to every route
  | it contains. The "web" middleware group is defined in your HTTP
  | kernel and includes session state, CSRF protection, and more.
  |
 */

use App\Todo;
use Illuminate\Http\Request;

Route::group(['middleware' => ['web']], function () {
    /**
     * Show TODO
     */
    Route::get('/', function () {
        return view('todo', [
            'todo' => Todo::orderBy('created_at', 'asc')->get()
        ]);
    });

    /**
     * Add New TODO
     */
    Route::post('/todo', function (Request $request) {

        $todo = new Todo;
        $todo->name = $request->name;
        $todo->save();

        return redirect('/');
    });

    /**
     * Delete TODO
     */
    Route::delete('/todo/{id}', function ($id) {
        Todo::findOrFail($id)->delete();

        return redirect('/');
    });

    Route::post('/todo/check/', function ($id) {

        Todo::findOrFail($id);
        $todo->completed = Input::get('completed') ? Input::get('completed') : 0;
        $todo->save();

        return redirect('/');
    });
});
