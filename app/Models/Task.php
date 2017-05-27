<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // Reference to table name for model if not convention
    /*
    protected $table = "templates";
    */

    // Reference to the DB connection to be used for access to the database/tables
    /*
    protected $connection = 'mysql';
	*/

    // Reference to columns allowed to be mass assigned via ->create(...) / ->update(...) (inverse of $guarded)
    protected $fillable = [
		'title',
		'description',
		'path',
		'template_id',
    ];
	
    // Reference to columns not allowed to be mass assigned via ->create(...) / ->update(...) (inverse of $fillabe)
    /*
    protected $guarded  = [
		'id'
    ];
    */

    // Indicates if laravel should expect default timestamp fields to be present on the model ( created_at & updated_at )
    /*
    public $timestamps = false;
	*/

    // Indicates to laravel that the `created_at` and `updated_at` attributes have different column names within the schema
    /*
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';
    */

    // Define the fields to be treated as dates (timestamp) from the database 
    /*
    protected $dates = [
    	'deleted_at'
    ];
    */

    // Define the format of the Dates sued
    /*
    protected $dateFormat = 'U';
    */


    /**
     * Get the template record associated with the task.
     */
    public function template()
    {
        return $this->belongsTo('App\Models\Template');
    }
}
