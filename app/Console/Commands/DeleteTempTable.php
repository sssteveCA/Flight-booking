<?php

namespace App\Console\Commands;

use App\Models\FlightTemp;
use App\Models\HotelPriceTemp;
use Exception;
use Illuminate\Console\Command;

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
        try{
            if($table != null){
                $accepted_tables = [FlightTemp::getTableName(),HotelPriceTemp::getTableName()];
                switch($table){
                    case $accepted_tables[0]:
                        FlightTemp::truncate();
                        $this->line("Contenuto tabella {$table} rimosso");
                        return 0;
                    case $accepted_tables[1]:
                        HotelPriceTemp::truncate();
                        $this->line("Contenuto tabella {$table} rimosso");
                        return 0;
                    default:
                        $this->error("La tabella specificata non è valida");
                        return 2;       
                }
            }//if($table != null){
            $this->error("Specifica il nome della tabella");
            return 2;
        }catch(Exception $e){
            $this->error("Errore durante la rimozione del contenuto della tablella {$table}");
            return 1;
        }
    }
}
