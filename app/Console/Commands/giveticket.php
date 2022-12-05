<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Shop\Entity\Ticket;
use App\Shop\Entity\User;
use App\Shop\Entity\Merchandise;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class giveticket extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'give:ticket';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '每個月26號00:00給投票優惠券';

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
        $total = 1;

        $Merchandise = Merchandise::OrderBy('vote', 'desc')
            ->where('status', 'S')
            ->where('kind', 'O')
            ->take($total)
            ->first();
        $Merchandise2 = Merchandise::OrderBy('vote', 'desc')
            ->where('status', 'S')
            ->where('kind', 'M')
            ->take($total)
            ->first();
        $Merchandise3 = Merchandise::OrderBy('vote', 'desc')
            ->where('status', 'S')
            ->where('kind', 'S')
            ->take($total)
            ->first();
        $row_per_page = 100;
        $page = 1;
        while (true) {
            $skip = ($page - 1) * $row_per_page;
            $UserCollection = User::orderBy('id', 'asc')
                ->skip($skip)
                ->take($row_per_page)
                ->get();

            if (!$UserCollection->count()) {
                break;
            }
            foreach ($UserCollection as $User) {
                DB::beginTransaction();
                $ticket_get = [
                    'user_id' => $User->id,
                    'name' => $Merchandise->name,
                    'type' => 'V',
                    'price' => 10,
                ];
                Ticket::create($ticket_get);
                DB::commit();
            }
            foreach ($UserCollection as $User) {
                DB::beginTransaction();
                $ticket_get = [
                    'user_id' => $User->id,
                    'name' => $Merchandise2->name,
                    'type' => 'V',
                    'price' => 10,
                ];
                Ticket::create($ticket_get);
                DB::commit();
            }
            foreach ($UserCollection as $User) {
                DB::beginTransaction();
                $ticket_get = [
                    'user_id' => $User->id,
                    'name' => $Merchandise3->name,
                    'type' => 'V',
                    'price' => 10,
                ];
                Ticket::create($ticket_get);
                DB::commit();
            }
            $page++;
        }
    }
}
