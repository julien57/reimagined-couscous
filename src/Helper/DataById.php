<?php

namespace App\Helper;

/**
 * Class Datas.
 *
 * todo: replace all data by dat base
 */
class DataById
{
    /**
     * data for structure.
     *
     * @param $page
     *
     * @return mixed
     */
    public static function getStructure($page, $id = null)
    {
        $array = [];
        $page = str_replace('-', '_', $page);

        $data = [
            'accueil' => [
                'headerinfo' => [
                    'bg' => 'alvisse-parc-hotel2.jpeg',
                ],

                'block' => [
                    'welcome' => ['template' => '_welcome.html.twig', 'data' => self::getDatasWelcome($page)],
                    'bigblock' => ['template' => '_big-block.html.twig', 'data' => self::getDatasBigBlock($page)],
                    'presentation' => ['template' => '_presentation.html.twig', 'data' => self::getDatasPresentation($page)],
                    'slider' => ['template' => '_slider.html.twig', 'data' => self::getDatasSlider($page)],
                     'slider_gallery' => ['template' => '_slider-gallery.html.twig', 'data' => self::getDatasSliderGallery($page)],
                    'breakfast' => ['template' => '_breakfast.html.twig', 'data' => []],
                ],
            ],
            'about' => [
                'headerinfo' => [
                    'bg' => 'alvisse-parc-hotel3.jpeg',
                    'title' => 'About us',
                ],
                'block' => [
                    'presentation' => ['template' => '_presentation.html.twig', 'data' => self::getDatasPresentation($page)],
                    'gift' => ['template' => '_gift.html.twig', 'data' => self::getDatasGifts($page)],
                ],
            ],

            'rooms' => [
                'headerinfo' => [
                    'bg' => 'alvisse-parc-hotel5.jpeg',
                    'title' => 'Rooms',
                ],
                'block' => [
                    'welcome' => ['template' => '_welcome.html.twig', 'data' => self::getDatasWelcome($page)],
                    'logo_service' => ['template' => '_logos-service.html.twig', 'data' => self::getDatasLogoService()],
                    'slider_gallery' => ['template' => '_slider-gallery.html.twig', 'data' => self::getDatasSliderGallery($page)],
                    'presentation' => ['template' => '_presentation.html.twig', 'data' => self::getDatasPresentation($page)],
                    'breakfast' => ['template' => '_breakfast.html.twig', 'data' => []],
                    'id' => [
                        1 => [
                            'welcome' => ['template' => '_welcome.html.twig', 'data' => self::getDatasWelcome($page)],
                            'logo_service' => ['template' => '_logos-service.html.twig', 'data' => self::getDatasLogoService()],
                            'slider_gallery' => ['template' => '_slider-gallery.html.twig', 'data' => self::getDatasSliderGallery($page)],
                            'presentation' => ['template' => '_presentation.html.twig', 'data' => self::getDatasPresentation($page)],
                            'breakfast' => ['template' => '_breakfast.html.twig', 'data' => []],
                        ],
                    ],
                ],
            ],

            'gifts' => [
                'headerinfo' => [
                    'bg' => 'alvisse-parc-hotel5.jpeg',
                    'title' => 'GIFTs',
                ],
                'block' => [
                    'gift' => ['template' => '_gift-large.html.twig', 'data' => self::getDatasGifts($page)],
                    'form' => ['template' => '_gift-reservation.html.twig', 'data' => self::getDatasGiftForm($page)],
                    'contact' => ['template' => '_contact.html.twig', 'data' => self::getDatasContact($page)],
                ],
            ],

            'contact' => [
                'headerinfo' => [
                    'bg' => 'alvisse-parc-hotel5.jpeg',
                    'title' => 'Contact',
                ],
                'block' => [
                    'contact' => ['template' => '_contact-form.html.twig', 'data' => self::getDatasFormContact($page)],
                ],
            ],

            'spa_leisure' => [
                'headerinfo' => [
                    'bg' => 'alvisse-parc-hotel5.jpeg',
                    'title' => 'Contact',
                ],
                'block' => [
                    'presentation' => ['template' => '_presentation.html.twig', 'data' => self::getDatasPresentation($page)],
                ],
            ],
        ];

        $blocks = $data[$page]['block'];
        if (!is_null($id)) {
            $blocks = $data[$page]['block']['id'][$id];
        }
        foreach ($blocks as $key => $block) {
            $template = $block['template'];

            foreach ($block['data'] as $dt) {
                $array[] = [
                    'template' => $template,
                    'data' => $dt,
                ];
            }
        }

        unset($data[$page]['block']);

        $data[$page]['block'] = $array;

        if (array_key_exists($page, $data)) {
            return $data[$page];
        }
    }

    /**
     * @param $page
     *
     * @return mixed
     */
    public static function getDatasWelcome($page)
    {
        $data = [
            'accueil' => [
                [
                    'title' => 'Welcome',
                ],
            ],
            'rooms' => [
                [
                    'title' => '325</br>rooms<br/><span>Equiped with</span>',
                ],
            ],
            'about' => [
                [
                    'title' => 'about',
                ],
            ],
        ];

        if (array_key_exists($page, $data)) {
            return $data[$page];
        }
    }

    /**
     * GET PRESENTATION.
     *
     * @param $context
     *
     * @return mixed
     */
    public static function getDatasPresentation($page)
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
            'rooms' => [
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
            'spa_leisure' => [
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
        ];

        if (array_key_exists($page, $data)) {
            return $data[$page];
        }
    }

    /**
     * @param $page
     *
     * @return mixed
     */
    public static function getDatasContact($page)
    {
        $data = [
            'gifts' => [
                [
                    'title' => 'Contact',
                    'description' => 'All charges such as water and electricity are included to render your stay as carefree.Do not hesitate to contact our reception in order for our team to be able to provide.',
                    'submit' => 'Contact',
                ],
            ],
        ];

        if (array_key_exists($page, $data)) {
            return $data[$page];
        }
    }

    public static function getDatasFormContact($page)
    {
        $data = [
            'contact' => [
                [
                    'title' => 'Contact',
                    'text' => 'All charges such as water and electricity are included to render your stay as carefree.Do not hesitate to contact our reception in order for our team to be able to provide.',
                ],
            ],
        ];

        if (array_key_exists($page, $data)) {
            return $data[$page];
        }
    }

    /**
     * GET SLIDER.
     *
     * @param $context
     *
     * @return mixed
     */
    public static function getDatasSlider($page)
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
                /* array(
                     'description' => array(
                         'block_title' => 'LAVERANDA',
                         'title' => 'Alvisse Parc Hotel 4* welcomes you in the heart of Luxembourg',
                         'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',

                     ),
                     'bg_img' => 'alvisse-parc-hotel.jpeg',
                     'sub_bg_img' => 'alvisse_home_motif01.jpg',
                 ),
                 array(
                     'description' => array(
                         'block_title' => 'LAVERANDA',
                         'title' => 'Alvisse Parc Hotel 4* welcomes you in the heart of Luxembourg',
                         'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                     ),
                     'bg_img' => 'alvisse-parc-hotel.jpeg',
                     'sub_bg_img' => 'alvisse_home_motif01.jpg',
                 ),*/
            ],
        ];

        if (array_key_exists($page, $data)) {
            return $data[$page];
        }
    }

    /**
     * @param $page
     *
     * @return mixed
     */
    public static function getDatasSliderGallery($page)
    {
        $data = [
            'accueil' => [
                [
                    [
                        'description' => [
                            'block_title' => 'LAVERANDA',
                            'title' => 'Alvisse Parc Hotel 4* welcomes you in the heart of Luxembourg',
                            'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                        ],
                        'bg_img' => 'alvisse-parc-hotel.jpeg',
                        'imgs' => [
                            'alvisse-parc-hotel.jpeg', 'alvisse-parc-hotel.jpeg', 'alvisse-parc-hotel.jpeg',
                        ],
                    ],

                    [
                        'description' => [
                            'block_title' => 'LAVERANDA',
                            'title' => 'Alvisse Parc Hotel 4* welcomes you in the heart of Luxembourg',
                            'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                        ],
                        'bg_img' => 'alvisse-parc-hotel.jpeg',
                        'imgs' => [
                            'alvisse-parc-hotel.jpeg', 'alvisse-parc-hotel.jpeg', 'alvisse-parc-hotel.jpeg',
                        ],
                    ],
                ],
            ],

            'rooms' => [
                [
                    [
                        'description' => [
                            'block_title' => 'LAVERANDA',
                            'title' => 'Alvisse Parc Hotel 4* welcomes you in the heart of Luxembourg',
                            'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                        ],
                        'bg_img' => 'alvisse-parc-hotel.jpeg',
                        'imgs' => [
                            'alvisse-parc-hotel.jpeg', 'alvisse-parc-hotel.jpeg', 'alvisse-parc-hotel.jpeg',
                        ],
                    ],

                    [
                        'description' => [
                            'block_title' => 'LAVERANDA',
                            'title' => 'Alvisse Parc Hotel 4* welcomes you in the heart of Luxembourg',
                            'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                        ],
                        'bg_img' => 'alvisse-parc-hotel.jpeg',
                        'imgs' => [
                            'alvisse-parc-hotel.jpeg', 'alvisse-parc-hotel.jpeg', 'alvisse-parc-hotel.jpeg',
                        ],
                    ],
                ],
            ],
        ];

        if (array_key_exists($page, $data)) {
            return $data[$page];
        }
    }

    /**
     * @param $page
     *
     * @return mixed
     */
    public static function getDatasGallery($page)
    {
        $data = [
            'alvisse_home_motif01.jpg', 'alvisse_home_motif01.jpg', 'alvisse_home_motif01.jpg',
        ];

        if (array_key_exists($page, $data)) {
            return $data[$page];
        }
    }

    /**
     * Get gifts.
     *
     * @param $context
     */
    public static function getDatasGifts($page)
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
            'about' => [
                [
                    'description' => [
                        'block_title' => 'Gift vouchers',
                        'title' => 'Gift vouchers',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'bon-2.png',
                    'bg_img_2' => 'bon-2.png',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'has_text_block' => 1,
                ],
            ],
            'gifts' => [
                [
                    'circle' => [
                        'title' => 'Our Gift Vouchers',
                        'text' => 'Offer thek wellbeing and relaxation',
                        'range_price' => '50 TO 250 &euro;',
                        'bg_color' => '#D4AF37',
                    ],

                    'bg_img' => 'bon-2.png',
                    'bg_img_2' => 'bon-2.png',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'large' => 'large',
                ],
            ],
        ];

        if (array_key_exists($page, $data)) {
            return $data[$page];
        }
    }

    /**
     * @param $page
     *
     * @return mixed
     */
    public static function getDatasGiftForm($page)
    {
        $data = [
            'gifts' => [
                [
                    'title' => 'Simply fill out the online form and choose the amount you want to spend.',
                    'subtitle' => 'The personalized GiftVoucher will be send to you per post. Our gift voucher.',
                ],
            ],
        ];

        if (array_key_exists($page, $data)) {
            return $data[$page];
        }
    }

    public static function getDatasBlockInfos($page)
    {
        $data = [
            'accueil' => [
                'spa_area_pool' => [
                        'title' => 'Prices inside pool & spa area',
                        'details' => [
                            [
                                'title' => 'ADULT',
                                'price_per_day' => [
                                    'DAY 24 &euos;',
                                ],
                                'other_price' => [
                                    'month 69 &euos;',
                                    '3 month 188 &euos;',
                                    '6 month 353 &euos;',
                                    'YEAR 620 &euos;',
                                ],
                            ],
                            [
                                'title' => 'KIDS',
                                'price_per_day' => [
                                    'DAY 24 &euos;',
                                ],
                                'other_price' => [
                                    'month 69 &euos;',
                                    '3 month 188 &euos;',
                                    '6 month 353 &euos;',
                                    'YEAR 620 &euos;',
                                ],
                            ],

                            [
                                'title' => 'TOWEL RENTAL',
                                'price_per_day' => [
                                    '3 &euos;',
                                ],
                            ],
                            [
                                'title' => 'BATHROBE RENTAL',
                                'price_per_day' => [
                                    '6 &euos;',
                                ],
                            ],

                            [
                                'title' => 'COCHING ON DEMAND',
                                'price_per_day' => [
                                    '6 &euos;',
                                ],
                            ],
                        ],
                    ],

                'our_outside_pool' => [
                        'title' => 'Prices inside pool & spa area',
                        'details' => [
                            [
                                1 => 'ADULT',
                                2 => 'DAY 6 E',
                            ],
                            [
                                1 => 'KIDS',
                                2 => 'DAY 3 E',
                            ],
                        ],
                    ],
            ],
        ];

        if (array_key_exists($page, $data)) {
            return $data[$page];
        }
    }

    public static function getDatasBigBlock($page)
    {
        $data = [
            'accueil' => [
                [
                    'description' => [
                        'block_title' => 'LAVERANDA big block',
                        'title' => 'Alvisse Parc Hotel 4* welcomes you in the heart of Luxembourg',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg big block',
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
        ];

        if (array_key_exists($page, $data)) {
            return $data[$page];
        }
    }

    /**
     * GRT LOGO SERVICE.
     *
     * @param $context
     *
     * @return array
     */
    public static function getDatasLogoService()
    {
        return $data = [
            [
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
            ],
        ];
    }
}
