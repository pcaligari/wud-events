<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    /**
     * The table associated with the model explisity stated here as the default
     * 'snake case' pluralisation wouldn't make a good matching table name
     *
     * @var string
     */
    protected $table = 'status';

    public $timestamps = false;
}
