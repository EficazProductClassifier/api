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
     * @param string $resource_uuid
     * @return \Illuminate\\Database\\Eloquent\\Model;
     */
    function get(string $resource_uuid);

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
     * @param string $resource_uuid
     * @return \Illuminate\\Database\\Eloquent\\Model;
     */
    function update(array $resource_data, string $resource_uuid);


    /**
     * Deletion logic.
     *
     * @param string $resource_uuid
     * @return mixed
     */
    function delete(string $resource_uuid);
}
