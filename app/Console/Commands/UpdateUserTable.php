<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class UpdateUserTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-user-table';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Command to update user's firstname, lastname, and timezone to new random ones";

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $timezones = ['CET', 'CST', 'GMT+1'];
        User::lazyById()->each(function ($task) use($timezones) {
            $task->firstname = fake()->name();
            $task->lastname = fake()->name();
            $task->timezone = $timezones[rand(0,2)];
            $task->save();
        });
    }
}
