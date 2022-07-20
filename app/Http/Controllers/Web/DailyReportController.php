<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use App\Models\Company;
use App\Models\CountryCode;
use App\Models\JobProcessing;
use App\Models\JobProcessingEcho;
use App\Models\JobProcessingFailover;

use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Services\DataTableService;

class DailyReportController extends Controller
{
    public function __construct()
    {
        $this->dataTable = new DataTableService();
    }

   /*
		@Author : Ritesh Rana
		@Desc   : Daily report listing
		@Output : \Illuminate\Http\Response
		@Date   : 17/07/2022
	*/
    public function index(Request $request){
        /* Start filter data */
        $daterange= $request->daterange;
        $company= $request->company;
        $country= $request->country;
        /* End filter data */
    	$data['page_title'] = 'Daily Report';
        /* Start Js data */
		$data['page_js'] = array(
            'backend/assets/dailyReport/js/daily_report.js'
        );
        /* End Js data */
        /* Start CSS data */
        $data['extra_css'] = array(
            'plugins/table/datatable/datatables.css',
			'plugins/icheck-bootstrap/icheck-bootstrap.min.css',
			'plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css',
			'plugins/bootstrap-switch/custom/css/bootstrap-switch.css',
        );
         /* End CSS data */
        /* Start CND CSS */
		$data['cdnurl_css'] = array(
            'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css'
        );
        /* End CND CSS */
        /* Start CND JS */
		$data['cdnurl_js'] = array(
            'https://cdn.jsdelivr.net/momentjs/latest/moment.min.js',
            'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js',
        );
        /* End CND Js */
        /* Start extra JS */
		$data['extra_js'] = array(
            'plugins/datatables/jquery.dataTables.min.js',
            'plugins/datatables/dataTables.buttons.min.js',
            'plugins/datatables/jszip.min.js',
            'plugins/datatables/buttons.html5.min.js',
            'plugins/datatables/bootstrap.bundle.min.js',
            'plugins/table/datatable/datatables.js',
			'plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js',
			'plugins/bootstrap-switch/custom/js/bootstrap-switch.js',
        );
        /* End extra JS */
		/* Start Call ajax  */
		
        if ($request->ajax()) {
            /* Start create Query  */
            $select = ['country_code_id','job_id','number_id','call_start_time','call_connect_time','call_end_time','call_description_id','created_on'];

           $silver2 = JobProcessingEcho::select($select)->join('number','number.id','=','number_id')->groupBy('number.country_code_id');
           $silver3 = JobProcessingFailover::select($select)->join('number','number.id','=','number_id')->groupBy('number.country_code_id');
           /* Start filter data by company  */
           if($request->company){
            $silver2 = $silver2->where('number.company_id',$request->company);
            $silver3 = $silver3->where('number.company_id',$request->company);
           }

           if($request->country){
                $silver2 = $silver2->where('number.country_code_id',$request->country);
                $silver3 = $silver3->where('number.country_code_id',$request->country);
           }
            /* End filter data by company  */
           /* Start filter data by start date and end date  */
           if($request->daterange){
             $getDates = explode('-',$request->daterange);
             $from = date('Y-m-d',strtotime($getDates[0]));
             $to = date('Y-m-d',strtotime($getDates[1]));

             $silver2 = $silver2->whereBetween('created_on', [$from,$to]);
             $silver3 = $silver3->whereBetween('created_on', [$from, $to]);
           }
            /* End filter data by start date and end date  */
            /* Start query   */
            $query = JobProcessing::with(['getJob','getNumber','getNumber.getCompany','getNumber.getCountry'])
            ->union($silver2)->union($silver3)
            ->select($select)
            ->join('number','number.id','=','number_id')
            ->join('job','job.id','=','job_id')
            ->where((function($q) use($request) {
                    if($request->country){
                        $q->where('number.country_code_id',$request->country);
                    }
                    if($request->company){
                        $q->where('number.company_id',$request->company);
                    }
                    if($request->daterange){
                        $getDates = explode('-',$request->daterange);
                        $from = date($getDates[0]);
                        $to = date($getDates[1]);

                        $q->whereBetween('created_on', [$from,$to]);
                    }
            }))
            ->groupBy('number.country_code_id');
            /* End Query */

        /* Start datatable Column */
        return DataTables::eloquent($query)
                ->addColumn('id', function ($query) {
                    return $query->job_id;
                })
                ->addColumn('number_of_fails', function ($query) {
                    return getNumberOfFails($query->job_id);
                })
                ->addColumn('number_of_test', function ($query) {
                    return getNumberOfTestSuccess($query->job_id);
                })
                ->addColumn('country_name', function ($query){
                    $getCountryName = DB::table('country_code')->where('id',$query->country_code_id)->first();
                    return $getCountryName->country_name;
                })
                ->addColumn('connection_rate', function ($query) {
                    if(getNumberOfFails($query->job_id) < getNumberOfTestSuccess($query->job_id)){
                        if(getNumberOfFails($query->job_id) == 0){
                            return '100%';
                        }else{
                            return ((getNumberOfFails($query->job_id)/getNumberOfTestSuccess($query->job_id)) * 100) .'%';
                        }
                    }else return '0%';
                })
                ->addColumn('created_on', function ($query) {
                    return date('D, Y-m-d H:m A',strtotime($query->created_on));
                })
                ->addColumn('post_dial_delay', function ($query) {
                    if($query->call_description_id == ''){
                        if( $query->call_connect_time == '0000-00-00 00:00:00'){
                            return '0 Seconds';
                        }
                        $timeFirst  = strtotime($query->call_start_time);
                        $timeSecond = strtotime($query->call_connect_time);
                        return $timeSecond - $timeFirst .' Seconds';
                    }else{
                        return 'NA';
                    }
                })
                ->make(true);
        }
        /* End datatable Column */
        /* End Call ajax  */
        /* start Get Company and Country data */
        $companyData = Company::get();
        $countryCode = CountryCode::get();
        $data['companys'] = $companyData;
        $data['countrys'] = $countryCode;
        /* End Get Company and Country data */
        return view('dailyReport.daily_report_list',$data);
    }
}
