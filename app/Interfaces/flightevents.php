<?php

namespace App\Interfaces;

interface FlightEvents{

    const FLIGHTEVENTS_LIST = [
        'Austria' => [
            'Innsbruck' => [
            ],
            'Salisburgo' => [
            ],
            'Vienna' => [
            ]
        ],
        'Belgio' => [
            'Anversa' => [
            ],
            'Bruges' => [
            ],
            'Bruxelles' => [
            ]
        ],
        'Bosnia & Herzegovina' => [
            'Međugorje' => [
            ],
            'Mostar' => [
            ],
            'Sarajevo' => [
            ]
        ],
        'Bulgaria' => [
            'Plovdiv' => [
            ],
            'Sofia' => [
            ],
            'Sunny Beach' => [
            ]
        ],
        'Cipro' => [
            'Ayia Napa' => [
            ],
            'Larnaca' => [
            ],
            'Paphos' => [
            ]
        ],
        'Croazia' => [
            'Poreč' => [
            ],
            'Rovigno' => [
            ],
            'Zagabria' => [
            ]
        ],
        'Danimarca' => [
            'Arhus' => [
            ],
            'Copenaghen' => [
            ],
            'Odense' => [
            ]
        ],
        'Estonia' => [
            'Käsmu' => [
            ],
            'Sagadi' => [
            ],
            'Võsu' => [
            ]
        ],
        'Finlandia' => [
            'Helsinki' => [
            ],
            'Rovaniemi' => [
            ],
            'Vantaa' => [
            ]
        ],
        'Francia' => [
            'Cannes' => [
            ],
            'Nizza' => [
            ],
            'Parigi' => [
                'Gita 1-2 giorni Disneyland Paris' => [
                    'gmLink' => 'https://maps.app.goo.gl/GcGVdLCoqnR3D1us7',
                    'image' => 'barcellona_getafe.webp',
                    'location' => 'Disneyland Paris',
                    'price' => 300.00,
                ]
            ]
        ],
        'Germania' => [
            'Berlino' => [
            ],
            'Francoforte' => [
            ],
            'Monaco di Baviera' => [
            ]
        ],
        'Giordania' => [
            'Amman' => [
            ],
            'Aqaba' => [
            ],
            'Sowayma' => [
            ]
        ],
        'Grecia' => [
            'Atene' => [
            ],
            'Fira' => [
            ],
            'Mykonos Città' => [
            ]
        ],
        'Irlanda' => [
            'Cork' => [
            ],
            'Dublino' => [
            ],
            'Galway' => [
            ]
        ],
        'Israele' => [
            'Eilat' => [
            ],
            'Gerusalemme' => [
            ],
            'Tel Aviv' => [
            ]
        ],
        'Italia' => [
            'Firenze' => [
            ],
            'Milano' => [
                'Milan vs Sassuolo' => [
                    'gmLink' => 'https://maps.app.goo.gl/NvwMZUPEGwYvLF11A',
                    'image' => 'milan_sassuolo.webp',
                    'location' => 'Stadio San Siro',
                    'price' => 35.00,
                ]
            ],
            'Roma' => [
            ],
            'Venezia' => [
                'Tour Murano, Burano, Torcello' => [
                    'gmLink' => 'https://maps.app.goo.gl/VWg3vpKNcw3dMJiMA',
                    'image' => 'murano_burano_torcello.jpg',
                    'location' => 'Murano',
                    'price' => 30.00,
                ]
            ]
        ],
        'Lettonia' => [
            'Kārļi' => [
            ],
            'Kolka' => [
            ],
            'Mežotne' => [
            ]
        ],
        'Lituania' => [
            'Klaipeda' => [
            ],
            'Neringa' => [
            ],
            'Vilnius' => [
            ]
        ],
        'Lussemburgo' => [
            'Lussemburgo' => [
            ]
        ],
        'Malta' => [
            'San Pawl il-Baħar' => [
            ],
            'Sliema' => [
            ],
            'St Julian\' s' => [
            ]
        ],
        'Marocco' => [
            'Casablanca' => [
            ],
            'Fes' => [
            ],
            'Marrakech' => [
            ]
        ],
        'Montenegro' => [
            'Budua' => [
            ],
            'Kotor' => [
            ],
            'Podgorica' => [
            ]
        ],
        'Norvegia' => [
            'Bergen' => [
            ],
            'Oslo' => [
            ],
            'Tromsø' => [
            ]
        ],
        'Olanda' => [
            'Amstelveen' => [
            ],
            'Amsterdam' => [
            ],
            'Badhoevedorp' => [
            ]
        ],
        'Polonia' => [
            'Breslavia' => [
            ],
            'Cracovia' => [
            ],
            'Varsavia' => [
            ]
        ],
        'Portogallo' => [
            'Coimbra' => [
            ],
            'Lisbona' => [
            ],
            'Porto' => [
            ]
        ],
        'Regno Unito' => [
            'Edimburgo' => [
            ],
            'Londra' => [
                'Disney\'s the Lion King' => [
                    'gmLink' => 'https://maps.app.goo.gl/7Ht5ia19pNDiFYxJ9',
                    'image' => 'disney_the_lion_king.png',
                    'location' => 'Lyceum Theatre',
                    'price' => 55.00,
                ],
                'London Pass' => [
                    'gmLink' => 'https://maps.app.goo.gl/anA8ksRDcTd3brv67',
                    'image' => 'london_pass.jpg',
                    'location' => 'Londra',
                    'price' => 101.19
                ],
                'Tour Harry Potter' => [
                    'gmLink' => 'https://maps.app.goo.gl/yAmUyT39hNKF7eTZ8',
                    'image' => 'harry_potter.webp',
                    'location' => 'Warner Bros. Studio Tour London',
                    'price' => 75.00,
                ]
            ],
            'Manchester' => [
            ]
        ],
        'Repubblica Ceca' => [
            'Brno' => [
            ],
            'Cesky Krumlov' => [
            ],
            'Praga' => [
            ]
        ],
        'Romania' => [
            'Braşov' => [
            ],
            'Bucarest' => [
            ],
            'Timişoara' => [
            ]
        ],
        'Serbia' => [
            'Belgrado' => [
            ],
            'Niš' => [
            ],
            'Novi Sad' => [
            ]
        ],
        'Slovacchia' => [
            'Bratislava' => [
            ],
            'Košice' => [
            ],
            'Nitra' => [
            ]
        ],
        'Spagna' => [
            'Barcellona' => [
                'Barcellona vs Getafe' => [
                    'gmLink' => 'https://maps.app.goo.gl/GcGVdLCoqnR3D1us7',
                    'image' => 'barcellona_getafe.webp',
                    'location' => 'Camp Nou',
                    'price' => 50.00,
                ]
            ],
            'Madrid' => [
            ],
            'Valencia' => [
            ]
        ],
        'Svezia' => [
            'Göteborg' => [
            ],
            'Malmö' => [
            ],
            'Stoccolma' => [
            ]
        ],
        'Svizzera' => [
            'Ginevra' => [
            ],
            'Lugano' => [
            ],
            'Zurigo' => [
            ]
        ],
        'Turchia' => [
            'Göreme' => [
            ],
            'Istanbul' => [
            ],
            'Smirne' => [
            ]
        ],
        'Ungheria' => [
            'Budapest' => [
                'Crociera sul Danubio' => [
                    'gmLink' => 'https://maps.app.goo.gl/ydijdUdziv6kTq9u6',
                    'image' => 'crociera_danubio.jpg',
                    'location' => 'Budapest',
                    'price' => 21.00,
                ]
            ],
            'Siófok' => [
            ],
            'Vecsés' => [
            ]
        ],
    ];
}

?>