<?php

header('Content-Type: application/json');
$request = $_SERVER['REQUEST_URI'];
$params = explode('/', trim($request, '/'));

$songs = [

    1978 => "火の国へ",
    1979 => "命燃やして",
    1980 => "鴎という名の酒場",
    1981 => "なみだの宿",
    1982 => "津軽海峡・冬景色",
    1984 => "東京めぐり愛",
    1985 => "波止場しぐれ",
    1987 => "夫婦善哉",
    1988 => "滝の白糸",
    1989 => "風の盆恋歌",
    1990 => "うたかた",
    1991 => "港唄",
    1992 => "ホテル港や",
    1994 => "飢餓海峡",
    1995 => "北の女房",
    1996 => "昭和夢つばめ",
    1997 => "天城越え",
    1998 => "風の盆恋歌",
    1999 => "天城越え",
    2000 => "津軽海峡・冬景色",
    2001 => "涙つづり",
    2003 => "能登半島",
    2004 => "一葉恋歌",
    2005 => "天城越え",
    2006 => "夫婦善哉",
    2024 => "能登半島",
    
];


if ($params[0] === 'song') {
    if (!is_numeric($params[1]) || (floatval($params) - intval($params) > 0))
    {
        
        http_response_code(404);
        echo json_encode([
            "error" => "Invalid Value."
        ]);
        return;
    }

    $year = intval($params[1]);
    $retsong = '';


    if (array_key_exists($year, $songs))
    {
        $retsong = $songs[$year];
    }
    elseif ($year % 2 == 0)
    {
        $retsong = "天城越え";
    }
    else
    {
        $retsong = "津軽海峡・冬景色";
    }
    
    

    echo json_encode([
        "song" => $retsong
    ]);
} else {
    http_response_code(404);
    echo json_encode([
        "error" => "Endpoint not found."
    ]);
}
