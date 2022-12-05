@extends('layout.users')

@section('title', $title)

@section('content')

    <div class="transaction-right">
        <table border="2" cellpadding="5" class="table">
            <tr>
                <th>飲料名稱</th>
                <th>種類</th>
                <th>取得時間</th>

            </tr>
            @foreach ($ticketPaginate as $ticket)
                <tr>
                    <td>{{ $ticket->name }}</td>
                    <td>
                        @if ($ticket->type == 'V')投票
                        @endif
                        @if ($ticket->type == 'B')團購
                        @endif
                    </td>
                    <td>{{ $ticket->created_at }}</td>

                </tr>
            @endforeach
        </table>
        {{ $ticketPaginate->links() }}
    </div>
@endsection
