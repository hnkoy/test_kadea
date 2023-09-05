<?php

namespace App\Http\Controllers;

use App\Repositories\Movie\MovieContract;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MovieController extends Controller
{

    protected MovieContract $movieContract;

    public function __construct(MovieContract $_movieContract)
    {
        $this->movieContract = $_movieContract;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies=$this->movieContract->toGetAll();
        return Inertia::render('Movie/Index', [
            'movies' => $movies,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
