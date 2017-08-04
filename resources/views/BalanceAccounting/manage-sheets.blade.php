<div class="tab-content panel">
    <div class="tab-pane active">
        <div class="btn-group btn-group-responsive" style="margin-left: 20px;">
            <a data-modal-id="create-sheet" href="#" data-href="{{route('showCreateBalanceSheet', ['organiser_id' => $organiser->id])}}" class="btn btn-primary loadModal"><i class="ico-plus"></i> Create Sheet</a>
        </div>
        @if($sheets->count())
            @include('BalanceAccounting.Partials.sheets-table')
        @else
            @if(!empty($q))
                <div class="panel">
                    @include('Shared.Partials.NoSearchResults')
                </div>
            @else
                <h3>No Sheets Created Yet. Go add some ya dingus</h3>
            @endif
        @endif
    </div>
</div>