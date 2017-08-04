<div role="dialog"  class="modal fade" style="display: none;">
    @if(!empty($account))
        {!! Form::model($account, array('url' => route('postEditBalanceAccount', array('organiser_id' => $organiser_id, 'sheetId' => $sheetId, 'accountId' => $account->id)), 'class' => 'ajax')) !!}
    @else
        {!! Form::open(array('url' => route('postCreateBalanceAccount', array('organiser_id' => $organiser_id, 'sheetId' => $sheetId)), 'class' => 'ajax')) !!}
    @endif
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">
                    <i class="ico-edit"></i>
                    @if(!empty($account))
                        Edit <b>{{$account->name}} </b>
                                @else
                                    Create Account
                    @endif
                </h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('name', 'Account Name', array('class'=>'control-label required')) !!}
                                    @if(!empty($account))
                                        {!!  Form::text('name', Input::old('name'),
                                                array(
                                                'class'=>'form-control'
                                                ))  !!}
                                    @else
                                        {!!  Form::text('name', null,
                                            array(
                                            'class'=>'form-control'
                                            ))  !!}
                                    @endif
                                </div>
                            </div>
                        </div>
                        @if(!empty($account))
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('balance', 'Balance', array('class'=>'control-label required')) !!}
                                        {!!  Form::text('balance', Input::old('balance'),
                                                array(
                                                'class'=>'form-control',
                                                'disabled' => 'disabled'
                                                ))  !!}
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('user_id', 'Owner', array('class'=>'control-label required')) !!}
                                    @if(!empty($account))
                                        {!! Form::select('user_id', $users, $account->user_id, ['class' => 'form-control']) !!}
                                    @else
                                        {!! Form::select('user_id', $users, null, ['class' => 'form-control']) !!}
                                    @endif
                                </div>
                            </div>
                        </div>
                        @if(!empty($account))
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="custom-checkbox">
                                            {!! Form::checkbox('is_canceled', 1, $account->is_canceled, ['id' => 'is_canceled', 'class' => 'form-control']) !!}
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
                @if(!empty($account))
                    {!! Form::hidden('id', $account->id) !!}
                @endif
                {!! Form::button('Cancel', ['class'=>"btn modal-close btn-danger",'data-dismiss'=>'modal']) !!}
                {!! Form::submit('Submit', ['class'=>"btn btn-success"]) !!}
            </div>
        </div><!-- /end modal content-->
        {!! Form::close() !!}
    </div>
</div>
