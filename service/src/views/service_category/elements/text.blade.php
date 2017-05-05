<!-- SAMPLE NAME -->
<div class="form-group">
    <?php $service_category_name = $request->get('service_titlename') ? $request->get('service_name') : @$service->service_category_name ?>
    {!! Form::label($name, trans('service::service.name').':') !!}
    {!! Form::text($name, $service_category_name, ['class' => 'form-control', 'placeholder' => trans('service::service.name').'']) !!}
</div>
<!-- /SAMPLE NAME -->