<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Shop\Entity\Merchandise;
use App\Shop\Entity\Transaction;
use App\Shop\Entity\Ticket;
use App\Shop\Entity\User;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Validator;  //驗證器
use Illuminate\Http\Request;

class OtherController extends Controller
{
    public function aboutPage()
    {
        $binding = [
            'title' => '品牌故事',
        ];
        return view('about', $binding);
    }
    public function menuPage()
    {
        $row_per_page = 100;
        $MerchandisePaginate = Merchandise::OrderBy('updated_at', 'desc')
            ->where('status', 'S')   //可販售
            ->paginate($row_per_page);
        $binding = [
            'title' => '菜單',
            'MerchandisePaginate' => $MerchandisePaginate,
        ];
        return view('menu', $binding);
    }
    public function ticketListPage()
    {
        $user_id = session()->get('user_id');
        $User = User::findOrFail($user_id);
        $row_per_page = 100;
        $ticketPaginate = Ticket::where('user_id', $user_id)
            ->OrderBy('created_at', 'desc')
            ->paginate($row_per_page);
        $binding = [
            'title' => '我的優惠券',
            'ticketPaginate' => $ticketPaginate,
            'User' => $User,
        ];
        return view('ticket', $binding);
    }
}
