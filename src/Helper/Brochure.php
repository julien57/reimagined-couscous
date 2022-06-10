<?php

namespace App\Helper;

/**
 * Class Presentation.
 */
class Brochure
{
    public static function getDatas($page)
    {
        $data = [
            'accueil' => [
                [
                    'description' => [
                        'id' => 1,
                        'block_title' => 'HOTEL',
                        'title' => 'Alvisse Parc Hotel 4* welcomes you in the heart of Luxembourg',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse_home_img01.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],

                [
                    'description' => [
                        'id' => 2,
                        'block_title' => 'RESTAURANT & BAR',
                        'title' => 'Love at first bite',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse_home_img02.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'sub_bg_aside' => 'leaf_rounded.jpg',
                ],

                [
                    'description' => [
                        'id' => 3,
                        'block_title' => 'Events',
                        'title' => 'Discover our corporate & private event packages',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse_home_img03.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],

                [
                    'description' => [
                        'id' => 4,
                        'block_title' => 'Events',
                        'title' => 'Discover our corporate & private event packages',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse_home_img04.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'circle' => [
                        'title' => 'Spa and leisure',
                        'text' => 'Take time for your self',
                        'bg_color' => '#C2B365',
                    ],
                ],
            ],

            //hotel
            'about' => [
                [
                    'description' => [
                        'id' => 1,
                        'block_title' => 'LAVERANDA',
                        'title' => 'Alvisse Parc Hotel 4* welcomes you in the heart of Luxembourg',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],

                [
                    'description' => [
                        'id' => 2,
                        'block_title' => 'LAVERANDA',
                        'title' => 'Alvisse Parc Hotel 4* welcomes you in the heart of Luxembourg',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],
            ],
            'rooms' => [
                [
                    'description' => [
                        'id' => 1,
                        'block_title' => 'LAVERANDA',
                        'title' => 'Alvisse Parc Hotel 4* welcomes you in the heart of Luxembourg',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],

                [
                    'description' => [
                        'id' => 2,
                        'block_title' => 'LAVERANDA',
                        'title' => '',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],
                [
                    'description' => [
                        'id' => 3,
                        'block_title' => 'LAVERANDA',
                        'title' => '',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],
                [
                    'description' => [
                        'id' => 4,
                        'block_title' => 'LAVERANDA',
                        'title' => '',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],
            ],

            //spa leisure
            'spa_leisure' => [
                [
                    'description' => [
                        'block_title' => 'Swimming pools',
                        'title' => '',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],
                [
                    'description' => [
                        'block_title' => 'Welsnes area',
                        'title' => '',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],
                [
                    'description' => [
                        'block_title' => 'leisure & sport',
                        'title' => '',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],

                [
                    'description' => [
                        'block_title' => 'bed & Bike',
                        'title' => 'Alvisse Parc Hotel 4* welcomes you in the heart of Luxembourg',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],
            ],
        ];

        if (array_key_exists($page, $data)) {
            return $data[$page];
        }
    }
}
