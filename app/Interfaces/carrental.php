<?php

namespace App\Interfaces;

interface CarRental{

    const AVAILABLE_LOCATIONS = [
        'Austria' => [
            'Klaugefurt' => [],
            'Salisburgo' => [],
            'Vienna' => []
        ],
        'Belgio' => [
            'Brussels Zaventem' => [],
            'Bruxelles (Charleroi)' => [],
        ],
        'Bosnia & Herzegovina' => [
            'Banja Luka' => [],
            'Tuzla' => []
        ],
        'Bulgaria' => [
            'Burgas' => [],
            'Plovdiv' => [],
            'Sofia' => [],
            'Varna' => []
        ],
        'Cipro' => [
            'Larnaca' => [],
            'Pafos' => []
        ],
        'Croazia' => [
            'Dubrovnik' => [],
            'Fiume' => [],
            'Pola' => [],
            'Split' => [],
            'Zagreb' => [],
            'Zara' => []
        ],
        'Danimarca' => [
            'Aalborg' => [],
            'Aarhus' => [],
            'Billund' => [],
            'Copenaghen' => []
        ],
        'Estonia' => [
            'Tallinn' => []
        ],
        'Finlandia' => [
            'Helsinki' => [],
            'Lappeenranta' => [],
            'Rovaniemi-Lapponia' => [],
            'Tampere' => []
        ],
        'Francia' => [
            'Bergerac' => [],
            'Beziers' => [],
            'Biarritz' => [],
            'Bordeaux' => [],
            'Brive' => [],
            'Cercassonne' => [],
            'Clermont Ferrand' => [],
            'Dole' => [],
            'Figari' => [],
            'Grenoble' => [],
            'La Rocchelle' => [],
            'Lille' => [],
            'Limoges' => [],
            'Loudres' => [],
            'Marsiglia' => [],
            'Nantes' => [],
            'Nimes' => [],
            'Nizza' => [],
            'Parigi (Beauvais)' => [],
            'Parigi (Vatry)' => [],
            'Perpignan' => [],
            'Poitiers' => [],
            'Rodez' => [],
            'Strasbourg' => [],
            'Toulouse' => [],
            'Tours Valle de Loire' => []
        ],
        'Germania' => [
            'Amburgo' => [],
            'Berlino Brandeburgo' => [],
            'Brema' => [],
            'Colonia' => [],
            'Dortmund' => [],
            'Dresden' => [],
            'Dusseldorf (Weeze)' => [],
            'Francoforte (Hahn)' => [],
            'Karlsruhe/Baden-Baden' => [],
            'Lipsia' => [],
            'Memmingen' => [],
            'Munster' => [],
            'Norimberga' => []
        ],
        'Giordania' => [
            'Amman' => [],
            'Aqaba' => []
        ],
        'Grecia' => [
            'Atene' => [],
            'Cefalona' => [],
            'Chania (Creta)' => [],
            'Corfù' => [],
            'Heraklion Crete' => [],
            'Kalamata' => [],
            'Kos' => [],
            'Mykonos' => [],
            'Preveza - Aktlon' => [],
            'Rodi' => [],
            'Salonicco' => [],
            'Santorini Nazionale' => [],
            'Skiathos' => [],
            'Zacinto' => []
        ],
        'Irlanda' => [
            'Cork' => [],
            'Dublino' => [],
            'Kerry' => [],
            'Knock-Irlanda dell\'ovest' => [],
            'Shannon' => []
        ],
        'Israele' => [
            'Tel Aviv' => []
        ],
        'Italia' => [
            'Alghero' => [],
            'Ancona' => [],
            'Bari' => [],
            'Bologna' => [],
            'Brindisi' => [],
            'Cagliari' => [],
            'Catania' => [],
            'Comiso' => [],
            'Crotone' => [],
            'Cuneo' => [],
            'Genova' => [],
            'Lamezia' => [],
            'Milano Bergamo' => [],
            'Milano Malpensa' => [],
            'Napoli' => [],
            'Palermo' => [],
            'Parma' => [],
            'Perugia' => [],
            'Pescara' => [],
            'Pisa' => [],
            'Rimini' => [],
            'Roma (Ciampino)' => [],
            'Roma (Fiumicino)' => [],
            'Trieste' => [],
            'Venezia (Treviso)' => [],
            'Venezia M.Polo' => [],
            'Verona' => []
        ],
        'Lettonia' => [
            'Riga' => []
        ],
        'Lituania' => [
            'Kaunas' => [],
            'Palanga' => [],
            'Vilnius' => []
        ],
        'Lussemburgo' => [
            'Lussemburgo' => []
        ],
        'Malta' => [
            'Malta' => []
        ],
        'Marocco' => [
            'Agadir' => [], 
            'Essaouira' => [], 
            'Fez' => [], 
            'Marrakech' => [], 
            'Nador' => [], 
            'Ouarzazate' => [], 
            'Oujda' => [], 
            'Rabat' => [], 
            'Tangeri' => [],
            'Tetouan' => [],
        ],
        'Montenegro' => [
            'Podgorica' => []
        ],
        'Norvegia' => [
            'Haugesund' => [],
            'Oslo' => [],
            'Oslo (Torp)' => []
        ],
        'Olanda' => [
            'Amsterdam' => [],
            'Eindhoven' => [],
            'Maastricht' => []
        ],
        'Polonia' => [
            'Breslavia' => [],
            'Bydgoszcz' => [],
            'Cracovia' => [],
            'Danzica' => [],
            'Katowice' => [],
            'Lodz' => [],
            'Lublin' => [],
            'Olsztyn - Mazury' => [],
            'Poznan' => [],
            'Rzeszow' => [],
            'Stetting' => [],
            'Varsavia (Modlin)' => []
        ],
        'Portogallo' => [
            'Faro' => [],
            'Lisbon' => [],
            'Madeira Funchal' => [],
            'Ponta Delgada' => [],
            'Porto' => [],
            'Terceira Lajes' => []
        ],
        'Regno Unito' => [
            'Aberdeen' => [],
            'Birmingham' => [],
            'Bourdermouth' => [],
            'Bristol' => [],
            'Cardiff' => [],
            'Derry' => [],
            'East Midlands' => [],
            'Edimburgo' => [],
            'Exter' => [],
            'Glasgow' => [],
            'Glasgow (Prestwick)' => [],
            'Leeds Bradford' => [],
            'Liverpool' => [],
            'Londra (Gatwick)' => [],
            'Londra (Luton)' => [],
            'Londra (Stansted)' => [],
            'Manchester' => [],
            'Newcastle' => [],
            'Newquay Cornovaglia' => [],
            'Teesside' => []
        ],
        'Repubblica Ceca' => [
            'Brno' => [],
            'Ostrava' => [],
            'Pardubice' => [],
            'Prague' => []
        ],
        'Romania' => [
            'Bucharest (Otopeni)' => [],
            'Cluj' => [],
            'Oradea' => [],
            'Sibiu' => [],
            'Suceava' => [],
            'Timisoara' => []
        ],
        'Serbia' => [
            'Nis' => []
        ],
        'Slovacchia' => [
            'Bratislava' => [],
            'Kosice' => []
        ],
        'Spagna' => [
            'Alicante' => [],
            'Almeria' => [],
            'Asturie' => [],
            'Barcellona (Girona)' => [],
            'Barcellona (Reus)' => [],
            'Barcellona El Prat' => [],
            'Castellon (Valencia)' => [],
            'Fuerteventura' => [],
            'Gran Canaria' => [],
            'Ibiza' => [],
            'Jerez' => [],
            'La Palma' => [],
            'Lanzarote' => [],
            'Madrid' => [],
            'Malaga' => [],
            'Minorca' => [],
            'Murcia International' => [],
            'Palma' => [],
            'Santander' => [],
            'Santiago' => [],
            'Saragozza' => [],
            'Tenerife (Nord)' => [],
            'Tenerife (Sud)' => [],
            'Valencia' => [],
            'Valladolid' => []
        ],
        'Svezia' => [
            'Goteborg Landvetter' => [],
            'Lulea' => [],
            'Malmo' => [],
            'Orebro' => [],
            'Skelleftea' => [],
            'Stoccolma Vasteras' => [],
            'Stockholm Arianda' => [],
            'Vaxjo Smaland' => [],
            'Visby Gotland' => []
        ],
        'Svizzera' => [
            'Basel' => []
        ],
        'Turchia' => [
            'Bodrum' => [],
            'Dalaman' => []
        ],
        'Ungheria' => [
            'Budapest' => []
        ],        
    ];

    const CAR_FLEET = [
        'Alfa Romeo Stelvio' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Bmw Serie 2' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Cadillac XT4' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Citroen C1' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Citroen C4 Spacetourer' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Citroen Grand C4 Spacetourer' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Citroen SpaceTourer 9 Pax' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Cupra Formentor' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Fiat 500' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Fiat 500 Cabrio, Cambio Automatico' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Fiat 500 Cabrio, Cambio Manuale' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Fiat Panda' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Ford C-Max' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Ford Ecosport' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Ford Fiesta' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Ford Focus' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Ford Focus 1.5 TDC' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Ford Focus SW' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Ford Galaxy 7 posti' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Ford Mondeo SW' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Ford Mustang Mach-E' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Ford Tourneo Connect' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Ford Tourneo 9 posti L1H1' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Ford Transit 9 posti L2H1' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Hyundai Tucson' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Lexus ES Hybrid' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Lexus NX' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Lynk & Co 01' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Mahindra Kuv100' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Maserati Ghibli' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Mercedes Amg GT Coupe' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Mercedes Classe A' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Mercedes Classe B' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Mercedes Classe C Cabrio' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Mercedes Classe C Station Wagon' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Opel Astra Sports Tourer' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Opel Corsa' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Opel Mokka' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Peugeot 108' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Peugeot 308' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Peugeot 508' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Renault Clio' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Renault Talisman Wagon' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Skoda Kamiq' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Skoda Karoq' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Toyota C-HR' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Toyota Auris' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Toyota Aygo' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Toyota Corlla' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Toyota Mirai' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Toyota Proace Electric Aut. 9 Posti' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Toyota Yaris' => [
            'day_price' => 0.00, 'images' => []
        ],
        'Volkswagen Golf' => [
            'day_price' => 0.00, 'images' => []
        ]
    ];

    const CARRENTAL_COMPANIES = [
        'Alamo' => [
            'day_price_30_65' => 0.00,
            'day_price_additional_pcg' => 15,
            'cars' => []
        ],
        'Avis' => [
            'day_price_30_65' => 0.00,
            'day_price_additional_pcg' => 15,
            'cars' => []
        ],
        'Budget' => [
            'day_price_30_65' => 0.00,
            'day_price_additional_pcg' => 15,
            'cars' => []
        ],
        'Enterprise' => [
            'day_price_30_65' => 0.00,
            'day_price_additional_pcg' => 15,
            'cars' => []
        ],
        'GoldCar' => [
            'day_price_30_65' => 0.00,
            'day_price_additional_pcg' => 15,
            'cars' => []
        ],
        'Locauto' => [
            'day_price_30_65' => 0.00,
            'day_price_additional_pcg' => 15,
            'cars' => []
        ],
        'Maggiore' => [
            'day_price_30_65' => 0.00,
            'day_price_additional_pcg' => 15,
            'cars' => [] 
        ],
        'National' => [
            'day_price_30_65' => 0.00,
            'day_price_additional_pcg' => 15,
            'cars' => []
        ],
        'Sixt' => [
            'day_price_30_65' => 0.00,
            'day_price_additional_pcg' => 15,
            'cars' => []
        ],
        'TopCar' => [
            'day_price_30_65' => 0.00,
            'day_price_additional_pcg' => 15,
            'cars' => []
        ],
    ];
}
?>