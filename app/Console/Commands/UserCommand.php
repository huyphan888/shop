<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class UserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user {id?}
     {--A|all}
     {--option=get}
     {--search=}
     {--limit=10}
     {--fields= : Value must be :name....}
     ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'user management';

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
        $id = $this->argument('id');
        $all = $this->option('all');
        $option = $this->option('option');
        $search = trim($this->option('search'),'\'"');
        $limit = $this->option('limit');

        dd($this->search($search));
       // $users=$this->comment($this->getUser($limit));
//        dd($this->options());

    }

    public function getUser($limit)
    {
        if($limit>0){
            $users = User::limit($limit)->get();
        }else{
            $users = User::all();
        }
        if(count($users)>0){
            foreach ($users as $key=>$user) {
                $this->info(str_repeat('-', 15) . 'index :' . $key);
                $this->comment('id :' . $user->id);
                $this->comment('name :' . $user->name);
                $this->comment('email :' . $user->email);
            }
        }else{
            $this->error('nothing');
        }
        exit();
    }

    public function search($search)
    {
        return User::where('name', 'like', "%$search%")->get()->toArray();
    }
}
