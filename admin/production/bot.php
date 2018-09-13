<?php 

echo "Şuanda çalışmıyor!!.";

$ch =curl_init();

curl_setopt_array($ch,[
	CURLOPT_URL => 'http://www.filmifullizle.org/',
	CURLOPT_RETURNTRANSFER => true
]);

$source = curl_exec($ch);

curl_close($ch);
/*// imdb puanları
preg_match_all('@<div class="l2">(.*?)</div>@si',$source, $herre);

for ($i=0; $i < 27; $i++) { 
	echo $herre[0][$i];
}*/

/* resimler
preg_match_all('@<img src="(.*?)" width="164" height="241" alt="(.*?)">@si',$source, $herre);

/*

for ($i=0; $i < 27; $i++) { 
	echo $herre[1][$i]."<br>";
}*/

/* film adı
preg_match_all('@<a rel="bookmark" title="(.*?)" class="item-title" href="(.*?)">(.*?)</a>@si', $source, $herre);

for ($i=0; $i < 27; $i++) { 
	echo $herre[3][$i]."<br>";
}
*/

preg_match_all('@<a rel="bookmark" title="(.*?)" class="item-title" href="(.*?)">(.*?)</a>@si', $source, $herre);

for ($i=0; $i < 27; $i++) { 
	$url[$i]= $herre[2][$i];

	

	//preg_match_all('@<iframe src="(.*?)" scrolling="no" frameborder="0" width="640" height="360" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>@si', $tiklayinca, $terre2);
	

	//echo $terre[1][$i];
	//echo $terre2[1][$i]."//<br>";
}
$ch2 =curl_init();
for ($i=0; $i <27 ; $i++) { 
	echo $url[$i]."<br>";

	

	curl_setopt_array($ch2,[
		CURLOPT_URL => $url[$i],
		CURLOPT_RETURNTRANSFER => true
	]);

	$tiklayinca = curl_exec($ch2);

	

	preg_match_all('@<h1>(.*?)</h1>@si', $tiklayinca, $terre);

	echo $terre[1][$i];
}
curl_close($ch2);

?>