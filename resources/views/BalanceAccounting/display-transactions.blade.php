<div class="tab-content panel">
    <div class="tab-pane active">
        <div class="btn-group btn-group-responsive" style="margin-left: 20px;">
            <a data-modal-id="create-transaction" href="#" data-href="{{route('showCreateBalanceTransaction', ['organiser_id' => $organiser->id, 'sheet_id' => $activeSheetId])}}" class="btn btn-primary loadModal"><i class="ico-plus"></i> Create Transaction</a>
        </div>
        @if($transactions->count())
            @include('BalanceAccounting.Partials.transaction-table')
        @else
            @if(!empty($q))
                <div class="panel">
                    @include('Shared.Partials.NoSearchResults')
                </div>
            @else
                <h3>No Transactions Recorded Yet. Go add some ya dingus</h3>
            @endif
        @endif
    </div>
</div>