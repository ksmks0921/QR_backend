<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\DeleteUserAccount;
use App\Http\Requests\UpdateUserPasswordRequest;
use App\Http\Requests\UpdateUserProfile;
use App\Models\Profile;
use App\Models\Theme;
use App\Models\User;
use App\Notifications\SendGoodbyeEmail;
use App\Traits\CaptureIpTrait;
use File;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Image;
use jeremykenedy\Uuid\Uuid;
use Validator;
use View;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;  

class SenddataController extends Controller
{
    protected $idMultiKey = '618423'; //int
    protected $seperationKey = '****';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Fetch user
     * (You can extract this to repository method).
     *
     * @param $username
     *
     * @return mixed
     */


    
    public function sendData ($id){

        $data = Product::getData($id);
        return response()->json(['path' => $data], 200);

    }

    public function sendpdf($pdf,$id){

        $first_data = Product::where('_id' ,$id)->get()->toArray();
        if($pdf == 'tds'){
            $data = $first_data[0]['tds'];

        }
        else {$data = $first_data[0]['sds']; }
         $url = url('/').'/'.$data;

        return response()->json([ 'url'=>$url],200);
    }





}