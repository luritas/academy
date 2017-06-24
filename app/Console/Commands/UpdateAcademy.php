<?php

namespace App\Console\Commands;

use App\Academy;
use Illuminate\Console\Command;
use League\Csv\Reader;

class UpdateAcademy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:academy {file=academy}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update academy database from csv';

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
     * @return void
     */
    public function handle()
    {
        $filename = $this->argument('file');

        /*
         * if you are on mac
         */
        if (!ini_get("auto_detect_line_endings")) {
            ini_set("auto_detect_line_endings", '1');
        }


        $csv = Reader::createFromPath(storage_path("app/{$filename}.csv"));
//        $headers = $csv->fetchOne();
        $data = $csv->setOffset(2)->fetchAll();
        $bar = $this->output->createProgressBar(count($data));
        foreach ($data as $key => $value) {
            $this->performTask($value);
            $bar->advance();
        }
        $bar->finish();
    }

    /**
     * @param $value
     * @return void
     */
    private function performTask($value)
    {
        $academy                 = new Academy();
        $academy->name           = $value[0];
        $academy->address        = $value[1];
        $academy->owner          = $value[2];
        $academy->tel            = $value[3];
        $academy->course         = $value[4];
        $academy->subject        = $value[5];
        $academy->capacity       = $value[6];
        $academy->term           = $value[7];
        $academy->hours          = $value[8];
        $academy->price          = $value[9];
        $academy->option1        = $value[10];
        $academy->option2        = $value[11];
        $academy->option3        = $value[12];
        $academy->option4        = $value[13];
        $academy->option5        = $value[14];
        $academy->option6        = $value[15];
        $academy->option7        = $value[16];
        $academy->total_price    = $value[17];
        $academy->total_teachers = $value[18];
        Academy::updateOrInsert([       //updateOrCreate 를 확장한 laravel code
            'name' => $academy->name,
            'subject' => $academy->subject
        ], $academy->toArray());
    }
}
