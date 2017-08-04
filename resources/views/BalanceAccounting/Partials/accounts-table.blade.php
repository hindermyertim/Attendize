<br />
<h4 style="margin-left: 20px;">{{ $currentSheet->name }} Accounts</h4>
<br />
<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th>
                {!!Html::sortable_link('ID', $sort_by, 'id', $sort_order, ['q' => $q , 'page' => $accounts->currentPage()])!!}
            </th>
            <th>
                {!!Html::sortable_link('Name', $sort_by, 'name', $sort_order, ['q' => $q , 'page' => $accounts->currentPage()])!!}
            </th>
            <th>
                {!!Html::sortable_link('Account Balance', $sort_by, 'balance', $sort_order, ['q' => $q , 'page' => $accounts->currentPage()])!!}
            </th>
            <th>
                {!!Html::sortable_link('Owner', $sort_by, 'user_id', $sort_order, ['q' => $q , 'page' => $accounts->currentPage()])!!}
            </th>
            <th>
                {!!Html::sortable_link('Inactive', $sort_by, 'is_canceled', $sort_order, ['q' => $q , 'page' => $accounts->currentPage()])!!}
            </th>
            <th>
                {!!Html::sortable_link('Creation DateTime', $sort_by, 'created_at', $sort_order, ['q' => $q , 'page' => $accounts->currentPage()])!!}
            </th>
            <th>
                {!!Html::sortable_link('Last Modified', $sort_by, 'updated_at', $sort_order, ['q' => $q , 'page' => $accounts->currentPage()])!!}
            </th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($accounts as $account)
            <tr class="attendee_{{$account->id}} {{$account->is_canceled ? 'danger' : ''}}">
                <td>{{ $account->id }}</td>
                <td>{{ $account->name }}</td>
                <td>${{ number_format($account->balance, 2) }}</td>
                <td>{{ $account->owner->first_name . ' ' . $account->owner->last_name }}</td>
                <td>{{ ($account->is_canceled ? 'Yes' : 'No') }}</td>
                <td>{{ ($account->created_at) }}</td>
                <td>{{ ($account->updated_at) }}</td>
                <td><a data-modal-id="edit-account" href="javascript:void(0);" data-href="{{route('showEditBalanceAccount', ['organiser_id' => $organiser->id ,
                    'sheetId' => $currentSheet->id, 'accountId' => $account->id]) }}" title="Edit Account" class="btn btn-xs btn-primary loadModal">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div class="col-md-12">
    {!!$accounts->appends(['sort_by' => $sort_by, 'sort_order' => $sort_order, 'q' => $q])->render()!!}
</div>