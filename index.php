<?php 

    
    $_GET['plat'];

    $platform = $_GET['plat'];

    if ($platform == "pc") {
        $selectedplatform = "PC";
    } else if ($platform == "xb1") {
        $selectedplatform = "XB1";
    } else if ($platform == "ps4") {
        $selectedplatform = "PS4";
    } else if ($platform == "swi") {
        $selectedplatform = "SWITCH";
    }

    $page = $_SERVER['PHP_SELF']. "?plat=".$platform;
    $sec = "120";

    header("Refresh: $sec; url=$page");
    $url = "https://" . $_SERVER['HTTP_HOST'] . "/api/warframeapi.php?plat=".$platform;
    $content = file_get_contents($url);
    $json = json_decode($content, true);
    $Warframebaro = $json['Warframe']['baro']['message'];
    $Warframecetus = $json['Warframe']['cetus']['message'];
    $WarframeDD = $json['Warframe']['dailyDeals']['message'];
    $Warframeearth = $json['Warframe']['earth']['message'];
    $Warframesortie = $json['Warframe']['sortie']['message'];
    $Warframefortuna = $json['Warframe']['fortuna']['message'];
?>


<!DOCTYPE html>
<html lang="en"><head>

  <meta charset="UTF-8"> 
  
  
<style>
@import url("https://fonts.googleapis.com/css?family=Source+Sans+Pro");
body {
  padding: 0;
  margin: 0;
}
body .nowplayingcard {
  min-width: 400px;
  max-width: 40%;
  font-family: "Source Sans Pro", sans-serif;
  font-size: 13px;
  background-color: #ffffff;
}
body .nowplayingcard .nowplayingcontainer-inner {
  width: 100%;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  transition: 0.3s;
  display: inline-block;
  -webkit-border-top-left-radius: 3px;
  -moz-border-top-left-radius: 3px;
  -ms-border-top-left-radius: 3px;
  -o-border-top-left-radius: 3px;
  border-top-left-radius: 3px;
  -webkit-border-bottom-left-radius: 3px;
  -moz-border-bottom-left-radius: 3px;
  -ms-border-bottom-left-radius: 3px;
  -o-border-bottom-left-radius: 3px;
  border-bottom-left-radius: 3px;
}
body .nowplayingcard .nowplayingcontainer-inner:hover {
  box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
}
body .nowplayingcard .nowplayingcontainer-inner img#trackart {
  max-width: 30%;
  float: left;
  left: 0;
  -webkit-border-top-left-radius: 3px;
  -moz-border-top-left-radius: 3px;
  -ms-border-top-left-radius: 3px;
  -o-border-top-left-radius: 3px;
  border-top-left-radius: 3px;
  -webkit-border-bottom-left-radius: 3px;
  -moz-border-bottom-left-radius: 3px;
  -ms-border-bottom-left-radius: 3px;
  -o-border-bottom-left-radius: 3px;
  border-bottom-left-radius: 3px;
}
body .nowplayingcard .nowplayingcontainer-inner .trackInfo {
  width: 70%;
  float: left;
  display: block;
}
body .nowplayingcard .nowplayingcontainer-inner .trackInfo a {
  max-width: 90%;
  display: block;
  font-size: 14px;
  text-align: left;
  text-decoration: none;
  vertical-align: middle;
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
}
body .nowplayingcard .nowplayingcontainer-inner .trackInfo a:nth-child(odd) {
  color: black;
  font-weight: bold;
  vertical-align: middle;
  line-height: 15px;
  letter-spacing: 0.2px;
  padding: 10% 0 0 5%;
}
body .nowplayingcard .nowplayingcontainer-inner .trackInfo a:nth-child(odd) img {
  width: 15px;
  height: 15px;
  vertical-align: middle;
  margin: -2% 3px 0 0;
}
body .nowplayingcard .nowplayingcontainer-inner .trackInfo a:nth-child(even) {
  color: #444444;
  font-size: 12px;
  letter-spacing: 0.1px;
  padding: 5% 0 0 5%;
}
body .nowplayingcard .nowplayingcontainer-inner .trackInfo a:nth-child(even) img {
  width: 15px;
  height: 15px;
  vertical-align: middle;
  margin: -2% 3px 0 0;
}

.Container {
	float: left;
	height: 90px;
	width: 400px;
}
.data {
	float: left;
	height: 50px;
	width: 400px;
}

#slideshow > div {
  position: absolute;
  color: #7CFC00;
}


</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>

<?php if ($platform == "pc" || $platform == "ps4" || $platform == "xb1" || $platform == "swi") { ?>
<div class="Container">
	<div class="data">
    	<div id="slideshow">
   		<div>

  			<div class="nowplayingcard">
				<div class="nowplayingcontainer-inner">
					<img id="trackart" src="https://vignette.wikia.nocookie.net/warframe/images/1/15/Sortie_b.png/revision/latest?cb=20151217134250">
					<div class="trackInfo">
						<a id="tracktitle" href="#" title="" target="_blank"><img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/62ad8921-7468-410e-ae0e-103ede928999/d87344n-04b3b78f-9eb2-479f-be57-236e7ba56cad.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOiIsImlzcyI6InVybjphcHA6Iiwib2JqIjpbW3sicGF0aCI6IlwvZlwvNjJhZDg5MjEtNzQ2OC00MTBlLWFlMGUtMTAzZWRlOTI4OTk5XC9kODczNDRuLTA0YjNiNzhmLTllYjItNDc5Zi1iZTU3LTIzNmU3YmE1NmNhZC5wbmcifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6ZmlsZS5kb3dubG9hZCJdfQ.HYIdUToIa1zjmyIAISyaxZlU3fXxnkJPJj4jfxpedZk">Warframe Sortie (<?php echo $selectedplatform; ?>)</a>
						<a href="#" id="trackartist" title=""><img src="https://vignette.wikia.nocookie.net/warframe/images/1/15/Sortie_b.png/revision/latest?cb=20151217134250"><?php echo $Warframesortie; ?></a>
					</div>
				</div>
			</div>
		</div>

		<div>

  			<div class="nowplayingcard">
				<div class="nowplayingcontainer-inner">
					<img id="trackart" src="http://content.warframe.com/MobileExport/Lotus/Interface/Icons/Player/GlyphBaro.png">
					<div class="trackInfo">
						<a id="tracktitle" href="#" title="" target="_blank"><img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/62ad8921-7468-410e-ae0e-103ede928999/d87344n-04b3b78f-9eb2-479f-be57-236e7ba56cad.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOiIsImlzcyI6InVybjphcHA6Iiwib2JqIjpbW3sicGF0aCI6IlwvZlwvNjJhZDg5MjEtNzQ2OC00MTBlLWFlMGUtMTAzZWRlOTI4OTk5XC9kODczNDRuLTA0YjNiNzhmLTllYjItNDc5Zi1iZTU3LTIzNmU3YmE1NmNhZC5wbmcifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6ZmlsZS5kb3dubG9hZCJdfQ.HYIdUToIa1zjmyIAISyaxZlU3fXxnkJPJj4jfxpedZk">Warframe Baro (<?php echo $selectedplatform; ?>)</a>
						<a href="#" id="trackartist" title=""><img src="http://content.warframe.com/MobileExport/Lotus/Interface/Icons/Player/GlyphBaro.png"><?php echo $Warframebaro; ?></a>
					</div>
				</div>
			</div>
		</div>

		<div>

  			<div class="nowplayingcard">
				<div class="nowplayingcontainer-inner">
					<img id="trackart" src="https://n8k6e2y6.ssl.hwcdn.net/promo_assets/darvodeals/images/smug.png">
					<div class="trackInfo">
						<a id="tracktitle" href="#" title="" target="_blank"><img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/62ad8921-7468-410e-ae0e-103ede928999/d87344n-04b3b78f-9eb2-479f-be57-236e7ba56cad.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOiIsImlzcyI6InVybjphcHA6Iiwib2JqIjpbW3sicGF0aCI6IlwvZlwvNjJhZDg5MjEtNzQ2OC00MTBlLWFlMGUtMTAzZWRlOTI4OTk5XC9kODczNDRuLTA0YjNiNzhmLTllYjItNDc5Zi1iZTU3LTIzNmU3YmE1NmNhZC5wbmcifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6ZmlsZS5kb3dubG9hZCJdfQ.HYIdUToIa1zjmyIAISyaxZlU3fXxnkJPJj4jfxpedZk">Warframe Daily Deals (<?php echo $selectedplatform; ?>)</a>
						<a href="#" id="trackartist" title=""><img src="https://n8k6e2y6.ssl.hwcdn.net/promo_assets/darvodeals/images/smug.png"><?php echo $WarframeDD; ?></a>
					</div>
				</div>
			</div>
		</div>

		<div>

  			<div class="nowplayingcard">
				<div class="nowplayingcontainer-inner">
					<img id="trackart" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWg_hjMB3TOPCu_l4gnKbPo70quTt9Nnhq5E_iRWR8-LbZ6iXy">
					<div class="trackInfo">
						<a id="tracktitle" href="#" title="" target="_blank"><img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/62ad8921-7468-410e-ae0e-103ede928999/d87344n-04b3b78f-9eb2-479f-be57-236e7ba56cad.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOiIsImlzcyI6InVybjphcHA6Iiwib2JqIjpbW3sicGF0aCI6IlwvZlwvNjJhZDg5MjEtNzQ2OC00MTBlLWFlMGUtMTAzZWRlOTI4OTk5XC9kODczNDRuLTA0YjNiNzhmLTllYjItNDc5Zi1iZTU3LTIzNmU3YmE1NmNhZC5wbmcifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6ZmlsZS5kb3dubG9hZCJdfQ.HYIdUToIa1zjmyIAISyaxZlU3fXxnkJPJj4jfxpedZk">Warframe Cetus Daylight (<?php echo $selectedplatform; ?>)</a>
						<a href="#" id="trackartist" title=""><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWg_hjMB3TOPCu_l4gnKbPo70quTt9Nnhq5E_iRWR8-LbZ6iXy"><?php echo $Warframecetus; ?></a>
					</div>
				</div>
			</div>
		</div>

		<div>

  			<div class="nowplayingcard">
				<div class="nowplayingcontainer-inner">
					<img id="trackart" src="http://i.imgur.com/fPHwJkH.jpg">
					<div class="trackInfo">
						<a id="tracktitle" href="#" title="" target="_blank"><img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/62ad8921-7468-410e-ae0e-103ede928999/d87344n-04b3b78f-9eb2-479f-be57-236e7ba56cad.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOiIsImlzcyI6InVybjphcHA6Iiwib2JqIjpbW3sicGF0aCI6IlwvZlwvNjJhZDg5MjEtNzQ2OC00MTBlLWFlMGUtMTAzZWRlOTI4OTk5XC9kODczNDRuLTA0YjNiNzhmLTllYjItNDc5Zi1iZTU3LTIzNmU3YmE1NmNhZC5wbmcifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6ZmlsZS5kb3dubG9hZCJdfQ.HYIdUToIa1zjmyIAISyaxZlU3fXxnkJPJj4jfxpedZk">Warframe Earth Daylight (<?php echo $selectedplatform; ?>)</a>
						<a href="#" id="trackartist" title=""><img src="http://i.imgur.com/fPHwJkH.jpg"><?php echo $Warframeearth; ?></a>
					</div>
				</div>
			</div>
		</div>

        <div>

  			<div class="nowplayingcard">
				<div class="nowplayingcontainer-inner">
					<img id="trackart" src="https://cdnb.artstation.com/p/assets/covers/images/012/032/643/large/yuriy-zadorozhny-aeron-fortuna.jpg?1532659596">
					<div class="trackInfo">
						<a id="tracktitle" href="#" title="" target="_blank"><img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/62ad8921-7468-410e-ae0e-103ede928999/d87344n-04b3b78f-9eb2-479f-be57-236e7ba56cad.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOiIsImlzcyI6InVybjphcHA6Iiwib2JqIjpbW3sicGF0aCI6IlwvZlwvNjJhZDg5MjEtNzQ2OC00MTBlLWFlMGUtMTAzZWRlOTI4OTk5XC9kODczNDRuLTA0YjNiNzhmLTllYjItNDc5Zi1iZTU3LTIzNmU3YmE1NmNhZC5wbmcifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6ZmlsZS5kb3dubG9hZCJdfQ.HYIdUToIa1zjmyIAISyaxZlU3fXxnkJPJj4jfxpedZk">Warframe Fortuna (<?php echo $selectedplatform; ?>)</a>
						<a href="#" id="trackartist" title=""><img src="https://cdnb.artstation.com/p/assets/covers/images/012/032/643/large/yuriy-zadorozhny-aeron-fortuna.jpg?1532659596"><?php echo $Warframefortuna; ?></a>
					</div>
				</div>
			</div>
		</div>

    </div>
</div>
<script>
$("#slideshow > div:gt(0)").hide();

setInterval(function() {
  $('#slideshow > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshow');
}, 20000);
</script>

<?php } else { ?>


    <div class="nowplayingcard">
				<div class="nowplayingcontainer-inner">
					<img id="trackart" src="https://i.ya-webdesign.com/images/free-png-icons-transparent-background-7.png">
					<div class="trackInfo">
						<a id="tracktitle" href="#" title="" target="_blank"><img src="https://i.ya-webdesign.com/images/free-png-icons-transparent-background-7.png">ERROR:</a>
						<a href="#" id="trackartist" title=""><img src="https://cdn.iconscout.com/icon/premium/png-512-thumb/message-174-141494.png">Platform hasnt been Defined Correctly,<br>Please choose (pc|xb1|ps4|swi) as main Platforms</a>
					</div>
				</div>
			</div>


<?php } ?>
 
</body></html>