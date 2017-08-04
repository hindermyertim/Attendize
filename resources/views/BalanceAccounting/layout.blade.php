@extends('Shared.Layouts.Master')

@section('title')
    @parent
    Organiser Ledger
@stop

@section('page_title')
    {{$organiser->name}} Ledger
@stop

@section('top_nav')
    @include('ManageOrganiser.Partials.TopNav')
@stop

@section('head')
@stop

@section('menu')
    @include('ManageOrganiser.Partials.Sidebar')
@stop

@section('page_header')
    {{--
    <div class="col-md-9">
        <div class="btn-toolbar" role="toolbar">
            <div class="btn-group btn-group-responsive">
                <button data-modal-id="InviteAttendee" href="javascript:void(0);"  data-href="{{route('showInviteAttendee', ['event_id'=>$event->id])}}" class="loadModal btn btn-success" type="button"><i class="ico-user-plus"></i> Invite Attendee</button>
            </div>

            <div class="btn-group btn-group-responsive">
                <button data-modal-id="ImportAttendees" href="javascript:void(0);"  data-href="{{route('showImportAttendee', ['event_id'=>$event->id])}}" class="loadModal btn btn-success" type="button"><i class="ico-file"></i> Invite Attendees</button>
            </div>

            <div class="btn-group btn-group-responsive">
                <a class="btn btn-success" href="{{route('showPrintAttendees', ['event_id'=>$event->id])}}" target="_blank" ><i class="ico-print"></i> Print Attendee List</a>
            </div>
            <div class="btn-group btn-group-responsive">
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                    <i class="ico-users"></i> Export <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{route('showExportAttendees', ['event_id'=>$event->id,'export_as'=>'xlsx'])}}">Excel (XLSX)</a></li>
                    <li><a href="{{route('showExportAttendees', ['event_id'=>$event->id,'export_as'=>'xls'])}}">Excel (XLS)</a></li>
                    <li><a href="{{route('showExportAttendees', ['event_id'=>$event->id,'export_as'=>'csv'])}}">CSV</a></li>
                    <li><a href="{{route('showExportAttendees', ['event_id'=>$event->id,'export_as'=>'html'])}}">HTML</a></li>
                </ul>
            </div>
            <div class="btn-group btn-group-responsive">
                <button data-modal-id="MessageAttendees" href="javascript:void(0);" data-href="{{route('showMessageAttendees', ['event_id'=>$event->id])}}" class="loadModal btn btn-success" type="button"><i class="ico-envelope"></i> Message</button>
            </div>
        </div>
    </div>

    <div class="col-md-3">
   {!! Form::open(array('url' => route('showEventAttendees', ['event_id'=>$event->id,'sort_by'=>$sort_by]), 'method' => 'get')) !!}
    <div class="input-group">
        <input name="q" value="{{$q or ''}}" placeholder="Search Attendees.." type="text" class="form-control" />
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit"><i class="ico-search"></i></button>
        </span>
    </div>
   {!! Form::close() !!}
</div>--}}

@stop

@section('content')

    <!--Start Ledger table-->
    <div class="row">

        <div class="col-md-12">
            <ul class="nav nav-tabs">
                @if($sheets->count())
                    @foreach($sheets->sortBy('id') as $sheet)
                        @if(isset($activeSheetId) && $activeSheetId == $sheet->id)
                            <li class="active">
                        @else
                            <li>
                        @endif
                        <a href="{{ URL::route('showFullTransactions', array('organiser_id' => $organiser->id, 'activeSheetId' => $sheet->id )) }}" >{{ $sheet->name }}</a>
                        </li>
                    @endforeach
                @endif
                @if($page == 'manageSheets' || $page == 'manageAccounts')
                    <li class="active">
                        <a href="{{ URL::route('manageBalanceSheets', array('organiser_id' => $organiser->id )) }}" >Manage Sheets</a>
                    </li>
                @else
                    <li>
                        <a href="{{ URL::route('manageBalanceSheets', array('organiser_id' => $organiser->id )) }}" >Manage Sheets</a>
                    </li>
                @endif

            </ul>
            @if($page == 'displayTransactions')
                @include('BalanceAccounting.display-transactions')
            @elseif($page == 'manageSheets')
                @include('BalanceAccounting.manage-sheets')
            @elseif($page == 'manageAccounts')
                @include('BalanceAccounting.manage-accounts')
            @endif
        </div>
    </div>
@endsection