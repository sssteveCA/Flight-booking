<?php

namespace App\Interfaces;

interface Airports{
    const AIRPORT_LIST = [
        'Austria' => [
            'Klaugefurt' => ['lat' => 0,'lon' => 0],
            'Salisburgo' => ['lat' => 0,'lon' => 0],
            'Vienna' => ['lat' => 0,'lon' => 0]
        ],
        'Belgio' => [
            'Brussels Zaventem' => ['lat' => 0,'lon' => 0],
            'Bruxelles (Charleroi)' => ['lat' => 0,'lon' => 0],
        ],
        'Bosnia & Herzegovina' => [
            'Banja Luka' => ['lat' => 0,'lon' => 0],
            'Tuzia' => ['lat' => 0,'lon' => 0]
        ],
        'Bulgaria' => [
            'Burgas' => ['lat' => 0,'lon' => 0],
            'Plovdiv' => ['lat' => 0,'lon' => 0],
            'Sofia' => ['lat' => 0,'lon' => 0],
            'Varna' => ['lat' => 0,'lon' => 0]
        ],
        'Cipro' => [
            'Larnaca' => ['lat' => 0,'lon' => 0],
            'Pafos' => ['lat' => 0,'lon' => 0]
        ],
        'Croazia' => [
            'Dubrovnik' => ['lat' => 0,'lon' => 0],
            'Fiume' => ['lat' => 0,'lon' => 0],
            'Pola' => ['lat' => 0,'lon' => 0],
            'Split' => ['lat' => 0,'lon' => 0],
            'Zagreb' => ['lat' => 0,'lon' => 0],
            'Zara' => ['lat' => 0,'lon' => 0]
        ],
        'Danimarca' => [
            'Aalborg' => ['lat' => 0,'lon' => 0],
            'Aarhus' => ['lat' => 0,'lon' => 0],
            'Billund' => ['lat' => 0,'lon' => 0],
            'Copenaghen' => ['lat' => 0,'lon' => 0]
        ],
        'Estonia' => [
            'Tallinn' => ['lat' => 0,'lon' => 0]
        ],
        'Finlandia' => [
            'Helsinki' => ['lat' => 0,'lon' => 0],
            'Lappeenranta' => ['lat' => 0,'lon' => 0],
            'Rovaniemi-Lapponia' => ['lat' => 0,'lon' => 0],
            'Tampere' => ['lat' => 0,'lon' => 0]
        ],
        'Francia' => [
            'Bergerac' => ['lat' => 0,'lon' => 0],
            'Beziers' => ['lat' => 0,'lon' => 0],
            'Biarritz' => ['lat' => 0,'lon' => 0],
            'Bordeaux' => ['lat' => 0,'lon' => 0],
            'Brive' => ['lat' => 0,'lon' => 0],
            'Cercassonne' => ['lat' => 0,'lon' => 0],
            'Clermont Ferrand' => ['lat' => 0,'lon' => 0],
            'Dole' => ['lat' => 0,'lon' => 0],
            'Figari' => ['lat' => 0,'lon' => 0],
            'Grenoble' => ['lat' => 0,'lon' => 0],
            'La Rocchelle' => ['lat' => 0,'lon' => 0],
            'Lille' => ['lat' => 0,'lon' => 0],
            'Limoges' => ['lat' => 0,'lon' => 0],
            'Loudres' => ['lat' => 0,'lon' => 0],
            'Marsiglia' => ['lat' => 0,'lon' => 0],
            'Nantes' => ['lat' => 0,'lon' => 0],
            'Nimes' => ['lat' => 0,'lon' => 0],
            'Nizza' => ['lat' => 0,'lon' => 0],
            'Parigi (Beauvais)' => ['lat' => 0,'lon' => 0],
            'Parigi (Vatry)' => ['lat' => 0,'lon' => 0],
            'Perpignan' => ['lat' => 0,'lon' => 0],
            'Poitiers' => ['lat' => 0,'lon' => 0],
            'Rodez' => ['lat' => 0,'lon' => 0],
            'Strasbourg' => ['lat' => 0,'lon' => 0],
            'Toulouse' => ['lat' => 0,'lon' => 0],
            'Tours Valle deòòa Loira' => ['lat' => 0,'lon' => 0]
        ],
        'Germania' => [
            'Amburgo' => ['lat' => 0,'lon' => 0],
            'Berlino Brandeburgo' => ['lat' => 0,'lon' => 0],
            'Brema' => ['lat' => 0,'lon' => 0],
            'Colonia' => ['lat' => 0,'lon' => 0],
            'Dortmund' => ['lat' => 0,'lon' => 0],
            'Dresden' => ['lat' => 0,'lon' => 0],
            'Dusseldorf (Weeze)' => ['lat' => 0,'lon' => 0],
            'Francoforte (Hahn)' => ['lat' => 0,'lon' => 0],
            'Karlsruhe/Baden-Baden' => ['lat' => 0,'lon' => 0],
            'Lipsia' => ['lat' => 0,'lon' => 0],
            'Memmingen' => ['lat' => 0,'lon' => 0],
            'Munster' => ['lat' => 0,'lon' => 0],
            'Norimberga' => ['lat' => 0,'lon' => 0]
        ],
        'Giordania' => [
            'Amman' => ['lat' => 0,'lon' => 0],
            'Aqaba' => ['lat' => 0,'lon' => 0]
        ],
        'Grecia' => [
            'Atene' => ['lat' => 0,'lon' => 0],
            'Cefalona' => ['lat' => 0,'lon' => 0],
            'Chania (Creta)' => ['lat' => 0,'lon' => 0],
            'Corfù' => ['lat' => 0,'lon' => 0],
            'Heraklion Crete' => ['lat' => 0,'lon' => 0],
            'Kalamata' => ['lat' => 0,'lon' => 0],
            'Kos' => ['lat' => 0,'lon' => 0],
            'Mykonos' => ['lat' => 0,'lon' => 0],
            'Preveza - Aktlon' => ['lat' => 0,'lon' => 0],
            'Rodi' => ['lat' => 0,'lon' => 0],
            'Salonicco' => ['lat' => 0,'lon' => 0],
            'Santorini Nazionale' => ['lat' => 0,'lon' => 0],
            'Skiathos' => ['lat' => 0,'lon' => 0],
            'Zacinto' => ['lat' => 0,'lon' => 0]
        ],
        'Irlanda' => [
            'Cork' => ['lat' => 0,'lon' => 0],
            'Dublino' => ['lat' => 0,'lon' => 0],
            'Kerry' => ['lat' => 0,'lon' => 0],
            'Knock-Irlanda dell\'ovest' => ['lat' => 0,'lon' => 0],
            'Shannon' => ['lat' => 0,'lon' => 0]
        ],
        'Israele' => [
            'Tel Aviv' => ['lat' => 0,'lon' => 0]
        ],
        'Italia' => [
            'Alghero' => ['lat' => 0,'lon' => 0],
            'Ancona' => ['lat' => 0,'lon' => 0],
            'Bari' => ['lat' => 0,'lon' => 0],
            'Bologna' => ['lat' => 0,'lon' => 0],
            'Brindisi' => ['lat' => 0,'lon' => 0],
            'Cagliari' => ['lat' => 0,'lon' => 0],
            'Catania' => ['lat' => 0,'lon' => 0],
            'Comiso' => ['lat' => 0,'lon' => 0],
            'Crotone' => ['lat' => 0,'lon' => 0],
            'Cuneo' => ['lat' => 0,'lon' => 0],
            'Genova' => ['lat' => 0,'lon' => 0],
            'Lamezia' => ['lat' => 0,'lon' => 0],
            'Milano Bergamo' => ['lat' => 0,'lon' => 0],
            'Milano Malpensa' => ['lat' => 0,'lon' => 0],
            'Napoli' => ['lat' => 0,'lon' => 0],
            'Palermo' => ['lat' => 0,'lon' => 0],
            'Parma' => ['lat' => 0,'lon' => 0],
            'Perugia' => ['lat' => 0,'lon' => 0],
            'Pescara' => ['lat' => 0,'lon' => 0],
            'Pisa' => ['lat' => 0,'lon' => 0],
            'Rimini' => ['lat' => 0,'lon' => 0],
            'Roma (Ciampino)' => ['lat' => 0,'lon' => 0],
            'Roma (Fiumicino)' => ['lat' => 0,'lon' => 0],
            'Trieste' => ['lat' => 0,'lon' => 0],
            'Venezia (Treviso)' => ['lat' => 0,'lon' => 0],
            'Venezia M.Polo' => ['lat' => 0,'lon' => 0],
            'Verona' => ['lat' => 0,'lon' => 0]
        ],
        'Lettonia' => [
            'Riga' => ['lat' => 0,'lon' => 0]
        ],
        'Lituania' => [
            'Kaunas' => ['lat' => 0,'lon' => 0],
            'Palanga' => ['lat' => 0,'lon' => 0],
            'Vilnius' => ['lat' => 0,'lon' => 0]
        ],
        'Lussemburgo' => [
            'Lussemburgo' => ['lat' => 0,'lon' => 0]
        ],
        'Malta' => [
            'Malta' => ['lat' => 0,'lon' => 0]
        ],
        'Marocco' => [
            'Agadir' => ['lat' => 0,'lon' => 0], 
            'Essaouira' => ['lat' => 0,'lon' => 0], 
            'Fez' => ['lat' => 0,'lon' => 0], 
            'Marrakech' => ['lat' => 0,'lon' => 0], 
            'Nador' => ['lat' => 0,'lon' => 0], 
            'Ouarzazate' => ['lat' => 0,'lon' => 0], 
            'Oujda' => ['lat' => 0,'lon' => 0], 
            'Rabat' => ['lat' => 0,'lon' => 0], 
            'Tangeri' => ['lat' => 0,'lon' => 0],
            'Tetouan' => ['lat' => 0,'lon' => 0],
        ],
        'Montenegro' => [
            'Podgorica' => ['lat' => 0,'lon' => 0]
        ],
        'Norvegia' => [
            'Haugesund' => ['lat' => 0,'lon' => 0],
            'Oslo' => ['lat' => 0,'lon' => 0],
            'Oslo (Torp)' => ['lat' => 0,'lon' => 0]
        ],
        'Olanda' => [
            'Amsterdam' => ['lat' => 0,'lon' => 0],
            'Eindhoven' => ['lat' => 0,'lon' => 0],
            'Maastricht' => ['lat' => 0,'lon' => 0]
        ],
        'Polonia' => [
            'Breslavia' => ['lat' => 0,'lon' => 0],
            'Bydgoszcz' => ['lat' => 0,'lon' => 0],
            'Cracovia' => ['lat' => 0,'lon' => 0],
            'Danzica' => ['lat' => 0,'lon' => 0],
            'Katowice' => ['lat' => 0,'lon' => 0],
            'Lodz' => ['lat' => 0,'lon' => 0],
            'Lublin' => ['lat' => 0,'lon' => 0],
            'Olsztyn - Mazury' => ['lat' => 0,'lon' => 0],
            'Poznan' => ['lat' => 0,'lon' => 0],
            'Rzeszow' => ['lat' => 0,'lon' => 0],
            'Stetting' => ['lat' => 0,'lon' => 0],
            'Varsavia (Modlin)' => ['lat' => 0,'lon' => 0]
        ],
        'Portogallo' => [
            'Faro' => ['lat' => 0,'lon' => 0],
            'Lisbon' => ['lat' => 0,'lon' => 0],
            'Madeira Funchal' => ['lat' => 0,'lon' => 0],
            'Ponta Delgada' => ['lat' => 0,'lon' => 0],
            'Porto' => ['lat' => 0,'lon' => 0],
            'Terceira Lajes' => ['lat' => 0,'lon' => 0]
        ],
        'Regno Unito' => [
            'Aberdeen' => ['lat' => 0,'lon' => 0],
            'Birmingham' => ['lat' => 0,'lon' => 0],
            'Bourdermouth' => ['lat' => 0,'lon' => 0],
            'Bristol' => ['lat' => 0,'lon' => 0],
            'Cardiff' => ['lat' => 0,'lon' => 0],
            'Derry' => ['lat' => 0,'lon' => 0],
            'East Midlands' => ['lat' => 0,'lon' => 0],
            'Edimburgo' => ['lat' => 0,'lon' => 0],
            'Exter' => ['lat' => 0,'lon' => 0],
            'Glasgow' => ['lat' => 0,'lon' => 0],
            'Glasgow (Prestwick)' => ['lat' => 0,'lon' => 0],
            'Leeds Bradford' => ['lat' => 0,'lon' => 0],
            'Liverpool' => ['lat' => 0,'lon' => 0],
            'Londra (Gatwick)' => ['lat' => 0,'lon' => 0],
            'Londra (Luton)' => ['lat' => 0,'lon' => 0],
            'Londra (Stansted)' => ['lat' => 0,'lon' => 0],
            'Manchester' => ['lat' => 0,'lon' => 0],
            'Newcastle' => ['lat' => 0,'lon' => 0],
            'Newquay Cornovaglia' => ['lat' => 0,'lon' => 0],
            'Teesside' => ['lat' => 0,'lon' => 0]
        ],
        'Repubblica Ceca' => [
            'Brno' => ['lat' => 0,'lon' => 0],
            'Ostrava' => ['lat' => 0,'lon' => 0],
            'Pardubice' => ['lat' => 0,'lon' => 0],
            'Prague' => ['lat' => 0,'lon' => 0]
        ],
        'Romania' => [
            'Bucharest (Otopeni)' => ['lat' => 0,'lon' => 0],
            'Cluj' => ['lat' => 0,'lon' => 0],
            'Oradea' => ['lat' => 0,'lon' => 0],
            'Sibiu' => ['lat' => 0,'lon' => 0],
            'Suceava' => ['lat' => 0,'lon' => 0],
            'Timisoara' => ['lat' => 0,'lon' => 0]
        ],
        'Serbia' => [
            'Nis' => ['lat' => 0,'lon' => 0]
        ],
        'Slovacchia' => [
            'Bratislava' => ['lat' => 0,'lon' => 0],
            'Kosice' => ['lat' => 0,'lon' => 0]
        ],
        'Spagna' => [
            'Alicante' => ['lat' => 0,'lon' => 0],
            'Almeria' => ['lat' => 0,'lon' => 0],
            'Asturie' => ['lat' => 0,'lon' => 0],
            'Barcellona (Girona)' => ['lat' => 0,'lon' => 0],
            'Barcellona (Reus)' => ['lat' => 0,'lon' => 0],
            'Barcellona El Prat' => ['lat' => 0,'lon' => 0],
            'Castellon (Valencia)' => ['lat' => 0,'lon' => 0],
            'Fuerteventura' => ['lat' => 0,'lon' => 0],
            'Gran Canaria' => ['lat' => 0,'lon' => 0],
            'Ibiza' => ['lat' => 0,'lon' => 0],
            'Jerez' => ['lat' => 0,'lon' => 0],
            'La Palma' => ['lat' => 0,'lon' => 0],
            'Lanzarote' => ['lat' => 0,'lon' => 0],
            'Madrid' => ['lat' => 0,'lon' => 0],
            'Malaga' => ['lat' => 0,'lon' => 0],
            'Minorca' => ['lat' => 0,'lon' => 0],
            'Murcia International' => ['lat' => 0,'lon' => 0],
            'Palma' => ['lat' => 0,'lon' => 0],
            'Santander' => ['lat' => 0,'lon' => 0],
            'Santiago' => ['lat' => 0,'lon' => 0],
            'Saragozza' => ['lat' => 0,'lon' => 0],
            'Tenerife (Nord)' => ['lat' => 0,'lon' => 0],
            'Tenerife (Sud)' => ['lat' => 0,'lon' => 0],
            'Valencia' => ['lat' => 0,'lon' => 0],
            'Valladolid' => ['lat' => 0,'lon' => 0]
        ],
        'Svezia' => [
            'Goteborg Landvetter' => ['lat' => 0,'lon' => 0],
            'Lulea' => ['lat' => 0,'lon' => 0],
            'Malmo' => ['lat' => 0,'lon' => 0],
            'Orebro' => ['lat' => 0,'lon' => 0],
            'Skelleftea' => ['lat' => 0,'lon' => 0],
            'Stoccolma Vasteras' => ['lat' => 0,'lon' => 0],
            'Stockolm Arianda' => ['lat' => 0,'lon' => 0],
            'Vaxjo Smaland' => ['lat' => 0,'lon' => 0],
            'Visby Gotland' => ['lat' => 0,'lon' => 0]
        ],
        'Svizzera' => [
            'Basel' => ['lat' => 0,'lon' => 0]
        ],
        'Turchia' => [
            'Bodrum' => ['lat' => 0,'lon' => 0],
            'Dalaman' => ['lat' => 0,'lon' => 0]
        ],
        'Ungheria' => [
            'Budapest' => ['lat' => 0,'lon' => 0]
        ],        
    ];
}
?>