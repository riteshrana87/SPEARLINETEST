<?php

use Illuminate\Support\Facades\Session;

	/*
		@Author : Ritesh Rana
		@Desc   : Get Number Of Fails
		@Output : \Illuminate\Http\Response
		@Date   : 18/07/2022
	*/
	function getNumberOfFails($job_id){
		/* Start Create Query for find Number Of Fails */
	   $jp = DB::table('job_processing')->where('job_id',$job_id)->where('call_description_id','!=','')->count();
	   $jpe = DB::table('job_processing_echo')->where('job_id',$job_id)->where('call_description_id','!=','')->count();
	   $jpf = DB::table('job_processing_failover')->where('job_id',$job_id)->where('call_description_id','!=','')->count();
		/* End Create Query for find Number Of Fails */
	   return $jp+$jpe+$jpf;
   }

   /*
		@Author : Ritesh Rana
		@Desc   : Get Number Of Test Success
		@Output : \Illuminate\Http\Response
		@Date   : 18/07/2022
	*/
    function getNumberOfTestSuccess($job_id){
        /* Start Create Query for find Number Of Test */
        $jp = DB::table('job_processing')->where('job_id',$job_id)->count();
        $jpe = DB::table('job_processing_echo')->where('job_id',$job_id)->count();
        $jpf = DB::table('job_processing_failover')->where('job_id',$job_id)->count();
        /* End Create Query for find Number Of Test */
        return $jp+$jpe+$jpf;
    }

?>