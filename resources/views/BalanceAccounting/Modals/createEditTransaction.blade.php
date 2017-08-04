<div role="dialog"  class="modal fade" style="display: none;">
    @if(!empty($transaction))
        {!! Form::model($transaction, array('url' => route('postEditBalanceTransaction', array('organiser_id' => $organiser_id, 'sheetId' => $sheetId, 'accountId' => $account->id)), 'class' => 'ajax')) !!}
    @else
        {!! Form::open(array('url' => route('postCreateBalanceTransaction', array('organiser_id' => $organiser_id, 'sheetId' => $sheetId)), 'class' => 'ajax')) !!}
    @endif
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">
                    <i class="ico-edit"></i>
                    @if(!empty($transaction))
                        Edit Transaction <b>{{$transaction->id}} </b>
                    @else
                        Create Transaction
                    @endif
                </h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('accounts', 'Account', array('class'=>'control-label required')) !!}
                                    @if(!empty($transaction))
                                        {!! Form::select('accounts', $accounts, $transaction->balance_account_id, ['class' => 'form-control']) !!}
                                    @else
                                        {!! Form::select('accounts', $accounts, null, ['class' => 'form-control']) !!}
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('transaction_type', 'Transaction Type', array('class'=>'control-label required')) !!}
                                    @if(!empty($transaction))
                                        {!! Form::select('transaction_type', $transactionTypes, $selectedTransactionType, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                    @else
                                        {!! Form::select('transaction_type', $transactionTypes, null, ['class' => 'form-control']) !!}
                                    @endif
                                </div>
                            </div>
                        </div>
                        @if(!empty($transaction))
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        @if($transaction->debit != 0)
                                            {!! Form::label('debit', 'Debit', array('class'=>'control-label required')) !!}
                                            {!!  Form::text('debit', Input::old('debit'),
                                                    array(
                                                    'class'=>'form-control',
                                                    'disabled' => 'disabled'
                                                    ))  !!}
                                        @else
                                            {!! Form::label('credit', 'Credit', array('class'=>'control-label required')) !!}
                                            {!!  Form::text('credit', Input::old('credit'),
                                                    array(
                                                    'class'=>'form-control',
                                                    'disabled' => 'disabled'
                                                    ))  !!}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('debit', 'Debit', array('class'=>'control-label required', 'style' => 'display:none')) !!}
                                        {!!  Form::text('debit', Input::old('debit'),
                                                array(
                                                'class'=>'form-control',
                                                'style' => 'display:none'
                                                ))  !!}

                                        {!! Form::label('credit', 'Credit', array('class'=>'control-label required', 'style' => 'display:none')) !!}
                                        {!!  Form::text('credit', Input::old('credit'),
                                                array(
                                                'class'=>'form-control',
                                                'style' => 'display:none'
                                                ))  !!}
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('desc', 'Transaction Description', array('class'=>'control-label required')) !!}
                                    @if(!empty($transaction))
                                        {!!  Form::text('desc', Input::old('desc'),
                                                array(
                                                'class'=>'form-control'
                                                ))  !!}
                                    @else
                                        {!!  Form::text('desc', null,
                                            array(
                                            'class'=>'form-control'
                                            ))  !!}
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('secondary_desc', 'Secondary Description (Not Required)', array('class'=>'control-label')) !!}
                                    @if(!empty($transaction))
                                        {!!  Form::text('secondary_desc', Input::old('secondary_desc'),
                                                array(
                                                'class'=>'form-control'
                                                ))  !!}
                                    @else
                                        {!!  Form::text('secondary_desc', null,
                                            array(
                                            'class'=>'form-control'
                                            ))  !!}
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('transaction_date', 'Transaction Date', array('class'=>'required control-label')) !!}
                                    @if(!empty($transaction))
                                        {!!  Form::text('transaction_date', Input::old('transaction_date'),
                                                            [
                                                        'class'=>'form-control start hasDatepicker ',
                                                        'data-field'=>'date',
                                                        'readonly'=>''
                                                    ])  !!}
                                    @else
                                        {!!  Form::text('transaction_date', Input::old('transaction_date'),
                                                                                                    [
                                                                                                'class'=>'form-control start hasDatepicker ',
                                                                                                'data-field'=>'date',
                                                                                                'readonly'=>''
                                                                                            ])  !!}
                                    @endif
                                </div>
                            </div>
                        </div>
                        @if(!empty($transaction))
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="custom-checkbox">
                                            {!! Form::checkbox('is_canceled', 1, $transaction->is_canceled, ['id' => 'is_canceled', 'class' => 'form-control']) !!}
                                            {!! Form::label('is_canceled', 'Is Account Inactive?') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div> <!-- /end modal body-->
            <div class="modal-footer">
                @if(!empty($transaction))
                    {!! Form::hidden('id', $transaction->id) !!}
                @endif
                {!! Form::button('Cancel', ['class'=>"btn modal-close btn-danger",'data-dismiss'=>'modal']) !!}
                {!! Form::submit('Submit', ['class'=>"btn btn-success"]) !!}
            </div>
        </div><!-- /end modal content-->
        {!! Form::close() !!}
    </div>
</div>
