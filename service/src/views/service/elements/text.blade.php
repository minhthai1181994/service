
<!-- SAMPLE NAME -->
<div class="form-group" style="white-space: pre-line;">
    <?php $service_title = $request->get('service_titletitle') ? $request->get('service_title') : @$service->service_title ?>
    {!! Form::label($title, trans('service::service.title').':') !!}
    {!! Form::text($title, $service_title, ['class' => 'form-control', 'placeholder' => trans('service::service.title').'']) !!}
    
    <?php $service_img = $request->get('service_img') ? $request->get('service_img') : @$service->service_img ?>
    {!! Form::label($img, trans('service::service.img').':') !!}
    {!! Form::text($img, $service_img, ['class' => 'form-control', 'placeholder' => trans('service::service.img').'']) !!}
    
    <?php $service_description = $request->get('service_titledescription') ? $request->get('service_description') : @$service->service_description ?>
    {!! Form::label($description, trans('service::service.description').':') !!}
    {!! Form::text($description, $service_description, ['class' => 'form-control', 'placeholder' => trans('service::service.description').'']) !!}
    
</div>
<!-- /SAMPLE NAME -->