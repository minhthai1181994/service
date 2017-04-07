<?php

namespace Foostart\Service\Models;

use Illuminate\Database\Eloquent\Model;

class Services extends Model {

    protected $table = 'services';
    public $timestamps = false;
    protected $fillable = [
        'service_title',
        'service_description',
        'service_img'
    ];
    protected $primaryKey = 'service_id';

    /**
     *
     * @param type $params
     * @return type
     */
    public function get_services($params = array()) {
        $eloquent = self::orderBy('service_id');

        //service_title
        if (!empty($params['service_title'])) {
            $eloquent->where('service_title', 'like', '%' . $params['service_title'] . '%');
        }
        if (!empty($params['service_img'])) {
            $eloquent->where('service_img', 'like', '%' . $params['service_img'] . '%');
        }

        if (!empty($params['service_description'])) {
            $eloquent->where('service_description', 'like', '%' . $params['service_description'] . '%');
        }

        $services = $eloquent->paginate(10); //TODO: change number of item per page to configs

        return $services;
    }

    /**
     *
     * @param type $input
     * @param type $service_id
     * @return type
     */
    public function update_service($input, $service_id = NULL) {

        if (empty($service_id)) {
            $service_id = $input['service_id'];
        }

        $service = self::find($service_id);

        if (!empty($service)) {

            $service->service_title = $input['service_title'];
            $service->service_description = $input['service_description'];
            $service->service_img = $input['service_img'];
            $service->save();

            return $service;
        } else {
            return NULL;
        }
    }

    /**
     *
     * @param type $input
     * @return type
     */
    public function add_service($input) {

        $service = self::create([
                    'service_title' => $input['service_title'],
                    'service_description' => $input['service_description'],
                    'service_img' => $input['service_img'],
        ]);
        return $service;
    }

}
