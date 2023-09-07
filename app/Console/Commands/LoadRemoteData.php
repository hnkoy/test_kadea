<?php

namespace App\Console\Commands;

use App\Utils\TmdbTool;
use Illuminate\Console\Command;

class LoadRemoteData extends Command
{
    private TmdbTool $tmdb;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tmdb:load-remote-data {totalPage}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will fetch data from TMDB API and insert into local database';

    /**
     * Execute the console command.
     */

     public function __construct(TmdbTool $_tmdb)
    {
        parent::__construct();
        $this->tmdb= $_tmdb;
    }


    public function handle()
    {


            $totalPage = $this->argument('totalPage');

            $this->tmdb->FetchImport((int)$totalPage);

    }
}
