<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::where([
            ['user_id', '=',Auth::user()->id],
            ['status', '=', 0,]
        ])->get();
        return view('dashboard.index', compact('todos'));
    }

    public function complated()
    {
        $todos = Todo::where([
            ['user_id', '=',Auth::user()->id],
            ['status', '=', 1,]
        ])->get();
        return view('dashboard.complated', compact('todos'));
    }

    public function updateComplated($id)
    {
        Todo::where('id', $id)->update([
            'status' => 1,
            'done_time' => Carbon::now(),
        ]);
        return redirect()->route('todo.complated')->with('done','Todo sudah selesai dikerjakan!!');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //mengirim data ke database
        $request->validate([
            'titel' => 'required|min:3',
            'date' => 'required',
            'description' => 'required|min:8',
        ]);
        Todo::create([
            'titel' => $request->titel,
            'description' => $request->description,
            'date' => $request->date,
            'status' => 0,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('todo.index')->with('successAdd',
        'Berhasil menambahkan data ToDo!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //menampilkan 1 data
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //menampilkan form edit data
        $todo = Todo::where('id', $id)->first();
        return view('dashboard.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //menampilkan data di data base
        $request->validate([
            'titel' => 'required|min:3',
            'date' => 'required',
            'description' => 'required|min:8',
        ]);
        Todo::where('id', $id)->update([
            'titel' => $request->titel,
            'description' => $request->description,
            'date' => $request->date,
            'status' => 0,
            'user_id' => Auth::user()->id,
        ]);
        return redirect('/todo/')->with('successUpdate', 'Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        Todo::where('id', '=', $id)->delete();
        return redirect()->route('todo.index')->with('successDelete', 'Berhasil menghapus data todo');
        //menghapus data dari database
    }
}
