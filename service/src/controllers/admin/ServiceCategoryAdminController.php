<?php namespace Foostart\Service\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use URL;
use Route,
    Redirect;
use Foostart\Service\Models\ServicesCategories;
/**
 * Validators
 */
use Foostart\Service\Validators\ServiceCategoryAdminValidator;

class ServiceCategoryAdminController extends Controller {

    public $data_view = array();

    private $obj_service_category = NULL;
    private $obj_validator = NULL;

    public function __construct() {
        $this->obj_service_category = new ServicesCategories();
    }

    /**
     *
     * @return type
     */
    public function index(Request $request) {

         $params =  $request->all();

        $list_service_category = $this->obj_service_category->get_services_categories($params);

        $this->data_view = array_merge($this->data_view, array(
            'services_categories' => $list_service_category,
            'request' => $request,
            'params' => $params
        ));
        return view('service::service_category.admin.service_category_list', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function edit(Request $request) {

        $service = NULL;
        $service_id = (int) $request->get('id');
        

        if (!empty($service_id) && (is_int($service_id))) {
            $service = $this->obj_service_category->find($service_id);

        }

        $this->data_view = array_merge($this->data_view, array(
            'service' => $service,
            'request' => $request
        ));
        return view('service::service_category.admin.service_category_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function post(Request $request) {

        $this->obj_validator = new ServiceCategoryAdminValidator();

        $input = $request->all();

        $service_id = (int) $request->get('id');

        $service = NULL;

        $data = array();

        if (!$this->obj_validator->validate($input)) {

            $data['errors'] = $this->obj_validator->getErrors();

            if (!empty($service_id) && is_int($service_id)) {

                $service = $this->obj_service_category->find($service_id);
            }

        } else {
            if (!empty($service_id) && is_int($service_id)) {

                $service = $this->obj_service_category->find($service_id);

                if (!empty($service)) {

                    $input['service_category_id'] = $service_id;
                    $service = $this->obj_service_category->update_service($input);

                    //Message
                    \Session::flash('message', trans('service::service_admin.message_update_successfully'));
                    return Redirect::route("admin_service_category.edit", ["id" => $service->service_id]);
                } else {

                    //Message
                    \Session::flash('message', trans('service::service_admin.message_update_unsuccessfully'));
                }
            } else {

                $service = $this->obj_service_category->add_service($input);

                if (!empty($service)) {

                    //Message
                    \Session::flash('message', trans('service::service_admin.message_add_successfully'));
                    return Redirect::route("admin_service_category.edit", ["id" => $service->service_id]);
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

        return view('service::service_category.admin.service_category_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function delete(Request $request) {

        $service = NULL;
        $service_id = $request->get('id');

        if (!empty($service_id)) {
            $service = $this->obj_service_category->find($service_id);

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

        return Redirect::route("admin_service_category");
    }

}