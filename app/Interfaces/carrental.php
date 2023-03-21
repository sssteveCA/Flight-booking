<?php

namespace App\Interfaces;

interface CarRental{

    const CHANGE_AUTOMATIC = 'Automatico';
    const CHANGE_MANUAL = 'Manuale';

    const PS_ELECTRIC = 'Elettrica';
    const PS_GASOLINE = 'Benzina';
    const PS_HYBRID = 'Ibrida';
    const PS_DIESEL = 'Diesel';

    const AGE_RANGES = [
        [19,20],[21,24],[25,29],[30,65],[66,75],[76,90]
    ];

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
            'day_price' => 13.30,
            'details' => [
                'baggages' => '',
                'change' => '',
                'doors' => 0,
                'power_supply' => '',
                'seats' => 0
            ],
            'images' => 0
        ],
        'Bmw Serie 2' => [
            'day_price' => 14.32,
            'details' => [
                'baggages' => '2 grandi',
                'change' => CarRental::CHANGE_AUTOMATIC,
                'doors' => 5,
                'power_supply' => CarRental::PS_GASOLINE.'/'.CarRental::PS_DIESEL,
                'seats' => 5
            ],
            'images' => 0
        ],
        'Cadillac XT4' => [
            'day_price' => 9.95,
            'details' => [
                'baggages' => '',
                'change' => '',
                'doors' => 0,
                'power_supply' => '',
                'seats' => 0
                ],
                'baggages' => '',
                'change' => '',
                'doors' => 0,
                'power_supply' => '',
                'seats' => 0,
            'images' => 0
        ],
        'Citroen C1' => [
            'day_price' => 11.04,
            'details' => [
                'baggages' => '2 piccoli',
                'change' => CarRental::CHANGE_MANUAL,
                'doors' => 3,
                'power_supply' => CarRental::PS_GASOLINE,
                'seats' => 4
            ],
            'images' => 0
        ],
        'Citroen C4 Spacetourer' => [
            'day_price' => 11.56,
            'details' => [
                'baggages' => '',
                'change' => '',
                'doors' => 0,
                'power_supply' => '',
                'seats' => 0
            ],
            'images' => 0
        ],
        'Citroen Grand C4 Spacetourer' => [
            'day_price' => 12.05,
            'details' => [
                'baggages' => '',
                'change' => '',
                'doors' => 0,
                'power_supply' => '',
                'seats' => 0
            ],
            'images' => 0
        ],
        'Citroen SpaceTourer 9 Pax' => [
            'day_price' => 9.85,
            'details' => [
                'baggages' => '',
                'change' => '',
                'doors' => 0,
                'power_supply' => '',
                'seats' => 0,
            ],
            'images' => 0
        ],
        'Cupra Formentor' => [
            'day_price' => 15.00,
            'details' => [
                'baggages' => '',
                'change' => CarRental::CHANGE_MANUAL,
                'doors' => 5,
                'power_supply' => CarRental::PS_GASOLINE.'/'.CarRental::PS_DIESEL,
                'seats' => 5,
            ],
            'images' => 0
        ],
        'Fiat 500' => [
            'day_price' => 12.99,
            'details' => [
               'baggages' => '2 piccoli',
                'change' => CarRental::CHANGE_MANUAL,
                'doors' => 3,
                'power_supply' => CarRental::PS_GASOLINE.'/'.CarRental::PS_DIESEL,
                'seats' => 4, 
            ],
            'images' => 0
        ],
        'Fiat 500 Cabrio, Cambio Automatico' => [
            'day_price' => 11.43,
            'details' => [
                'baggages' => '2 piccoli',
                'change' => CarRental::CHANGE_AUTOMATIC,
                'doors' => 3,
                'power_supply' => CarRental::PS_GASOLINE.'/'.CarRental::PS_DIESEL,
                'seats' => 4,
            ],
            'images' => 0
        ],
        'Fiat 500 Cabrio, Cambio Manuale' => [
            'day_price' => 10.50,
            'details' => [
                'baggages' => '2 piccoli',
                'change' => CarRental::CHANGE_MANUAL,
                'doors' => 3,
                'power_supply' => CarRental::PS_GASOLINE,
                'seats' => 4,
            ],
            'images' => 0
        ],
        'Fiat Panda' => [
            'day_price' => 10.25,
            'details' => [
                'baggages' => '2 piccoli',
                'change' => CarRental::CHANGE_MANUAL,
                'doors' => 5,
                'power_supply' => CarRental::PS_GASOLINE,
                'seats' => 4,
            ],
            'images' => 0
        ],
        'Ford C-Max' => [
            'day_price' => 12.60,
            'details' => [
                'baggages' => '',
                'change' => '',
                'doors' => 0,
                'power_supply' => '',
                'seats' => 0,
                
            ],
            'images' => 0
        ],
        'Ford Ecosport' => [
            'day_price' => 13.33,
            'details' => [
                'baggages' => '',
                'change' => '',
                'doors' => 0,
                'power_supply' => '',
                'seats' => 0,
                
            ],
            'images' => 0
        ],
        'Ford Fiesta' => [
            'day_price' => 14.00,
            'details' => [
                'baggages' => '1 grande',
                'change' => CarRental::CHANGE_AUTOMATIC,
                'doors' => 5,
                'power_supply' => CarRental::PS_GASOLINE,
                'seats' => 5,
                
            ],
            'images' => 0
        ],
        'Ford Focus' => [
            'day_price' => 15.29,
            'details' => [
                'baggages' => '2 grandi',
                'change' => CarRental::CHANGE_AUTOMATIC,
                'doors' => 5,
                'power_supply' => CarRental::PS_GASOLINE.'/'.CarRental::PS_DIESEL,
                'seats' => 5,
                
            ],
            'images' => 0
        ],
        'Ford Focus 1.5 TDC' => [
            'day_price' => 14.04,
            'details' => [
                'baggages' => '2 grandi',
                'change' => CarRental::CHANGE_MANUAL,
                'doors' => 5,
                'power_supply' => CarRental::PS_DIESEL,
                'seats' => 5,
                
            ],
            'images' => 0
        ],
        'Ford Focus SW' => [
            'day_price' => 11.58,
            'details' => [
                'baggages' => '2 grandi',
                'change' => CarRental::CHANGE_MANUAL,
                'doors' => 5,
                'power_supply' => CarRental::PS_GASOLINE.'/'.CarRental::PS_DIESEL,
                'seats' => 5,
            ],
            'images' => 0
        ],
        'Ford Galaxy 7 posti' => [
            'day_price' => 9.99,
            'details' => [
                'baggages' => '',
                'change' => '',
                'doors' => 0,
                'power_supply' => '',
                'seats' => 0,
            ],
            'images' => 0
        ],
        'Ford Mondeo SW' => [
            'day_price' => 12.15,
            'details' => [
                'baggages' => '',
                'change' => '',
                'doors' => 0,
                'power_supply' => '',
                'seats' => 0,
            ],
            'images' => 0
        ],
        'Ford Mustang Mach-E' => [
            'day_price' => 11.99,
            'details' => [
                'baggages' => '',
                'change' => '',
                'doors' => 0,
                'power_supply' => '',
                'seats' => 0,
            ],
            'images' => 0
        ],
        'Ford Tourneo Connect' => [
            'day_price' => 11.50,
            'details' => [
                'baggages' => '2 grandi',
                'change' => CarRental::CHANGE_MANUAL,
                'doors' => 5,
                'power_supply' => CarRental::PS_GASOLINE.'/'.CarRental::PS_DIESEL,
                'seats' => 5,
            ],
            'images' => 0
        ],
        'Ford Tourneo 9 posti L1H1' => [
            'day_price' => 10.67,
            'details' => [
                'baggages' => '',
                'change' => '',
                'doors' => 0,
                'power_supply' => '',
                'seats' => 0,
            ],
            'images' => 0
        ],
        'Ford Transit 9 posti L2H1' => [
            'day_price' => 16.08,
            'details' => [
                'baggages' => '',
                'change' => '',
                'doors' => 0,
                'power_supply' => '',
                'seats' => 0,
                
            ],
            'images' => 0
        ],
        'Hyundai Tucson' => [
            'day_price' => 13.99,
            'details' => [
                'baggages' => '',
                'change' => '',
                'doors' => 0,
                'power_supply' => '',
                'seats' => 0,
                
            ],
            'images' => 0
        ],
        'Lexus ES Hybrid' => [
            'day_price' => 9.92,
            'details' => [
                'baggages' => '',
                'change' => '',
                'doors' => 0,
                'power_supply' => '',
                'seats' => 0,
                
            ],
            'images' => 0
        ],
        'Lexus NX' => [
            'day_price' => 10.35,
            'details' => [
                'baggages' => '',
                'change' => '',
                'doors' => 0,
                'power_supply' => '',
                'seats' => 0,
                
            ],
            'images' => 0
        ],
        'Lynk & Co 01' => [
            'day_price' => 12.00,
            'details' => [
                'baggages' => '',
                'change' => '',
                'doors' => 0,
                'power_supply' => '',
                'seats' => 0,
            ],
            'images' => 0
        ],
        'Mahindra Kuv100' => [
            'day_price' => 12.66,
            'details' => [
                'baggages' => '2 piccoli',
                'change' => CarRental::CHANGE_MANUAL,
                'doors' => 5,
                'power_supply' => CarRental::PS_GASOLINE,
                'seats' => 4,
            ],
            'images' => 0
        ],
        'Maserati Ghibli' => [
            'day_price' => 13.07,
            'details' => [
               'baggages' => '',
                'change' => '',
                'doors' => 0,
                'power_supply' => '',
                'seats' => 0, 
            ],
            'images' => 0
        ],
        'Mercedes Amg GT Coupe' => [
            'day_price' => 12.50,
            'details' => [
               'baggages' => '',
                'change' => '',
                'doors' => 0,
                'power_supply' => '',
                'seats' => 0, 
            ],
            'images' => 0
        ],
        'Mercedes Classe A' => [
            'day_price' => 12.75,
            'details' => [
                'baggages' => '2 grandi',
                'change' => CarRental::CHANGE_AUTOMATIC,
                'doors' => 5,
                'power_supply' => CarRental::PS_GASOLINE.'/'.CarRental::PS_DIESEL,
                'seats' => 5,
            ],
            'images' => 0
        ],
        'Mercedes Classe B' => [
            'day_price' => 11.90,
            'details' => [
                'baggages' => '2 grandi',
                'change' => CarRental::CHANGE_MANUAL,
                'doors' => 5,
                'power_supply' => CarRental::PS_GASOLINE.'/'.CarRental::PS_DIESEL,
                'seats' => 5,
            ],
            'images' => 0
        ],
        'Mercedes Classe C Cabrio' => [
            'day_price' => 14.00,
            'details' => [
                'baggages' => '1 piccolo, 1 grande',
                'change' => CarRental::CHANGE_AUTOMATIC,
                'doors' => 3,
                'power_supply' => CarRental::PS_DIESEL,
                'seats' => 4,
            ],
            'images' => 0
        ],
        'Mercedes Classe C Station Wagon' => [
            'day_price' => 14.56,
            'details' => [
                'baggages' => '',
                'change' => '',
                'doors' => 0,
                'power_supply' => '',
                'seats' => 0,
            ],
            'images' => 0
        ],
        'Opel Astra Sports Tourer' => [
            'day_price' => 15.88,
            'details' => [
                'baggages' => '',
                'change' => '',
                'doors' => 0,
                'power_supply' => '',
                'seats' => 0,
            ],
            'images' => 0
        ],
        'Opel Corsa' => [
            'day_price' => 13.02,
            'details' => [
                'baggages' => '1 grande',
                'change' => CarRental::CHANGE_MANUAL,
                'doors' => 5,
                'power_supply' => CarRental::PS_GASOLINE,
                'seats' => 5,
            ],
            'images' => 0
        ],
        'Opel Mokka' => [
            'day_price' => 12.79,
            'details' => [
                'baggages' => '2 grandi',
                'change' => CarRental::CHANGE_AUTOMATIC,
                'doors' => 5,
                'power_supply' => CarRental::PS_ELECTRIC,
                'seats' => 5,
            ],
            'images' => 0
        ],
        'Peugeot 108' => [
            'day_price' => 9.75,
            'details' => [
                'baggages' => '2 piccoli',
                'change' => CarRental::CHANGE_AUTOMATIC,
                'doors' => 5,
                'power_supply' => CarRental::PS_GASOLINE,
                'seats' => 4,
            ],
            'images' => 0
        ],
        'Peugeot 308' => [
            'day_price' => 11.27,
            'details' => [
                'baggages' => '2 grandi',
                'change' => CarRental::CHANGE_MANUAL,
                'doors' => 5,
                'power_supply' => CarRental::PS_GASOLINE.'/'.CarRental::PS_DIESEL,
                'seats' => 5,
            ],
            'images' => 0
        ],
        'Peugeot 508' => [
            'day_price' => 12.12,
            'details' => [
                'baggages' => '',
                'change' => '',
                'doors' => 0,
                'power_supply' => '',
                'seats' => 0,
            ],
            'images' => 0
        ],
        'Renault Clio' => [
            'day_price' => 13.26,
            'details' => [
                'baggages' => '1 grande',
                'change' => CarRental::CHANGE_MANUAL,
                'doors' => 5,
                'power_supply' => CarRental::PS_DIESEL,
                'seats' => 5,
            ],
            'images' => 0
        ],
        'Renault Talisman Wagon' => [
            'day_price' => 13.69,
            'details' => [
                'baggages' => '',
                'change' => '',
                'doors' => 0,
                'power_supply' => '',
                'seats' => 0,
            ],
            'images' => 0
        ],
        'Skoda Kamiq' => [
            'day_price' => 16.12,
            'details' => [
                'baggages' => '',
                'change' => '',
                'doors' => 0,
                'power_supply' => '',
                'seats' => 0,
            ],
            'images' => 0
        ],
        'Skoda Karoq' => [
            'day_price' => 15.64,
            'details' => [
                'baggages' => '',
                'change' => '',
                'doors' => 0,
                'power_supply' => '',
                'seats' => 0,
            ],
            'images' => 0
        ],
        'Toyota C-HR' => [
            'day_price' => 12.89,
            'details' => [
                'baggages' => '',
                'change' => '',
                'doors' => 0,
                'power_supply' => '',
                'seats' => 0,
            ],
            'images' => 0
        ],
        'Toyota Auris' => [
            'day_price' => 13.70,
            'details' => [
                'baggages' => '2 grandi',
                'change' => CarRental::CHANGE_AUTOMATIC,
                'doors' => 5,
                'power_supply' => CarRental::PS_HYBRID,
                'seats' => 5,
            ],
            'images' => 0
        ],
        'Toyota Aygo' => [
            'day_price' => 11.56,
            'details' => [
                'baggages' => '2 piccoli',
                'change' => CarRental::CHANGE_MANUAL,
                'doors' => 5,
                'power_supply' => CarRental::PS_GASOLINE,
                'seats' => 4,
            ],
            'images' => 0
        ],
        'Toyota Corlla' => [
            'day_price' => 13.00,
            'details' => [
                'baggages' => '',
                'change' => '',
                'doors' => 0,
                'power_supply' => '',
                'seats' => 0,
            ],
            'images' => 0
        ],
        'Toyota Mirai' => [
            'day_price' => 16.00,
            'details' => [
                'baggages' => '',
                'change' => '',
                'doors' => 0,
                'power_supply' => '',
                'seats' => 0,
            ],
            'images' => 0
        ],
        'Toyota Proace Electric Aut. 9 Posti' => [
            'day_price' => 15.20,
            'details' => [
                'baggages' => '',
                'change' => '',
                'doors' => 0,
                'power_supply' => '',
                'seats' => 0,
            ],
            'images' => 0
        ],
        'Toyota Yaris' => [
            'day_price' => 14.56,
            'details' => [
                'baggages' => '2 piccoli',
                'change' => CarRental::CHANGE_AUTOMATIC,
                'doors' => 5,
                'power_supply' => CarRental::PS_HYBRID,
                'seats' => 5,
            ],
            'images' => 0
        ],
        'Volkswagen Golf' => [
            'day_price' => 12.51,
            'details' => [
                'baggages' => '1 piccolo, 1 grande',
                'change' => CarRental::CHANGE_MANUAL,
                'doors' => 5,
                'power_supply' => CarRental::PS_GASOLINE.'/'.CarRental::PS_DIESEL,
                'seats' => 5,
            ],
            'images' => 0
        ]
    ];

    const CARRENTAL_COMPANIES = [
        'Alamo' => [
            'day_price_30_65' => 11.00,
            'day_price_additional_pcg' => [
                0 => 15, 1 => 10, 2 => 5, 3 => 0, 4 => 7.5, 5 => 13,
            ],
            'cars' => [0,3,5,9,12,17,22,23,27,32,34,38,47,49]
        ],
        'Avis' => [
            'day_price_30_65' => 14.34,
            'day_price_additional_pcg' => [
                0 => 17.5, 1 => 11, 2 => 6.2, 3 => 0, 4 => 9, 5 => 14.5,
            ],
            'cars' => [4,7,9,12,14,16,19,22,23,28,30,33,38]
        ],
        'Budget' => [
            'day_price_30_65' => 12.21,
            'day_price_additional_pcg' => [
                0 => 13.9, 1 => 9, 2 => 3.7, 3 => 0, 4 => 5.5, 5 => 10.6,
            ],
            'cars' => [7,12,17,22,25,26,27,30,33,37,39,42,43,46,48,49,50]
        ],
        'Enterprise' => [
            'day_price_30_65' => 13.39,
            'day_price_additional_pcg' => [
                0 => 16, 1 => 10.5, 2 => 5, 3 => 0, 4 => 7, 5 => 12,
            ],
            'cars' => [2,4,9,12,15,19,23,28,38,41,44]
        ],
        'GoldCar' => [
            'day_price_30_65' => 9.95,
            'day_price_additional_pcg' => [
                0 => 14, 1 => 11.5, 2 => 7, 3 => 0, 4 => 9, 5 => 13.8,
            ],
            'cars' => [4,9,11,14,17,20,21,22,23,26,29,30,33,36,37,40,52]
        ],
        'Locauto' => [
            'day_price_30_65' => 11.21,
            'day_price_additional_pcg' => [
                0 => 17.3, 1 => 13.0, 2 => 8.1, 3 => 0, 4 => 9, 5 => 12.4,
            ],
            'cars' => [2,7,12,15,19,23,27,30,31,33,36,39,40,43,45,46,48]
        ],
        'Maggiore' => [
            'day_price_30_65' => 12.99,
            'day_price_additional_pcg' => [
                0 => 12.9, 1 => 9.2, 2 => 3, 3 => 0, 4 => 6.2, 5 => 10.5,
            ],
            'cars' => [1,4,5,9,12,13,16,17,20,21,22,26,29,30,32,34,37,40,41] 
        ],
        'National' => [
            'day_price_30_65' => 14.00,
            'day_price_additional_pcg' => [
                0 => 16.4, 1 => 10.9, 2 => 6.7, 3 => 0, 4 => 8.5, 5 => 14,
            ],
            'cars' => [0,2,6,9,10,14,16,19,22,23,26,28,30,31,37,45,46,47,50]
        ],
        'Sixt' => [
            'day_price_30_65' => 12.42,
            'day_price_additional_pcg' => [
                0 => 13.9, 1 => 11.1, 2 => 5.5, 3 => 0, 4 => 10, 5 => 14.2,
            ],
            'cars' => [4,6,9,10,13,15,17,20,21,22,24,26,29,32,35,36,39,41,43,47,50,51,52]
        ],
        'TopCar' => [
            'day_price_30_65' => 15.59,
            'day_price_additional_pcg' => [
                0 => 17.4, 1 => 12, 2 => 8, 3 => 0, 4 => 7, 5 => 11.9,
            ],
            'cars' => [2,3,8,11,14,17,21,24,26,27,29,32,33,38,41,46,49,50]
        ],
    ];
}
?>