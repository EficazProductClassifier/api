<?php

namespace App\Contracts;

interface IRepository 
{
   /**
     * Gets all the values for a given resource. 
     *
     * @return mixed
     */
    function all();

    /**
     * Gets a value for especific resource.
     *
     * @param int $resource_id
     * @return \Illuminate\\Database\\Eloquent\\Model;
     */
    function get(int $resource_id);

    /**
     * Storing logic for the resource.
     *
     * @param array $resource_data
     * @return \Illuminate\\Database\\Eloquent\\Model;
     */
    function store(array $resource_data);

    /**
     * Updating logic.
     *
     * @param array $resource_data
     * @param int   $resource_id
     * @return \Illuminate\\Database\\Eloquent\\Model;
     */
    function update(array $resource_data, int $resource_id);


    /**
     * Deletion logic.
     *
     * @param int $resource_id
     * @return mixed
     */
    function delete(int $resource_id);
}
