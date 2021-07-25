<?php

namespace App\Models;
use DB;

class Ticket
{


//  public $trainSeats  = array(
//     array(0,0,0,0,0,0,0),
//     array(0,0,0,0,0,0,0),
//     array(0,0,0,0,0,0,0),
//     array(0,0,0,0,0,0,0),
//     array(0,0,0,0,0,0,0),
//     array(0,0,0,0,0,0,0),
//     array(0,0,0,0,0,0,0),
//     array(0,0,0,0,0,0,0),
//     array(0,0,0,0,0,0,0),
//     array(0,0,0,0,0,0,0),
//     array(0,0,0,0,0,0,0),
//     array(0,0,0)
// );

    function  numberOfZeroes($trainSeats,$i,$countZero){
      $p=$i;
      $q=$countZero;
      $trainSeatsArr = $trainSeats;
  //  dd($trainSeatsArr);
      for( $k=0; $k<7; $k++){			
        // if (array_search(0, array_column($trainSeatsArr, '$k')) !== FALSE) {
        if ($trainSeatsArr[$p][$k] == '0'){
        $q++;
       }
      //  dd($q);
       return $q;
    }
  }


    function getTicketDetails()
    {
      $data =  DB::table('ticket')->get();
    //   dd($data);
      return $data;
    }

    function addticket($data){
         
        DB::table('ticket')->insert($data);

    }

    function insertticket($data){
         
      $data=DB::table('ticket')->insert($data);
      return $data;
    
  }

    }