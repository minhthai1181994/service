<?php

namespace Foostart\Service\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use URL,
    Route,
    Redirect;
use Foostart\Service\Models\Services;
use Foostart\Service\Validators\ServiceAdminValidator;
class ServiceFrontController extends Controller {

    public $data_view = array();
    private $obj_service = NULL;
    private $obj_validator = NULL;

    public function __construct() {
        $this->obj_service = new Services();
    }

    /**
     *
     * @return type
     */
    public function index(Request $request) {
        $params = $request->all();

        $list_service = $this->obj_service->get_services($params);


        $this->data_view = array_merge($this->data_view, array(
            'services' => $list_service,
            'request' => $request
        ));

        return view('service::service.front.index', $this->data_view);
    }

    public function delete(Request $request) {

        $service = NULL;
        $service_id = $request->get('id');

        if (!empty($service_id)) {
            $service = $this->obj_service->find($service_id);

            if (!empty($service)) {
                //Message
                \Session::flash('message', trans('service::service_admin.message_delete_successfully'));

                $service->delete();
            }
        } else {
            
        }

        $this->data_view = array_merge($this->data_view, array(
            'service' => $service,
        ));

        return Redirect::route("service");
    }
    public function edit(Request $request) {

        $service = NULL;
        $service_id= (int) $request->get('id');


        if (!empty($service_id) && (is_int($service_id))) {
            $service = $this->obj_service->find($service_id);
        }

        $this->data_view = array_merge($this->data_view, array(
            'service' => $service,
            'request' => $request
        ));
        return view('service::service.front.edit', $this->data_view);
    }
       public function post(Request $request) {
        
        $this->obj_validator = new ServiceAdminValidator();

        $input = $request->all();

        $service_id = (int) $request->get('id');
        $service = NULL;

        $data = array();

        if (!$this->obj_validator->validate($input)) {

            $data['errors'] = $this->obj_validator->getErrors();

            if (!empty($service_id) && is_int($post_id)) {

                $service = $this->obj_service->find($post_id);
            }

        } else {
            if (!empty($service_id) && is_int($service_id)) {

                $service = $this->obj_service->find($service_id);

                if (!empty($service)) {

                    $input['service_id'] = $service_id;
                    $service = $this->obj_service->update_service($input);

                    //Message
                    \Session::flash('message', trans('service::service_admin.message_update_successfully'));
                    return Redirect::route("service", ["id" => $service->service_id]);
                } else {

                    //Message
                    \Session::flash('message', trans('service::service_admin.message_update_unsuccessfully'));
                }
            } else {

                $service = $this->obj_service->add_service($input);

                if (!empty($service)) {

                    //Message
                    \Session::flash('message', trans('service::service_admin.message_add_successfully'));
                    return Redirect::route("service", ["id" => $service->service_id]);
                } else {

                    //Message
                    \Session::flash('message', trans('service::service_admin.message_add_unsuccessfully'));
                }
            }
        }

        $this->data_view = array_merge($this->data_view, array(
            'service' => $service,
            'request' => $request,
        ), $data);

        return view('service::service.front.edit', $this->data_view);
    }
    
    
    public function add(Request $request) {
       // $service = null;
        $service = new Services();
        $service = $service->get();
        $input = $request->all();
        
        
        $service_id = $this->obj_service->add_service($input);
        $this->data_view = array(
            'service' => $service,
            'request' => $request
        );
        //Message
        //return Redirect::route("service::service.admin.service_edit", ["id" => $service->service_id],$this->data_view);
//        return view('service::service.front.index', $this->data_view);
//        \Session::flash('service', trans('service::service_admin.message_add_successfully'));
        return Redirect::route("service");
    }
    public function imgUploadPost(Request $request)
    {
        $this->validate($request, [
            'service' => 'required|service|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $serviceName = time().'.'.$request->service->getClientOriginalExtension();
        $request->service->move(public_path('services'), $serviceName);

        return back()
            ->with('success','service Uploaded successfully.')
            ->with('path',$serviceName);
    }
}
