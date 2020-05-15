<?php


$_GET['plat'];

$platform = $_GET['plat'];

if ($platform == "pc"){
    $platvar = "pc";
} else if ($platform == "xb1") {
    $platvar = "xb1";
} else if($platform == "ps4") {
    $platvar = "ps4";
} else if ($platform = "swi"){
	$platvar = "swi";
}

$warframe = "https://api.warframestat.us/".$platvar."/";
$content = file_get_contents($warframe);
$json = json_decode($content, true);

//sorties
$sortieboss = $json['sortie']['boss'];
$sortiefaction = $json['sortie']['faction'];
$sortieeta = $json['sortie']['eta'];

//voidtrader
$voidtraderlocation = $json['voidTrader']['location'];
$voidtraderending = $json['voidTrader']['endString'];
$voidtraderstarting = $json['voidTrader']['startString'];

//dailydeals
$dailydealsitem = $json['dailyDeals']['0']['item'];
$dailydealswasprice = $json['dailyDeals']['0']['originalPrice'];
$dailydealsdiscount = $json['dailyDeals']['0']['discount'];
$dailydealssale = $json['dailyDeals']['0']['salePrice'];
$dailydealseta = $json['dailyDeals']['0']['eta'];

//earthtimezone
$earthtimeLeft = $json['earthCycle']['timeLeft'];


//cetustimezone
$cetustimeLeft = $json['cetusCycle']['timeLeft'];

//fortunatimezone
$fortunatimeLeft = $json['vallisCycle']['timeLeft'];

header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');

$ar = [];
$ar['Warframe'] = [];

$ar["Warframe"]["sortie"]["message"] = (string) "fighting the boss of ".$sortieboss.", at <br>".$sortiefaction.". expire at ".$sortieeta;
$ar["Warframe"]["dailyDeals"]["message"] = (string) $dailydealsitem.", Selling for ".$dailydealssale.", Discount on ".$dailydealsdiscount."%. <br>end sales at ".$dailydealseta;

if ($json['voidTrader']['active'] == true){
	$ar["Warframe"]["baro"]["message"] = (string) "Baro Ki'Teer has Arrived. him in planet ".$voidtraderlocation;
} else {
	$ar["Warframe"]["baro"]["message"] = (string) "Baro Ki'Teer is not here. him will be arriving <br>in, ".$voidtraderstarting;
}

if ($json['earthCycle']['isDay'] == true){
	$ar["Warframe"]["earth"]["message"] = (string) "Earth is Day, going be night in ".$earthtimeLeft;
} else {
	$ar["Warframe"]["earth"]["message"] = (string) "Earth is Night, going be day in ".$earthtimeLeft;
}

if ($json['cetusCycle']['isDay'] == true){
	$ar["Warframe"]["cetus"]["message"] = (string) "Cetus is Day, going be night in ".$cetustimeLeft;
} else {
	$ar["Warframe"]["cetus"]["message"] = (string) "Cetus is Night, going be day in ".$cetustimeLeft;
}

if ($json['vallisCycle']['isWarm'] == true){
	$ar["Warframe"]["fortuna"]["message"] = (string) "Fortuna is Warm, going be cold in ".$fortunatimeLeft;
} else {
	$ar["Warframe"]["fortuna"]["message"] = (string) "Fortuna is Cold, going be warm in ".$fortunatimeLeft;
}

//$ar = array('title' => $song, 'listeners' => $listerners, 'streamtitle' => $title);
echo json_encode($ar); // ["apple","orange","banana","strawberry"]
?>