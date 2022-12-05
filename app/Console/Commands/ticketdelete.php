<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Shop\Entity\Ticket;
use App\Shop\Entity\User;
use App\Shop\Entity\Merchandise;
use Illuminate\Support\Facades\DB;


class ticketdelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:ticket';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '優惠券過期的話自動刪掉';

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
            $ticket_del = Ticket::orderBy('created_at', 'desc')
                ->skip($skip)
                ->take($row_per_page)
                ->get();
            if (!$ticket_del->count()) {
                break;
            }
            foreach ($ticket_del as $ticket) {
                Ticket::where('id', '=', $ticket->id)->delete();
            }
            $page++;
        }
    }
}
