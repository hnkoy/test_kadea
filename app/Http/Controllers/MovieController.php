<?php

namespace App\Http\Controllers;


use App\Http\Requests\CreateMovieRequest;
use App\Repositories\Movie\MovieContract;
use App\Utils\FileUpload;
use App\Utils\TmdbTool;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;


class MovieController extends Controller
{

    protected MovieContract $movieContract;
    protected FileUpload $fileUpload;

    public function __construct(MovieContract $_movieContract,FileUpload $_fileUpload)
    {
        $this->movieContract = $_movieContract;
        $this->fileUpload = $_fileUpload;
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
     * Display a listing of the resource.
     */
    public function getByName(Request $request)
    {
        $movies=$this->movieContract->toGetMovieByName($request->name);
        return Inertia::render('Movie/Index', [
            'movies' => $movies,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Movie/CreateForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateMovieRequest $request)
    {
        //


        $input = $request->all();


        $input[ 'id' ] = rand();
        if ($request->file('backdrop_path') != null) {
            $input[ 'backdrop_path' ] =$this->fileUpload->upload($request->file('backdrop_path')) ;
        }

        if ($request->file('poster_path') != null) {
            $input[ 'poster_path' ] = $this->fileUpload->upload($request->file('poster_path'));
        }


        $this->movieContract->toAdd( $input );

        return redirect()->route('movies')->with('message', 'movie Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $movie=$this->movieContract->toGetById($id);
        return Inertia::render('Movie/Detail', [
            'movie' => $movie,

        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movie=$this->movieContract->toGetById($id);
        return Inertia::render('Movie/EditForm', [
            'movie' => $movie,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateMovieRequest $request)
    {
        $input = $request->all();
        $user = $this->movieContract->toUpdate( $input, $request->id );
        return redirect()->route('movies')->with('message', 'movie update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = $this->movieContract->toGetById( $id );
        if ( empty( $item ) ) {
            return redirect()->route('movies')->with('message', 'not found');
        }
        $user = $this->movieContract->toDelete( $id );

        return redirect()->route('movies')->with('message', 'succefully deleted ');
    }







}
