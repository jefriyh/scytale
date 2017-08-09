 <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
     <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css">


          


      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body style="margin-left:20%; margin-right:20%;">
      
		<div class="row">
<h2 align="center">Scytale Encryption</h2>
    <form class="col s12" method="get" >
      <div class="row">
        <div class="input-field col s12">
          <input id="token" type="text" name="token" class="validate">
          <label for="token" data-error="wrong" data-success="right">Token</label>
        </div>
 <div class="input-field col s12">
          <input id="kolom" type="number" name="kolom" class="validate" value="5" min="3" max="10">
          <label for="kolom" data-error="wrong" data-success="right">Kolom</label>
        </div>
       <div class="col s6">
      <input name="encrypt" type="radio" id="encrypt" name="radio" value="encrypt" />
      <label for="encrypt">Encrypt</label>
    </div>
    <div class="col s6">
      <input name="encrypt" type="radio" id="decrypt" value="decrypt" />
      <label for="decrypt">Decrypt</label>
    </div>
<br>
    <input class="waves-effect waves-light btn" type="submit" value="Convert">


      </div>
    </form>

    <?php
    $value="";
    if(!empty($_GET['token'])&&!empty($_GET['kolom'])){
    	if (!empty($_GET['encrypt'])) {
		if($_GET['encrypt']=="encrypt"){
$value= encrypt2($_GET['token'], $_GET['kolom']);
		}
elseif($_GET['encrypt']=="decrypt"){
$value= decrypt2($_GET['token'], $_GET['kolom']);
		}
    		
    	}

    }
    ?>
 
	 <div class="input-field col s12">
          <input read-only id="result" type="text" class="validate" value="<?php echo $value;?>" readonly>
          <label for="result" data-error="wrong" data-success="right">Result</label>
      </div>

  </div>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  	  <!-- Compiled and minified JavaScript -->
  	  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>
    </body>
  </html>
        



<?php








function encrypt2($kalimat, $kolom){
$token =  str_split($kalimat);
$baris = count($token)/$kolom;
$kalimat="";

for($i=0;$i<$kolom;$i++){
	for($j=0;$j<$baris;$j++){
		if(($j*$kolom)+$i<count($token)){
			$kalimat = $kalimat.$token[($j*$kolom)+$i];
		}
		else{
			$kalimat = $kalimat."*";
		}
	}
}

return $kalimat;
}



function decrypt2($kalimat, $kolom){
$token =  str_split($kalimat);
$baris = count($token)/$kolom;
$kalimat="";

for($j=0;$j<$baris;$j++){
	for($i=0;$i<$kolom;$i++){
		if(($j*$kolom)+$i<count($token)){
			$kalimat = $kalimat.$token[($i*$baris)+$j];
		}
		
	}
}

return $kalimat;
}







function decrypt($kalimat, $kolom){
$token =  str_split($kalimat);
$baris = count($token)/$kolom;
$array;

for($j=0;$j<$kolom;$j++){
	for($i=0;$i<$baris;$i++){
		$array[$i][$j] = $token[($j*$baris)+$i];
	}
}

$kalimat="";
for($i=0;$i<$baris;$i++){
	for($j=0;$j<$kolom;$j++){
		$kalimat=$kalimat.$array[$i][$j];
	}
}

return $kalimat;

}


function encrypt($kalimat, $kolom){
$token =  str_split($kalimat);
$baris = count($token)/$kolom;
$array;
for($i=0;$i<$baris;$i++){
	for($j=0;$j<$kolom;$j++){
		$array[$i][$j] = $token[($i*$kolom)+$j];
	}
}

$kalimat="";
for($j=0;$j<$kolom;$j++){
	for($i=0;$i<$baris;$i++){
		$kalimat=$kalimat.$array[$i][$j];
	}
}

return $kalimat;
}







?>
