<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
class Product extends Model
{
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

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
        
        'image',
        'image1',
        'image2',
        'image3',
        'qr',
        'name',
        'description',
        'category',
        'sds',
        'tds',
        'idea'

        
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


    public static function getproductData(){
        $value=DB::table('products')->orderBy('_id', 'asc')->get();
        return $value;
      }
    public static function getData($id)
    {
        $value=DB::table('products')->where('_id', $id)->get();
        return $value;
    }
}
