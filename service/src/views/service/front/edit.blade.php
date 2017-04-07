{!! Form::open(['route'=>['service.edit', 'id' => @$service->service_id],  'files'=>true, 'method' => 'service'])  !!}
<!--END POST ID  -->
<!-- SAMPLE NAME TEXT-->
@include('service::service.elements.text', ['title' => 'service_title',
                'description' => 'service_description','img' => 'service_img'])
<!-- /END SAMPLE NAME TEXT -->
{!! Form::hidden('id',@$service->service_id) !!}

<!-- DELETE BUTTON -->

<!-- DELETE BUTTON -->

<!-- SAVE BUTTON -->
{!! Form::submit('Save', array("class"=>"btn btn-info pull-right ")) !!}
<!-- /SAVE BUTTON -->

{!! Form::close() !!}