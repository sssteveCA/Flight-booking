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
                    'image' => '/img/flightevents/barcellona_getafe.webp',
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
                    'image' => '/img/flightevents/milan_sassuolo.webp',
                    'location' => 'Stadio San Siro',
                    'price' => 35.00,
                ]
            ],
            'Roma' => [
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
                'Tour Harry Potter' => [
                    'gmLink' => 'https://maps.app.goo.gl/yAmUyT39hNKF7eTZ8',
                    'image' => '/img/flightevents/harry_potter.webp',
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
                    'image' => '/img/flightevents/barcellona_getafe.webp',
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
            ],
            'Siófok' => [
            ],
            'Vecsés' => [
            ]
        ],
    ];
}

?>