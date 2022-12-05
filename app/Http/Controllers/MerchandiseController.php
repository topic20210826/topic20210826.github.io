<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Shop\Entity\Merchandise;
use App\Shop\Entity\Transaction;
use App\Shop\Entity\User;
use App\Shop\Entity\join;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Validator;  //驗證器

class MerchandiseController extends Controller
{
    // 新增商品(店家)
    public function merchandiseCreatePage()
    {
        $binding = [
            'title' => '新增商品',
        ];
        return view('merchandise.createMerchandise', $binding);
    }
    //新增商品程序(店家)
    public function merchandiseCreateProcess()
    {
        $input = request()->all();
        $rules = [
            //商品狀態
            'status' => [
                'required',
                'in:C,S',
            ],
            //商品名稱
            'name' => [
                'required',
                'max:80',
            ],
            //商品種類
            'kind' => [
                'required',
                'in:O,M,S',
            ],
            //商品價格(大杯)
            'big_price' => [
                'required',
                'integer',
                'min:1',
            ],
            //商品價格(小杯)
            'small_price' => [
                'required',
                'integer',
                'min:1',
            ],
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            //資料驗證錯誤
            return redirect('merchandise/create')
                ->withErrors($validator)
                ->withInput();
        }
        try {
            //交易開始
            DB::beginTransaction();
            $merchandise_data = [
                'status' => $input['status'],
                'name' => $input['name'],
                'kind' => $input['kind'],
                'big_price' => $input['big_price'],
                'small_price' => $input['small_price'],
                'vote' => 0,
            ];
            //建立交易資料
            Merchandise::create($merchandise_data);
            //交易結束
            DB::commit();
            //回傳購物成功訊息
            $message = [
                'msg' => [
                    '商品建立成功',
                ],
            ];
            return redirect()
                ->to('merchandise/manage')
                ->withInput($message);
        } catch (Exception $exception) {
            //恢復原先交易狀態
            DB::rollBack();
            $error_message = [
                'msg' => [
                    $exception->getMessage(),
                ],
            ];
            return redirect()
                ->back()
                ->withErrors($error_message)
                ->withInput();
        }
    }
    //商品單品檢視
    public function merchandiseItemEditPage($merchandise_id)
    {
        $Merchandise = Merchandise::findOrFail($merchandise_id);
        $binding = [
            'title' => '編輯商品',
            'Merchandise' => $Merchandise,
        ];
        return view('merchandise.editMerchandise', $binding);
    }
    //商品單品修改
    public function merchandiseItemUpdateProcess($merchandise_id)
    {
        //撩取商品資料
        $Merchandise = Merchandise::findOrFail($merchandise_id);
        //接收輸入資料
        $input = request()->all();
        //驗證規則
        $rules = [
            //商品狀態
            'status' => [
                'required',
                'in:C,S',
            ],
            //商品名稱
            'name' => [
                'required',
                'max:80',
            ],
            //商品種類
            'kind' => [
                'required',
                'in:O,M,S',
            ],
            //商品價格
            //大杯
            'big_price' => [
                'required',
                'integer',
                'min:0',
            ],
            //小杯
            'small_price' => [
                'required',
                'integer',
                'min:0',
            ],
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            //資料驗證錯誤
            return redirect('merchandise/' . $Merchandise->id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }
        $Merchandise->update($input);
        //導向到商品編輯頁
        return redirect('merchandise/manage');
    }
    //商品管理清單檢視
    public function merchandiseManageListPage()
    {
        $row_per_page = 7;
        //撈取商品分頁資料
        $MerchandisePaginate = Merchandise::OrderBy('created_at', 'desc')
            ->paginate($row_per_page);
        $binding = [
            'title' => '管理商品',
            'MerchandisePaginate' => $MerchandisePaginate,
        ];
        return view('merchandise.manageMerchandise', $binding);
    }
    //商品清單檢視
    public function merchandiseListPage()
    {
        $row_per_page = 100;
        $MerchandisePaginate = Merchandise::OrderBy('updated_at', 'desc')
            ->where('status', 'S')   //可販售
            ->paginate($row_per_page);
        $binding = [
            'title' => '購買飲品',
            'MerchandisePaginate' => $MerchandisePaginate,
        ];
        return view('merchandise.listMerchandise', $binding);
    }

    public function merchandiseItemPage($merchandise_id)
    {
        $Merchandise = Merchandise::findOrFail($merchandise_id);

        $binding = [
            'title' => '商品頁',
            'Merchandise' => $Merchandise,
        ];
        return view('merchandise.showMerchandise', $binding);
    }
    public function merchandiseItemBuyProcess($merchandise_id)
    {
        $input = request()->all();
        $rules = [
            'count' => [
                'required',
                'integer',
                'min:1',
            ],
            'size' => [
                'required',
                'in:B,S',
            ],
            //F:正常 S:少糖 H:半糖 M:微糖 N:無糖
            'sweet' => [
                'required',
                'in:F,S,H,M,N',
            ],
            //F:正常 S:少冰 M:微冰 N:去冰
            'ice' => [
                'required',
                'in:F,S,M,N',
            ],
        ];
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            //資料驗證錯誤
            return redirect('merchandise/' . $merchandise_id)
                ->withErrors($validator)
                ->withInput();
        }
        try {
            //取得登入資料
            $user_id = session()->get('user_id');
            $User = User::findOrFail($user_id);
            //交易開始
            DB::beginTransaction();
            $Merchandise = Merchandise::findOrFail($merchandise_id);
            $count = $input['count'];
            $size = $input['size'];
            $sweet = $input['sweet'];
            $ice = $input['ice'];
            $tapioca = $input['tapioca'];
            $red = $input['red'];
            $iu = $input['iu'];
            $eigo = $input['eigo'];

            if ($input['size'] == 'B') {
                $total_price = $count * $Merchandise->big_price;
                $price = $Merchandise->big_price;
            }
            if ($input['size'] == 'S') {
                $total_price = $count * $Merchandise->small_price;
                $price = $Merchandise->small_price;
            }
            $transaction_data = [
                'user_id' => $User->id,
                'user' => $User->nickname,
                'merchandise_name' => $Merchandise->name,
                'merchandise_id' => $Merchandise->id,
                'price' => $price,
                'count' => $count,
                'total_price' => $total_price,
                'size' => $size,
                'sweet' => $sweet,
                'ice' => $ice,
                'tapioca' => $tapioca,
                'red' => $red,
                'iu' => $iu,
                'eigo' => $eigo,
                'type' => 'C',
            ];
            //建立交易資料
            Transaction::create($transaction_data);
            //交易結束
            DB::commit();
            //回傳購物成功訊息
            $message = [
                'msg' => [
                    '購物成功',
                ],
            ];
            return redirect()
                ->to('merchandise/')
                ->withInput($message);
        } catch (Exception $exception) {
            //恢復原先交易狀態
            DB::rollBack();
            $error_message = [
                'msg' => [
                    $exception->getMessage(),
                ],
            ];
            return redirect()
                ->back()
                ->withErrors($error_message)
                ->withInput();
        }
    }
    //投票頁面(顧客)
    public function merchandisevotePage()
    {
        $row_per_page = 100;
        $time = 0;
        $MerchandisePaginate = Merchandise::OrderBy('vote', 'desc')
            ->where('status', 'S')
            ->where('kind', 'O')
            ->paginate($row_per_page);
        $MerchandisePaginate2 = Merchandise::OrderBy('vote', 'desc')
            ->where('status', 'S')
            ->where('kind', 'M')
            ->paginate($row_per_page);
        $MerchandisePaginate3 = Merchandise::OrderBy('vote', 'desc')
            ->where('status', 'S')
            ->where('kind', 'S')
            ->paginate($row_per_page);
        $binding = [
            'title' => '本月飲品排行',
            'MerchandisePaginate' => $MerchandisePaginate,
            'MerchandisePaginate2' => $MerchandisePaginate2,
            'MerchandisePaginate3' => $MerchandisePaginate3,
            'time' => $time,
        ];
        return view('merchandise.vote', $binding);
    }
    //投票系統(顧客)
    public function merchandisevoteProcess()
    {
        $input = request()->all();
        try {
            //取得登入資料
            $Merchandise = Merchandise::where('id', $input['id'])->first();
            DB::beginTransaction();
            $vote = 1 + $Merchandise->vote;
            $Merchandise->vote = $vote;
            $Merchandise->save();
            //交易結束
            DB::commit();
            //回傳購物成功訊息
            $message = [
                'msg' => [
                    '投票成功',
                ],
            ];
            return redirect()
                ->to('merchandise/vote')
                ->withInput($message);
        } catch (Exception $exception) {
            //恢復原先交易狀態
            DB::rollBack();
            $error_message = [
                'msg' => [
                    $exception->getMessage(),
                ],
            ];
            return redirect()
                ->back()
                ->withErrors($error_message)
                ->withInput();
        }
    }
    //團購頁面
    public function merchandisejoinPage()
    {
        $row_per_page = 10;
        $joinPaginate = join::OrderBy('id', 'desc')
            ->where('status', 'I')
            ->where('type', 'N')
            ->paginate($row_per_page);
        $binding = [
            'title' => '團購',
            'joinPaginate' => $joinPaginate,
        ];
        return view('merchandise.join', $binding);
    }
    public function merchandisejoinrecordPage()
    {
        $row_per_page = 5;
        $user_id = session()->get('user_id');
        $User = User::findOrFail($user_id);
        $joinPaginate = join::OrderBy('id', 'desc')
            ->where('user_id', $user_id)
            ->paginate($row_per_page);
        $binding = [
            'title' => '團購紀錄',
            'joinPaginate' => $joinPaginate,
            'User' => $User,
        ];
        return view('merchandise.joinrecord', $binding);
    }
    //建立團購
    public function merchandisecreatejoinPage()
    {
        $row_per_page = 100;
        $MerchandisePaginate = Merchandise::OrderBy('kind', 'desc')
            ->where('status', 'S')
            ->paginate($row_per_page);
        $binding = [
            'title' => '建立團購',
            'MerchandisePaginate' => $MerchandisePaginate,
        ];
        return view('merchandise.createjoin', $binding);
    }
    //建立團購程序
    public function merchandisejoinUpdateProcess()
    {
        //接收輸入資料
        $input = request()->all();
        //驗證規則
        $rules = [
            'name' => [
                'required',
                'max:80',
            ],
            'arrived_data' => [
                'required',
                'date_format:Y-m-d'
            ],
            'price' => [
                'required',
                'integer',
                'max:100',
            ],
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            //資料驗證錯誤
            return redirect('create_join/createjoin')
                ->withErrors($validator)
                ->withInput();
        }
        try {
            //取得登入資料
            $user_id = session()->get('user_id');
            $User = User::findOrFail($user_id);
            //交易開始
            DB::beginTransaction();
            $name = $input['name'];
            $price = $input['price'];
            $merchandise = $input['merchandise'];
            $arrived_data = $input['arrived_data'];
            $team_id = 0;
            $people_number = 1;

            $join_data = [
                'user_id' => $User->id,
                'name' => $name,
                'price' => $price,
                'merchandise' => $merchandise,
                'arrived_data' => $arrived_data,
                'status' => 'I',
                'people_number' => $people_number,
                'team_id' => $team_id,
                'type' => 'N',
            ];
            //建立交易資料
            $joins = join::create($join_data);
            $join = join::where('id', $joins->id)->first();
            $join->team_id = $join->id;
            $join->save();
            //交易結束
            DB::commit();

            return redirect()
                ->to('create_join/join');
        } catch (Exception $exception) {
            //恢復原先交易狀態
            DB::rollBack();
            $error_message = [
                'msg' => [
                    $exception->getMessage(),
                ],
            ];
            return redirect()
                ->back()
                ->withErrors($error_message)
                ->withInput();
        }
    }
    public function merchandisejoinProcess()
    {
        $input = request()->all();

        try {
            $row_per_page = 100;
            $page = 1;
            $user_id = session()->get('user_id');
            $User = User::findOrFail($user_id);
            while (true) {
                $skip = ($page - 1) * $row_per_page;
                $joins = join::where('team_id', $input['id'])
                    ->skip($skip)
                    ->take($row_per_page)
                    ->get();
                if (!$joins->count()) {
                    break;
                }
                foreach ($joins as $join) {
                    $join->people_number = $join->people_number+ 1;
                    $join->save();
                }
                $joinss = join::where('id', $input['id'])->first();
                $join_data = [
                    'user_id' => $User->id,
                    'name' => $joinss->name,
                    'price' => $joinss->price,
                    'merchandise' => $joinss->merchandise,
                    'arrived_data' => $joinss->arrived_data,
                    'status' => 'F',
                    'people_number' => $joinss->people_number,
                    'team_id' => $joinss->team_id,
                    'type' => 'N',
                ];
                join::create($join_data);
                $page++;
            }

            return redirect()
                ->to('create_join/join');
        } catch (Exception $exception) {
            //恢復原先交易狀態
            DB::rollBack();
            $error_message = [
                'msg' => [
                    $exception->getMessage(),
                ],
            ];
            return redirect()
                ->back()
                ->withErrors($error_message)
                ->withInput();
        }
    }
}
