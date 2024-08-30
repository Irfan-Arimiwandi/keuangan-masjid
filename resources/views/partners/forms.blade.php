@if (request('action') == 'create')
    @can('create', new App\Models\Partner)
    <div id="partnerModal" class="modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('partner.create') }}</h5>
                    {{ link_to_route('partners.index', '', [], ['class' => 'close']) }}
                </div>
                {!! Form::open(['route' => 'partners.store']) !!}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-7">{!! FormField::text('name', ['required' => true, 'label' => __('partner.name')]) !!}</div>
                        <div class="col-md-5">
                            {!! FormField::select('type_code', $partnerTypes, [
                                'required' => true,
                                'value' => old('type_code', request('type_code')),
                                'placeholder' => false,
                                'label' => __('partner.type'),
                            ]) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">{!! FormField::text('phone', ['label' => __('partner.phone'), 'type' => 'number']) !!}</div>
                        <div class="col-md-7">{!! FormField::text('work', ['label' => __('partner.work')]) !!}</div>
                    </div>
                    {!! FormField::textarea('address', ['label' => __('partner.address')]) !!}
                    {!! FormField::textarea('description', ['label' => __('partner.description')]) !!}
                </div>
                <div class="modal-footer">
                    {!! Form::submit(__('partner.create'), ['class' => 'btn btn-success']) !!}
                    {{ link_to_route('partners.index', __('app.cancel'), [], ['class' => 'btn btn-secondary']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    @endcan
@endif

@if (request('action') == 'edit' && $editablePartner)
    @can('update', $editablePartner)
    <div id="partnerModal" class="modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('partner.edit') }}</h5>
                    {{ link_to_route('partners.index', '', [], ['class' => 'close']) }}
                </div>
                {!! Form::model($editablePartner, ['route' => ['partners.update', $editablePartner], 'method' => 'patch']) !!}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-7">{!! FormField::text('name', ['required' => true, 'label' => __('partner.name')]) !!}</div>
                        <div class="col-md-5">
                            {!! FormField::select('type_code', $partnerTypes, [
                                'required' => true,
                                'value' => old('type_code', $editablePartner->type_code),
                                'placeholder' => false,
                                'label' => __('partner.type'),
                            ]) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">{!! FormField::text('phone', ['label' => __('partner.phone'), 'type' => 'number']) !!}</div>
                        <div class="col-md-7">{!! FormField::text('work', ['label' => __('partner.work')]) !!}</div>
                    </div>
                    {!! FormField::textarea('address', ['label' => __('partner.address')]) !!}
                    {!! FormField::textarea('description', ['label' => __('partner.description')]) !!}
                    {!! FormField::radios('is_active', [__('app.inactive'), __('app.active')], ['label' => __('app.status')]) !!}
                </div>
                <div class="modal-footer">
                    {!! Form::submit(__('partner.update'), ['class' => 'btn btn-success']) !!}
                    {{ link_to_route('partners.index', __('app.cancel'), [], ['class' => 'btn btn-secondary']) }}
                    @can('delete', $editablePartner)
                        {!! link_to_route(
                            'partners.index',
                            __('app.delete'),
                            ['action' => 'delete', 'id' => $editablePartner->id],
                            ['id' => 'del-partner-'.$editablePartner->id, 'class' => 'btn btn-danger float-left']
                        ) !!}
                    @endcan
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    @endcan
@endif

@if (request('action') == 'delete' && $editablePartner)
    @can('delete', $editablePartner)
    <div id="partnerModal" class="modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('partner.delete') }} {{ $editablePartner->type }}</h5>
                    {{ link_to_route('partners.index', '', [], ['class' => 'close']) }}
                </div>
                <div class="modal-body">
                    <label class="control-label">{{ __('partner.name') }}</label>
                    <p>{{ $editablePartner->name }}</p>
                    <label class="control-label">{{ __('partner.phone') }}</label>
                    <p>{{ $editablePartner->phone }}</p>
                    <label class="control-label">{{ __('partner.work') }}</label>
                    <p>{{ $editablePartner->work }}</p>
                    <label class="control-label">{{ __('partner.address') }}</label>
                    <p>{{ $editablePartner->address }}</p>
                    <label class="control-label">{{ __('partner.description') }}</label>
                    <p>{{ $editablePartner->description }}</p>
                    {!! $errors->first('partner_id', '<span class="form-error small">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="modal-body">{{ __('app.delete_confirm') }}</div>
                <div class="modal-footer">
                    {!! FormField::delete(
                        ['route' => ['partners.destroy', $editablePartner], 'class' => ''],
                        __('app.delete_confirm_button'),
                        ['class'=>'btn btn-danger'],
                        ['partner_id' => $editablePartner->id]
                    ) !!}
                    {{ link_to_route('partners.index', __('app.cancel'), [], ['class' => 'btn btn-secondary']) }}
                </div>
            </div>
        </div>
    </div>
    @endcan
@endif
