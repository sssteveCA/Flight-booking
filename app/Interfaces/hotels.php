<?php

namespace App\Interfaces;

interface Hotels{
    const HOTELS_LIST = [
        'Austria' => [
            'Innsbruck' => [
                'Hotel Central' => [
                   'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 5
                ],
                'Hotel Goldene Krone Innsbruck' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Hotel Tautermann' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Salisburgo' => [
                'Altstadt Hotel Hofwirt Salzburg' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'H+ Hotel Salzburg' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'MEININGER Hotel Salzburg City Center' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Vienna' => [
                'Hotel IMLAUER Wien' => [
                    'max_people' => 5, 'price' => 163.51, 'rooms' => 91, 'score' => 8.6, 'stars' => 5, 'images' => 0
                ],
                'Ibis budget Wien Sankt Marx' => [
                    'max_people' => 4, 'price' => 46.80, 'rooms' => 68, 'score' => 7.5, 'stars' => 2, 'images' => 0
                ],
                'MEININGER Hotel Wien Downtown Franz' => [
                    'max_people' => 3, 'price' => 15.95, 'rooms' => 59, 'score' => 8.2, 'stars' => 3, 'images' => 0
                ],
            ]
        ],
        'Belgio' => [
            'Anversa' => [
                'A-STAY Antwerp' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 4
                ],
                'ibis budget Antwerpen Centraal Station' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Tryp By Wyndham Antwerp' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Bruges' => [
                'Hotel Ter Brughe' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'ibis budget Brugge Centrum Station' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Martin\'s Brugge' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Bruxelles' => [
                'Bedford Hotel & Congress Centre' => [
                    'max_people' => 3, 'price' => 78.17, 'rooms' => 84, 'score' => 7.9, 'stars' => 3, 'images' => 0
                ],
                'Marivaux Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Motel One Brussels' => [
                    'max_people' => 4, 'price' => 103.24, 'rooms' => 70, 'score' => 8.7, 'stars' => 3, 'images' => 0
                ]
            ]
        ],
        'Bosnia & Herzegovina' => [
            'Međugorje' => [
                'Hotel Barbaric' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 6
                ],
                'Hotel Luna' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Hotel Matal' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Mostar' => [
                'Hotel Bristol' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Hotel Mostar' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Hotel-Restaurant Kriva Ćuprija' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Sarajevo' => [
                'Heritage Hotel Gate of Sarajevo' => [
                    'max_people' => 3, 'price' => 56.82, 'rooms' => 78, 'score' => 8.7, 'stars' => 4, 'images' => 0
                ],
                'Hotel Boutique Libris' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 62, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'İsa Begov Hamam Hotel' => [
                    'max_people' => 3, 'price' => 54.00, 'rooms' => 55, 'score' => 8.9, 'stars' => 4, 'images' => 0
                ]
            ]
        ],
        'Bulgaria' => [
            'Plovdiv' => [
                'Grand Hotel Plovdiv' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 8
                ],
                'Hotel BLVD' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Hotel Leipzig' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Sofia' => [
                'Best Western Plus Bristol Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Central Point Boutique Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Light Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Sunny Beach' => [
                'Best Western PLUS Premium Inn' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Galeon Residence & SPA' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Planeta Hotel & Aquapark - Ultra All Inclusive' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ]
        ],
        'Cipro' => [
            'Ayia Napa' => [
                'Anonymous Beach Hotel (Adults 16+)' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 4
                ],
                'Cosmo Napa Boutique Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Nissiana Hotel & Bungalows' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Larnaca' => [
                'Best Western Plus Larco Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Frangiorgio Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'San Remo Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Paphos' => [
                'Amphora Hotel & Suites' => [
                    'max_people' => 5, 'price' => 70.00, 'rooms' => 89, 'score' => 8.5, 'stars' => 4, 'images' => 0
                ],
                'Capital Coast Resort And Spa' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 76, 'score' => 7.8, 'stars' => 4, 'images' => 0
                ],
                'Roman Boutique Hotel' => [
                    'max_people' => 3, 'price' => 50.00, 'rooms' => 94, 'score' => 8.2, 'stars' => 3, 'images' => 0
                ]
            ]
        ],
        'Croazia' => [
            'Poreč' => [
                'Hotel Molindrio Plava Laguna' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 3
                ],
                'Hotel Parentium Plava Laguna' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Hotel Plavi Plava Laguna' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Rovigno' => [
                'Eden Hotel by Maistra Collection' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Family Hotel Amarin by Maistra Select' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Lone Hotel by Maistra Collection' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Zagabria' => [
                'Art Hotel Like' => [
                    'max_people' => 2, 'price' => 63.60, 'rooms' => 52, 'score' => 7.9, 'stars' => 3, 'images' => 0
                ],
                'Best Western Premier Hotel Astoria' => [
                    'max_people' => 2, 'price' => 96.60, 'rooms' => 69, 'score' => 8.8, 'stars' => 4, 'images' => 0
                ],
                'Timeout Heritage Hotel Zagreb' => [
                    'max_people' => 4, 'price' => 52.10, 'rooms' => 72, 'score' => 7.7, 'stars' => 4, 'images' => 0
                ]
            ]
        ],
        'Danimarca' => [
            'Arhus' => [
                'Cabinn Aarhus' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 3
                ],
                'Hotel Atlantic' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Wakeup - Aarhus' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Copenaghen' => [
                'Cabinn Copenhagen' => [
                    'max_people' => 6, 'price' => 78, 'rooms' => 93, 'score' => 6.8, 'stars' => 2, 'images' => 0
                ],
                'Wakeup Copenhagen - Bernstorffsgade' => [
                    'max_people' => 4, 'price' => 66.00, 'rooms' => 96, 'score' => 7.8, 'stars' => 2, 'images' => 0
                ],
                'Wakeup Copenhagen - Borgergade' => [
                    'max_people' => 3, 'price' => 71.00, 'rooms' => 83, 'score' => 8, 'stars' => 2, 'images' => 0
                ]
            ],
            'Odense' => [
                'Cabinn Odense' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'City Hotel Nattergalen' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Hotel Odense' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ]
        ],
        'Estonia' => [
            'Käsmu' => [
                'Käsmu Holiday House' => [
                    'max_people' => 3, 'price' => 70.00, 'rooms' => 54, 'score' => 9.3, 'stars' => 3, 'images' => 5
                ],
                'Lainela Holiday Park' => [
                    'max_people' => 4, 'price' => 84.00, 'rooms' => 47, 'score' => 8.5, 'stars' => 2, 'images' => 0
                ],
                'Merekalda Apartments - Adults only' => [
                    'max_people' => 4, 'price' => 75.00, 'rooms' => 73, 'score' => 7.6, 'stars' => 3, 'images' => 0
                ]
            ],
            'Sagadi' => [
                'Haaviku Nature Lodge' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Sagadi Manor Hostel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Sagadi Manor Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Võsu' => [
                'Cozy villa in Võsu' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Guest House Rannaliiv' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Mere 38 Apartments' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ]
        ],
        'Finlandia' => [
            'Helsinki' => [
                'Hotel Arthur' => [
                    'max_people' => 5, 'price' => 80.00, 'rooms' => 88, 'score' => 7.6, 'stars' => 3, 'images' => 6
                ],
                'Hotel Finn' => [
                    'max_people' => 4, 'price' => 76.00, 'rooms' => 79, 'score' => 8.2, 'stars' => 3, 'images' => 0
                ],
                'Omena Hotel Helsinki Lönnrotinkatu' => [
                    'max_people' => 3, 'price' => 61.56, 'rooms' => 70, 'score' => 7.5, 'stars' => 3, 'images' => 0
                ]
            ],
            'Rovaniemi' => [
                'Arctic City Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Santa Claus Holiday Village' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Scandic Rovaniemi City' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Vantaa' => [
                'Hilton Helsinki Airport' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Holiday Inn Helsinki-Vantaa Airport, an IHG Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Scandic Helsinki Airport' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ]
        ],
        'Francia' => [
            'Cannes' => [
                'B&B HOTEL Cannes La Bocca Plage' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 4
                ],
                'Hotel Abrial' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'L\'Esterel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Nizza' => [
                'Best Western Plus Hôtel Massena Nice' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Hôtel Byakko Nice' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ] ,
                'Premiere Classe Nice - Promenade des Anglais' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Parigi' => [
                'B&B HOTEL Paris 17 Batignolles' => [
                    'max_people' => 4, 'price' => 107.71, 'rooms' => 81, 'score' => 7.9, 'stars' => 3, 'images' => 0
                ],
                'hotelF1 Paris Porte de Châtillon' => [
                    'max_people' => 2, 'price' => 39.58, 'rooms' => 49, 'score' => 7.1, 'stars' => 2, 'images' => 0
                ],
                'HotelF1 Paris Saint Ouen Marché Aux Puces Rénové' => [
                    'max_people' => 2, 'price' => 42.97, 'rooms' => 54, 'score' => 6.2, 'stars' => 2, 'images' => 0
                ]
            ]
        ],
        'Germania' => [
            'Berlino' => [
                'H2 Hotel Berlin-Alexanderplatz' => [
                    'max_people' => 4, 'price' => 96.25, 'rooms' => 75, 'score' => 8.3, 'stars' => 3, 'images' => 6
                ],
                'MEININGER Hotel Berlin Hauptbahnhof' => [
                    'max_people' => 2, 'price' => 14.85, 'rooms' => 45, 'score' => 7.4, 'stars' => 3, 'images' => 0
                ],
                'Schulz Hotel Berlin Wall at the East Side Gallery' => [
                    'max_people' => 5, 'price' => 60.17, 'rooms' => 64, 'score' => 8.5, 'stars' => 3, 'images' => 0
                ]
            ],
            'Francoforte' => [
                'a&o Frankfurt Galluswarte' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Leonardo Royal Hotel Frankfurt' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Park Inn by Radisson Frankfurt Airport' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Monaco di Baviera' => [
                'Bento Inn Munich' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0      
                ],
                'H2 Hotel München Olympiapark' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0      
                ],
                'Leonardo Hotel & Residenz Muenchen' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0      
                ]
            ]
        ],
        'Giordania' => [
            'Amman' => [
                'Layaali Amman Hotel' => [
                    'max_people' => 3, 'price' => 50.00, 'rooms' => 75, 'score' => 8.3, 'stars' => 1, 'images' => 3     
                ],
                'New MerryLand Hotel' => [
                    'max_people' => 3, 'price' => 62.00, 'rooms' => 56, 'score' => 8.7, 'stars' => 3, 'images' => 0    
                ],
                'Zaman Ya Zaman Boutique Hotel' => [
                    'max_people' => 4, 'price' => 20.00, 'rooms' => 58, 'score' => 8.2, 'stars' => 2, 'images' => 0    
                ]
            ],
            'Aqaba' => [
                'Lacosta Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Marina Plaza Hotel Tala Bay' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'TAJ Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Sowayma' => [
                'Dead Sea Spa Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0 
                ],
                'Ramada Resort Dead Sea' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0 
                ],
                'Russian Pilgrim Residence' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ]
        ],
        'Grecia' => [
            'Atene' => [
                'Hotel Cosmos' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 5
                ],
                'President Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Titania Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Fira' => [
                'Galatia Villas' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Hotel Hellas' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Porto Castello' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Mykonos Città' => [
                'Matogianni Hotel' => [
                    'max_people' => 2, 'price' => 50.50, 'rooms' => 65, 'score' => 8.6, 'stars' => 2, 'images' => 0
                ],
                'Mykonos Bay Resort & Villas' => [
                    'max_people' => 6, 'price' => 90.00, 'rooms' => 93, 'score' => 9.4, 'stars' => 4, 'images' => 0
                ],
                'Sofia Village' => [
                    'max_people' => 5, 'price' => 60.90, 'rooms' => 87, 'score' => 8.2, 'stars' => 3, 'images' => 0
                ]
            ]
        ],
        'Irlanda' => [
            'Cork' => [
                'Jurys Inn Cork' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 7
                ],
                'Maldron Hotel South Mall Cork City' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Rochestown Park Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Dublino' => [
                'Academy Plaza Hotel' => [
                    'max_people' => 6, 'price' => 118.15, 'rooms' => 104, 'score' => 8.1, 'stars' => 3, 'images' => 0
                ],
                'Beresford Hotel' => [
                    'max_people' => 5, 'price' => 116.10, 'rooms' => 92, 'score' => 7.3, 'stars' => 3, 'images' => 0
                ],
                'Riu Plaza The Gresham Dublin' => [
                    'max_people' => 4, 'price' => 105.00, 'rooms' => 99, 'score' => 7.7, 'stars' => 3, 'images' => 0
                ]
            ],
            'Galway' => [
                'Flannery\'s Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Imperial Hotel Galway' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Nox Hotel Galway' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ]
        ],
        'Israele' => [
            'Eilat' => [
                'Club In Eilat - Coral Beach Villa Resort' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 4
                ],
                'Dan Panorama Eilat' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Rich Luxury Suites' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Gerusalemme' => [
                'Agripas Boutique Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'De Cardo Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'National Hotel - Jerusalem' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Tel Aviv' => [
                'BY14 TLV Hotel' => [
                    'max_people' => 7, 'price' => 208.00, 'rooms' => 63, 'score' => 8.5, 'stars' => 5, 'images' => 0
                ],
                'Idelson Hotel' => [
                    'max_people' => 3, 'price' => 82.00, 'rooms' => 46, 'score' => 6.7, 'stars' => 3, 'images' => 0
                ],
                'Old Jaffa House - Boutique Hotel' => [
                    'max_people' => 4, 'price' => 97.00, 'rooms' => 71, 'score' => 7.8, 'stars' => 3, 'images' => 0
                ]
            ]
        ],
        'Italia' => [
            'Firenze' => [
                'Hotel Bodoni' => [
                    'max_people' => 3, 'price' => 50.00, 'rooms' => 64, 'score' => 7.3, 'stars' => 3, 'images' => 9
                ],
                'Hotel Delle Nazioni' => [
                    'max_people' => 3, 'price' => 50.00, 'rooms' => 64, 'score' => 7.3, 'stars' => 3, 'images' => 0
                ],
                'Nilhotel' => [
                    'max_people' => 3, 'price' => 50.00, 'rooms' => 64, 'score' => 7.3, 'stars' => 3, 'images' => 0
                ]
            ],
            'Milano' => [
                'Canova Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Ibis Milano Centro' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Idea Hotel Milano San Siro' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Roma' => [
                'Barceló Aran Mantegna' => [
                    'max_people' => 6, 'price' => 82.30, 'rooms' => 101, 'score' => 7.9, 'stars' => 4, 'images' => 0
                ],
                'Hotel American Palace Eur' => [
                    'max_people' => 5, 'price' => 76.00, 'rooms' => 76, 'score' => 8.4, 'stars' => 4, 'images' => 0
                ],
                'Hotel Cristoforo Colombo' => [
                    'max_people' => 4, 'price' => 79.00, 'rooms' => 80, 'score' => 8.2, 'stars' => 4, 'images' => 0
                ]
            ]
        ],
        'Lettonia' => [
            'Kārļi' => [
                'Guest House Kalniņi' => [
                    'max_people' => 4, 'price' => 100.00, 'rooms' => 53, 'score' => 9.8, 'stars' => 4, 'images' => 3
                ],
                'Hotel Melturi' => [
                    'max_people' => 3, 'price' => 45.00, 'rooms' => 50, 'score' => 9.1, 'stars' => 2, 'images' => 0
                ],
                'Karlamuiza Country Hotel' => [
                    'max_people' => 3, 'price' => 63.28, 'rooms' => 47, 'score' => 9.2, 'stars' => 3, 'images' => 0
                ]
            ],
            'Kolka' => [
                'Coastal Home Muini Ūši' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Guest House Vītoli' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Holiday Home Kolka' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Mežotne' => [
                'Baltā māja' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Mazmežotnes muiža' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Rundale Solstice Apartment' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ]
        ],
        'Lituania' => [
            'Klaipeda' => [
                'Amberton Green Apartments Palanga' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 5
                ],
                'Dangė Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Resort Hotel Elija' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Neringa' => [
                'Hotel Jurate' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Nidos Banga' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'SPA Nida' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Vilnius' => [
                'CALVARY Hotel & Restaurant Vilnius' => [
                    'max_people' => 4, 'price' => 71.90, 'rooms' => 75, 'score' => 9.2, 'stars' => 4, 'images' => 0
                ],
                'Hilton Garden Inn Vilnius City Centre' => [
                    'max_people' => 4, 'price' => 69.00, 'rooms' => 86, 'score' => 8.1, 'stars' => 3, 'images' => 0
                ],
                'Park Inn by Radisson Vilnius Airport Hotel & Business Centre' => [
                    'max_people' => 3, 'price' => 72.10, 'rooms' => 77, 'score' => 9.2, 'stars' => 4, 'images' => 0
                ]
            ]
        ],
        'Lussemburgo' => [
            'Lussemburgo' => [
                'ibis Luxembourg Aeroport' => [
                    'max_people' => 3, 'price' => 72.00, 'rooms' => 66, 'score' => 7.8, 'stars' => 3, 'images' => 6
                ],
                'Mandarina Hotel Luxembourg Airport' => [
                    'max_people' => 5, 'price' => 79.00, 'rooms' => 74, 'score' => 7.4, 'stars' => 3, 'images' => 0
                ],
                'Novotel Luxembourg Centre' => [
                    'max_people' => 6, 'price' => 179.00, 'rooms' => 90, 'score' => 8.3, 'stars' => 4, 'images' => 0
                ]
            ]
        ],
        'Malta' => [
            'San Pawl il-Baħar' => [
                'Dolmen Hotel Malta' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 8
                ],
                'Euroclub Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Porto Azzurro Aparthotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Sliema' => [
                'Europa Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Plaza Regency Hotels' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Sliema Marina Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'St Julian\' s' => [
                'Alexandra Hotel' => [
                    'max_people' => 4, 'price' => 41.00, 'rooms' => 83, 'score' => 7.1, 'stars' => 3, 'images' => 0
                ],
                'be.HOTEL' => [
                    'max_people' => 4, 'price' => 46.00, 'rooms' => 94, 'score' => 8.7, 'stars' => 4, 'images' => 0
                ],
                'Golden Tulip Vivaldi Hotel' => [
                    'max_people' => 5, 'price' => 40.50, 'rooms' => 65, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ]
        ],
        'Marocco' => [
            'Casablanca' => [
                'Hotel Majestic' => [
                    'max_people' => 3, 'price' => 42.50, 'rooms' => 55, 'score' => 7.3, 'stars' => 4, 'images' => 4
                ],
                'ODYSSEE Boutique Hotel Casablanca' => [
                    'max_people' => 5, 'price' => 83.00, 'rooms' => 82, 'score' => 8.1, 'stars' => 4, 'images' => 0
                ],
                'ONOMO Airport Casablanca' => [
                    'max_people' => 2, 'price' => 71.00, 'rooms' => 48, 'score' => 7.8, 'stars' => 3, 'images' => 0
                ]
            ],
            'Fes' => [
                'Fes Marriott Hotel Jnan Palace' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Hôtel Volubilis' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Ibis Budget Fès' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Marrakech' => [
                'Hotel Almas' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Hôtel Racine' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Imperial Holiday Hôtel & spa' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ]
        ],
        'Montenegro' => [
            'Budua' => [
                'Hotel Ponta Nova' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 5
                ],
                'Iberostar Bellevue - All Inclusive' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Splendid Conference & Spa Resort' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Kotor' => [
                'Boutique Hotel Hippocampus' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Hotel Marija' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Hotel Rendez Vous' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Podgorica' => [
                'Boscovich Boutique Hotel' => [
                    'max_people' => 5, 'price' => 81.00, 'rooms' => 94, 'score' => 9.5, 'stars' => 4, 'images' => 0
                ],
                'Hotel Crnogorska Kuća' => [
                    'max_people' => 4, 'price' => 30.65, 'rooms' => 60, 'score' => 8.7, 'stars' => 4, 'images' => 0
                ],
                'Hotel Kerber' => [
                    'max_people' => 4, 'price' => 39.74, 'rooms' => 70, 'score' => 8.1, 'stars' => 3, 'images' => 0
                ]
            ]
        ],
        'Norvegia' => [
            'Bergen' => [
                'Citybox Bergen City' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Citybox Bergen Danmarksplass' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Radisson Blu Royal Hotel, Bergen' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Oslo' => [
                'Anker Hotel' => [
                    'max_people' => 6, 'price' => 105.00, 'rooms' => 89, 'score' => 7.8, 'stars' => 3, 'images' => 0
                ],
                'Citybox Oslo' => [
                    'max_people' => 2, 'price' => 77.00, 'rooms' => 44, 'score' => 8.2, 'stars' => 3, 'images' => 0
                ],
                'Smarthotel Oslo' => [
                    'max_people' => 5, 'price' => 89.00, 'rooms' => 80, 'score' => 7.7, 'stars' => 3, 'images' => 0
                ]
            ],
            'Tromsø' => [
                'Comfort Hotel Xpress Tromsø' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Radisson Blu Hotel Tromsø' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Smarthotel Tromsø' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ]
        ],
        'Olanda' => [
            'Amstelveen' => [
                'Amsterdam Forest Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'ibis budget Amsterdam City South' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Radisson Hotel & Suites Amsterdam South' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Amsterdam' => [
                'Hotel Ben Centre' => [
                    'max_people' => 4, 'price' => 91.14, 'rooms' => 73, 'score' => 6.2, 'stars' => 1, 'images' => 0
                ],
                'XO Hotels Blue Tower' => [
                    'max_people' => 2, 'price' => 89.43, 'rooms' => 51, 'score' => 7.9, 'stars' => 4, 'images' => 0
                ],
                'XO Hotels Park West' => [
                    'max_people' => 3, 'price' => 91.07, 'rooms' => 58, 'score' => 8.5, 'stars' => 4, 'images' => 0
                ]
            ],
            'Badhoevedorp' => [
                'ibis budget Amsterdam Airport' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Ibis Schiphol Amsterdam Airport' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Ramada by Wyndham Amsterdam Airport Schiphol' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ]
        ],
        'Polonia' => [
            'Breslavia' => [
                'B&B Hotel Wrocław Centrum' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'PURO Wrocław Stare Miasto' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Wyndham Wroclaw Old Town' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Cracovia' => [
                'Hilton Garden Inn Krakow Airport' => [
                    'max_people' => 4, 'price' => 126.00, 'rooms' => 93, 'score' => 8.9, 'stars' => 4, 'images' => 0
                ],
                'Hotel Alexander' => [
                    'max_people' => 3, 'price' => 42.00, 'rooms' => 68, 'score' => 8.3, 'stars' => 3, 'images' => 0
                ],
                'ibis budget Krakow Stare Miasto' => [
                    'max_people' => 6, 'price' => 38.00, 'rooms' => 62, 'score' => 7.9, 'stars' => 1, 'images' => 0
                ]
            ],
            'Varsavia' => [
                'Hotel Metropol' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Novotel Warszawa Centrum' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Radisson Blu Sobieski' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ]
        ],
        'Portogallo' => [
            'Coimbra' => [
                'Hotel Ibis Coimbra Centro' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Hotel Oslo' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Stay Hotel Coimbra Centro' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Lisbona' => [
                'America Diamonds Hotel & Sushi Bar' => [
                    'max_people' => 3, 'price' => 113.00, 'rooms' => 96, 'score' => 8.5, 'stars' => 3, 'images' => 0
                ],
                'Empire Lisbon Hotel' => [
                    'max_people' => 5, 'price' => 112.00, 'rooms' => 88, 'score' => 8.6, 'stars' => 3, 'images' => 0
                ],
                'Star inn Lisbon Airport' => [
                    'max_people' => 4, 'price' => 109.10, 'rooms' => 102, 'score' => 8.6, 'stars' => 3, 'images' => 0
                ]
            ],
            'Porto' => [
                'Hotel Carris Porto Ribeira' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Pao de Acucar Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Zero Box Lodge Porto' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ]
        ],
        'Regno Unito' => [
            'Edimburgo' => [
               'Cityroomz Edinburgh' => [
                'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
               ],
               'ibis budget Hotel Edinburgh Park' => [
                'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
               ],
               'YOTEL Edinburgh' => [
                'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
               ]
            ],
            'Londra' => [
                'Britannia International Hotel Canary Wharf' => [
                    'max_people' => 5, 'price' => 79.00, 'rooms' => 95, 'score' => 5.9, 'stars' => 4, 'images' => 0
                ],
                'Central Park Hotel' => [
                    'max_people' => 4, 'price' => 110.00, 'rooms' => 91, 'score' => 6.6, 'stars' => 3, 'images' => 0
                ],
                'Zedwell Piccadilly Circus' => [
                    'max_people' => 2, 'price' => 114.00, 'rooms' => 64, 'score' => 7.6, 'stars' => 2, 'images' => 0
                ]
            ],
            'Manchester' => [
                'Britannia Hotel City Centre Manchester' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Motel One Manchester-Piccadilly' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Sachas Hotel Manchester' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ]
        ],
        'Repubblica Ceca' => [
            'Brno' => [
                'Cosmopolitan Bobycentrum - Czech Leading Hotels' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Hotel Europa' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'OREA Congress Hotel Brno' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Cesky Krumlov' => [
                'Gold' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Hotel Grand' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Vltavská pohádka' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Praga' => [
                'Don Giovanni Hotel Prague - Great Hotels of The World' => [
                    'max_people' => 5, 'price' => 47.00, 'rooms' => 87, 'score' => 9, 'stars' => 4, 'images' => 0
                ],
                'Grandior Hotel Prague' => [
                    'max_people' => 7, 'price' => 77.10, 'rooms' => 105, 'score' => 8.8, 'stars' => 5, 'images' => 0
                ],
                'Grandium Hotel Prague' => [
                    'max_people' => 6, 'price' => 82.10, 'rooms' => 108, 'score' => 8, 'stars' => 5, 'images' => 0
                ]
            ]
        ],
        'Romania' => [
            'Braşov' => [
                'Drachenhaus' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Hotel Aro Palace' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Safrano Palace' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Bucarest' => [
                'Capitol Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Hotel Duke Armeneasca - Ex Tempo' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Moxy Bucharest Old Town' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Timişoara' => [
                'Hotel Central' => [
                    'max_people' => 4, 'price' => 77.00, 'rooms' => 84, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Hotel Continental' => [
                    'max_people' => 3, 'price' => 61.00, 'rooms' => 92, 'score' => 8.1, 'stars' => 4, 'images' => 0
                ],
                'Hotel Imperial Premium' => [
                    'max_people' => 3, 'price' => 39.00, 'rooms' => 72, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ]
        ],
        'Serbia' => [
            'Belgrado' => [
                'Airport Hotel Garni' => [
                    'max_people' => 3, 'price' => 49.36, 'rooms' => 55, 'score' => 8.6, 'stars' => 3, 'images' => 0
                ],
                'Belgrade Inn Garni Hotel' => [
                    'max_people' => 5, 'price' => 64.35, 'rooms' => 87, 'score' => 8.8, 'stars' => 4, 'images' => 0
                ],
                'Hotel Moskva' => [
                    'max_people' => 4, 'price' => 105.40, 'rooms' => 92, 'score' => 9, 'stars' => 4, 'images' => 0
                ]
            ],
            'Niš' => [
                'Ambasador Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Hotel Crystal Light' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'New City Hotel & Restaurant Niš' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Novi Sad' => [
                'GARNI HOTEL AMI' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Garni Hotel Centar' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Hotel Park' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ]
        ],
        'Slovacchia' => [
            'Bratislava' => [
                'Apollo Hotel Bratislava' => [
                    'max_people' => 3, 'price' => 78.71, 'rooms' => 97, 'score' => 8.4, 'stars' => 4, 'images' => 0
                ],
                'Elisabeth Old Town' => [
                    'max_people' => 3, 'price' => 53.00, 'rooms' => 42, 'score' => 8.2, 'stars' => 3, 'images' => 0
                ],
                'Pension Petit' => [
                    'max_people' => 5, 'price' => 47.70, 'rooms' => 80, 'score' => 7.9, 'stars' => 3, 'images' => 0
                ]
            ],
            'Košice' => [
                'DoubleTree By Hilton Košice' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Hotel Crystal' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'TeleDom Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Nitra' => [
                'BOUTIQUE HOTEL11 rooftop SPA' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Hotel Capital with private wellness' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Hotel Deluxe with free Wellness and Fitness Centrum' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ]
        ],
        'Spagna' => [
            'Barcellona' => [
                'Catalonia Sagrada Familia' => [
                    'max_people' => 5, 'price' => 86.06, 'rooms' => 83, 'score' => 8.2, 'stars' => 3, 'images' => 0
                ],
                'Hotel Lloret Ramblas' => [
                    'max_people' => 4, 'price' => 63.03, 'rooms' => 68, 'score' => 8.1, 'stars' => 1, 'images' => 0
                ],
                'Travelodge Barcelona Poblenou' => [
                    'max_people' => 3, 'price' => 58.05, 'rooms' => 89, 'score' => 7.5, 'stars' => 1, 'images' => 0
                ]
            ],
            'Madrid' => [
                'Ayre Gran Hotel Colón' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Hotel Princesa Plaza Madrid' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Riu Plaza España' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Valencia' => [
                'Casual Vintage Valencia' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Hotel Malcom and Barret' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Venecia Plaza Centro' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ]
        ],
        'Svezia' => [
            'Göteborg' => [
                'First Hotel G' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Hotel Allén - Sure Hotel by Best Western Allen' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Hotell Heden' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Malmö' => [
               'First Hotel Jörgen Kock' => [
                'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
               ],
               'Moment Hotels' => [
                'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
               ],
               'ProfilHotels Hotel Garden' => [
                'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
               ]
            ],
            'Stoccolma' => [
                'Comfort Hotel Xpress Stockholm Central' => [
                    'max_people' => 3, 'price' => 71.00, 'rooms' => 61, 'score' => 7.3, 'stars' => 3, 'images' => 0
                ],
                'Radisson Blu Royal Viking Hotel, Stockholm' => [
                    'max_people' => 6, 'price' => 127.00, 'rooms' => 100, 'score' => 8.1, 'stars' => 4, 'images' => 0
                ],
                'Thon Partner Hotel Kungsbron' => [
                    'max_people' => 4, 'price' => 71.00, 'rooms' => 79, 'score' => 7.6, 'stars' => 3, 'images' => 0
                ]
            ]
        ],
        'Svizzera' => [
            'Ginevra' => [
                'ibis budget Genève Aéroport' => [
                    'max_people' => 7, 'price' => 86.00, 'rooms' => 84, 'score' => 7.9, 'stars' => 1, 'images' => 0
                ],
                'ibis Genève Centre Nations' => [
                    'max_people' => 5, 'price' => 122.00, 'rooms' => 77, 'score' => 8, 'stars' => 3, 'images' => 0
                ],
                'Nash Airport Hotel' => [
                    'max_people' => 4, 'price' => 104.00, 'rooms' => 88, 'score' => 8.1, 'stars' => 4, 'images' => 0
                ]
            ],
            'Lugano' => [
                'Hotel Dischma' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
               'ibis budget Lugano Paradiso' => [
                'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
               ],
               'Lugano Center GuestHouse' => [
                'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
               ]
            ],
            'Zurigo' => [
                'aja Zürich' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'H+ Hotel Zürich' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Motel One Zürich' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ]
        ],
        'Turchia' => [
            'Göreme' => [
                'Cappadocia Caves Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Henna Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Stone House Cave Hotel' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Istanbul' => [
                'Florenta Hotel' => [
                    'max_people' => 6, 'price' => 72.67, 'rooms' => 75, 'score' => 8.2, 'stars' => 5, 'images' => 0
                ],
                'ISG Sabiha Gökçen Airport Hotel' => [
                    'max_people' => 5, 'price' => 81.00, 'rooms' => 85, 'score' => 8.6, 'stars' => 4, 'images' => 0
                ],
                'Miss Istanbul Hotel & Spa' => [
                    'max_people' => 6, 'price' => 107.10, 'rooms' => 74, 'score' => 8.1, 'stars' => 4, 'images' => 0
                ]
            ],
            'Smirne' => [
                'Park Inn by Radisson Izmir' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Smart Hotel İzmir' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'TAV Airport Hotel Izmir' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ]
        ],
        'Ungheria' => [
            'Budapest' => [
                'Danubius Hotel Erzsébet City Center' => [
                    'max_people' => 2, 'price' => 72.00, 'rooms' => 103, 'score' => 8.1, 'stars' => 3, 'images' => 0
                ],
                'Medos Hotel' => [
                    'max_people' => 3, 'price' => 62.29, 'rooms' => 49, 'score' => 8.3, 'stars' => 3, 'images' => 0
                ],
                'Silver Hotel Budapest City Center' => [
                    'max_people' => 7, 'price' => 50.45, 'rooms' => 72, 'score' => 7.4, 'stars' => 3, 'images' => 0
                ]
            ],
            'Siófok' => [
                'Hotel La Riva' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Luxury Hotel Siófok' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Residence Hotel Balaton' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ],
            'Vecsés' => [
                'Airport Hotel Budapest' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'Hotel Ferihegy' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ],
                'ibis Styles Budapest Airport' => [
                    'max_people' => 4, 'price' => 60.00, 'rooms' => 75, 'score' => 8, 'stars' => 4, 'images' => 0
                ]
            ]
        ],
    ];
}
?>