<br />
<h4 style="margin-left: 20px;">Transactions</h4>
<br />
<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th>
                {!!Html::sortable_link('ID', $sort_by, 'id', $sort_order, ['q' => $q , 'page' => $transactions->currentPage()])!!}
            </th>
            <th>
                {!!Html::sortable_link('Transaction Date', $sort_by, 'transaction_date', $sort_order, ['q' => $q , 'page' => $transactions->currentPage()])!!}
            </th>
            <th>
                {!!Html::sortable_link('Description', $sort_by, 'desc', $sort_order, ['q' => $q , 'page' => $transactions->currentPage()])!!}
            </th>
            <th>
                {!!Html::sortable_link('Secondary Description', $sort_by, 'desc', $sort_order, ['q' => $q , 'page' => $transactions->currentPage()])!!}
            </th>
            <th>
                {!!Html::sortable_link('Account', $sort_by, 'balance_account_id', $sort_order, ['q' => $q , 'page' => $transactions->currentPage()])!!}
            </th>
            <th>
                {!!Html::sortable_link('Credit (Income)', $sort_by, 'credit', $sort_order, ['q' => $q , 'page' => $transactions->currentPage()])!!}
            </th>

            <th>
                {!!Html::sortable_link('Debit (Expense)', $sort_by, 'debit', $sort_order, ['q' => $q , 'page' => $transactions->currentPage()])!!}
            </th>
            <th>
                {!!Html::sortable_link('Ledger Running Balance', $sort_by, 'balance', $sort_order, ['q' => $q , 'page' => $transactions->currentPage()])!!}
            </th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($transactions as $transaction)
            <tr class="transaction_{{$transaction->id}} {{$transaction->is_canceled ? 'danger' : ''}}">
                <td>{{ $transaction->id }}</td>
                <td>{{ $transaction->transaction_date }}</td>
                <td>{{ $transaction->desc }}</td>
                <td>{{ $transaction->secondary_desc }}</td>
                <td>{{ $transaction->balanceAccount->name }}</td>
                <td>${{ number_format($transaction->credit, 2) }}</td>
                <td>${{ number_format($transaction->debit,2) }}</td>
                <td>${{ number_format($transaction->balance, 2) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div class="col-md-12">
    {!!$transactions->appends(['sort_by' => $sort_by, 'sort_order' => $sort_order, 'q' => $q])->render()!!}
</div>