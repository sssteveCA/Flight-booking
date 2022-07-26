<?php

namespace App\Interfaces;

interface Airports{

    //Price base for every age bands with companies list per 1 coordinate change
    const AGE_BANDS = [
        Airports::COMPANIES_LIST[0] => [
            'adult' =>  1.35, 'teenager' =>  0.90, 'child'  => 0.55, 'newborn' =>  0.40,
        ],
        Airports::COMPANIES_LIST[1] => [
            'adult' =>  1.29, 'teenager' =>  0.83, 'child'  => 0.47, 'newborn' =>  0.34,
        ],
        Airports::COMPANIES_LIST[2] => [
            'adult' =>  1.34, 'teenager' =>  0.87, 'child'  => 0.50, 'newborn' =>  0.38,
        ],
        Airports::COMPANIES_LIST[3] => [
            'adult' =>  1.25, 'teenager' =>  0.82, 'child'  => 0.55, 'newborn' =>  0.37,
        ],
        Airports::COMPANIES_LIST[4] => [
            'adult' =>  1.49, 'teenager' =>  1.10, 'child'  => 0.83, 'newborn' =>  0.55,
        ],
        Airports::COMPANIES_LIST[5] => [
            'adult' =>  1.22, 'teenager' =>  0.80, 'child'  => 0.46, 'newborn' =>  0.34,
        ],
        Airports::COMPANIES_LIST[6] => [
            'adult' =>  1.47, 'teenager' =>  1.04, 'child'  => 0.76, 'newborn' =>  0.53,
        ],
    ];

    const COMPANIES_LIST = ['Ryanair','American Airlines','EasyJet','Lufthansa','Emirates','British Airways','Air France'];

    //Discount for every day that user books before compared to booking day(Percentage)
    const DAYS_BEFORE_DISCOUNT_LIST = [
        Airports::COMPANIES_LIST[0] => 0.75,
        Airports::COMPANIES_LIST[1] => 0.80,
        Airports::COMPANIES_LIST[2] => 0.73,
        Airports::COMPANIES_LIST[3] => 0.77,
        Airports::COMPANIES_LIST[4] => 0.81,
        Airports::COMPANIES_LIST[5] => 0.68,
        Airports::COMPANIES_LIST[6] => 0.74,
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
            'Lille' => ['lat' => 50.566158,'lon' =>  3.099997],
            'Limoges' => ['lat' => 0,'lon' => 0],
            'Loudres' => ['lat' => 0,'lon' => 0],
            'Marsiglia' => ['lat' => 43.438155,'lon' => 5.215068],
            'Nantes' => ['lat' => 47.157120,'lon' =>  -1.606403],
            'Nimes' => ['lat' => 0,'lon' => 0],
            'Nizza' => ['lat' => 0,'lon' => 0],
            'Parigi (Beauvais)' => ['lat' => 49.454088,'lon' => 2.111715],
            'Parigi (Vatry)' => ['lat' => 48.780398,'lon' =>  4.189161],
            'Perpignan' => ['lat' => 0,'lon' => 0],
            'Poitiers' => ['lat' => 0,'lon' => 0],
            'Rodez' => ['lat' => 44.410719,'lon' => 2.483348],
            'Strasbourg' => ['lat' => 48.538791,'lon' => 7.625657],
            'Toulouse' => ['lat' => 43.628805,'lon' => 1.368235],
            'Tours Valle de Loire' => ['lat' => 0,'lon' => 0]
        ],
        'Germania' => [
            'Amburgo' => ['lat' => 53.633339,'lon' => 9.997692],
            'Berlino Brandeburgo' => ['lat' => 0,'lon' => 0],
            'Brema' => ['lat' => 53.047713,'lon' => 8.785981],
            'Colonia' => ['lat' => 50.866240,'lon' => 7.141383],
            'Dortmund' => ['lat' => 0,'lon' => 0],
            'Dresden' => ['lat' => 51.132399,'lon' => 13.767186],
            'Dusseldorf (Weeze)' => ['lat' => 51.287360,'lon' => 6.766716],
            'Francoforte (Hahn)' => ['lat' => 49.943389,'lon' => 7.262996],
            'Karlsruhe/Baden-Baden' => ['lat' => 0,'lon' => 0],
            'Lipsia' => ['lat' => 0,'lon' => 0],
            'Memmingen' => ['lat' => 47.987735,'lon' => 10.232611],
            'Munster' => ['lat' => 52.130735,'lon' => 7.695517],
            'Norimberga' => ['lat' => 0,'lon' => 0]
        ],
        'Giordania' => [
            'Amman' => ['lat' => 31.722737,'lon' => 35.988496],
            'Aqaba' => ['lat' => 29.609895,'lon' => 35.020470]
        ],
        'Grecia' => [
            'Atene' => ['lat' => 37.936302,'lon' => 23.948748],
            'Cefalona' => ['lat' => 38.118967,'lon' => 20.504996],
            'Chania (Creta)' => ['lat' => 0,'lon' => 0],
            'Corfù' => ['lat' => 0,'lon' => 0],
            'Heraklion Crete' => ['lat' => 35.339655,'lon' => 25.175298],
            'Kalamata' => ['lat' => 37.054501,'lon' => 22.033370],
            'Kos' => ['lat' => 36.800794,'lon' => 27.090687],
            'Mykonos' => ['lat' => 37.434456,'lon' => 0],
            'Preveza - Aktlon' => ['lat' => 0,'lon' => 0],
            'Rodi' => ['lat' => 0,'lon' => 0],
            'Salonicco' => ['lat' => 0,'lon' => 25.346398],
            'Santorini Nazionale' => ['lat' => 36.399856,'lon' => 25.477658],
            'Skiathos' => ['lat' => 39.176520,'lon' => 23.501426],
            'Zacinto' => ['lat' => 0,'lon' => 0]
        ],
        'Irlanda' => [
            'Cork' => ['lat' => 51.848924,'lon' => -8.490478],
            'Dublino' => ['lat' => 53.426279,'lon' => -6.249888],
            'Kerry' => ['lat' => 0,'lon' => 0],
            'Knock-Irlanda dell\'ovest' => ['lat' => 53.910953,'lon' =>  -8.823233],
            'Shannon' => ['lat' => 52.699264,'lon' => -8.914680]
        ],
        'Israele' => [
            'Tel Aviv' => ['lat' => 32.006015,'lon' => 34.886013]
        ],
        'Italia' => [
            'Alghero' => ['lat' => 0,'lon' => 0],
            'Ancona' => ['lat' => 43.614781,'lon' => 13.361442],
            'Bari' => ['lat' => 41.136906,'lon' => 16.765502],
            'Bologna' => ['lat' => 0,'lon' => 0],
            'Brindisi' => ['lat' => 40.656372,'lon' => 17.945263],
            'Cagliari' => ['lat' => 39.253090,'lon' => 9.060028],
            'Catania' => ['lat' => 0,'lon' => 0],
            'Comiso' => ['lat' => 0,'lon' => 0],
            'Crotone' => ['lat' => 38.994275,'lon' => 17.077484],
            'Cuneo' => ['lat' => 44.547498,'lon' => 7.617519],
            'Genova' => ['lat' => 44.413346,'lon' => 8.843976],
            'Lamezia' => ['lat' => 38.908947,'lon' => 16.245251],
            'Milano Bergamo' => ['lat' => 45.669278,'lon' => 9.703460],
            'Milano Malpensa' => ['lat' => 45.629845,'lon' => 8.725037],
            'Napoli' => ['lat' => 40.884149,'lon' => 14.288878],
            'Palermo' => ['lat' => 38.179528,'lon' => 13.099759],
            'Parma' => ['lat' => 0,'lon' => 0],
            'Perugia' => ['lat' => 43.095417,'lon' => 12.503746],
            'Pescara' => ['lat' => 42.429975,'lon' => 14.187194],
            'Pisa' => ['lat' => 43.687049,'lon' => 10.395252],
            'Rimini' => ['lat' => 44.019729,'lon' => 12.611337],
            'Roma (Ciampino)' => ['lat' => 41.798571,'lon' => 12.593506],
            'Roma (Fiumicino)' => ['lat' => 41.803400,'lon' => 12.250740],
            'Trieste' => ['lat' => 45.822007,'lon' => 13.484241],
            'Venezia (Treviso)' => ['lat' => 0,'lon' => 0],
            'Venezia M.Polo' => ['lat' => 45.504963,'lon' => 12.346984],
            'Verona' => ['lat' => 45.397620,'lon' => 10.886257]
        ],
        'Lettonia' => [
            'Riga' => ['lat' => 56.922377,'lon' => 23.973055]
        ],
        'Lituania' => [
            'Kaunas' => ['lat' => 0,'lon' => 0],
            'Palanga' => ['lat' => 55.972955,'lon' => 21.094716],
            'Vilnius' => ['lat' => 54.639621,'lon' => 25.286338]
        ],
        'Lussemburgo' => [
            'Lussemburgo' => ['lat' => 49.628396,'lon' => 6.214594]
        ],
        'Malta' => [
            'Malta' => ['lat' => 35.852031,'lon' => 14.487055]
        ],
        'Marocco' => [
            'Agadir' => ['lat' => 30.329040,'lon' =>  -9.410608], 
            'Essaouira' => ['lat' => 0,'lon' => 0], 
            'Fez' => ['lat' => 33.929098,'lon' => -4.987291], 
            'Marrakech' => ['lat' => 31.601087,'lon' => -8.024445], 
            'Nador' => ['lat' => 0,'lon' => 0], 
            'Ouarzazate' => ['lat' => 30.936022,'lon' => -6.906885], 
            'Oujda' => ['lat' => 34.786436,'lon' => -1.938969], 
            'Rabat' => ['lat' => 34.049670,'lon' => -6.749853], 
            'Tangeri' => ['lat' => 35.725277,'lon' => -5.913081],
            'Tetouan' => ['lat' => 0,'lon' => 0],
        ],
        'Montenegro' => [
            'Podgorica' => ['lat' => 42.367756,'lon' => 19.247419]
        ],
        'Norvegia' => [
            'Haugesund' => ['lat' => 0,'lon' => 0],
            'Oslo' => ['lat' => 60.197433,'lon' => 11.098918],
            'Oslo (Torp)' => ['lat' => 59.182814,'lon' => 10.256451]
        ],
        'Olanda' => [
            'Amsterdam' => ['lat' => 52.310463,'lon' => 4.769219],
            'Eindhoven' => ['lat' => 0,'lon' => 0],
            'Maastricht' => ['lat' => 50.911401,'lon' => 5.771095]
        ],
        'Polonia' => [
            'Breslavia' => ['lat' => 51.103869,'lon' => 16.880568],
            'Bydgoszcz' => ['lat' => 0,'lon' => 0],
            'Cracovia' => ['lat' => 50.076472,'lon' => 19.788730],
            'Danzica' => ['lat' => 54.379227,'lon' => 18.469688],
            'Katowice' => ['lat' => 0,'lon' => 0],
            'Lodz' => ['lat' => 51.719240,'lon' => 19.391496],
            'Lublin' => ['lat' => 51.235444,'lon' => 22.714541],
            'Olsztyn - Mazury' => ['lat' => 0,'lon' => 0],
            'Poznan' => ['lat' => 52.420003,'lon' => 16.826159],
            'Rzeszow' => ['lat' => 50.114819,'lon' =>22.022538],
            'Stetting' => ['lat' => 0,'lon' => 0],
            'Varsavia (Modlin)' => ['lat' => 52.448784,'lon' => 20.650755]
        ],
        'Portogallo' => [
            'Faro' => ['lat' => 37.016843,'lon' => -7.971447],
            'Lisbon' => ['lat' => 38.774979,'lon' => -9.135195],
            'Madeira Funchal' => ['lat' => 32.696286,'lon' => -16.777108],
            'Ponta Delgada' => ['lat' => 0,'lon' => 0],
            'Porto' => ['lat' => 41.241542,'lon' => -8.678337],
            'Terceira Lajes' => ['lat' => 38.754060,'lon' => -27.087700]
        ],
        'Regno Unito' => [
            'Aberdeen' => ['lat' => 0,'lon' => 0],
            'Birmingham' => ['lat' => 52.452183,'lon' => -1.744762],
            'Bourdermouth' => ['lat' => 0,'lon' => 0],
            'Bristol' => ['lat' => 51.3836718,'lon' => -2.7138177],
            'Cardiff' => ['lat' => 51.398202,'lon' => -3.339740],
            'Derry' => ['lat' => 0,'lon' => 0],
            'East Midlands' => ['lat' => 0,'lon' => 0],
            'Edimburgo' => ['lat' => 55.950662,'lon' => -3.360498],
            'Exter' => ['lat' => 0,'lon' => 0],
            'Glasgow' => ['lat' => 55.868807,'lon' => -4.434280],
            'Glasgow (Prestwick)' => ['lat' => 55.5098142,'lon' => -4.5925873],
            'Leeds Bradford' => ['lat' => 0,'lon' => 0],
            'Liverpool' => ['lat' => 53.334716,'lon' => -2.852153],
            'Londra (Gatwick)' => ['lat' => 51.153380,'lon' => -0.182653],
            'Londra (Luton)' => ['lat' => 0,'lon' => 0],
            'Londra (Stansted)' => ['lat' => 0,'lon' => 0],
            'Manchester' => ['lat' => 53.355219,'lon' => -2.279024],
            'Newcastle' => ['lat' => 55.0393767,'lon' => -1.6931865],
            'Newquay Cornovaglia' => ['lat' => 0,'lon' => 0],
            'Teesside' => ['lat' => 0,'lon' => 0]
        ],
        'Repubblica Ceca' => [
            'Brno' => ['lat' => 0,'lon' => 0],
            'Ostrava' => ['lat' => 49.6980194,'lon' => 18.1117477],
            'Pardubice' => ['lat' => 0,'lon' => 0],
            'Prague' => ['lat' => 50.101251,'lon' => 14.263160]
        ],
        'Romania' => [
            'Bucharest (Otopeni)' => ['lat' => 44.570169,'lon' => 26.084380],
            'Cluj' => ['lat' => 0,'lon' => 0],
            'Oradea' => ['lat' => 47.028829,'lon' => 21.8988903],
            'Sibiu' => ['lat' => 45.7892303,'lon' => 24.0948941],
            'Suceava' => ['lat' => 0,'lon' => 0],
            'Timisoara' => ['lat' => 45.810290,'lon' => 21.321191]
        ],
        'Serbia' => [
            'Nis' => ['lat' => 43.337687,'lon' => 21.867773]
        ],
        'Slovacchia' => [
            'Bratislava' => ['lat' => 48.169916,'lon' => 17.210352],
            'Kosice' => ['lat' => 48.6728824,'lon' => 21.2373495]
        ],
        'Spagna' => [
            'Alicante' => ['lat' => 38.285434,'lon' =>  -0.561071],
            'Almeria' => ['lat' => 36.8446969,'lon' => -2.3709793],
            'Asturie' => ['lat' => 0,'lon' => 0],
            'Barcellona (Girona)' => ['lat' => 41.897699,'lon' => 2.764490],
            'Barcellona (Reus)' => ['lat' => 0,'lon' => 0],
            'Barcellona El Prat' => ['lat' => 41.2974988,'lon' => 2.0824965],
            'Castellon (Valencia)' => ['lat' => 40.205677,'lon' => 0.068053],
            'Fuerteventura' => ['lat' => 0,'lon' => 0],
            'Gran Canaria' => ['lat' => 0,'lon' => 0],
            'Ibiza' => ['lat' => 38.874981,'lon' => 1.371867],
            'Jerez' => ['lat' => 36.7452642,'lon' => -6.0613965],
            'La Palma' => ['lat' => 0,'lon' => 0],
            'Lanzarote' => ['lat' => 0,'lon' => 0],
            'Madrid' => ['lat' => 40.499111,'lon' => -3.566600],
            'Malaga' => ['lat' => 36.6770945,'lon' => -4.491758],
            'Minorca' => ['lat' => 0,'lon' => 0],
            'Murcia International' => ['lat' => 0,'lon' => 0],
            'Palma' => ['lat' => 39.551455,'lon' => 2.735907],
            'Santander' => ['lat' => 43.426333,'lon' => -3.8215475],
            'Santiago' => ['lat' => 0,'lon' => 0],
            'Saragozza' => ['lat' => 0,'lon' => 0],
            'Tenerife (Nord)' => ['lat' => 28.484704,'lon' => -16.342401],
            'Tenerife (Sud)' => ['lat' => 28.0465862,'lon' => -16.572577],
            'Valencia' => ['lat' => 0,'lon' => 0],
            'Valladolid' => ['lat' => 41.707024,'lon' => -4.844998]
        ],
        'Svezia' => [
            'Goteborg Landvetter' => ['lat' => 57.669049,'lon' => 12.292829],
            'Lulea' => ['lat' => 0,'lon' => 0],
            'Malmo' => ['lat' => 55.535349,'lon' => 13.372398],
            'Orebro' => ['lat' => 59.227473,'lon' => 15.045860],
            'Skelleftea' => ['lat' => 64.624012,'lon' => 21.064522],
            'Stoccolma Vasteras' => ['lat' => 59.602344,'lon' => 16.630677],
            'Stockholm Arianda' => ['lat' => 59.650152,'lon' => 17.923845],
            'Vaxjo Smaland' => ['lat' => 0,'lon' => 0],
            'Visby Gotland' => ['lat' => 57.659018,'lon' => 18.344510]
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
            '00' => 1.50, '01' => 1.35, '02' => 1.25, '03' => 1.28, '04' => 1.63,'05' => 1.58,'06' => 1.70,
            '07' => 1.77, '08' => 1.76, '09' => 1.90, '10' => 1.98, '11' => 2.25, '12' => 2.17, '13' => 2.60,
            '14' => 2.55, '15' => 2.45, '16' => 2.50,'17' => 2.30, '18' => 2.05, '19' => 1.90, '20' => 1.92,
            '21' => 1.78, '22' => 1.69, '23' => 1.60
        ],
        Airports::COMPANIES_LIST[1] => [
            '00' => 1.36, '01' => 1.28, '02' => 1.16, '03' => 1.14, '04' => 1.39, '05' => 1.45, '06' => 1.56,
            '07' => 1.62, '08' => 1.65, '09' => 1.78, '10' => 1.81, '11' => 1.99, '12' => 2.04, '13' => 2.32,
            '14' => 2.27, '15' => 2.21, '16' => 2.16, '17' => 2.11, '18' => 1.91, '19' => 1.74, '20' => 1.80,
            '21' => 1.65, '22' => 1.53, '23' => 1.38
        ],
        Airports::COMPANIES_LIST[2] => [
            '00' => 1.48, '01' => 1.36, '02' => 1.30, '03' => 1.29, '04' => 1.57, '05' => 1.53, '06' => 1.75,
            '07' => 1.82, '08' => 1.87, '09' => 1.96, '10' => 2.10, '11' => 2.33, '12' => 2.26, '13' => 2.69,
            '14' => 2.59, '15' => 2.48, '16' => 2.43, '17' => 2.26, '18' => 2.14, '19' => 2.03, '20' => 1.95,
            '21' => 1.83, '22' => 1.73, '23' => 1.64
        ],
        Airports::COMPANIES_LIST[3] => [
            '00' => 1.41, '01' => 1.23, '02' => 1.10, '03' => 1.13, '04' => 1.30, '05' => 1.35, '06' => 1.49,
            '07' => 1.55, '08' => 1.63, '09' => 1.72, '10' => 1.90, '11' => 2.06, '12' => 2.14, '13' => 2.36, 
            '14' => 2.31, '15' => 2.24, '16' => 2.15, '17' => 2.08, '18' => 2.00, '19' => 1.82, '20' => 1.66,
            '21' => 1.58, '22' => 1.46, '23' => 1.33
        ],
        Airports::COMPANIES_LIST[4] => [
            '00' => 1.68, '01' => 1.54, '02' => 1.39, '03' => 1.35, '04' => 1.51, '05' => 1.67, '06' => 1.85,
            '07' => 1.96, '08' => 2.10, '09' => 2.16, '10' => 2.30, '11' => 2.50, '12' => 2.64, '13' => 2.87,
            '14' => 2.93, '15' => 2.82, '16' => 2.70, '17' => 2.65, '18' => 2.54, '19' => 2.48, '20' => 2.33,
            '21' => 2.19, '22' => 2.02, '23' => 1.85
        ],
        Airports::COMPANIES_LIST[5] => [
            '00' => 1.35, '01' => 1.26, '02' => 1.11, '03' => 1.00, '04' => 1.09, '05' => 1.20, '06' => 1.45,
            '07' => 1.59, '08' => 1.74, '09' => 1.78, '10' => 1.90, '11' => 2.03, '12' => 2.29, '13' => 2.44,
            '14' => 2.44, '15' => 2.36, '16' => 2.27, '17' => 2.20, '18' => 2.12, '19' => 2.02, '20' => 2.07,
            '21' => 1.83, '22' => 1.68, '23' => 1.42
        ],
        Airports::COMPANIES_LIST[6] => [
            '00' => 1.64, '01' => 1.57, '02' => 1.36, '03' => 1.26, '04' => 1.48, '05' => 1.66, '06' => 1.83,
            '07' => 1.90, '08' => 2.06, '09' => 2.23, '10' => 2.33, '11' => 2.46, '12' => 2.57, '13' => 2.76,
            '14' => 2.73, '15' => 2.73, '16' => 2.66, '17' => 2.59, '18' => 2.50, '19' => 2.39, '20' => 2.26,
            '21' => 2.18, '22' => 1.92, '23' => 1.75
        ]
    ];

    //Price base for every day of the week per 1 coordinate change
    const TIMETABLE_DAYS = [
        Airports::COMPANIES_LIST[0] => [
            'monday' =>  3.70, 'tuesday' =>  2.85, 'wednesday' =>  2.99, 'thursday' =>  3.60,
            'friday' =>  4.10, 'saturday' =>  4.47, 'sunday' =>  4.62
        ],
        Airports::COMPANIES_LIST[1] => [
            'monday' =>  3.63, 'tuesday' =>  2.75, 'wednesday' =>  2.86, 'thursday' =>  3.37,
            'friday' =>  3.88, 'saturday' =>  4.16, 'sunday' =>  4.44
        ],
        Airports::COMPANIES_LIST[2] => [
            'monday' =>  3.69, 'tuesday' =>  2.88, 'wednesday' =>  2.93, 'thursday' =>  3.51,
            'friday' =>  3.99, 'saturday' =>  4.33, 'sunday' =>  4.58
        ],
        Airports::COMPANIES_LIST[3] => [
            'monday' =>  3.57, 'tuesday' =>  2.71, 'wednesday' =>  2.83, 'thursday' =>  3.37,
            'friday' =>  3.75, 'saturday' =>  4.08, 'sunday' =>  4.40
        ],
        Airports::COMPANIES_LIST[4] => [
            'monday' =>  3.86, 'tuesday' =>  3.36, 'wednesday' =>  3.52, 'thursday' =>  4.11,
            'friday' =>  4.48, 'saturday' =>  4.73, 'sunday' =>  5.05
        ],
        Airports::COMPANIES_LIST[5] => [
            'monday' =>  3.62, 'tuesday' =>  3.17, 'wednesday' =>  3.32, 'thursday' =>  3.55,
            'friday' =>  3.90, 'saturday' =>  4.08, 'sunday' =>  4.41
        ],
        Airports::COMPANIES_LIST[6] => [
            'monday' =>  3.83, 'tuesday' =>  3.36, 'wednesday' =>  3.48, 'thursday' =>  4.00,
            'friday' =>  4.36, 'saturday' =>  4.65, 'sunday' =>  4.99
        ]
    ];

    const TIMETABLE_HOUR_BANDS = [
        Airports::COMPANIES_LIST[0] => [
            '00','15','30','45'
        ],
        Airports::COMPANIES_LIST[1] => [
            '00','15','30','45'
        ],
        Airports::COMPANIES_LIST[2] => [
            '00','15','30','45'
        ],
        Airports::COMPANIES_LIST[3] => [
            '00','15','30','45'
        ],
        Airports::COMPANIES_LIST[4] => [
            '00','15','30','45'
        ],
        Airports::COMPANIES_LIST[5] => [
            '00','15','30','45'
        ],
        Airports::COMPANIES_LIST[6] => [
            '00','15','30','45'
        ],
    ];

    const TIMETABLE_MONTHS = [
        Airports::COMPANIES_LIST[0] => [
            '01' => 2.50, '02' => 2.66, '03' => 2.84, '04' => 2.99, '05' => 3.26, '06' => 3.33,
            '07' => 3.85, '08' => 3.76, '09' => 2.80, '10' => 2.93, '11' => 3.05, '12' => 3.46
        ],
        Airports::COMPANIES_LIST[1] => [
            '01' => 2.41, '02' => 2.48, '03' => 2.65, '04' => 2.80, '05' => 3.01, '06' => 3.10,
            '07' => 3.59, '08' => 3.53, '09' => 2.62, '10' => 2.71, '11' => 2.84, '12' => 3.13
        ],
        Airports::COMPANIES_LIST[2] => [
            '01' => 2.46, '02' => 2.62, '03' => 2.82, '04' => 3.03, '05' => 3.28, '06' => 3.32,
            '07' => 3.80, '08' => 3.77, '09' => 2.90, '10' => 2.87, '11' => 2.99, '12' => 3.38
        ],
        Airports::COMPANIES_LIST[3] => [
            '01' => 2.43, '02' => 2.52, '03' => 2.71, '04' => 2.87, '05' => 3.04, '06' => 3.21,
            '07' => 3.64, '08' => 3.67, '09' => 2.96, '10' => 2.73, '11' => 2.89, '12' => 3.29
        ],
        Airports::COMPANIES_LIST[4] => [
            '01' => 2.76, '02' => 2.91, '03' => 3.10, '04' => 3.24, '05' => 3.49, '06' => 3.55,
            '07' => 4.07, '08' => 4.04, '09' => 3.15, '10' => 3.30, '11' => 3.38, '12' => 3.84
        ],
        Airports::COMPANIES_LIST[5] => [
            '01' => 2.42, '02' => 2.51, '03' => 2.63, '04' => 2.81, '05' => 3.06, '06' => 3.09,
            '07' => 3.60, '08' => 3.58, '09' => 2.66, '10' => 2.70, '11' => 3.82, '12' => 3.15
        ],
        Airports::COMPANIES_LIST[6] => [
            '01' => 2.70, '02' => 2.84, '03' => 3.06, '04' => 3.19, '05' => 3.42, '06' => 3.57,
            '07' => 3.93, '08' => 4.03, '09' => 3.22, '10' => 3.26, '11' => 3.33, '12' => 3.78
        ]
    ];
}
?>