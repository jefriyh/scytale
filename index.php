<?php


echo encrypt('sarmagsukagalau', 5);
echo "<br>";
echo decrypt('sggasarulmkaaau', 5);



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

?>