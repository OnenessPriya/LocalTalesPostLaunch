<?php

namespace App\Contracts;

/**
 * Interface ProductContract
 * @package App\Contracts
 */
interface MarketProductContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listproduct(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findproductById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createproduct(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateproduct(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteproduct($id);

     /**
     * @param $id
     * @return mixed
     */
    public function detailsproduct($id);
   // public function updateCategoryStatus(array $params);
}
