<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Book extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|string',
            'author' => 'required|string',
            'count' => 'required',
        ));

        $check = DB::table('book')
            ->insert([
                'NAME' => $request->name,
                'AUTHOR' => $request->author,
                'COUNT' => $request->count,
            ]);

        if( $check ){
            return response()->json(
                'Successfully Inserted'
            );
        }
        else{
            return response()->json(
                'Failed to Insert'
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $book = DB::table('book')
            ->select([
                'NAME', 'AUTHOR', 'COUNT'
            ])
            ->where([
                ['NAME', '=', $name],
            ])
            ->get();

        if( $book->count() > 0 ){
            return response()->json(
                $book[0]
            );
        }
        else{
            return response()->json(
                null
            );
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
