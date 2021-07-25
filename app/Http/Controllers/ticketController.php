<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use File;
use Log;



class ticketController extends Controller
{



    function getticketDetails(){
     $ticketModel = new Ticket();
     $data = $ticketModel->getTicketDetails();
     return response()->json($data);
    }

    // function addticketDetails(Request $request){
    //     dd($request);
    //     echo "hello";
    // }

    
    function  addTicketDetails(Request $request)
    {
       $ticketModel = new Ticket();
       $data=$ticketModel->addticket($request->all());
       return response()->json(['status_code'=>'2000', 'status_message'=>'requested data returned successfully', 'data' => $data], 200);
       
    }


    function arraysave(&$trainSeats){
      
        $savedtrainSeats = $trainSeat;
        return  $savedtrainSeats;
    }


   public function  numberOfZeroes($trainSeats,$i){
        $p=$i;
        $noofZero=0;
        // $c=0;
        $trainSeatsArr = $trainSeats;
        $size = sizeof($trainSeatsArr[$p]);
        for( $k=0; $k<$size; $k++){		
          if(isset($trainSeats[$p][$k])){	
          if ($trainSeats[$p][$k] == 0){
          $noofZero++;
           }
         }
      }
      return $noofZero;
    }


    function seatsbooked(Request $request){
        $seatstobebooked = $request->get('seatstobebooked');
        $trainSeats=$request->get('trainSeats');
        $bookedTicketNumber=array();
        $ticketNumber = $request->get('ticketNumber');
      for ($i =0; $i<12; $i++){ 
        Log::info('inside for'.$i);
        $size = sizeof($trainSeats[$i]);
        for ($j=0; $j<$size; ++$j)
        {   
          Log::info('inside for the value of j is'.$j); 
          if(isset($i)){

          if($i == 0){
          $ticketNumber = $i+'1'.'00'.$j+'1';
          }
         else{
          $ticketNumber = $i+'1'.'00'.$j-$i+1;
          }
        }
        $countZeroes=$this->numberOfZeroes($trainSeats,$i);
        Log::info( 'value of count of zero'.$countZeroes);
        Log::info('value of seatstobebooked: '.$seatstobebooked);
        if ($seatstobebooked<=$countZeroes){

          $c=0;
          while($seatstobebooked!=0 && $c<$size){
            if(isset($trainSeats[$i][$c])){
              while ($trainSeats[$i][$c] == 1){
               $c++;
              }
              $trainSeats[$i][$c]=1;
            }
          array_push($bookedTicketNumber,$ticketNumber);
          $ticketNumber++;
          $seatstobebooked--; 
          $c++;   
          }
            }
        
        else{
        log::info('inside else'.$i.'and the value of j is'.$j);
        $i++;
        } 
      } 
}
// return JSON.stringify(['tickets'=>$bookedTicketNumber,'seatsArray'=>$trainSeats]);
// return response()->json(['tickets'=>$bookedTicketNumber,'seatsArray'=>$trainSeats]);
    // return json_encode(['tickets'=>$bookedTicketNumber,'seatsArray'=>$trainSeats]);
    return json_encode(['tickets'=>$bookedTicketNumber,'seatsArray'=>$trainSeats,'ticketNumber'=>$ticketNumber]);
   }
 }

//  $tick = new ticketController;

