<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Qualification ;
use DB;
class QualificationController extends Controller
{
	/**
     * Return add more row of Qualification.
     *
     * @return \Illuminate\Http\Response
     */
    public function getQualificationListForm(Request $request)
    {   
        $randomNo= time() ;
    	$qualifications = \App\Qualification::pluck('qualificationName','id')->prepend('Select Qualification','');
        return view('qualification.add_more_qualification',compact('qualifications',
            'randomNo'));
    }   
}