<?php

namespace App\Traits;

use Illuminate\Support\Str;

/**
 * Uses Eloquent Models Events for detecting
 * a new row on the database and generate a uuid
 * for the model.
 */
trait Uuid
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            try {
                $model->uuid = (string) Str::uuid(); // generate uuid
            } catch (UnsatisfiedDependencyException $e) {
                abort(500, $e->getMessage());
            }
        });
    }
}
