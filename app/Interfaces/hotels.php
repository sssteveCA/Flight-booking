<?php

namespace App\Interfaces;

interface Hotels{
    const HOTELS_LIST = [
        'Austria' => [
            'Innsbruck' => [
                'Hotel Central' => [],
                'Hotel Goldene Krone Innsbruck' => [],
                'Hotel Tautermann' => []
            ],
            'Salisburgo' => [
                'Altstadt Hotel Hofwirt Salzburg' => [],
                'H+ Hotel Salzburg' => [],
                'MEININGER Hotel Salzburg City Center' => []
            ],
            'Vienna' => [
                'Hotel IMLAUER Wien' => [],
                'Ibis budget Wien Sankt Marx' => [],
                'MEININGER Hotel Wien Downtown Franz' => [],
            ]
        ],
        'Belgio' => [
            'Anversa' => [
                'A-STAY Antwerp' => [],
                'ibis budget Antwerpen Centraal Station' => [],
                'Tryp By Wyndham Antwerp' => []
            ],
            'Bruges' => [
                'Hotel Ter Brughe' => [],
                'ibis budget Brugge Centrum Station' => [],
                'Martin\'s Brugge' => []
            ],
            'Bruxelles' => [
                'Bedford Hotel & Congress Centre' => [],
                'Marivaux Hotel' => [],
                'Motel One Brussels' => []
            ]
        ],
        'Bosnia & Herzegovina' => [
            'Međugorje' => [
                'Hotel Barbaric' => [],
                'Hotel Luna' => [],
                'Hotel Matal' => []
            ],
            'Mostar' => [
                'Hotel Bristol' => [],
                'Hotel Mostar' => [],
                'Hotel-Restaurant Kriva Ćuprija' => []
            ],
            'Sarajevo' => [
                'Heritage Hotel Gate of Sarajevo' => [],
                'Hotel Boutique Libris' => [],
                'İsa Begov Hamam Hotel' => []
            ]
        ],
        'Bulgaria' => [
            'Plovdiv' => [
                'Grand Hotel Plovdiv' => [],
                'Hotel BLVD' => [],
                'Hotel Leipzig' => []
            ],
            'Sofia' => [
                'Best Western Plus Bristol Hotel' => [],
                'Central Point Boutique Hotel' => [],
                'Light Hotel' => []
            ],
            'Sunny Beach' => [
                'Best Western PLUS Premium Inn' => [],
                'Galeon Residence & SPA' => [],
                'Planeta Hotel & Aquapark - Ultra All Inclusive' => []
            ]
        ],
        'Cipro' => [
            'Ayia Napa' => [
                'Anonymous Beach Hotel (Adults 16+)' => [],
                'Cosmo Napa Boutique Hotel' => [],
                'Nissiana Hotel & Bungalows' => []
            ],
            'Larnaca' => [
                'Best Western Plus Larco Hotel' => [],
                'Frangiorgio Hotel' => [],
                'San Remo Hotel' => []
            ],
            'Paphos' => [
                'Amphora Hotel & Suites' => [],
                'Capital Coast Resort And Spa' => [],
                'Roman Boutique Hotel' => []
            ]
        ],
        'Croazia' => [
            'Poreč' => [
                'Hotel Molindrio Plava Laguna' => [],
                'Hotel Parentium Plava Laguna' => [],
                'Hotel Plavi Plava Laguna' => []
            ],
            'Rovigno' => [
                'Eden Hotel by Maistra Collection' => [],
                'Family Hotel Amarin by Maistra Select' => [],
                'Lone Hotel by Maistra Collection' => []
            ],
            'Zagabria' => [
                'Art Hotel Like' => [],
                'Best Western Premier Hotel Astoria' => [],
                'Timeout Heritage Hotel Zagreb' => []
            ]
        ],
        'Danimarca' => [
            'Arhus' => [
                'Cabinn Aarhus' => [],
                'Hotel Atlantic' => [],
                'Wakeup - Aarhus' => []
            ],
            'Copenaghen' => [
                'Cabinn Copenhagen' => [],
                'Wakeup Copenhagen - Bernstorffsgade' => [],
                'Wakeup Copenhagen - Borgergade' => []
            ],
            'Odense' => [
                'Cabinn Odense' => [],
                'City Hotel Nattergalen' => [],
                'Hotel Odense' => []
            ]
        ],
        'Estonia' => [
            'Käsmu' => [
                'Käsmu Holiday House' => [],
                'Lainela Holiday Park' => [],
                'Merekalda Apartments - Adults only' => []
            ],
            'Sagadi' => [
                'Haaviku Nature Lodge' => [],
                'Sagadi Manor Hostel' => [],
                'Sagadi Manor Hotel' => []
            ],
            'Võsu' => [
                'Cozy villa in Võsu' => [],
                'Guest House Rannaliiv' => [],
                'Mere 38 Apartments' => []
            ]
        ],
        'Finlandia' => [
            'Helsinki' => [
                'Hotel Arthur' => [],
                'Hotel Finn' => [],
                'Omena Hotel Helsinki Lönnrotinkatu' => []
            ],
            'Rovaniemi' => [
                'Arctic City Hotel' => [],
                'Santa Claus Holiday Village' => [],
                'Scandic Rovaniemi City' => []
            ],
            'Vantaa' => [
                'Hilton Helsinki Airport' => [],
                'Holiday Inn Helsinki-Vantaa Airport, an IHG Hotel' => [],
                'Scandic Helsinki Airport' => []
            ]
        ],
        'Francia' => [
            'Cannes' => [
                'B&B HOTEL Cannes La Bocca Plage' => [],
                'Hotel Abrial' => [],
                'L\'Esterel' => []
            ],
            'Nizza' => [
                'Best Western Plus Hôtel Massena Nice' => [],
                'Hôtel Byakko Nice' => [] ,
                'Premiere Classe Nice - Promenade des Anglais' => []
            ],
            'Parigi' => [
                'B&B HOTEL Paris 17 Batignolles' => [],
                'hotelF1 Paris Porte de Châtillon' => [],
                'HotelF1 Paris Saint Ouen Marché Aux Puces Rénové' => []
            ]
        ],
        'Germania' => [
            'Berlino' => [
                'H2 Hotel Berlin-Alexanderplatz' => [],
                'MEININGER Hotel Berlin Hauptbahnhof' => [],
                'Schulz Hotel Berlin Wall at the East Side Gallery' => []
            ],
            'Francoforte' => [
                'a&o Frankfurt Galluswarte' => [],
                'Leonardo Royal Hotel Frankfurt' => [],
                'Park Inn by Radisson Frankfurt Airport' => []
            ],
            'Monaco di Baviera' => [
                'Bento Inn Munich' => [],
                'H2 Hotel München Olympiapark' => [],
                'Leonardo Hotel & Residenz Muenchen' => []
            ]
        ],
        'Giordania' => [
            'Amman' => [
                'Layaali Amman Hotel' => [],
                'New MerryLand Hotel' => [],
                'Zaman Ya Zaman Boutique Hotel' => []
            ],
            'Aqaba' => [
                'Lacosta Hotel' => [],
                'Marina Plaza Hotel Tala Bay' => [],
                'TAJ Hotel' => []
            ],
            'Sowayma' => [
                'Dead Sea Spa Hotel' => [],
                'Ramada Resort Dead Sea' => [],
                'Russian Pilgrim Residence' => []
            ]
        ],
        'Grecia' => [
            'Atene' => [
                'Hotel Cosmos' => [],
                'President Hotel' => [],
                'Titania Hotel' => []
            ],
            'Fira' => [
                'Galatia Villas' => [],
                'Hotel Hellas' => [],
                'Porto Castello' => []
            ],
            'Mykonos Città' => [
                'Matogianni Hotel' => [],
                'Mykonos Bay Resort & Villas' => [],
                'Sofia Village' => []
            ]
        ],
        'Irlanda' => [
            'Cork' => [
                'Jurys Inn Cork' => [],
                'Maldron Hotel South Mall Cork City' => [],
                'Rochestown Park Hotel' => []
            ],
            'Dublino' => [
                'Academy Plaza Hotel' => [],
                'Beresford Hotel' => [],
                'Riu Plaza The Gresham Dublin' => []
            ],
            'Galway' => [
                'Flannery\'s Hotel' => [],
                'Imperial Hotel Galway' => [],
                'Nox Hotel Galway' => []
            ]
        ],
        'Israele' => [
            'Eilat' => [
                'Club In Eilat - Coral Beach Villa Resort' => [],
                'Dan Panorama Eilat' => [],
                'Rich Luxury Suites' => []
            ],
            'Gerusalemme' => [
                'Agripas Boutique Hotel' => [],
                'De Cardo Hotel' => [],
                'National Hotel - Jerusalem' => []
            ],
            'Tel Aviv' => [
                'BY14 TLV Hotel' => [],
                'Idelson Hotel' => [],
                'Old Jaffa House - Boutique Hotel' => []
            ]
        ],
        'Italia' => [
            'Firenze' => [
                'Hotel Bodoni' => [],
                'Hotel Delle Nazioni' => [],
                'Nilhotel' => []
            ],
            'Milano' => [
                'Canova Hotel' => [],
                'Ibis Milano Centro' => [],
                'Idea Hotel Milano San Siro' => []
            ],
            'Roma' => [
                'Barceló Aran Mantegna' => [],
                'Hotel American Palace Eur' => [],
                'Hotel Cristoforo Colombo' => []
            ]
        ],
        'Lettonia' => [
            'Kārļi' => [
                'Guest House Kalniņi' => [],
                'Hotel Melturi' => [],
                'Karlamuiza Country Hotel' => []
            ],
            'Kolka' => [
                'Coastal Home Muini Ūši' => [],
                'Guest House Vītoli' => [],
                'Holiday Home Kolka' => []
            ],
            'Mežotne' => [
                'Baltā māja' => [],
                'Mazmežotnes muiža' => [],
                'Rundale Solstice Apartment' => []
            ]
        ],
        'Lituania' => [
            'Klaipeda' => [
                'Amberton Green Apartments Palanga' => [],
                'Dangė Hotel' => [],
                'Resort Hotel Elija' => []
            ],
            'Neringa' => [
                'Hotel Jurate' => [],
                'Nidos Banga' => [],
                'SPA Nida' => []
            ],
            'Vilnius' => [
                'CALVARY Hotel & Restaurant Vilnius' => [],
                'Hilton Garden Inn Vilnius City Centre' => [],
                'Park Inn by Radisson Vilnius Airport Hotel & Business Centre' => []
            ]
        ],
        'Lussemburgo' => [
            'Lussemburgo' => [
                'ibis Luxembourg Aeroport' => [],
                'Mandarina Hotel Luxembourg Airport' => [],
                'Novotel Luxembourg Centre' => []
            ]
        ],
        'Malta' => [
            'San Pawl il-Baħar' => [
                'Dolmen Hotel Malta' => [],
                'Euroclub Hotel' => [],
                'Porto Azzurro Aparthotel' => []
            ],
            'Sliema' => [
                'Europa Hotel' => [],
                'Plaza Regency Hotels' => [],
                'Sliema Marina Hotel' => []
            ],
            'St Julian\' s' => [
                'Alexandra Hotel' => [],
                'be.HOTEL' => [],
                'Golden Tulip Vivaldi Hotel' => []
            ]
        ],
        'Marocco' => [
            'Casablanca' => [
                'Hotel Majestic' => [],
                'ODYSSEE Boutique Hotel Casablanca' => [],
                'ONOMO Airport Casablanca' => []
            ],
            'Fes' => [
                'Fes Marriott Hotel Jnan Palace' => [],
                'Hôtel Volubilis' => [],
                'Ibis Budget Fès' => []
            ],
            'Marrakech' => [
                'Hotel Almas' => [],
                'Hôtel Racine' => [],
                'Imperial Holiday Hôtel & spa' => []
            ]
        ],
        'Montenegro' => [
            'Budua' => [
                'Hotel Ponta Nova' => [],
                'Iberostar Bellevue - All Inclusive' => [],
                'Splendid Conference & Spa Resort' => []
            ],
            'Kotor' => [
                'Boutique Hotel Hippocampus' => [],
                'Hotel Marija' => [],
                'Hotel Rendez Vous' => []
            ],
            'Podgorica' => [
                'Boscovich Boutique Hotel' => [],
                'Hotel Crnogorska Kuća' => [],
                'Hotel Kerber' => []
            ]
        ],
        'Norvegia' => [
            'Bergen' => [
                'Citybox Bergen City' => [],
                'Citybox Bergen Danmarksplass' => [],
                'Radisson Blu Royal Hotel, Bergen' => []
            ],
            'Oslo' => [
                'Anker Hotel' => [],
                'Citybox Oslo' => [],
                'Smarthotel Oslo' => []
            ],
            'Tromsø' => [
                'Comfort Hotel Xpress Tromsø' => [],
                'Radisson Blu Hotel Tromsø' => [],
                'Smarthotel Tromsø' => []
            ]
        ],
        'Olanda' => [
            'Amstelveen' => [
                'Amsterdam Forest Hotel' => [],
                'ibis budget Amsterdam City South' => [],
                'Radisson Hotel & Suites Amsterdam South' => []
            ],
            'Amsterdam' => [
                'Hotel Ben Centre' => [],
                'XO Hotels Blue Tower' => [],
                'XO Hotels Park West' => []
            ],
            'Badhoevedorp' => [
                'ibis budget Amsterdam Airport' => [],
                'Ibis Schiphol Amsterdam Airport' => [],
                'Ramada by Wyndham Amsterdam Airport Schiphol' => []
            ]
        ],
        'Polonia' => [
            'Breslavia' => [
                'B&B Hotel Wrocław Centrum' => [],
                'PURO Wrocław Stare Miasto' => [],
                'Wyndham Wroclaw Old Town' => []
            ],
            'Cracovia' => [
                'Hilton Garden Inn Krakow Airport' => [],
                'Hotel Alexander' => [],
                'ibis budget Krakow Stare Miasto' => []
            ],
            'Varsavia' => [
                'Hotel Metropol' => [],
                'Novotel Warszawa Centrum' => [],
                'Radisson Blu Sobieski' => []
            ]
        ],
        'Portogallo' => [
            'Coimbra' => [
                'Hotel Ibis Coimbra Centro' => [],
                'Hotel Oslo' => [],
                'Stay Hotel Coimbra Centro' => []
            ],
            'Lisbona' => [
                'America Diamonds Hotel & Sushi Bar' => [],
                'Empire Lisbon Hotel' => [],
                'Star inn Lisbon Airport' => []
            ],
            'Porto' => [
                'Hotel Carris Porto Ribeira' => [],
                'Pao de Acucar Hotel' => [],
                'Zero Box Lodge Porto' => []
            ]
        ],
        'Regno Unito' => [
            'Edimburgo' => [
               'Cityroomz Edinburgh' => [],
               'ibis budget Hotel Edinburgh Park' => [],
               'YOTEL Edinburgh' => []
            ],
            'Londra' => [
                'Britannia International Hotel Canary Wharf' => [],
                'Central Park Hotel' => [],
                'Zedwell Piccadilly Circus' => []
            ],
            'Manchester' => [
                'Britannia Hotel City Centre Manchester' => [],
                'Motel One Manchester-Piccadilly' => [],
                'Sachas Hotel Manchester' => []
            ]
        ],
        'Repubblica Ceca' => [
            'Brno' => [
                'Cosmopolitan Bobycentrum - Czech Leading Hotels' => [],
                'Hotel Europa' => [],
                'OREA Congress Hotel Brno' => []
            ],
            'Cesky Krumlov' => [
                'Gold' => [],
                'Hotel Grand' => [],
                'Vltavská pohádka' => []
            ],
            'Praga' => [
                'Don Giovanni Hotel Prague - Great Hotels of The World' => [],
                'Grandior Hotel Prague' => [],
                'Grandium Hotel Prague' => []
            ]
        ],
        'Romania' => [
            'Braşov' => [
                'Drachenhaus' => [],
                'Hotel Aro Palace' => [],
                'Safrano Palace' => []
            ],
            'Bucarest' => [
                'Capitol Hotel' => [],
                'Hotel Duke Armeneasca - Ex Tempo' => [],
                'Moxy Bucharest Old Town' => []
            ],
            'Timişoara' => [
                'Hotel Central' => [],
                'Hotel Continental' => [],
                'Hotel Imperial Premium' => []
            ]
        ],
        'Serbia' => [
            'Belgrado' => [
                'Airport Hotel Garni' => [],
                'Belgrade Inn Garni Hotel' => [],
                'Hotel Moskva' => []
            ],
            'Niš' => [
                'Ambasador Hotel' => [],
                'Hotel Crystal Light' => [],
                'New City Hotel & Restaurant Niš' => []
            ],
            'Novi Sad' => [
                'GARNI HOTEL AMI' => [],
                'Garni Hotel Centar' => [],
                'Hotel Park' => []
            ]
        ],
        'Slovacchia' => [
            'Bratislava' => [
                'Apollo Hotel Bratislava' => [],
                'Elisabeth Old Town' => [],
                'Pension Petit' => []
            ],
            'Košice' => [
                'DoubleTree By Hilton Košice' => [],
                'Hotel Crystal' => [],
                'TeleDom Hotel' => []
            ],
            'Nitra' => [
                'BOUTIQUE HOTEL11 rooftop SPA' => [],
                'Hotel Capital with private wellness' => [],
                'Hotel Deluxe with free Wellness and Fitness Centrum' => []
            ]
        ],
        'Spagna' => [
            'Barcellona' => [
                'Catalonia Sagrada Familia' => [],
                'Hotel Lloret Ramblas' => [],
                'Travelodge Barcelona Poblenou' => []
            ],
            'Madrid' => [
                'Ayre Gran Hotel Colón' => [],
                'Hotel Princesa Plaza Madrid' => [],
                'Riu Plaza España' => []
            ],
            'Valencia' => [
                'Casual Vintage Valencia' => [],
                'Hotel Malcom and Barret' => [],
                'Venecia Plaza Centro' => []
            ]
        ],
        'Svezia' => [
            'Göteborg' => [
                'First Hotel G' => [],
                'Hotel Allén - Sure Hotel by Best Western Allen' => [],
                'Hotell Heden' => []
            ],
            'Malmö' => [
               'First Hotel Jörgen Kock' => [],
               'Moment Hotels' => [],
               'ProfilHotels Hotel Garden' => []
            ],
            'Stoccolma' => [
                'Comfort Hotel Xpress Stockholm Central' => [],
                'Radisson Blu Royal Viking Hotel, Stockholm' => [],
                'Thon Partner Hotel Kungsbron' => []
            ]
        ],
        'Svizzera' => [
            'Ginevra' => [
                'ibis budget Genève Aéroport' => [],
                'ibis Genève Centre Nations' => [],
                'Nash Airport Hotel' => []
            ],
            'Lugano' => [
                'Hotel Dischma' => [],
               'ibis budget Lugano Paradiso' => [],
               'Lugano Center GuestHouse' => []
            ],
            'Zurigo' => [
                'aja Zürich' => [],
                'H+ Hotel Zürich' => [],
                'Motel One Zürich' => []
            ]
        ],
        'Turchia' => [
            'Göreme' => [
                'Cappadocia Caves Hotel' => [],
                'Henna Hotel' => [],
                'Stone House Cave Hotel' => []
            ],
            'Istanbul' => [
                'Florenta Hotel' => [],
                'ISG Sabiha Gökçen Airport Hotel' => [],
                'Miss Istanbul Hotel & Spa' => []
            ],
            'Smirne' => [
                'Park Inn by Radisson Izmir' => [],
                'Smart Hotel İzmir' => [],
                'TAV Airport Hotel Izmir' => []
            ]
        ],
        'Ungheria' => [
            'Budapest' => [
                'Danubius Hotel Erzsébet City Center' => [],
                'Medos Hotel' => [],
                'Silver Hotel Budapest City Center' => []
            ],
            'Siófok' => [
                'Hotel La Riva' => [],
                'Luxury Hotel Siófok' => [],
                'Residence Hotel Balaton' => []
            ],
            'Vecsés' => [
                'Airport Hotel Budapest' => [],
                'Hotel Ferihegy' => [],
                'ibis Styles Budapest Airport' => []
            ]
        ],
    ];
}
?>