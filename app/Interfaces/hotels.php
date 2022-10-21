<?php

namespace App\Interfaces;

interface Hotels{
    const HOTELS_LIST = [
        'Austria' => [
            'Innsbruck' => [
                'Hotel Central' => [
                   'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Hotel Goldene Krone Innsbruck' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Hotel Tautermann' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Salisburgo' => [
                'Altstadt Hotel Hofwirt Salzburg' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'H+ Hotel Salzburg' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'MEININGER Hotel Salzburg City Center' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Vienna' => [
                'Hotel IMLAUER Wien' => [
                    'max_people' => 5, 'price' => 163.51, 'rooms' => 91, 'score' => 8.6, 'stars' => 5
                ],
                'Ibis budget Wien Sankt Marx' => [
                    'max_people' => 4, 'price' => 46.80, 'rooms' => 68, 'score' => 7.5, 'stars' => 2
                ],
                'MEININGER Hotel Wien Downtown Franz' => [
                    'max_people' => 3, 'price' => 15.95, 'rooms' => 59, 'score' => 8.2, 'stars' => 3
                ],
            ]
        ],
        'Belgio' => [
            'Anversa' => [
                'A-STAY Antwerp' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'ibis budget Antwerpen Centraal Station' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Tryp By Wyndham Antwerp' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Bruges' => [
                'Hotel Ter Brughe' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'ibis budget Brugge Centrum Station' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Martin\'s Brugge' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Bruxelles' => [
                'Bedford Hotel & Congress Centre' => [
                    'max_people' => 3, 'price' => 78.17, 'rooms' => 84, 'score' => 7.9, 'stars' => 3
                ],
                'Marivaux Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Motel One Brussels' => [
                    'max_people' => 4, 'price' => 103.24, 'rooms' => 70, 'score' => 8.7, 'stars' => 3
                ]
            ]
        ],
        'Bosnia & Herzegovina' => [
            'Međugorje' => [
                'Hotel Barbaric' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Hotel Luna' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Hotel Matal' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Mostar' => [
                'Hotel Bristol' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Hotel Mostar' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Hotel-Restaurant Kriva Ćuprija' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Sarajevo' => [
                'Heritage Hotel Gate of Sarajevo' => [
                    'max_people' => 3, 'price' => 56.82, 'rooms' => 78, 'score' => 8.7, 'stars' => 4
                ],
                'Hotel Boutique Libris' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 62, 'score' => 8, 'stars' => 4
                ],
                'İsa Begov Hamam Hotel' => [
                    'max_people' => 3, 'price' => 54.00, 'rooms' => 55, 'score' => 8.9, 'stars' => 4
                ]
            ]
        ],
        'Bulgaria' => [
            'Plovdiv' => [
                'Grand Hotel Plovdiv' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Hotel BLVD' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Hotel Leipzig' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Sofia' => [
                'Best Western Plus Bristol Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Central Point Boutique Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Light Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Sunny Beach' => [
                'Best Western PLUS Premium Inn' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Galeon Residence & SPA' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Planeta Hotel & Aquapark - Ultra All Inclusive' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ]
        ],
        'Cipro' => [
            'Ayia Napa' => [
                'Anonymous Beach Hotel (Adults 16+)' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Cosmo Napa Boutique Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Nissiana Hotel & Bungalows' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Larnaca' => [
                'Best Western Plus Larco Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Frangiorgio Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'San Remo Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Paphos' => [
                'Amphora Hotel & Suites' => [
                    'max_people' => 5, 'price' => 70.00, 'rooms' => 89, 'score' => 8.5, 'stars' => 4
                ],
                'Capital Coast Resort And Spa' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 76, 'score' => 7.8, 'stars' => 4
                ],
                'Roman Boutique Hotel' => [
                    'max_people' => 3, 'price' => 50.00, 'rooms' => 94, 'score' => 8.2, 'stars' => 3
                ]
            ]
        ],
        'Croazia' => [
            'Poreč' => [
                'Hotel Molindrio Plava Laguna' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Hotel Parentium Plava Laguna' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Hotel Plavi Plava Laguna' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Rovigno' => [
                'Eden Hotel by Maistra Collection' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Family Hotel Amarin by Maistra Select' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Lone Hotel by Maistra Collection' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Zagabria' => [
                'Art Hotel Like' => [
                    'max_people' => 2, 'price' => 63.60, 'rooms' => 52, 'score' => 7.9, 'stars' => 3
                ],
                'Best Western Premier Hotel Astoria' => [
                    'max_people' => 2, 'price' => 96.60, 'rooms' => 69, 'score' => 8.8, 'stars' => 4
                ],
                'Timeout Heritage Hotel Zagreb' => [
                    'max_people' => 4, 'price' => 52.10, 'rooms' => 72, 'score' => 7.7, 'stars' => 4
                ]
            ]
        ],
        'Danimarca' => [
            'Arhus' => [
                'Cabinn Aarhus' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Hotel Atlantic' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Wakeup - Aarhus' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Copenaghen' => [
                'Cabinn Copenhagen' => [
                    'max_people' => 6, 'price' => 78, 'rooms' => 93, 'score' => 6.8, 'stars' => 2
                ],
                'Wakeup Copenhagen - Bernstorffsgade' => [
                    'max_people' => 4, 'price' => 66.00, 'rooms' => 96, 'score' => 7.8, 'stars' => 2
                ],
                'Wakeup Copenhagen - Borgergade' => [
                    'max_people' => 3, 'price' => 71.00, 'rooms' => 83, 'score' => 8, 'stars' => 2
                ]
            ],
            'Odense' => [
                'Cabinn Odense' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'City Hotel Nattergalen' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Hotel Odense' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ]
        ],
        'Estonia' => [
            'Käsmu' => [
                'Käsmu Holiday House' => [
                    'max_people' => 3, 'price' => 70.00, 'rooms' => 54, 'score' => 9.3, 'stars' => 3
                ],
                'Lainela Holiday Park' => [
                    'max_people' => 4, 'price' => 84.00, 'rooms' => 47, 'score' => 8.5, 'stars' => 2
                ],
                'Merekalda Apartments - Adults only' => [
                    'max_people' => 4, 'price' => 75.00, 'rooms' => 73, 'score' => 7.6, 'stars' => 3
                ]
            ],
            'Sagadi' => [
                'Haaviku Nature Lodge' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Sagadi Manor Hostel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Sagadi Manor Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Võsu' => [
                'Cozy villa in Võsu' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Guest House Rannaliiv' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Mere 38 Apartments' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ]
        ],
        'Finlandia' => [
            'Helsinki' => [
                'Hotel Arthur' => [
                    'max_people' => 5, 'price' => 80.00, 'rooms' => 88, 'score' => 7.6, 'stars' => 3
                ],
                'Hotel Finn' => [
                    'max_people' => 4, 'price' => 76.00, 'rooms' => 79, 'score' => 8.2, 'stars' => 3
                ],
                'Omena Hotel Helsinki Lönnrotinkatu' => [
                    'max_people' => 3, 'price' => 61.56, 'rooms' => 70, 'score' => 7.5, 'stars' => 3
                ]
            ],
            'Rovaniemi' => [
                'Arctic City Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Santa Claus Holiday Village' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Scandic Rovaniemi City' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Vantaa' => [
                'Hilton Helsinki Airport' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Holiday Inn Helsinki-Vantaa Airport, an IHG Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Scandic Helsinki Airport' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ]
        ],
        'Francia' => [
            'Cannes' => [
                'B&B HOTEL Cannes La Bocca Plage' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Hotel Abrial' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'L\'Esterel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Nizza' => [
                'Best Western Plus Hôtel Massena Nice' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Hôtel Byakko Nice' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ] ,
                'Premiere Classe Nice - Promenade des Anglais' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Parigi' => [
                'B&B HOTEL Paris 17 Batignolles' => [
                    'max_people' => 4, 'price' => 107.71, 'rooms' => 81, 'score' => 7.9, 'stars' => 3
                ],
                'hotelF1 Paris Porte de Châtillon' => [
                    'max_people' => 2, 'price' => 39.58, 'rooms' => 49, 'score' => 7.1, 'stars' => 2
                ],
                'HotelF1 Paris Saint Ouen Marché Aux Puces Rénové' => [
                    'max_people' => 2, 'price' => 42.97, 'rooms' => 54, 'score' => 6.2, 'stars' => 2
                ]
            ]
        ],
        'Germania' => [
            'Berlino' => [
                'H2 Hotel Berlin-Alexanderplatz' => [
                    'max_people' => 4, 'price' => 96.25, 'rooms' => 75, 'score' => 8.3, 'stars' => 3
                ],
                'MEININGER Hotel Berlin Hauptbahnhof' => [
                    'max_people' => 2, 'price' => 14.85, 'rooms' => 45, 'score' => 7.4, 'stars' => 3
                ],
                'Schulz Hotel Berlin Wall at the East Side Gallery' => [
                    'max_people' => 5, 'price' => 60.17, 'rooms' => 64, 'score' => 8.5, 'stars' => 3
                ]
            ],
            'Francoforte' => [
                'a&o Frankfurt Galluswarte' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Leonardo Royal Hotel Frankfurt' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Park Inn by Radisson Frankfurt Airport' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Monaco di Baviera' => [
                'Bento Inn Munich' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                    
                ],
                'H2 Hotel München Olympiapark' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                    
                ],
                'Leonardo Hotel & Residenz Muenchen' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                    
                ]
            ]
        ],
        'Giordania' => [
            'Amman' => [
                'Layaali Amman Hotel' => [
                    'max_people' => 3, 'price' => 50.00, 'rooms' => 75, 'score' => 8.3, 'stars' => 1
                    
                ],
                'New MerryLand Hotel' => [
                    'max_people' => 3, 'price' => 62.00, 'rooms' => 56, 'score' => 8.7, 'stars' => 3
                    
                ],
                'Zaman Ya Zaman Boutique Hotel' => [
                    'max_people' => 4, 'price' => 20.00, 'rooms' => 58, 'score' => 8.2, 'stars' => 2
                    
                ]
            ],
            'Aqaba' => [
                'Lacosta Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Marina Plaza Hotel Tala Bay' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'TAJ Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Sowayma' => [
                'Dead Sea Spa Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4 
                ],
                'Ramada Resort Dead Sea' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4 
                ],
                'Russian Pilgrim Residence' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ]
        ],
        'Grecia' => [
            'Atene' => [
                'Hotel Cosmos' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'President Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Titania Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Fira' => [
                'Galatia Villas' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Hotel Hellas' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Porto Castello' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Mykonos Città' => [
                'Matogianni Hotel' => [
                    'max_people' => 2, 'price' => 50.50, 'rooms' => 65, 'score' => 8.6, 'stars' => 2
                ],
                'Mykonos Bay Resort & Villas' => [
                    'max_people' => 6, 'price' => 90.00, 'rooms' => 93, 'score' => 9.4, 'stars' => 4
                ],
                'Sofia Village' => [
                    'max_people' => 5, 'price' => 60.90, 'rooms' => 87, 'score' => 8.2, 'stars' => 3
                ]
            ]
        ],
        'Irlanda' => [
            'Cork' => [
                'Jurys Inn Cork' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Maldron Hotel South Mall Cork City' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Rochestown Park Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Dublino' => [
                'Academy Plaza Hotel' => [
                    'max_people' => 6, 'price' => 118.15, 'rooms' => 104, 'score' => 8.1, 'stars' => 3
                ],
                'Beresford Hotel' => [
                    'max_people' => 5, 'price' => 116.10, 'rooms' => 92, 'score' => 7.3, 'stars' => 3
                ],
                'Riu Plaza The Gresham Dublin' => [
                    'max_people' => 4, 'price' => 105.00, 'rooms' => 99, 'score' => 7.7, 'stars' => 3
                ]
            ],
            'Galway' => [
                'Flannery\'s Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Imperial Hotel Galway' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Nox Hotel Galway' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ]
        ],
        'Israele' => [
            'Eilat' => [
                'Club In Eilat - Coral Beach Villa Resort' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Dan Panorama Eilat' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Rich Luxury Suites' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Gerusalemme' => [
                'Agripas Boutique Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'De Cardo Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'National Hotel - Jerusalem' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Tel Aviv' => [
                'BY14 TLV Hotel' => [
                    'max_people' => 7, 'price' => 208.00, 'rooms' => 63, 'score' => 8.5, 'stars' => 5
                ],
                'Idelson Hotel' => [
                    'max_people' => 3, 'price' => 82.00, 'rooms' => 46, 'score' => 6.7, 'stars' => 3
                ],
                'Old Jaffa House - Boutique Hotel' => [
                    'max_people' => 4, 'price' => 97.00, 'rooms' => 71, 'score' => 7.8, 'stars' => 3
                ]
            ]
        ],
        'Italia' => [
            'Firenze' => [
                'Hotel Bodoni' => [
                    'max_people' => 3, 'price' => 50.00, 'rooms' => 64, 'score' => 7.3, 'stars' => 3
                ],
                'Hotel Delle Nazioni' => [
                    'max_people' => 3, 'price' => 50.00, 'rooms' => 64, 'score' => 7.3, 'stars' => 3
                ],
                'Nilhotel' => [
                    'max_people' => 3, 'price' => 50.00, 'rooms' => 64, 'score' => 7.3, 'stars' => 3
                ]
            ],
            'Milano' => [
                'Canova Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Ibis Milano Centro' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Idea Hotel Milano San Siro' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Roma' => [
                'Barceló Aran Mantegna' => [
                    'max_people' => 6, 'price' => 82.30, 'rooms' => 101, 'score' => 7.9, 'stars' => 4
                ],
                'Hotel American Palace Eur' => [
                    'max_people' => 5, 'price' => 76.00, 'rooms' => 76, 'score' => 8.4, 'stars' => 4
                ],
                'Hotel Cristoforo Colombo' => [
                    'max_people' => 4, 'price' => 79.00, 'rooms' => 80, 'score' => 8.2, 'stars' => 4
                ]
            ]
        ],
        'Lettonia' => [
            'Kārļi' => [
                'Guest House Kalniņi' => [
                    'max_people' => 4, 'price' => 100.00, 'rooms' => 53, 'score' => 9.8, 'stars' => 4
                ],
                'Hotel Melturi' => [
                    'max_people' => 3, 'price' => 45.00, 'rooms' => 50, 'score' => 9.1, 'stars' => 2
                ],
                'Karlamuiza Country Hotel' => [
                    'max_people' => 3, 'price' => 63.28, 'rooms' => 47, 'score' => 9.2, 'stars' => 3
                ]
            ],
            'Kolka' => [
                'Coastal Home Muini Ūši' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Guest House Vītoli' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Holiday Home Kolka' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Mežotne' => [
                'Baltā māja' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Mazmežotnes muiža' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Rundale Solstice Apartment' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ]
        ],
        'Lituania' => [
            'Klaipeda' => [
                'Amberton Green Apartments Palanga' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Dangė Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Resort Hotel Elija' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Neringa' => [
                'Hotel Jurate' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Nidos Banga' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'SPA Nida' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Vilnius' => [
                'CALVARY Hotel & Restaurant Vilnius' => [
                    'max_people' => 4, 'price' => 71.90, 'rooms' => 75, 'score' => 9.2, 'stars' => 4
                ],
                'Hilton Garden Inn Vilnius City Centre' => [
                    'max_people' => 4, 'price' => 69.00, 'rooms' => 86, 'score' => 8.1, 'stars' => 3
                ],
                'Park Inn by Radisson Vilnius Airport Hotel & Business Centre' => [
                    'max_people' => 3, 'price' => 72.10, 'rooms' => 77, 'score' => 9.2, 'stars' => 4
                ]
            ]
        ],
        'Lussemburgo' => [
            'Lussemburgo' => [
                'ibis Luxembourg Aeroport' => [
                    'max_people' => 3, 'price' => 72.00, 'rooms' => 66, 'score' => 7.8, 'stars' => 3
                ],
                'Mandarina Hotel Luxembourg Airport' => [
                    'max_people' => 5, 'price' => 79.00, 'rooms' => 74, 'score' => 7.4, 'stars' => 3
                ],
                'Novotel Luxembourg Centre' => [
                    'max_people' => 6, 'price' => 179.00, 'rooms' => 90, 'score' => 8.3, 'stars' => 4
                ]
            ]
        ],
        'Malta' => [
            'San Pawl il-Baħar' => [
                'Dolmen Hotel Malta' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Euroclub Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Porto Azzurro Aparthotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Sliema' => [
                'Europa Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Plaza Regency Hotels' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Sliema Marina Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'St Julian\' s' => [
                'Alexandra Hotel' => [
                    'max_people' => 4, 'price' => 41.00, 'rooms' => 83, 'score' => 7.1, 'stars' => 3
                ],
                'be.HOTEL' => [
                    'max_people' => 4, 'price' => 46.00, 'rooms' => 94, 'score' => 8.7, 'stars' => 4
                ],
                'Golden Tulip Vivaldi Hotel' => [
                    'max_people' => 5, 'price' => 40.50, 'rooms' => 65, 'score' => 8, 'stars' => 4
                ]
            ]
        ],
        'Marocco' => [
            'Casablanca' => [
                'Hotel Majestic' => [
                    'max_people' => 3, 'price' => 42.50, 'rooms' => 55, 'score' => 7.3, 'stars' => 4
                ],
                'ODYSSEE Boutique Hotel Casablanca' => [
                    'max_people' => 5, 'price' => 83.00, 'rooms' => 82, 'score' => 8.1, 'stars' => 4
                ],
                'ONOMO Airport Casablanca' => [
                    'max_people' => 2, 'price' => 71.00, 'rooms' => 48, 'score' => 7.8, 'stars' => 3
                ]
            ],
            'Fes' => [
                'Fes Marriott Hotel Jnan Palace' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Hôtel Volubilis' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Ibis Budget Fès' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Marrakech' => [
                'Hotel Almas' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Hôtel Racine' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Imperial Holiday Hôtel & spa' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ]
        ],
        'Montenegro' => [
            'Budua' => [
                'Hotel Ponta Nova' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Iberostar Bellevue - All Inclusive' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Splendid Conference & Spa Resort' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Kotor' => [
                'Boutique Hotel Hippocampus' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Hotel Marija' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Hotel Rendez Vous' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Podgorica' => [
                'Boscovich Boutique Hotel' => [
                    'max_people' => 5, 'price' => 81.00, 'rooms' => 94, 'score' => 9.5, 'stars' => 4
                ],
                'Hotel Crnogorska Kuća' => [
                    'max_people' => 4, 'price' => 30.65, 'rooms' => 60, 'score' => 8.7, 'stars' => 4
                ],
                'Hotel Kerber' => [
                    'max_people' => 4, 'price' => 39.74, 'rooms' => 70, 'score' => 8.1, 'stars' => 3
                ]
            ]
        ],
        'Norvegia' => [
            'Bergen' => [
                'Citybox Bergen City' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Citybox Bergen Danmarksplass' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Radisson Blu Royal Hotel, Bergen' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Oslo' => [
                'Anker Hotel' => [
                    'max_people' => 6, 'price' => 105.00, 'rooms' => 89, 'score' => 7.8, 'stars' => 3
                ],
                'Citybox Oslo' => [
                    'max_people' => 2, 'price' => 77.00, 'rooms' => 44, 'score' => 8.2, 'stars' => 3
                ],
                'Smarthotel Oslo' => [
                    'max_people' => 5, 'price' => 89.00, 'rooms' => 80, 'score' => 7.7, 'stars' => 3
                ]
            ],
            'Tromsø' => [
                'Comfort Hotel Xpress Tromsø' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Radisson Blu Hotel Tromsø' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Smarthotel Tromsø' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ]
        ],
        'Olanda' => [
            'Amstelveen' => [
                'Amsterdam Forest Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'ibis budget Amsterdam City South' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Radisson Hotel & Suites Amsterdam South' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Amsterdam' => [
                'Hotel Ben Centre' => [
                    'max_people' => 4, 'price' => 91.14, 'rooms' => 73, 'score' => 6.2, 'stars' => 1
                ],
                'XO Hotels Blue Tower' => [
                    'max_people' => 2, 'price' => 89.43, 'rooms' => 51, 'score' => 7.9, 'stars' => 4
                ],
                'XO Hotels Park West' => [
                    'max_people' => 3, 'price' => 91.07, 'rooms' => 58, 'score' => 8.5, 'stars' => 4
                ]
            ],
            'Badhoevedorp' => [
                'ibis budget Amsterdam Airport' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Ibis Schiphol Amsterdam Airport' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Ramada by Wyndham Amsterdam Airport Schiphol' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ]
        ],
        'Polonia' => [
            'Breslavia' => [
                'B&B Hotel Wrocław Centrum' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'PURO Wrocław Stare Miasto' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Wyndham Wroclaw Old Town' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Cracovia' => [
                'Hilton Garden Inn Krakow Airport' => [
                    'max_people' => 4, 'price' => 126.00, 'rooms' => 93, 'score' => 8.9, 'stars' => 4
                ],
                'Hotel Alexander' => [
                    'max_people' => 3, 'price' => 42.00, 'rooms' => 68, 'score' => 8.3, 'stars' => 3
                ],
                'ibis budget Krakow Stare Miasto' => [
                    'max_people' => 6, 'price' => 38.00, 'rooms' => 62, 'score' => 7.9, 'stars' => 1
                ]
            ],
            'Varsavia' => [
                'Hotel Metropol' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Novotel Warszawa Centrum' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Radisson Blu Sobieski' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ]
        ],
        'Portogallo' => [
            'Coimbra' => [
                'Hotel Ibis Coimbra Centro' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Hotel Oslo' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Stay Hotel Coimbra Centro' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Lisbona' => [
                'America Diamonds Hotel & Sushi Bar' => [
                    'max_people' => 3, 'price' => 113.00, 'rooms' => 96, 'score' => 8.5, 'stars' => 3
                ],
                'Empire Lisbon Hotel' => [
                    'max_people' => 5, 'price' => 112.00, 'rooms' => 88, 'score' => 8.6, 'stars' => 3
                ],
                'Star inn Lisbon Airport' => [
                    'max_people' => 4, 'price' => 109.10, 'rooms' => 102, 'score' => 8.6, 'stars' => 3
                ]
            ],
            'Porto' => [
                'Hotel Carris Porto Ribeira' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Pao de Acucar Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Zero Box Lodge Porto' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ]
        ],
        'Regno Unito' => [
            'Edimburgo' => [
               'Cityroomz Edinburgh' => [
                'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
               ],
               'ibis budget Hotel Edinburgh Park' => [
                'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
               ],
               'YOTEL Edinburgh' => [
                'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
               ]
            ],
            'Londra' => [
                'Britannia International Hotel Canary Wharf' => [
                    'max_people' => 5, 'price' => 79.00, 'rooms' => 95, 'score' => 5.9, 'stars' => 4
                ],
                'Central Park Hotel' => [
                    'max_people' => 4, 'price' => 110.00, 'rooms' => 91, 'score' => 6.6, 'stars' => 3
                ],
                'Zedwell Piccadilly Circus' => [
                    'max_people' => 2, 'price' => 114.00, 'rooms' => 64, 'score' => 7.6, 'stars' => 2
                ]
            ],
            'Manchester' => [
                'Britannia Hotel City Centre Manchester' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Motel One Manchester-Piccadilly' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Sachas Hotel Manchester' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ]
        ],
        'Repubblica Ceca' => [
            'Brno' => [
                'Cosmopolitan Bobycentrum - Czech Leading Hotels' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Hotel Europa' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'OREA Congress Hotel Brno' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Cesky Krumlov' => [
                'Gold' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Hotel Grand' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Vltavská pohádka' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Praga' => [
                'Don Giovanni Hotel Prague - Great Hotels of The World' => [
                    'max_people' => 5, 'price' => 47.00, 'rooms' => 87, 'score' => 9, 'stars' => 4
                ],
                'Grandior Hotel Prague' => [
                    'max_people' => 7, 'price' => 77.10, 'rooms' => 105, 'score' => 8.8, 'stars' => 5
                ],
                'Grandium Hotel Prague' => [
                    'max_people' => 6, 'price' => 82.10, 'rooms' => 108, 'score' => 8, 'stars' => 5
                ]
            ]
        ],
        'Romania' => [
            'Braşov' => [
                'Drachenhaus' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Hotel Aro Palace' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Safrano Palace' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Bucarest' => [
                'Capitol Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Hotel Duke Armeneasca - Ex Tempo' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Moxy Bucharest Old Town' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Timişoara' => [
                'Hotel Central' => [
                    'max_people' => 4, 'price' => 77.00, 'rooms' => 84, 'score' => 8, 'stars' => 4
                ],
                'Hotel Continental' => [
                    'max_people' => 3, 'price' => 61.00, 'rooms' => 92, 'score' => 8.1, 'stars' => 4
                ],
                'Hotel Imperial Premium' => [
                    'max_people' => 3, 'price' => 39.00, 'rooms' => 72, 'score' => 8, 'stars' => 4
                ]
            ]
        ],
        'Serbia' => [
            'Belgrado' => [
                'Airport Hotel Garni' => [
                    'max_people' => 3, 'price' => 49.36, 'rooms' => 55, 'score' => 8.6, 'stars' => 3
                ],
                'Belgrade Inn Garni Hotel' => [
                    'max_people' => 5, 'price' => 64.35, 'rooms' => 87, 'score' => 8.8, 'stars' => 4
                ],
                'Hotel Moskva' => [
                    'max_people' => 4, 'price' => 105.40, 'rooms' => 92, 'score' => 9, 'stars' => 4
                ]
            ],
            'Niš' => [
                'Ambasador Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Hotel Crystal Light' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'New City Hotel & Restaurant Niš' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Novi Sad' => [
                'GARNI HOTEL AMI' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Garni Hotel Centar' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Hotel Park' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ]
        ],
        'Slovacchia' => [
            'Bratislava' => [
                'Apollo Hotel Bratislava' => [
                    'max_people' => 3, 'price' => 78.71, 'rooms' => 97, 'score' => 8.4, 'stars' => 4
                ],
                'Elisabeth Old Town' => [
                    'max_people' => 3, 'price' => 53.00, 'rooms' => 42, 'score' => 8.2, 'stars' => 3
                ],
                'Pension Petit' => [
                    'max_people' => 5, 'price' => 47.70, 'rooms' => 80, 'score' => 7.9, 'stars' => 3
                ]
            ],
            'Košice' => [
                'DoubleTree By Hilton Košice' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Hotel Crystal' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'TeleDom Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Nitra' => [
                'BOUTIQUE HOTEL11 rooftop SPA' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Hotel Capital with private wellness' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Hotel Deluxe with free Wellness and Fitness Centrum' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ]
        ],
        'Spagna' => [
            'Barcellona' => [
                'Catalonia Sagrada Familia' => [
                    'max_people' => 5, 'price' => 86.06, 'rooms' => 83, 'score' => 8.2, 'stars' => 3
                ],
                'Hotel Lloret Ramblas' => [
                    'max_people' => 4, 'price' => 63.03, 'rooms' => 68, 'score' => 8.1, 'stars' => 1
                ],
                'Travelodge Barcelona Poblenou' => [
                    'max_people' => 3, 'price' => 58.05, 'rooms' => 89, 'score' => 7.5, 'stars' => 1
                ]
            ],
            'Madrid' => [
                'Ayre Gran Hotel Colón' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Hotel Princesa Plaza Madrid' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Riu Plaza España' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Valencia' => [
                'Casual Vintage Valencia' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Hotel Malcom and Barret' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Venecia Plaza Centro' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ]
        ],
        'Svezia' => [
            'Göteborg' => [
                'First Hotel G' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Hotel Allén - Sure Hotel by Best Western Allen' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Hotell Heden' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Malmö' => [
               'First Hotel Jörgen Kock' => [
                'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
               ],
               'Moment Hotels' => [
                'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
               ],
               'ProfilHotels Hotel Garden' => [
                'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
               ]
            ],
            'Stoccolma' => [
                'Comfort Hotel Xpress Stockholm Central' => [
                    'max_people' => 3, 'price' => 71.00, 'rooms' => 61, 'score' => 7.3, 'stars' => 3
                ],
                'Radisson Blu Royal Viking Hotel, Stockholm' => [
                    'max_people' => 6, 'price' => 127.00, 'rooms' => 100, 'score' => 8.1, 'stars' => 4
                ],
                'Thon Partner Hotel Kungsbron' => [
                    'max_people' => 4, 'price' => 71.00, 'rooms' => 79, 'score' => 7.6, 'stars' => 3
                ]
            ]
        ],
        'Svizzera' => [
            'Ginevra' => [
                'ibis budget Genève Aéroport' => [
                    'max_people' => 7, 'price' => 86.00, 'rooms' => 84, 'score' => 7.9, 'stars' => 1
                ],
                'ibis Genève Centre Nations' => [
                    'max_people' => 5, 'price' => 122.00, 'rooms' => 77, 'score' => 8, 'stars' => 3
                ],
                'Nash Airport Hotel' => [
                    'max_people' => 4, 'price' => 104.00, 'rooms' => 88, 'score' => 8.1, 'stars' => 4
                ]
            ],
            'Lugano' => [
                'Hotel Dischma' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
               'ibis budget Lugano Paradiso' => [
                'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
               ],
               'Lugano Center GuestHouse' => [
                'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
               ]
            ],
            'Zurigo' => [
                'aja Zürich' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'H+ Hotel Zürich' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Motel One Zürich' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ]
        ],
        'Turchia' => [
            'Göreme' => [
                'Cappadocia Caves Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Henna Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Stone House Cave Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Istanbul' => [
                'Florenta Hotel' => [
                    'max_people' => 6, 'price' => 72.67, 'rooms' => 75, 'score' => 8.2, 'stars' => 5
                ],
                'ISG Sabiha Gökçen Airport Hotel' => [
                    'max_people' => 5, 'price' => 81.00, 'rooms' => 85, 'score' => 8.6, 'stars' => 4
                ],
                'Miss Istanbul Hotel & Spa' => [
                    'max_people' => 6, 'price' => 107.10, 'rooms' => 74, 'score' => 8.1, 'stars' => 4
                ]
            ],
            'Smirne' => [
                'Park Inn by Radisson Izmir' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Smart Hotel İzmir' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'TAV Airport Hotel Izmir' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ]
        ],
        'Ungheria' => [
            'Budapest' => [
                'Danubius Hotel Erzsébet City Center' => [
                    'max_people' => 2, 'price' => 72.00, 'rooms' => 103, 'score' => 8.1, 'stars' => 3
                ],
                'Medos Hotel' => [
                    'max_people' => 3, 'price' => 62.29, 'rooms' => 49, 'score' => 8.3, 'stars' => 3
                ],
                'Silver Hotel Budapest City Center' => [
                    'max_people' => 7, 'price' => 50.45, 'rooms' => 72, 'score' => 7.4, 'stars' => 3
                ]
            ],
            'Siófok' => [
                'Hotel La Riva' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Luxury Hotel Siófok' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Residence Hotel Balaton' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ],
            'Vecsés' => [
                'Airport Hotel Budapest' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'Hotel Ferihegy' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ],
                'ibis Styles Budapest Airport' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4
                ]
            ]
        ],
    ];
}
?>