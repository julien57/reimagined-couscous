<?php

namespace App\Helper;

/**
 * Class Presentation.
 */
class Presentation
{
    public static function getDatas($page, $id = '')
    {
        $data = [
            'accueil' => [
                [
                    'description' => [
                        'id' => 1,
                        'block_title' => 'HOTEL',
                        'title' => 'Alvisse Parc Hotel 4* welcomes you in the heart of Luxembourg',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                        'link' => 'about',
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
                        'link' => 'restaurant',
                    ],
                    'bg_img' => 'alvisse_home_img02.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'sub_bg_aside' => 'leaf_rounded.jpg',
                ],

                [
                    'description' => [
                        'id' => 3,
                        'block_title' => 'EVENTS',
                        'title' => 'Discover our corporate & private event packages',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                        'link' => 'events',
                    ],
                    'bg_img' => 'alvisse_home_img03.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],

                [
                    'description' => [
                        'id' => 4,
                        'block_title' => 'SPA & LEISURE',
                        'title' => 'Take time for yourself',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                        'link' => 'spa-leisure',
                    ],
                    'bg_img' => 'alvisse_home_img04.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'circle' => [
                        'title' => 'Special Packages',
                        'text' => 'SAUNA, MASSAGE, HAMMAM',
                        'bg_color' => '#C2B365',
                    ],
                ],
            ],

            'packages' => [
                [
                    'description' => [
                        'id' => 1,
                        'block_title' => 'ROMANTIC PACKAGE',
                        'title' => 'Romantic package',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                        'link' => 'accueil',
                    ],
                    'bg_img' => 'alvisse_exclusive_packages_img01.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],

                [
                    'description' => [
                        'id' => 2,
                        'block_title' => 'WELLNESS PACKAGE',
                        'title' => 'Wellness package',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                        'link' => 'accueil',
                    ],
                    'bg_img' => 'alvisse_home_img04.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'sub_bg_aside' => 'leaf_rounded.jpg',
                ],

                [
                    'description' => [
                        'id' => 3,
                        'block_title' => 'SPORTS PACKAGE',
                        'title' => 'Sports package',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                        'link' => 'accueil',
                    ],
                    'bg_img' => 'alvisse_exclusive_packages_img03.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],

                [
                    'description' => [
                        'id' => 4,
                        'block_title' => 'GOURMET PACKAGE',
                        'title' => 'Gourmet package',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                        'link' => 'accueil',
                    ],
                    'bg_img' => 'alvisse_exclusive_packages_img04.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],
            ],

            'special_offers' => [
                [
                    'description' => [
                        'block_title' => 'ROOM OFFER',
                        'title' => 'Reservation of hotel rooms during the day',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse_special_offers_img01.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'circle' => [
                        'title' => '"Dayroom" - Rate',
                        'text' => 'Starting 80€ / day *',
                        'text2' => '',
                        'bg_color' => '#C2B365',
                    ],
                ],
                [
                    'description' => [
                        'block_title' => '"HOTELROOM" RATE',
                        'title' => 'We offer you the single and double room with breakfast included at the special rate',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'special-offers-hotelroom.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'circle' => [
                        'title' => '"Hotelroom" - Rate',
                        'text' => 'Starting 98€ / day *',
                        'text2' => '',
                        'bg_color' => '#C2B365',
                    ],
                ],
            ],

            'restaurant' => [
                [
                    'description' => [
                        'id' => 'la-veranda',
                        'block_title' => 'La Véranda',
                        'title' => '"La Véranda" Restaurant',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse_img01.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],
                [
                    'description' => [
                        'id' => 'lounge-bar',
                        'block_title' => 'Lounge Bar',
                        'title' => 'Lounge Bar',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse_img02.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],
            ],

            'lounge-bar' => [
                [
                    'description' => [
                        'id' => 2,
                        'block_title' => 'Happy Hour',
                        'title' => 'Cocktail Happy Hour',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse_img_01_lounge_bar.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],
                [
                    'description' => [
                        'id' => 1,
                        'block_title' => 'It\'s Gin o\' clock',
                        'title' => 'It\'s Gin o\' clock',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse_img_02_lounge_bar.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],
            ],

            //hotel about
            'about' => [
                [
                    'description' => [
                        'id' => 1,
                        'block_title' => 'ROOMS',
                        'title' => 'Rooms',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                        'link' => 'rooms',
                    ],
                    'bg_img' => 'about-rooms.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],

                [
                    'description' => [
                        'id' => 2,
                        'block_title' => 'Apartments',
                        'title' => 'Apartments',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                        'link' => 'apartments',
                    ],
                    'bg_img' => 'about-specialoffers.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],
                [
                    'description' => [
                        'id' => 2,
                        'block_title' => 'Special offers',
                        'title' => 'Special offers',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                        'link' => 'special-offers',
                    ],
                    'bg_img' => 'about-apartements.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],
            ], //rooms
            'rooms' => [
                [
                    'description' => [
                        'id' => 1,
                        'block_title' => 'Comfort room',
                        'title' => 'the comfort room',
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
                        //'id' =>,
                        'block_title' => 'Swimming pools',
                        'title' => 'Swimming pools',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse_img_01_spa_leisure.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],
                [
                    'description' => [
                        'block_title' => 'WELLNESS AREA',
                        'title' => 'Wellness area',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse_img_02_spa_leisure.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],
                [
                    'description' => [
                        'block_title' => 'LEISURE & SPORTS',
                        'title' => 'Leisure & sports',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse_img_03_spa_leisure.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],

                [
                    'description' => [
                        'block_title' => 'BED & BIKE',
                        'title' => 'Bed & Bike',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse_img_04_spa_leisure.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],
            ],

            //events
            'events' => [
                [
                    'description' => [
                        'block_title' => 'wedding',
                        'title' => 'wedding',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                        'submit_text' => 'more',
                        'link' => 'wedding',
                    ],
                    'bg_img' => 'event-wedding.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],
                [
                    'description' => [
                        'block_title' => 'Baptism & communion',
                        'title' => 'Baptism & communion',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                        'submit_text' => 'more',
                        'link' => 'baptism-communion',
                    ],
                    'bg_img' => 'event-communion.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],
                [
                    'description' => [
                        'block_title' => 'Birthday',
                        'title' => 'Birthday',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                        'submit_text' => 'more',
                        'link' => 'birthday',
                    ],
                    'bg_img' => 'event-birthday.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],

                [
                    'description' => [
                        'block_title' => 'Class reunion',
                        'title' => 'Class reunion',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                        'submit_text' => 'more',
                        'link' => 'class-reunion',
                    ],
                    'bg_img' => 'event-class-reunion.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],

                [
                    'description' => [
                        'block_title' => 'Conferences',
                        'title' => 'Conferences',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                        'submit_text' => 'more',
                        'link' => 'conference',
                    ],
                    'bg_img' => 'event-conference.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],
            ],

            /*
             * meeting room
             * */

            'meeting_room' => [
                [
                    'description' => [
                        'block_title' => 'Our reception rooms',
                        'title' => 'Small rooms',
                        'sub_title' => '10 - 70 guests',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                        'submit_text' => 'more',
                        'link' => 'small-size',
                    ],
                    'bg_img' => 'meeting-room-small-room.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],

                [
                    'description' => [
                        'block_title' => 'Our reception rooms',
                        'title' => 'Medium rooms',
                        'sub_title' => '100 - 300 guests',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                        'submit_text' => 'more',
                        'link' => 'medium-size',
                    ],
                    'bg_img' => 'meeting-room-medium-room.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],

                [
                    'description' => [
                        'block_title' => 'Our reception rooms',
                        'title' => 'Big room',
                        'sub_title' => 'Up to 1500 guests',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                        'submit_text' => 'more',
                        'link' => 'big-size',
                    ],
                    'bg_img' => 'meeting-room-big-room.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],

                [
                    'description' => [
                        'block_title' => 'Our reception rooms',
                        'title' => 'Bowling room',
                        'sub_title' => 'Up to 1500 guests',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                        'submit_text' => 'more',
                        'link' => 'bowling-room',
                    ],
                    'bg_img' => 'meeting-room-bowling-room.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],
            ],

            'rallye' => [
                [
                    'description' => [
                        'id' => 1,
                        'block_title' => 'LOREM IPSUM',
                        'title' => 'Lorem ipsum dolor sit amet',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                        'link' => 'about',
                    ],
                    'bg_img' => 'alvisse_home_img01.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],
            ],
        ];

        if (array_key_exists($page, $data)) {
            if ('' != $id) {
                if (('about' == $page)) {
                    return [$data[$page][$id]];
                }

                return $data[$page][$id];
            }

            return $data[$page];
        }
    }

    /**
     * @param $page
     *
     * @return mixed
     */
    public static function getDatasOther($page)
    {
        $data = [
            'about' => [
                [
                    'description' => [
                        'id' => 1,
                        'block_title' => 'BROCHURES',
                        'title' => 'Brochures',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                        'link' => 'brochure',
                    ],
                    'bg_img' => 'about-brochure.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],
            ],
        ];

        if (array_key_exists($page, $data)) {
            return $data[$page];
        }
    }
}
