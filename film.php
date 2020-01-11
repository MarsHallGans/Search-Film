<?php

    echo "#################################\n";
    echo "#  Search Film & Link Donwload  #\n";
    echo "#      Create By MarsHall       #\n";
    echo "#################################\n";
    echo "Judul Film : ";
    $judul = trim(fgets(STDIN));
    
 
function http_request($url){
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Linux; Android 5.0.2; Redmi Note 3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.96 Mobile Safari/537.36');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch); 
    curl_close($ch);      
    return $output;
}
$sl = http_request("https://ducky-database-movies-api.herokuapp.com/api/movies?key_token=jIPQfBjAULJBmxno43EMMlIJlLwIuIm07fYK3o3CTM9Q25SmL2iED6CBlgkirYE2&search=$judul");
$sl = json_decode($sl, TRUE);

$title = $sl['data'][0]['movieInformation']['title'];
$synopsis = $sl['data'][0]['movieInformation']['synopsis'];
$dateRelease = $sl['data'][0]['movieInformation']['dateRelease'];
$poster = $sl['data'][0]['movieInformation']['poster'];


echo "\n[+] Judul Film : $title\n\n";
echo "[+] Synopsis : $synopsis\n\n";
echo "[+] Tanggal Rilis : $dateRelease\n\n";
echo "[+] Link Donwload : $poster\n\n";

?>
