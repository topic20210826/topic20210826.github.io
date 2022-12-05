<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Shop\Entity\Ticket;
use App\Shop\Entity\User;
use App\Shop\Entity\Merchandise;
use Illuminate\Support\Facades\DB;

class ticketreset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset:ticket';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '每個月01號00:00重置投票數';

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
        $row_per_page = 100;
        $page = 1;
        while (true) {
            $skip = ($page - 1) * $row_per_page;
            $Merchandises = Merchandise::orderBy('vote', 'desc')
                ->skip($skip)
                ->take($row_per_page)
                ->get();

            if (!$Merchandises->count()) {
                break;
            }
            foreach ($Merchandises as $Merchandise) {
                DB::beginTransaction();
                $Merchandise->vote = 0;
                $Merchandise->save();
                //交易結束
                DB::commit();
            }

            $page++;
        }
    }
}
