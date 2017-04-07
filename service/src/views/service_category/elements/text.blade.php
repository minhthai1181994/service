<!-- SAMPLE NAME -->
<div class="form-group">
    <?php $service_category_name = $request->get('service_titlename') ? $request->get('service_name') : @$service->service_category_name ?>
    {!! Form::label($name, trans('service::service_admin.name').':') !!}
    {!! Form::text($name, $service_category_name, ['class' => 'form-control', 'placeholder' => trans('service::service_admin.name').'']) !!}
</div>
<!-- /SAMPLE NAME -->