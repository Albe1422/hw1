<?php

    header("Location: https://newsapi.org/v2/everything?q=album&sortBy=publishedAt&apiKey=c47bf024305d44048de5e5413433c257");

    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, "https://newsapi.org/v2/everything?q=album&sortBy=publishedAt&apiKey=c47bf024305d44048de5e5413433c257"); 
    curl_setopt($ch, CURLOPT_POST,0); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($ch); 
    $json = json_decode($result, true);
    echo json_encode($json);
 
    curl_close($ch); 
    

?>

