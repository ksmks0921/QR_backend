<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //


    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'category';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $primaryKey = '_id';

    /**
     * Fillable fields for a Profile.
     *
     * @var array
     */
    protected $fillable = [
        '_id',
        'category'
        
    ];

    

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return array
     */

    /**
     * Build Theme Relationships.
     *
     * @var array
     */


    public static function getcategoryData(){
        $value=DB::table('category')->orderBy('_id', 'asc')->get();
        return $value;
      }
    public static function getData($id)
    {
        $value=DB::table('products')->where('_id', $id)->get();
        return $value;
    }
}
