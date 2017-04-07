<head>
    <script src='//cloud.tinymce.com/stable/tinymce.min.js'></script>
    <script>
        tinymce.init({
            selector: 'textarea', // change this value according to your HTML
            plugin: 'a_tinymce_plugin',
            a_plugin_option: true,
            a_configuration_option: 400
        });

    </script>
</head>
<!-- SAMPLE NAME -->
<div class="form-group">
    <?php $service_title = $request->get('service_titletitle') ? $request->get('service_title') : @$service->service_title ?>
    {!! Form::label($title, trans('service::service_admin.title').':') !!}
    {!! Form::text($title, $service_title, ['class' => 'form-control', 'placeholder' => trans('service::service_admin.title').'']) !!}
    
    <?php $service_img = $request->get('service_img') ? $request->get('service_img') : @$service->service_img ?>
    {!! Form::label($img, trans('service::service_admin.img').':') !!}
    {!! Form::textarea($img, $service_img, ['class' => 'form-control', 'placeholder' => trans('service::service_admin.img').'']) !!}
    
    <?php $service_description = $request->get('service_titledescription') ? $request->get('service_description') : @$service->service_description ?>
    {!! Form::label($description, trans('service::service_admin.description').':') !!}
    {!! Form::textarea($description, $service_description, ['class' => 'form-control', 'placeholder' => trans('service::service_admin.description').'']) !!}
    
</div>
<!-- /SAMPLE NAME -->