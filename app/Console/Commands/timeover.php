<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Shop\Entity\join;
use App\Shop\Entity\Ticket;
use App\Shop\Entity\User;
use App\Shop\Entity\Merchandise;
use Illuminate\Support\Facades\DB;

class timeover extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'time:over';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '判斷時間到了是否跟團人數有到';

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
        $today = date('Y-m-d');
        while (true) {
            $skip = ($page - 1) * $row_per_page;
            $joins = join::where('status', 'I')
                ->skip($skip)
                ->take($row_per_page)
                ->get();
            if (!$joins->count()) {
                break;
            }
            foreach ($joins as $join) {
                if ($join->price <= $join->people_number) {
                    $get_all_id = $join->team_id;

                    $join_id = join::where('team_id', $get_all_id)
                        ->paginate(50);
                    foreach ($join_id as $join_number) {
                        if($join_number->price == 30){
                            $price = 9;
                        }
                        if($join_number->price == 40){
                            $price = 8;
                        }
                        if($join_number->price == 50){
                            $price = 7;
                        }
                        DB::beginTransaction();
                        $ticket_get = [
                            'user_id' => $join_number->user_id,
                            'name' => $join_number->merchandise,
                            'type' => 'B',
                            'price' => $price,
                        ];
                        Ticket::create($ticket_get);
                        $join_number->type = 'C';
                        $join_number->save();
                        DB::commit();
                    }
                }
                if ($join->price != $join->people_number && $join->arrived_data == $today) {
                    $get_all_id = $join->team_id;
                    $join_id = join::where('team_id', $get_all_id)
                        ->paginate(50);
                    join::where('team_id', '=', $join->team_id)->delete();
                }
            }
            $page++;
        }
    }
}
