
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title bariol-thin"><i class="fa fa-search"></i><?php echo trans('service::service.page_search') ?></h3>
    </div>
    <div class="panel-body">

        {!! Form::open(['route' => 'admin_service_category','method' => 'get']) !!}

        <!--TITLE-->
		<div class="form-group">
            {!! Form::label('service_category_name',trans('service::service.service_category_name_label')) !!}
            {!! Form::text('service_category_name', @$params['service_category_name'], ['class' => 'form-control', 'placeholder' => trans('service::service.service_category_name')]) !!}
        </div>

        {!! Form::submit(trans('service::service.search').'', ["class" => "btn btn-info pull-right"]) !!}
        {!! Form::close() !!}
    </div>
</div>




