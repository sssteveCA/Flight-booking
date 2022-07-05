<?php

namespace App\Interfaces;

interface Airports{
    const AIRPORT_LIST = [
        'Austria' => [
            'Klaugefurt',
            'Salisburgo',
            'Vienna'
        ],
        'Belgio' => [
            'Brussels Zaventem',
            'Bruxelles (Charleroi)',
        ],
        'Bosnia & Herzegovina' => [
            'Banja Luka',
            'Tuzia'
        ],
        'Bulgaria' => [
            'Burgas',
            'Plovdiv',
            'Sofia',
            'Varna'
        ],
        'Cipro' => [
            'Larnaca',
            'Pafos'
        ],
        'Croazia' => [
            'Dubrovnik',
            'Fiume',
            'Pola',
            'Split',
            'Zagreb',
            'Zara'
        ],
        'Danimarca' => [
            'Aalborg',
            'Aarhus',
            'Billund',
            'Copenaghen'
        ],
        'Estonia' => [
            'Tallinn'
        ],
        'Finlandia' => [
            'Helsinki',
            'Lappeenranta',
            'Rovaniemi-Lapponia',
            'Tampere'
        ],
        'Francia' => [
            'Bergerac',
            'Beziers',
            'Biarritz',
            'Bordeaux',
            'Brive',
            'Cercassonne',
            'Clermont Ferrand',
            'Dole',
            'Figari',
            'Grenoble',
            'La Rocchelle',
            'Lille',
            'Limoges',
            'Loudres',
            'Marsiglia',
            'Nantes',
            'Nimes',
            'Nizza',
            'Parigi (Beauvais)',
            'Parigi (Vatry)',
            'Perpignan',
            'Poitiers',
            'Rodez',
            'Strasbourg',
            'Toulouse',
            'Tours Valle deòòa Loira'
        ],
        'Germania' => [
            'Amburgo',
            'Berlino Brandeburgo',
            'Brema',
            'Colonia',
            'Dortmund',
            'Dresden',
            'Dusseldorf (Weeze)',
            'Francoforte (Hahn)',
            'Karlsruhe/Baden-Baden',
            'Lipsia',
            'Memmingen',
            'Munster',
            'Norimberga'
        ],
        'Giordania' => [
            'Amman',
            'Aqaba'
        ],
        'Grecia' => [
            'Atene',
            'Cefalona',
            'Chania (Creta)',
            'Corfù',
            'Heraklion Crete',
            'Kalamata',
            'Kos',
            'Mykonos',
            'Preveza - Aktlon',
            'Rodi',
            'Salonicco',
            'Santorini Nazionale',
            'Skiathos',
            'Zacinto'
        ],
        'Irlanda' => [
            'Cork',
            'Dublino',
            'Kerry',
            'Knock-Irlanda dell\'ovest',
            'Shannon'
        ],
        'Israele' => [
            'Tel Aviv'
        ],
        'Italia' => [
            'Alghero',
            'Ancona',
            'Bari',
            'Bologna',
            'Brindisi',
            'Cagliari',
            'Catania',
            'Comiso',
            'Crotone',
            'Cuneo',
            'Genova',
            'Lamezia',
            'Milano Bergamo',
            'Milano Malpensa',
            'Napoli',
            'Palermo',
            'Parma',
            'Perugia',
            'Pescara',
            'Pisa',
            'Rimini',
            'Roma (Ciampino)',
            'Roma (Fiumicino)',
            'Trieste',
            'Venezia (Treviso)',
            'Venezia M.Polo',
            'Verona'
        ],
        'Lettonia' => [
            'Riga'
        ],
        'Lituania' => [
            'Kaunas',
            'Palanga',
            'Vilnius'
        ],
        'Lussemburgo' => [
            'Lussemburgo'
        ],
        'Malta' => [
            'Malta'
        ],
        'Marocco' => [
            'Agadir',
            'Essaouira',
            'Fez',
            'Marrakech',
            'Nador',
            'Ouarzazate',
            'Oujda',
            'Rabat',
            'Tangeri',
            'Tetouan'
        ],
        'Montenegro' => [
            'Podgorica'
        ],
        'Norvegia' => [
            'Haugesund',
            'Oslo',
            'Oslo (Torp)'
        ],
        'Olanda' => [
            'Amsterdam',
            'Eindhoven',
            'Maastricht'
        ],
        'Polonia' => [
            'Breslavia',
            'Bydgoszcz',
            'Cracovia',
            'Danzica',
            'Katowice',
            'Lodz',
            'Lublin',
            'Olsztyn - Mazury',
            'Poznan',
            'Rzeszow',
            'Stetting',
            'Varsavia (Modlin)'
        ],
        'Portogallo' => [
            'Faro',
            'Lisbon',
            'Madeira Funchal',
            'Ponta Delgada',
            'Porto',
            'Terceira Lajes'
        ],
        'Regno Unito' => [
            'Aberdeen',
            'Birmingham',
            'Bourdermouth',
            'Bristol',
            'Cardiff',
            'Derry',
            'East Midlands',
            'Edimburgo',
            'Exter',
            'Glasgow',
            'Glasgow (Prestwick)',
            'Leeds Bradford',
            'Liverpool',
            'Londra (Gatwick)',
            'Londra (Luton)',
            'Londra (Stansted)',
            'Manchester',
            'Newcastle',
            'Newquay Cornovaglia',
            'Teesside'
        ],
        'Repubblica Ceca' => [
            'Brno',
            'Ostrava',
            'Pardubice',
            'Prague'
        ],
        'Romania' => [
            'Bucharest (Otopeni)',
            'Cluj',
            'Oradea',
            'Sibiu',
            'Suceava',
            'Timisoara'
        ],
        'Serbia' => [
            'Nis'
        ],
        'Slovacchia' => [
            'Bratislava',
            'Kosice'
        ],
        'Spagna' => [
            'Alicante',
            'Almeria',
            'Asturie',
            'Barcellona (Girona)',
            'Barcellona (Reus)',
            'Barcellona El Prat',
            'Castellon (Valencia)',
            'Fuerteventura',
            'Gran Canaria',
            'Ibiza',
            'Jerez',
            'La Palma',
            'Lanzarote',
            'Madrid',
            'Malaga',
            'Minorca',
            'Murcia International',
            'Palma',
            'Santander',
            'Santiago',
            'Saragozza',
            'Tenerife (Nord)',
            'Tenerife (Sud)',
            'Valencia',
            'Valladolid'
        ],
        'Svezia' => [
            'Goteborg Landvetter',
            'Lulea',
            'Malmo',
            'Orebro',
            'Skelleftea',
            'Stoccolma Vasteras',
            'Stockolm Arianda',
            'Vaxjo Smaland',
            'Visby Gotland'
        ],
        'Svizzera' => [
            'Basel'
        ],
        'Turchia' => [
            'Bodrum',
            'Dalaman'
        ],
        'Ungheria' => [
            'Budapest'
        ],        
    ];
}
?>