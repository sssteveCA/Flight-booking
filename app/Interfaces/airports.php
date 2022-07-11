<?php

namespace App\Interfaces;

interface Airports{

    //Price base for every age bands with companies list per 1 coordinate change
    const AGE_BANDS = [
        Airports::COMPANIES_LIST[0] => [
            'adult' =>  1.35,
            'teenager' =>  0.90,
            'child'  => 0.55,
            'newborn' =>  0.40,
        ]
    ];

    const COMPANIES_LIST = ['Flight Company'];

    //Discount for every day that user books before compared to booking day(Percentage)
    const DAYS_BEFORE_DISCOUNT_LIST = [
        Airports::COMPANIES_LIST[0] => 0.75
    ];

    const AIRPORTS_LIST = [
        'Austria' => [
            'Klaugefurt' => ['lat' => 46.649771,'lon' => 14.325294],
            'Salisburgo' => ['lat' => 47.793988,'lon' => 13.003525],
            'Vienna' => ['lat' => 48.112072,'lon' => 16.575761]
        ],
        'Belgio' => [
            'Brussels Zaventem' => ['lat' => 50.896354,'lon' => 4.481252],
            'Bruxelles (Charleroi)' => ['lat' => 50.462277,'lon' => 4.461052],
        ],
        'Bosnia & Herzegovina' => [
            'Banja Luka' => ['lat' => 44.933891,'lon' => 17.303811],
            'Tuzla' => ['lat' => 44.463611,'lon' => 18.711868]
        ],
        'Bulgaria' => [
            'Burgas' => ['lat' => 42.565366,'lon' => 27.516656],
            'Plovdiv' => ['lat' => 42.076699,'lon' => 24.843521],
            'Sofia' => ['lat' => 42.693432,'lon' => 23.408432],
            'Varna' => ['lat' => 43.237289,'lon' => 27.826177]
        ],
        'Cipro' => [
            'Larnaca' => ['lat' => 34.871896,'lon' => 33.619794],
            'Pafos' => ['lat' => 34.717301,'lon' => 32.485162]
        ],
        'Croazia' => [
            'Dubrovnik' => ['lat' => 42.560266,'lon' => 18.261672],
            'Fiume' => ['lat' => 45.218272,'lon' => 14.569997],
            'Pola' => ['lat' => 44.898932,'lon' => 13.924008],
            'Split' => ['lat' => 43.536413,'lon' => 16.298896],
            'Zagreb' => ['lat' => 45.741061,'lon' => 16.068059],
            'Zara' => ['lat' => 44.096672,'lon' => 15.353313]
        ],
        'Danimarca' => [
            'Aalborg' => ['lat' => 57.096636,'lon' => 9.856528],
            'Aarhus' => ['lat' => 56.307515,'lon' => 10.627362],
            'Billund' => ['lat' => 55.740707,'lon' => 9.153115],
            'Copenaghen' => ['lat' => 55.612549,'lon' => 12.647290]
        ],
        'Estonia' => [
            'Tallinn' => ['lat' => 59.416734,'lon' => 24.800334]
        ],
        'Finlandia' => [
            'Helsinki' => ['lat' => 60.318535,'lon' => 24.969305],
            'Lappeenranta' => ['lat' => 61.044037,'lon' => 28.157188],
            'Rovaniemi-Lapponia' => ['lat' => 66.562910,'lon' => 25.829917],
            'Tampere' => ['lat' => 61.415162,'lon' => 23.604597]
        ],
        'Francia' => [
            'Bergerac' => ['lat' => 44.82355,'lon' => 0.517949],
            'Beziers' => ['lat' => 43.321155,'lon' => 3.353450],
            'Biarritz' => ['lat' => 43.471404,'lon' => -1.531492],
            'Bordeaux' => ['lat' => 44.830593,'lon' => -0.710305],
            'Brive' => ['lat' => 45.040670,'lon' => 1.489538],
            'Cercassonne' => ['lat' => 43.214093,'lon' => 2.309582],
            'Clermont Ferrand' => ['lat' => 45.786413,'lon' => 3.169077],
            'Dole' => ['lat' => 47.043635,'lon' => 5.425733],
            'Figari' => ['lat' => 41.499234,'lon' => 9.098541],
            'Grenoble' => ['lat' => 45.362051,'lon' => 0],
            'La Rocchelle' => ['lat' => 46.176524,'lon' => -1.193236],
            'Lille' => ['lat' => 0,'lon' => 0],
            'Limoges' => ['lat' => 0,'lon' => 0],
            'Loudres' => ['lat' => 0,'lon' => 0],
            'Marsiglia' => ['lat' => 43.438155,'lon' => 5.215068],
            'Nantes' => ['lat' => 0,'lon' => 0],
            'Nimes' => ['lat' => 0,'lon' => 0],
            'Nizza' => ['lat' => 0,'lon' => 0],
            'Parigi (Beauvais)' => ['lat' => 49.454088,'lon' => 2.111715],
            'Parigi (Vatry)' => ['lat' => 0,'lon' => 0],
            'Perpignan' => ['lat' => 0,'lon' => 0],
            'Poitiers' => ['lat' => 0,'lon' => 0],
            'Rodez' => ['lat' => 0,'lon' => 0],
            'Strasbourg' => ['lat' => 48.538791,'lon' => 7.625657],
            'Toulouse' => ['lat' => 43.628805,'lon' => 1.368235],
            'Tours Valle de Loire' => ['lat' => 0,'lon' => 0]
        ],
        'Germania' => [
            'Amburgo' => ['lat' => 53.633339,'lon' => 9.997692],
            'Berlino Brandeburgo' => ['lat' => 0,'lon' => 0],
            'Brema' => ['lat' => 0,'lon' => 0],
            'Colonia' => ['lat' => 50.866240,'lon' => 7.141383],
            'Dortmund' => ['lat' => 0,'lon' => 0],
            'Dresden' => ['lat' => 51.132399,'lon' => 13.767186],
            'Dusseldorf (Weeze)' => ['lat' => 0,'lon' => 0],
            'Francoforte (Hahn)' => ['lat' => 49.943389,'lon' => 7.262996],
            'Karlsruhe/Baden-Baden' => ['lat' => 0,'lon' => 0],
            'Lipsia' => ['lat' => 0,'lon' => 0],
            'Memmingen' => ['lat' => 47.987735,'lon' => 10.232611],
            'Munster' => ['lat' => 0,'lon' => 0],
            'Norimberga' => ['lat' => 0,'lon' => 0]
        ],
        'Giordania' => [
            'Amman' => ['lat' => 31.722737,'lon' => 35.988496],
            'Aqaba' => ['lat' => 29.609895,'lon' => 35.020470]
        ],
        'Grecia' => [
            'Atene' => ['lat' => 37.936302,'lon' => 23.948748],
            'Cefalona' => ['lat' => 0,'lon' => 0],
            'Chania (Creta)' => ['lat' => 0,'lon' => 0],
            'Corfù' => ['lat' => 0,'lon' => 0],
            'Heraklion Crete' => ['lat' => 0,'lon' => 0],
            'Kalamata' => ['lat' => 37.054501,'lon' => 22.033370],
            'Kos' => ['lat' => 36.800794,'lon' => 27.090687],
            'Mykonos' => ['lat' => 37.434456,'lon' => 0],
            'Preveza - Aktlon' => ['lat' => 0,'lon' => 0],
            'Rodi' => ['lat' => 0,'lon' => 0],
            'Salonicco' => ['lat' => 0,'lon' => 25.346398],
            'Santorini Nazionale' => ['lat' => 36.399856,'lon' => 25.477658],
            'Skiathos' => ['lat' => 0,'lon' => 0],
            'Zacinto' => ['lat' => 0,'lon' => 0]
        ],
        'Irlanda' => [
            'Cork' => ['lat' => 0,'lon' => 0],
            'Dublino' => ['lat' => 53.426279,'lon' => -6.249888],
            'Kerry' => ['lat' => 0,'lon' => 0],
            'Knock-Irlanda dell\'ovest' => ['lat' => 0,'lon' => 0],
            'Shannon' => ['lat' => 52.699264,'lon' => -8.914680]
        ],
        'Israele' => [
            'Tel Aviv' => ['lat' => 32.006015,'lon' => 34.886013]
        ],
        'Italia' => [
            'Alghero' => ['lat' => 0,'lon' => 0],
            'Ancona' => ['lat' => 0,'lon' => 0],
            'Bari' => ['lat' => 41.136906,'lon' => 16.765502],
            'Bologna' => ['lat' => 0,'lon' => 0],
            'Brindisi' => ['lat' => 0,'lon' => 0],
            'Cagliari' => ['lat' => 39.253090,'lon' => 9.060028],
            'Catania' => ['lat' => 0,'lon' => 0],
            'Comiso' => ['lat' => 0,'lon' => 0],
            'Crotone' => ['lat' => 38.994275,'lon' => 17.077484],
            'Cuneo' => ['lat' => 0,'lon' => 0],
            'Genova' => ['lat' => 0,'lon' => 0],
            'Lamezia' => ['lat' => 38.908947,'lon' => 16.245251],
            'Milano Bergamo' => ['lat' => 0,'lon' => 0],
            'Milano Malpensa' => ['lat' => 0,'lon' => 0],
            'Napoli' => ['lat' => 0,'lon' => 0],
            'Palermo' => ['lat' => 38.179528,'lon' => 13.099759],
            'Parma' => ['lat' => 0,'lon' => 0],
            'Perugia' => ['lat' => 43.095417,'lon' => 12.503746],
            'Pescara' => ['lat' => 0,'lon' => 0],
            'Pisa' => ['lat' => 43.687049,'lon' => 10.395252],
            'Rimini' => ['lat' => 0,'lon' => 0],
            'Roma (Ciampino)' => ['lat' => 41.798571,'lon' => 12.593506],
            'Roma (Fiumicino)' => ['lat' => 41.803400,'lon' => 12.250740],
            'Trieste' => ['lat' => 45.822007,'lon' => 13.484241],
            'Venezia (Treviso)' => ['lat' => 0,'lon' => 0],
            'Venezia M.Polo' => ['lat' => 0,'lon' => 0],
            'Verona' => ['lat' => 45.397620,'lon' => 10.886257]
        ],
        'Lettonia' => [
            'Riga' => ['lat' => 56.922377,'lon' => 23.973055]
        ],
        'Lituania' => [
            'Kaunas' => ['lat' => 0,'lon' => 0],
            'Palanga' => ['lat' => 0,'lon' => 0],
            'Vilnius' => ['lat' => 54.639621,'lon' => 25.286338]
        ],
        'Lussemburgo' => [
            'Lussemburgo' => ['lat' => 49.628396,'lon' => 6.214594]
        ],
        'Malta' => [
            'Malta' => ['lat' => 35.852031,'lon' => 14.487055]
        ],
        'Marocco' => [
            'Agadir' => ['lat' => 0,'lon' => 0], 
            'Essaouira' => ['lat' => 0,'lon' => 0], 
            'Fez' => ['lat' => 0,'lon' => 0], 
            'Marrakech' => ['lat' => 31.601087,'lon' => -8.024445], 
            'Nador' => ['lat' => 0,'lon' => 0], 
            'Ouarzazate' => ['lat' => 30.936022,'lon' => -6.906885], 
            'Oujda' => ['lat' => 0,'lon' => 0], 
            'Rabat' => ['lat' => 34.049670,'lon' => -6.749853], 
            'Tangeri' => ['lat' => 0,'lon' => 0],
            'Tetouan' => ['lat' => 0,'lon' => 0],
        ],
        'Montenegro' => [
            'Podgorica' => ['lat' => 42.367756,'lon' => 19.247419]
        ],
        'Norvegia' => [
            'Haugesund' => ['lat' => 0,'lon' => 0],
            'Oslo' => ['lat' => 60.197433,'lon' => 11.098918],
            'Oslo (Torp)' => ['lat' => 0,'lon' => 0]
        ],
        'Olanda' => [
            'Amsterdam' => ['lat' => 52.310463,'lon' => 4.769219],
            'Eindhoven' => ['lat' => 0,'lon' => 0],
            'Maastricht' => ['lat' => 0,'lon' => 0]
        ],
        'Polonia' => [
            'Breslavia' => ['lat' => 0,'lon' => 0],
            'Bydgoszcz' => ['lat' => 0,'lon' => 0],
            'Cracovia' => ['lat' => 50.076472,'lon' => 19.788730],
            'Danzica' => ['lat' => 54.379227,'lon' => 18.469688],
            'Katowice' => ['lat' => 0,'lon' => 0],
            'Lodz' => ['lat' => 0,'lon' => 0],
            'Lublin' => ['lat' => 51.235444,'lon' => 22.714541],
            'Olsztyn - Mazury' => ['lat' => 0,'lon' => 0],
            'Poznan' => ['lat' => 0,'lon' => 0],
            'Rzeszow' => ['lat' => 0,'lon' => 0],
            'Stetting' => ['lat' => 0,'lon' => 0],
            'Varsavia (Modlin)' => ['lat' => 52.448784,'lon' => 20.650755]
        ],
        'Portogallo' => [
            'Faro' => ['lat' => 37.016843,'lon' => -7.971447],
            'Lisbon' => ['lat' => 38.774979,'lon' => -9.135195],
            'Madeira Funchal' => ['lat' => 0,'lon' => 0],
            'Ponta Delgada' => ['lat' => 0,'lon' => 0],
            'Porto' => ['lat' => 41.241542,'lon' => -8.678337],
            'Terceira Lajes' => ['lat' => 0,'lon' => 0]
        ],
        'Regno Unito' => [
            'Aberdeen' => ['lat' => 0,'lon' => 0],
            'Birmingham' => ['lat' => 52.452183,'lon' => -1.744762],
            'Bourdermouth' => ['lat' => 0,'lon' => 0],
            'Bristol' => ['lat' => 0,'lon' => 0],
            'Cardiff' => ['lat' => 51.398202,'lon' => -3.339740],
            'Derry' => ['lat' => 0,'lon' => 0],
            'East Midlands' => ['lat' => 0,'lon' => 0],
            'Edimburgo' => ['lat' => 55.950662,'lon' => -3.360498],
            'Exter' => ['lat' => 0,'lon' => 0],
            'Glasgow' => ['lat' => 55.868807,'lon' => -4.434280],
            'Glasgow (Prestwick)' => ['lat' => 0,'lon' => 0],
            'Leeds Bradford' => ['lat' => 0,'lon' => 0],
            'Liverpool' => ['lat' => 53.334716,'lon' => -2.852153],
            'Londra (Gatwick)' => ['lat' => 51.153380,'lon' => -0.182653],
            'Londra (Luton)' => ['lat' => 0,'lon' => 0],
            'Londra (Stansted)' => ['lat' => 0,'lon' => 0],
            'Manchester' => ['lat' => 53.355219,'lon' => -2.279024],
            'Newcastle' => ['lat' => 0,'lon' => 0],
            'Newquay Cornovaglia' => ['lat' => 0,'lon' => 0],
            'Teesside' => ['lat' => 0,'lon' => 0]
        ],
        'Repubblica Ceca' => [
            'Brno' => ['lat' => 0,'lon' => 0],
            'Ostrava' => ['lat' => 0,'lon' => 0],
            'Pardubice' => ['lat' => 0,'lon' => 0],
            'Prague' => ['lat' => 50.101251,'lon' => 14.263160]
        ],
        'Romania' => [
            'Bucharest (Otopeni)' => ['lat' => 44.570169,'lon' => 26.084380],
            'Cluj' => ['lat' => 0,'lon' => 0],
            'Oradea' => ['lat' => 0,'lon' => 0],
            'Sibiu' => ['lat' => 0,'lon' => 0],
            'Suceava' => ['lat' => 0,'lon' => 0],
            'Timisoara' => ['lat' => 45.810290,'lon' => 21.321191]
        ],
        'Serbia' => [
            'Nis' => ['lat' => 43.337687,'lon' => 21.867773]
        ],
        'Slovacchia' => [
            'Bratislava' => ['lat' => 48.169916,'lon' => 17.210352],
            'Kosice' => ['lat' => 0,'lon' => 0]
        ],
        'Spagna' => [
            'Alicante' => ['lat' => 38.285434,'lon' =>  -0.561071],
            'Almeria' => ['lat' => 0,'lon' => 0],
            'Asturie' => ['lat' => 0,'lon' => 0],
            'Barcellona (Girona)' => ['lat' => 41.897699,'lon' => 2.764490],
            'Barcellona (Reus)' => ['lat' => 0,'lon' => 0],
            'Barcellona El Prat' => ['lat' => 0,'lon' => 0],
            'Castellon (Valencia)' => ['lat' => 40.205677,'lon' => 0.068053],
            'Fuerteventura' => ['lat' => 0,'lon' => 0],
            'Gran Canaria' => ['lat' => 0,'lon' => 0],
            'Ibiza' => ['lat' => 38.874981,'lon' => 1.371867],
            'Jerez' => ['lat' => 0,'lon' => 0],
            'La Palma' => ['lat' => 0,'lon' => 0],
            'Lanzarote' => ['lat' => 0,'lon' => 0],
            'Madrid' => ['lat' => 40.499111,'lon' => -3.566600],
            'Malaga' => ['lat' => 0,'lon' => 0],
            'Minorca' => ['lat' => 0,'lon' => 0],
            'Murcia International' => ['lat' => 0,'lon' => 0],
            'Palma' => ['lat' => 39.551455,'lon' => 2.735907],
            'Santander' => ['lat' => 0,'lon' => 0],
            'Santiago' => ['lat' => 0,'lon' => 0],
            'Saragozza' => ['lat' => 0,'lon' => 0],
            'Tenerife (Nord)' => ['lat' => 28.484704,'lon' => -16.342401],
            'Tenerife (Sud)' => ['lat' => 0,'lon' => 0],
            'Valencia' => ['lat' => 0,'lon' => 0],
            'Valladolid' => ['lat' => 41.707024,'lon' => -4.844998]
        ],
        'Svezia' => [
            'Goteborg Landvetter' => ['lat' => 57.669049,'lon' => 12.292829],
            'Lulea' => ['lat' => 0,'lon' => 0],
            'Malmo' => ['lat' => 55.535349,'lon' => 13.372398],
            'Orebro' => ['lat' => 0,'lon' => 0],
            'Skelleftea' => ['lat' => 64.624012,'lon' => 21.064522],
            'Stoccolma Vasteras' => ['lat' => 59.602344,'lon' => 16.630677],
            'Stockholm Arianda' => ['lat' => 59.650152,'lon' => 17.923845],
            'Vaxjo Smaland' => ['lat' => 0,'lon' => 0],
            'Visby Gotland' => ['lat' => 0,'lon' => 0]
        ],
        'Svizzera' => [
            'Basel' => ['lat' => 47.596030,'lon' => 7.522657]
        ],
        'Turchia' => [
            'Bodrum' => ['lat' => 37.248148,'lon' => 27.664078],
            'Dalaman' => ['lat' => 36.717653,'lon' => 28.792802]
        ],
        'Ungheria' => [
            'Budapest' => ['lat' => 47.438499,'lon' => 19.253058]
        ],        
    ];

    //Price base for every hour with companies list per 1 coordinate change
    const TIMETABLE_DAILY_BANDS = [
        Airports::COMPANIES_LIST[0] => [
            '00' => 1.50,
            '01' => 1.35,
            '02' => 1.25,
            '03' => 1.28,
            '04' => 1.63,
            '05' => 1.58,
            '06' => 1.70,
            '07' => 1.77,
            '08' => 1.76,
            '09' => 1.90,
            '10' => 1.98,
            '11' => 2.25,
            '12' => 2.17,
            '13' => 2.60,
            '14' => 2.55,
            '15' => 2.45,
            '16' => 2.50,
            '17' => 2.30,
            '18' => 2.05,
            '19' => 1.90,
            '20' => 1.92,
            '21' => 1.78,
            '22' => 1.69,
            '23' => 1.60
        ]
    ];

    //Price base for every day of the week per 1 coordinate change
    const TIMETABLE_DAYS = [
        Airports::COMPANIES_LIST[0] => [
            'monday' =>  3.70,
            'tuesday' =>  2.85,
            'wednesday' =>  2.99,
            'thursday' =>  3.60,
            'friday' =>  4.10,
            'saturday' =>  4.47,
            'sunday' =>  4.62
        ]
    ];

    const TIMETABLE_HOUR_BANDS = [
        Airports::COMPANIES_LIST[0] => [
            '00','15','30','45'
        ]
    ];

    const TIMETABLE_MONTHS = [
        Airports::COMPANIES_LIST[0] => [
            '01' => 0,
            '02' => 0,
            '03' => 0,
            '04' => 0,
            '05' => 0,
            '06' => 0,
            '07' => 0,
            '08' => 0,
            '09' => 0,
            '10' => 0,
            '11' => 0,
            '12' => 0
        ]
    ];
}
?>