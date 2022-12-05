<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Shop\Entity\Transaction;
use App\Shop\Entity\Ticket;
use App\Shop\Entity\User;
use Illuminate\Support\Facades\DB;
use Exception;

class TransactionController extends Controller
{
    //
    public function transactionbuycarPage()
    {
        $user_id = session()->get('user_id');
        $User = User::findOrFail($user_id);
        $row_per_page = 5;
        $ticket_page = 100;
        $ticketPaginate = Ticket::where('user_id', $user_id)
            ->OrderBy('created_at', 'desc')
            ->paginate($ticket_page);
        $TransactionPaginate = Transaction::where('user_id', $user_id)
            ->where('type', 'C')    //C：確認是否購買訂單
            ->OrderBy('created_at', 'desc')
            ->paginate($row_per_page);
        $binding = [
            'title' => '確認購買',
            'TransactionPaginate' => $TransactionPaginate,
            'ticketPaginate' => $ticketPaginate,
            'User' => $User,
        ];

        return view('transaction.buy_check', $binding);
    }
    public function transactionbuycarProcess($id)
    {
        Transaction::where('id', '=', $id)->delete();
        return redirect('/buy_check');
    }


    public function transactioncheckProcess($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        $transaction->type = 'B';
        $ticket = Ticket::where('name','=', $transaction->merchandise_name)->first();
        if($ticket->type=='V'){
            $transaction->total_price = $transaction->total_price - 10;
        }
        if($ticket->type=='B'){
            $transaction->total_price = $transaction->total_price * $ticket->price * 0.1;
        }
        $transaction->save();
        Ticket::where('name','=', $transaction->merchandise_name)->first()->delete();

        return redirect('/buy_check');
    }
    //交易紀錄(顧客頁面)(個人資料區)
    public function transactionListPage()
    {
        $user_id = session()->get('user_id');
        $User = User::findOrFail($user_id);
        $row_per_page = 5;
        $TransactionPaginate = Transaction::where('user_id', $user_id)
            ->where('type', '!=', 'C')
            ->OrderBy('created_at', 'desc')
            ->paginate($row_per_page);
        $binding = [
            'title' => '交易紀錄',
            'TransactionPaginate' => $TransactionPaginate,
            'User' => $User,
        ];

        return view('transaction.listUserTransaction', $binding);
    }
    //顧客訂單(頁面)
    public function transactionOrderPage()
    {
        $row_per_page = 5;

        $TransactionPaginate = Transaction::OrderBy('created_at', 'asc')
            ->where('type', '!=', 'C')
            ->paginate($row_per_page);
        $binding = [
            'title' => '顧客訂單',
            'TransactionPaginate' => $TransactionPaginate,
        ];

        return view('transaction.orderTransaction', $binding);
    }
    //刪除顧客訂單(系統)
    public function transactionOrderProcess($id)
    {
        Transaction::where('id', '=', $id)->delete();
        return redirect('/order');
    }
    //完成顧客訂單(系統)
    public function transactioncompleteProcess($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        $transaction->type = 'O';
        $transaction->save();
        return redirect('/order');
    }
}
