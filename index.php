<?php


echo encrypt('sarmagsukagalau', 5);
echo "<br>";
echo encrypt2('sarmagsukagalau', 5);
echo "<br>";
echo decrypt2('sggasarulmkaaau', 5);




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
			$kalimat = $kalimat."";
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