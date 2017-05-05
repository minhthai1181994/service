<html>

    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="user-scalable=0, initial-scale=1.0">
        <link href="{{asset('foostart/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('foostart/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('foostart/css/front.css')}}" rel="stylesheet" type="text/css"/>

        <?php
        if (!class_exists('lessc')) {
            include ('foostart/libs/lessc.inc.php');
        }
        $less = new lessc;
        $less->compileFile('foostart/less/styles.less', 'foostart/css/styles.css');
        ?>
        <link href="{{asset('foostart/css/styles.css')}}" rel="stylesheet" type="text/css"/>

        <script src="{{asset('foostart/js/jquery-2.1.4.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('foostart/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('foostart/js/front.js')}}" type="text/javascript"></script>
    </head>

    <body>
        <div class="panel panel-info" style="width: 30%; float: right;">
            <div class="panel-heading">
                <h3 class="panel-title bariol-thin"><i class="fa fa-search"></i><?php echo trans('service::service.page_search') ?></h3>
            </div>
            <div class="panel-body">

                {!! Form::open(['route' => 'admin_service','method' => 'get']) !!}

                <!--TITLE-->
                <div class="form-group">
                    {!! Form::label('service_title', trans('service::service.service_title_label')) !!}
                    {!! Form::text('service_title', @$params['service_title'], ['class' => 'form-control', 'placeholder' => trans('service::service.service_title_placeholder')]) !!}
                </div>
                <!--/END TITLE-->

                {!! Form::submit(trans('service::service.search').'', ["class" => "btn btn-info pull-right"]) !!}
                {!! Form::close() !!}
            </div>
        </div>
        <div class="type">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">

                        <h2 class="section-heading">Services</h2>
                        <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($services as $service): ?>
                        <div class="col-md-4">
                            <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                            </span>
                            <h4 class="service-heading"><?php echo $service['service_title'] ?></h4>
                            <p class="text-muted"><?php echo $service['service_description'] ?></p>
                            <div class="btn-st" style="float: left;">
                                <a href="{!! URL::route('service.delete',['id' => $service->service_id, '_token' => csrf_token()]) !!}"
                                   class="btn btn-danger pull-right margin-left-5 delete">
                                    Delete </a>
                                <a href="{!! URL::route('service.edit',['id' => $service->service_id, '_token' => csrf_token()]) !!}"
                                   class="btn btn-danger pull-right margin-left-5 edit">
                                    Edit </a> 
                            </div>                               
                        </div>
                    <?php endforeach; ?>      
                </div>
            </div>   
        </div>
    </div>
</div>
<!-- Trigger/Open The Modal -->
<button id="myBtn" class="btn" style="margin-left: 45%; margin-top: 30px;">Open Form</button>
<!-- The Modal -->
<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <p style="text-align: center;">Bạn có muốn thêm một nội dung ?</p>
        {!! Form::open([ 'method' => 'post',
        'route' => 'servicer',
        'id' => @$service->service_id,
        'files'=>true])!!}
        <!--SAMPLE NAME TEXT;-->
        @include('service::service.elements.text', [
        'id' => 'service_id',
        'title' => 'service_title',
        'img' => 'service_img',
        'description' => 'service_description' ])
        <!--                             /END SAMPLE NAME TEXT -->
        {!! Form::hidden('id',@$service->service_id) !!}
        {!! Form::submit('Save', array("class"=>"btn btn-info pull-left ")) !!}
        <!--                             /SAVE BUTTON -->
        {!! Form::close()!!};
    </div>
</div>
<script src='//cloud.tinymce.com/stable/tinymce.min.js'></script>
</body>
</html>