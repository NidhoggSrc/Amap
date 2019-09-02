<?php


namespace Amap\request\geocode;


use Amap\core\RequestCent;
use Amap\model\GeocodeGeoModel;

class GeoRequest extends RequestCent
{


    protected $url = 'geocode/geo?';


    /**
     * 获取数据
     * @param $address
     * @param string $city
     * @return GeocodeGeoModel
     * @throws \Amap\core\AmapException
     */
    public function getContents($address, $city = '')
    {
        $data = array(
            'address' => $address,
            'city' => $city
        );
        $response = $this->Conntent($data);
        if ($response == false) {
            return false;
        }
        return new GeocodeGeoModel($this->getRespons());
    }

    /**
     * 获取错误
     * @return mixed
     */
    public function getError()
    {
        return $this->errorMsg;
    }
}