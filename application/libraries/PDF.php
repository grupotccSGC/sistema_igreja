<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class PDF {

	public function __construct(){
		require_once 'mpdf/mpdf.php';
      }


        public function objeto()
        {
            return new mPDF('en-GB-x","A4","","",10,10,10,10,6,3'); 
        }

       
}
