<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class DeleteUsers extends Command
{
    protected $signature = 'users:delete';
    protected $description = 'Jednorazovo vymaže všetkých používateľov';

    public function handle()
    {
        if ($this->confirm('Naozaj chceš vymazať všetkých používateľov? Toto je nevratné!')) {
            User::truncate();
            $this->info('Všetci používatelia boli vymazaní.');
        } else {
            $this->info('Akcia bola zrušená.');
        }
    }
}
