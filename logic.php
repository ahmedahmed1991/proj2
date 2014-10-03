<?php



$count=0;
if(isset($_POST['count'])) {
    $count = $_POST['count'];
    //if (!is_numeric($count)) {
      //return 'Sorry, there was an error with your amount of words!';
    //}
}

if(isset($_POST['uppercase'])) {
  $uppercase = true;
} else{
  $uppercase = false;
}

if(isset($_POST['symbol'])) {
  $symbol = true;
} else {
	$symbol = false;
}

if(isset($_POST['number'])) {
   $number = true;
} else {
	$number = false;
}

if ($words = file('words.txt')) {
   
   $selected_words = [];

   $symbollist = ['!','@','#','$','&','%'];
   $numberlist = [0,1,2,3,4,5,6,7,8,9];

   for($i =0; $i < $count; $i++){
    $max = count($words) ;
   	$rand = rand(0, $max);
    $word = $words[$rand];
    array_push($selected_words, $word);
   }

   if ($uppercase) {
    foreach ($selected_words as $key => $word) {
      $selected_words[$key] = ucfirst($word);
    }
   }


   if ($symbol){
     $maxx = count($symbollist) ;
    $randsy = rand(0, $maxx);
    $wordsy = $symbollist[$randsy];
    array_push($selected_words, $wordsy);
  }
   if ($number){
    $maxi = count($numberlist) ;
    $randnu = rand(0, $maxi);
    $wordnu = $numberlist[$randnu];
    array_push($selected_words, $wordnu);
   

     
  }
   $password = implode("", $selected_words);
}
