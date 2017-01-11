<?php

use Illuminate\Database\Seeder;

class ContentTranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('content_translations')->delete();
        
        \DB::table('content_translations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'content_id' => 1,
                'locale' => 'en',
                'data' => 'Search',
            ),
            1 => 
            array (
                'id' => 2,
                'content_id' => 1,
                'locale' => 'nl',
                'data' => 'Zoeken',
            ),
            2 => 
            array (
                'id' => 3,
                'content_id' => 2,
                'locale' => 'en',
                'data' => 'FAQ',
            ),
            3 => 
            array (
                'id' => 4,
                'content_id' => 2,
                'locale' => 'nl',
                'data' => 'FAQ',
            ),
            4 => 
            array (
                'id' => 5,
                'content_id' => 3,
                'locale' => 'en',
                'data' => 'Contact',
            ),
            5 => 
            array (
                'id' => 6,
                'content_id' => 3,
                'locale' => 'nl',
                'data' => 'Contact',
            ),
            6 => 
            array (
                'id' => 7,
                'content_id' => 4,
                'locale' => 'en',
            'data' => 'Kowloon is a retailer of products for pet shops. On this site you can find products for each animal (category) with their corresponding price.',
            ),
            7 => 
            array (
                'id' => 8,
                'content_id' => 4,
                'locale' => 'nl',
            'data' => 'Kowloon is een leverancier van producten voor dierenwinkels. Op deze site kan je per dier (\'categorie\') producten raadplegen met hun bijhorende prijs.',
            ),
            8 => 
            array (
                'id' => 9,
                'content_id' => 5,
                'locale' => 'en',
                'data' => 'Hot items.',
            ),
            9 => 
            array (
                'id' => 10,
                'content_id' => 5,
                'locale' => 'nl',
                'data' => 'Interessante producten.',
            ),
            10 => 
            array (
                'id' => 11,
                'content_id' => 6,
                'locale' => 'en',
                'data' => 'Visit the store',
            ),
            11 => 
            array (
                'id' => 12,
                'content_id' => 6,
                'locale' => 'nl',
                'data' => 'Bezoek de winkel',
            ),
            12 => 
            array (
                'id' => 13,
                'content_id' => 7,
                'locale' => 'en',
                'data' => 'discover amazing Kowloon deals!',
            ),
            13 => 
            array (
                'id' => 14,
                'content_id' => 7,
                'locale' => 'nl',
                'data' => 'Ontdek fantastische Kowloon voordelen!',
            ),
            14 => 
            array (
                'id' => 15,
                'content_id' => 8,
                'locale' => 'en',
                'data' => 'only in our newsletter',
            ),
            15 => 
            array (
                'id' => 16,
                'content_id' => 8,
                'locale' => 'nl',
                'data' => 'Enkel in onze nieuwsbrief',
            ),
            16 => 
            array (
                'id' => 17,
                'content_id' => 9,
                'locale' => 'en',
                'data' => 'Subscribe to our newsletter',
            ),
            17 => 
            array (
                'id' => 18,
                'content_id' => 9,
                'locale' => 'nl',
                'data' => 'Schrijf in op onze nieuwsbrief',
            ),
            18 => 
            array (
                'id' => 19,
                'content_id' => 10,
                'locale' => 'en',
                'data' => 'Spam guaranteed!',
            ),
            19 => 
            array (
                'id' => 20,
                'content_id' => 10,
                'locale' => 'nl',
                'data' => 'Spam gegarandeerd',
            ),
            20 => 
            array (
                'id' => 21,
                'content_id' => 11,
                'locale' => 'en',
                'data' => 'name@domain.com',
            ),
            21 => 
            array (
                'id' => 22,
                'content_id' => 11,
                'locale' => 'nl',
                'data' => 'naam@domein.be',
            ),
            22 => 
            array (
                'id' => 23,
                'content_id' => 12,
                'locale' => 'en',
                'data' => 'articles.',
            ),
            23 => 
            array (
                'id' => 24,
                'content_id' => 12,
                'locale' => 'nl',
                'data' => 'artikelen.',
            ),
            24 => 
            array (
                'id' => 25,
                'content_id' => 13,
                'locale' => 'en',
                'data' => 'Filter',
            ),
            25 => 
            array (
                'id' => 26,
                'content_id' => 13,
                'locale' => 'nl',
                'data' => 'Filter',
            ),
            26 => 
            array (
                'id' => 27,
                'content_id' => 14,
                'locale' => 'en',
                'data' => 'By collection',
            ),
            27 => 
            array (
                'id' => 28,
                'content_id' => 14,
                'locale' => 'nl',
                'data' => 'Volgens tags',
            ),
            28 => 
            array (
                'id' => 29,
                'content_id' => 15,
                'locale' => 'en',
                'data' => 'Price range',
            ),
            29 => 
            array (
                'id' => 30,
                'content_id' => 15,
                'locale' => 'nl',
                'data' => 'Prijs klasse',
            ),
            30 => 
            array (
                'id' => 31,
                'content_id' => 16,
                'locale' => 'en',
                'data' => 'Sort by relevance',
            ),
            31 => 
            array (
                'id' => 32,
                'content_id' => 16,
                'locale' => 'nl',
                'data' => 'Sorteer volgens relevantie',
            ),
            32 => 
            array (
                'id' => 33,
                'content_id' => 17,
                'locale' => 'en',
                'data' => 'Price: high to low',
            ),
            33 => 
            array (
                'id' => 34,
                'content_id' => 17,
                'locale' => 'nl',
                'data' => 'Prijs: hoog naar laag',
            ),
            34 => 
            array (
                'id' => 35,
                'content_id' => 18,
                'locale' => 'en',
                'data' => 'Price: low to high',
            ),
            35 => 
            array (
                'id' => 36,
                'content_id' => 18,
                'locale' => 'nl',
                'data' => 'Prijs: laag naar hoog',
            ),
            36 => 
            array (
                'id' => 37,
                'content_id' => 19,
                'locale' => 'en',
                'data' => 'Oldest',
            ),
            37 => 
            array (
                'id' => 38,
                'content_id' => 19,
                'locale' => 'nl',
                'data' => 'Oudste',
            ),
            38 => 
            array (
                'id' => 39,
                'content_id' => 20,
                'locale' => 'en',
                'data' => 'Latest',
            ),
            39 => 
            array (
                'id' => 40,
                'content_id' => 20,
                'locale' => 'nl',
                'data' => 'Nieuwste',
            ),
            40 => 
            array (
                'id' => 41,
                'content_id' => 21,
                'locale' => 'en',
                'data' => 'items',
            ),
            41 => 
            array (
                'id' => 42,
                'content_id' => 21,
                'locale' => 'nl',
                'data' => 'artikelen',
            ),
            42 => 
            array (
                'id' => 43,
                'content_id' => 22,
                'locale' => 'en',
                'data' => 'of',
            ),
            43 => 
            array (
                'id' => 44,
                'content_id' => 22,
                'locale' => 'nl',
                'data' => 'van',
            ),
            44 => 
            array (
                'id' => 45,
                'content_id' => 23,
                'locale' => 'en',
                'data' => 'Want to know more?',
            ),
            45 => 
            array (
                'id' => 46,
                'content_id' => 23,
                'locale' => 'nl',
                'data' => 'Wil je meer weten?',
            ),
            46 => 
            array (
                'id' => 47,
                'content_id' => 24,
                'locale' => 'en',
                'data' => 'view details',
            ),
            47 => 
            array (
                'id' => 48,
                'content_id' => 24,
                'locale' => 'nl',
                'data' => 'Bekijk details',
            ),
            48 => 
            array (
                'id' => 49,
                'content_id' => 25,
                'locale' => 'en',
                'data' => 'Colors',
            ),
            49 => 
            array (
                'id' => 50,
                'content_id' => 25,
                'locale' => 'nl',
                'data' => 'Kleuren',
            ),
            50 => 
            array (
                'id' => 51,
                'content_id' => 26,
                'locale' => 'en',
                'data' => 'Description',
            ),
            51 => 
            array (
                'id' => 52,
                'content_id' => 26,
                'locale' => 'nl',
                'data' => 'Beschrijving',
            ),
            52 => 
            array (
                'id' => 53,
                'content_id' => 27,
                'locale' => 'en',
                'data' => 'Specifications',
            ),
            53 => 
            array (
                'id' => 54,
                'content_id' => 27,
                'locale' => 'nl',
                'data' => 'Specificaties',
            ),
            54 => 
            array (
                'id' => 55,
                'content_id' => 28,
                'locale' => 'en',
                'data' => 'Related products',
            ),
            55 => 
            array (
                'id' => 56,
                'content_id' => 28,
                'locale' => 'nl',
                'data' => 'Gerelateerde producten',
            ),
            56 => 
            array (
                'id' => 57,
                'content_id' => 29,
                'locale' => 'en',
                'data' => 'View more',
            ),
            57 => 
            array (
                'id' => 58,
                'content_id' => 29,
                'locale' => 'nl',
                'data' => 'Meer zien',
            ),
        ));
        
        
    }
}