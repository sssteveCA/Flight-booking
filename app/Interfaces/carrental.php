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
        'Alfa Romeo Stelvio',
        'Bmw Serie 2',
        'Cadillac XT4',
        'Citroen C1',
        'Citroen C4 Spacetourer',
        'Citroen Grand C4 Spacetourer',
        'Citroen SpaceTourer 9 Pax',
        'Cupra Formentor',
        'Fiat 500',
        'Fiat 500 Cabrio, Cambio Automatico',
        'Fiat 500 Cabrio, Cambio Manuale',
        'Fiat Panda',
        'Ford C-Max',
        'Ford Ecosport',
        'Ford Fiesta',
        'Ford Focus',
        'Ford Focus 1.5 TDC',
        'Ford Focus SW',
        'Ford Galaxy 7 posti',
        'Ford Mondeo SW',
        'Ford Mustang Mach-E',
        'Ford Tourneo Connect',
        'Ford Tourneo 9 posti L1H1',
        'Ford Transit 9 posti L2H1',
        'Hyundai Tucson',
        'Lexus ES Hybrid',
        'Lexus NX',
        'Lynk & Co 01',
        'Mahindra Kuv100',
        'Maserati Ghibli',
        'Mercedes Amg GT Coupe',
        'Mercedes Classe A',
        'Mercedes Classe B',
        'Mercedes Classe C Cabrio',
        'Mercedes Classe C Station Wagon',
        'Opel Astra Sports Tourer',
        'Opel Corsa',
        'Opel Mokka',
        'Peugeot 108',
        'Peugeot 308',
        'Peugeot 508',
        'Renault Clio',
        'Renault Talisman Wagon',
        'Skoda Kamiq',
        'Skoda Karoq',
        'Toyota C-HR',
        'Toyota Auris',
        'Toyota Aygo',
        'Toyota Corlla',
        'Toyota Mirai',
        'Toyota Proace Electric Aut. 9 Posti',
        'Toyota Yaris',
        'Volkswagen Golf'
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