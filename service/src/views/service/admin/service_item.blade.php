
@if( ! $services->isEmpty() )
<table class="table table-hover">
    <thead>
        <tr>
            <td style='width:5%'>{{ trans('service::service_admin.order') }}</td>
            <th style='width:10%'>Service ID</th>
            <th style='width:50%'>Service title</th>
            <th style='width:50%'>Service Des</th>
             <th style='width:50%'>Service Img</th>

            <th style='width:20%'>{{ trans('service::service_admin.operations') }}</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nav = $services->toArray();
        $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
        ?>
        @foreach($services as $service)
        <tr>
            <td>
                <?php echo $counter;
                $counter++ ?>
            </td>
            <td>{!! $service->service_id !!}</td>
            <td>{!! $service->service_title !!}</td>
            <td>{!! $service->service_description !!}</td>
            <td>{!! $service->service_img !!}</td>
            <td>
                <a href="{!! URL::route('admin_service.edit', ['id' => $service->service_id]) !!}"><i class="fa fa-edit fa-2x"></i></a>
                <a href="{!! URL::route('admin_service.delete',['id' =>  $service->service_id, '_token' => csrf_token()]) !!}" class="margin-left-5 delete"><i class="fa fa-trash-o fa-2x"></i></a>
                <span class="clearfix"></span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<span class="text-warning">
    <h5>
        {{ trans('service::service_admin.message_find_failed') }}
    </h5>
</span>
@endif
<div class="paginator">
    {!! $services->appends($request->except(['page']) )->render() !!}
</div>