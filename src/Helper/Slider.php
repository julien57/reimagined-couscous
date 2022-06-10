<?php

namespace App\Helper;

/**
 * Class Slider.
 */
class Slider
{
    public static function getDatas($page)
    {
        $data = [
            'accueil' => [
                [
                    'description' => [
                        'block_title' => 'NEWS',
                        'title' => 'Alvisse Parc Hotel 4* welcomes you in the heart of Luxembourg',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'slider' => [
                        [
                            'date' => '03 MAI 2021',
                            'title' => 'HOTEL and Luxembourg restrictions',
                            'text' => 'Due to the new sanitary measures announced by the Luxembourg government, you..',
                            'img' => 'alvisse_home_carrousel01.jpg',
                        ],
                        [
                            'date' => '03 February 2021',
                            'title' => 'Special Offer Exhibition',
                            'text' => 'Vous cherchez un endroit pour lancer votre produit',
                            'img' => 'alvisse_home_carrousel02.jpg',
                        ],
                        [
                            'date' => '03 MAI 2021',
                            'title' => 'HOTEL an Luxembourg restrictons',
                            'text' => 'Due to the new sanitary measures announced by the Luxembourg government, you..',
                            'img' => 'alvisse_home_carrousel03.jpg',
                        ],
                        [
                            'date' => '03 February 2021',
                            'title' => 'Special Offer Exhibition',
                            'text' => 'Vous cherchez un endroit pour lancer votre produit',
                            'img' => 'alvisse_home_carrousel04.jpg',
                        ],
                    ],
                ],
            ],
            'apartments' => [
                [
                    'description' => [
                        'block_title' => 'LAVERANDA',
                        'title' => 'Alvisse Parc Hotel 4* welcomes you in the heart of Luxembourg',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'slider' => [
                        [
                            'date' => '03 MAI 2021',
                            'title' => 'HOTEL and Luxembourg restrictions',
                            'text' => 'Due to the new sanitary measures announced by the Luxembourg government, you..',
                            'img' => 'alvisse_home_carrousel01.jpg',
                        ],
                        [
                            'date' => '03 February 2021',
                            'title' => 'Special Offer Exhibition',
                            'text' => 'Vous cherchez un endroit pour lancer votre produit',
                            'img' => 'alvisse_home_carrousel02.jpg',
                        ],
                        [
                            'date' => '03 MAI 2021',
                            'title' => 'HOTEL an Luxembourg restrictons',
                            'text' => 'Due to the new sanitary measures announced by the Luxembourg government, you..',
                            'img' => 'alvisse_home_carrousel03.jpg',
                        ],
                        [
                            'date' => '03 February 2021',
                            'title' => 'Special Offer Exhibition',
                            'text' => 'Vous cherchez un endroit pour lancer votre produit',
                            'img' => 'alvisse_home_carrousel04.jpg',
                        ],
                    ],
                ],
            ],
        ];

        if (array_key_exists($page, $data)) {
            return $data[$page];
        }
    }
}
