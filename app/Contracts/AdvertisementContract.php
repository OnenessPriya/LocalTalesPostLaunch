<?php

namespace App\Contracts;

/**
 * Interface AdvertisementContract
 * @package App\Contracts
 */
interface AdvertisementContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listAdvertisements(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findAdvertisementById(int $id);

    /**
     * @param int $id
     * @return mixed
     */
    public function findAdvertisementByBusiness(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createAdvertisement(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateAdvertisement(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteAdvertisement($id);

     /**
     * @param $id
     * @return mixed
     */
    public function detailsAdvertisement($id);



    public function searchAdvertisementData($businessId,$start_date,$end_date,$keyword);


    public function viewAdvertisement($userId,$advertisementId);



    public function userview($id);
}
