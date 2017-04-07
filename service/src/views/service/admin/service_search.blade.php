
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title bariol-thin"><i class="fa fa-search"></i><?php echo trans('service::service_admin.page_search') ?></h3>
    </div>
    <div class="panel-body">

        {!! Form::open(['route' => 'admin_service','method' => 'get']) !!}

        <!--TITLE-->
        <div class="form-group">
            {!! Form::label('service_title', trans('service::service_admin.service_title_label')) !!}
            {!! Form::text('service_title', @$params['service_title'], ['class' => 'form-control', 'placeholder' => trans('service::service_admin.service_title_placeholder')]) !!}
        </div
        <div class="form-group">
            {!! Form::label('service_description', trans('service::service_admin.service_title_label')) !!}
            {!! Form::text('service_description', @$params['service_description'], ['class' => 'form-control', 'placeholder' => trans('service::service_admin.service_title_placeholder')]) !!}
        </div>
        <!--/END TITLE-->

        {!! Form::submit(trans('service::service_admin.search').'', ["class" => "btn btn-info pull-right"]) !!}
        {!! Form::close() !!}
    </div>
</div>


