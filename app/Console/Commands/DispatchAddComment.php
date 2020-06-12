<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;

class DispatchAddComment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dispatch:add_comment {id} {password} {comment}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $params = [
            'id' => $this->argument('id'),
            'password' => $this->argument('password'),
            'comment' => $this->argument('comment'),
        ];
        $request = Request::create(route('api_add_comment'), 'POST', $params);
        $response = app()->handle($request);
        $responseBody = json_decode($response->getContent(), true);
        $this->info($responseBody);



    }
}
