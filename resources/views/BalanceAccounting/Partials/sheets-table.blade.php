<br />
<h4 style="margin-left: 20px;">Ledger Sheets</h4>
<br />
<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th>
                {!!Html::sortable_link('ID', $sort_by, 'id', $sort_order, ['q' => $q , 'page' => $sheets->currentPage()])!!}
            </th>
            <th>
                {!!Html::sortable_link('Name', $sort_by, 'name', $sort_order, ['q' => $q , 'page' => $sheets->currentPage()])!!}
            </th>
            <th>
                {!!Html::sortable_link('Total Balance', $sort_by, 'balance', $sort_order, ['q' => $q , 'page' => $sheets->currentPage()])!!}
            </th>
            <th>
                {!!Html::sortable_link('Owner', $sort_by, 'user_id', $sort_order, ['q' => $q , 'page' => $sheets->currentPage()])!!}
            </th>
            <th>
                {!!Html::sortable_link('Inactive', $sort_by, 'is_canceled', $sort_order, ['q' => $q , 'page' => $sheets->currentPage()])!!}
            </th>
            <th>
                {!!Html::sortable_link('Creation DateTime', $sort_by, 'created_at', $sort_order, ['q' => $q , 'page' => $sheets->currentPage()])!!}
            </th>
            <th>
                {!!Html::sortable_link('Last Modified', $sort_by, 'updated_at', $sort_order, ['q' => $q , 'page' => $sheets->currentPage()])!!}
            </th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($sheets as $sheet)
            <tr class="attendee_{{$sheet->id}} {{$sheet->is_canceled ? 'danger' : ''}}">
                <td>{{ $sheet->id }}</td>
                <td>{{ $sheet->name }}</td>
                <td>${{ number_format($sheet->balance, 2) }}</td>
                <td>{{ $sheet->owner->first_name . ' ' . $sheet->owner->last_name }}</td>
                <td>{{ ($sheet->is_canceled ? 'Yes' : 'No') }}</td>
                <td>{{ ($sheet->created_at) }}</td>
                <td>{{ ($sheet->updated_at) }}</td>
                <td><a data-modal-id="edit-sheet" href="javascript:void(0);" data-href="{{route('showEditBalanceSheet', ['organiser_id' => $organiser->id ,
                    'sheet_id'=>$sheet->id]) }}" title="Edit Sheet" class="btn btn-xs btn-primary loadModal">Edit</a>
                    <a href="{{route('showBalanceAccounts', ['organiser_id' => $organiser->id ,
                    'sheet_id'=>$sheet->id]) }}" title="Manage Accounts" class="btn btn-xs btn-primary">Manage Accounts</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div class="col-md-12">
    {!!$sheets->appends(['sort_by' => $sort_by, 'sort_order' => $sort_order, 'q' => $q])->render()!!}
</div>