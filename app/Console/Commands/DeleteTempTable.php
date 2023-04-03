<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Interfaces\Constants as C;

class DeleteTempTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'temptable:delete {--table=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete the content stored temporarily by certain tables';

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
     * @return int
     */
    public function handle()
    {
        $table = $this->option('table');
        if(in_array($table,[C::TABLE_FLIGHTSTEMP,C::TABLE_HOTELSTEMP])){
            
        }
        return 0;
    }
}
