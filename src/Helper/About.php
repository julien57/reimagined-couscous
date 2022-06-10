<?php

namespace App\Helper;

/**
 * Class About.
 *
 * todo: replace all data by dat base
 */
class About
{
    public static function getStructure($page)
    {
        $data = [
                'headerinfo' => [
                    'bg' => 'alvisse-parc-hotel3.jpeg',
                    'title' => 'About us',
                ],
                'block' => [
                    'welcome' => ['template' => '_welcome.html.twig', 'data' => ['title' => 'Welcome']],
                    'gift' => ['template' => '_presentation.html.twig', 'data' => self::getDatasPresentation($page)],
                ],
        ];

        return $data[$page];
    }

    /**
     * GET PRESENTATION.
     *
     * @param $context
     *
     * @return mixed
     */
    public static function getDatasPresentation($context)
    {
        $data = [
            'accueil' => [
                [
                    'description' => [
                        'block_title' => 'LAVERANDA',
                        'title' => 'Alvisse Parc Hotel 4* welcomes you in the heart of Luxembourg',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],

                [
                    'description' => [
                        'block_title' => 'LAVERANDA',
                        'title' => 'Alvisse Parc Hotel 4* welcomes you in the heart of Luxembourg',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_aside' => 'leaf_rounded.jpg',
                    'leaf' => [
                        'img' => 'deco_leaf.svg',
                        'position' => 'mi-middle',
                    ],
                ],

                [
                    'description' => [
                        'block_title' => 'LAVERANDA',
                        'title' => 'Alvisse Parc Hotel 4* welcomes you in the heart of Luxembourg',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'leaf' => [
                        'img' => 'deco_leaf.svg',
                        'position' => 'left',
                    ],
                ],
            ],

            //hotel
            'about' => [
                [
                    'description' => [
                        'block_title' => 'LAVERANDA',
                        'title' => 'Alvisse Parc Hotel 4* welcomes you in the heart of Luxembourg',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],

                [
                    'description' => [
                        'block_title' => 'LAVERANDA',
                        'title' => 'Alvisse Parc Hotel 4* welcomes you in the heart of Luxembourg',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],
            ],
        ];

        return $data[$context];
    }

    /**
     * GET SLIDER.
     *
     * @param $context
     *
     * @return mixed
     */
    public static function getDatasSlider($context)
    {
        $data = [
            'accueil' => [
                [
                    'description' => [
                        'block_title' => 'LAVERANDA',
                        'title' => 'Alvisse Parc Hotel 4* welcomes you in the heart of Luxembourg',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],
                [
                    'description' => [
                        'block_title' => 'LAVERANDA',
                        'title' => 'Alvisse Parc Hotel 4* welcomes you in the heart of Luxembourg',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],
                [
                    'description' => [
                        'block_title' => 'LAVERANDA',
                        'title' => 'Alvisse Parc Hotel 4* welcomes you in the heart of Luxembourg',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],
            ],
            'hotel' => [
                [
                    'block_title' => 'LAVERANDA',
                    'title' => 'Alvisse Parc Hotel 4* welcomes you in the heart of Luxembourg',
                    'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],
                [
                    'block_title' => 'LAVERANDA',
                    'title' => 'Alvisse Parc Hotel 4* welcomes you in the heart of Luxembourg',
                    'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],
                [
                    'block_title' => 'LAVERANDA',
                    'title' => 'Alvisse Parc Hotel 4* welcomes you in the heart of Luxembourg',
                    'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],
            ],
        ];

        return $data[$context];
    }

    /**
     * get gifts.
     *
     * @param $context
     */
    public static function getDatasGifts($context)
    {
        $data = [
            'accueil' => [
                'block_title' => 'Gift vouchers',
                'title' => 'Gift vouchers',
                'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                'bg_img' => 'bon-2.png',
                'bg_img_2' => 'bon-2.png',
                'sub_bg_img' => 'alvisse_home_motif01.jpg',
            ],
        ];
    }

    /**
     * GRT LOGO SERVICE.
     *
     * @param $context
     *
     * @return array
     */
    public static function getDatasLogoService($context)
    {
        $data = [
            [
                'img' => 'icon_equiped_01_wifi.svg',
                'title' => 'FEE WIFI',
            ],
            [
                'img' => 'icon_equiped_02_office.svg',
                'title' => 'OFFICE',
            ],
            [
                'img' => 'icon_equiped_03_bar.svg',
                'title' => 'MINI BAR',
            ],

            [
                'img' => 'icon_equiped_04_safe.svg',
                'title' => 'SAFE',
            ],
            [
                'img' => 'icon_equiped_05_pet.svg',
                'title' => 'PET ON REQUEST',
            ],
            [
                'img' => 'icon_equiped_06_bath.svg',
                'title' => 'BATH ROOM',
                'text' => 'With hairdryer and bathrobes',
            ],
            [
                'img' => 'icon_equiped_07_screen.svg',
                'title' => 'FLAT SCREEN',
                'text' => 'LCD TV with international channels',
            ],

            [
                'img' => 'icon_equiped_08_laundry.svg',
                'title' => 'LAUNDRY SERVICE',
                'text' => 'Extra charge. Iron and board on request',
            ],
        ];

        return $data;
    }
}
