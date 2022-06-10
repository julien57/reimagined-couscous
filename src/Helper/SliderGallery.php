<?php

namespace App\Helper;

/**
 * Class Presentation.
 */
class SliderGallery
{
    public static function getDatas($page, $id = '')
    {
        $data = [
            'rooms' => [
                1 => [
                    'description' => [
                        'id' => 1,
                        'block_title' => 'COMFORT ROOM',
                        'title' => 'The comfort room',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'rooms/alvisse_rooms_img01.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'rooms/alvisse_rooms_img01.jpg',
                        'rooms/alvisse_rooms_img02.jpg',
                        'rooms/alvisse_rooms_img03.jpg',
                    ],
                    'imgsmall' => [
                        'rooms/small/confort_room1.jpg',
                        'rooms/small/confort_room2.jpg',
                        'rooms/small/confort_room3.jpg',
                    ],
                ],

                2 => [
                    'description' => [
                        'id' => 2,
                        'block_title' => 'SUPERIOR ROOM',
                        'title' => 'The Superior Room 1',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'rooms/alvisse_rooms_img01.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'rooms/alvisse_rooms_img02.jpg',
                    ],
                    'imgsmall' => [
                        'rooms/small/superior-room-1-carousel-1.jpg',
                        'rooms/small/superior-room-1-carousel-2.jpg',
                        'rooms/small/superior-room-1-carousel-3.jpg',
                    ],
                ],

                3 => [
                    'description' => [
                        'id' => 3,
                        'block_title' => 'SUPERIOR ROOM 2',
                        'title' => 'The Superior Room 2',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'rooms/alvisse_rooms_img01.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'rooms/carrousel_01_superior_rooms2.jpg',
                    ],
                    'imgsmall' => [
                        'rooms/small/superior-room-2-carousel-1.jpg',
                        'rooms/small/superior-room-2-carousel-2.jpg',
                        'rooms/small/superior-room-2-carousel-3.jpg',
                    ],
                ],

                4 => [
                    'description' => [
                        'id' => 4,
                        'block_title' => 'SUPERIOR ROOM 3',
                        'title' => 'The Superior Room 3',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'rooms/alvisse_rooms_img01.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'rooms/alvisse_rooms_img04.jpg',
                    ],
                    'imgsmall' => [
                        'rooms/small/alvisse_rooms_img01.jpg',
                        'rooms/small/alvisse_rooms_img01.jpg',
                        'rooms/small/alvisse_rooms_img01.jpg',
                    ],
                ],
            ],

            'restaurant' => [
                'la_veranda' => [
                    1 => [
                    'description' => [
                        'id' => 1,
                        'block_title' => 'BAR',
                        'title' => 'Bar',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'apartments/carrousel_01_appartements.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'restaurant/alvisse_img02.jpg',
                    ],
                ],
                2 => [
                    'description' => [
                        'id' => 1,
                        'block_title' => 'SUNDAY LUNCH',
                        'title' => 'Sunday lunch',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'apartments/carrousel_01_appartements.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'la-veranda/alvisse_img_06_veranda.jpg',
                    ],
                ],
                3 => [
                    'description' => [
                        'id' => 1,
                        'block_title' => 'SUGGESTION',
                        'title' => 'Monthly suggestion',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'apartments/carrousel_01_appartements.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'la-veranda/alvisse_img_07_veranda.jpg',
                    ],
                ],
                4 => [
                    'description' => [
                        'id' => 1,
                        'block_title' => 'DISH OF THE DAY',
                        'title' => 'Dish of the day',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'apartments/carrousel_01_appartements.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'la-veranda/alvisse_img_08_veranda.jpg',
                    ],
                ],
            ],

                'lounge_bar' => [
                    1 => [
                        'description' => [
                            'block_title' => 'HAPPY HOUR',
                            'title' => 'Cocktail Happy Hour',
                            'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                        ],
                        'bg_img' => 'lounge/alvisse_img_01_lounge_bar.jpg',
                        'sub_bg_img' => 'alvisse_home_motif01.jpg',
                        'imgs' => [
                            'lounge/alvisse_img_01_lounge_bar.jpg',
                        ],
                    ],
                    2 => [
                        'description' => [
                            'block_title' => 'IT\'S GIN O\'CLOCK',
                            'title' => 'It\'s Gin o\'clock',
                            'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                        ],
                        'bg_img' => 'lounge/alvisse_img_01_lounge_bar.jpg',
                        'sub_bg_img' => 'alvisse_home_motif01.jpg',
                        'imgs' => [
                            'lounge/alvisse_img_02_lounge_bar.jpg',
                        ],
                    ],
                ],
            ],
            'apartments' => [
                1 => [
                    'description' => [
                        'id' => 1,
                        'block_title' => 'LA VILLA',
                        'title' => 'La villa',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                        'slug' => 'contact',
                    ],
                    'bg_img' => 'apartments/carrousel_01_appartements.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'apartments/carrousel_01_appartements.jpg',
                    ],
                    'imgsmall' => [
                        'rooms/small/la-villa-carousel-1.jpg',
                        'rooms/small/la-villa-carousel-2.jpg',
                        'rooms/small/la-villa-carousel-3.jpg',
                    ],
                ],

                2 => [
                    'description' => [
                        'id' => 2,
                        'block_title' => 'STUDIO HOTEL',
                        'title' => 'Studio hotel',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'rooms/alvisse_rooms_img01.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'apartments/carrousel_01_appartements.jpg',
                    ],
                    'imgsmall' => [
                        'rooms/small/la-villa-carousel-1.jpg',
                        'rooms/small/la-villa-carousel-2.jpg',
                        'rooms/small/la-villa-carousel-3.jpg',
                    ],
                ],

                3 => [
                    'description' => [
                        'id' => 3,
                        'block_title' => 'STUDIOS RÉSIDENCE',
                        'title' => 'Studios Résidence',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'rooms/alvisse_rooms_img01.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'apartments/carrousel_01_studio_residence.jpg',
                    ],
                    'imgsmall' => [
                        'rooms/small/confort_room1.jpg',
                        'rooms/small/confort_room2.jpg',
                        'rooms/small/confort_room3.jpg',
                    ],
                ],
            ],

            'swimming_pools' => [
                1 => [
                    'description' => [
                        'block_title' => 'SPA AREA & INSIDE POOL',
                        'title' => 'Inside pool & spa area',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'apartments/carrousel_01_appartements.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'swimming-pool/alvisse_img_01_swimming.jpg',
                    ],
                    'imgsmall' => [
                        'rooms/small/alvisse_rooms_img01.jpg',
                        'rooms/small/alvisse_rooms_img01.jpg',
                        'rooms/small/alvisse_rooms_img01.jpg',
                    ],
                ],
                2 => [
                    'description' => [
                        'block_title' => 'BEAUTY & MASSAGES',
                        'title' => 'Beauty & massages by Aquene',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'apartments/carrousel_01_appartements.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'swimming-pool/alvisse_img_02_swimming.jpg',
                    ],
                    'imgsmall' => [
                        'rooms/small/alvisse_rooms_img01.jpg',
                        'rooms/small/alvisse_rooms_img01.jpg',
                        'rooms/small/alvisse_rooms_img01.jpg',
                    ],
                ],
            ],

            'wellness_area' => [
                [
                    'description' => [
                        'block_title' => 'SPA AREA & INSIDE POOL',
                        'title' => 'Inside pool & spa area',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'apartments/carrousel_01_appartements.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'wellness-area/alvisse_img_01_wellness.jpg',
                    ],
                    'imgsmall' => [
                        'rooms/small/alvisse_rooms_img01.jpg',
                        'rooms/small/alvisse_rooms_img01.jpg',
                        'rooms/small/alvisse_rooms_img01.jpg',
                    ],
                ],

                [
                    'description' => [
                        'block_title' => 'BEAUTY & MASSAGES',
                        'title' => 'Beauty & massages by Aquene',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'apartments/carrousel_01_appartements.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'wellness-area/alvisse_img_02_wellness.jpg',
                    ],
                    'imgsmall' => [
                        'rooms/small/alvisse_rooms_img01.jpg',
                        'rooms/small/alvisse_rooms_img01.jpg',
                        'rooms/small/alvisse_rooms_img01.jpg',
                    ],
                ],
            ],
            'leisure_sports' => [
                1 => [
                    'description' => [
//                        'id' => 1,
                        'block_title' => 'LEISURE & SPORTS',
                        'title' => 'Hiking and jogging',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'apartments/carrousel_01_appartements.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'leisure-sports/alvisse_img_01_leisure_sport.jpg',
                    ],
                    'imgsmall' => [
                        'rooms/small/alvisse_rooms_img01.jpg',
                        'rooms/small/alvisse_rooms_img01.jpg',
                        'rooms/small/alvisse_rooms_img01.jpg',
                    ],
                ],
                2 => [
                    'description' => [
                        'block_title' => 'TENNIS',
                        'title' => 'Tennis',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'apartments/carrousel_01_appartements.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'leisure-sports/alvisse_img_02_leisure_sport.jpg',
                    ],
                    'imgsmall' => [
                        'rooms/small/alvisse_rooms_img01.jpg',
                        'rooms/small/alvisse_rooms_img01.jpg',
                        'rooms/small/alvisse_rooms_img01.jpg',
                    ],
                ],
                3 => [
                    'description' => [
                        'block_title' => 'GYM',
                        'title' => 'Gym',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'apartments/carrousel_01_appartements.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'leisure-sports/alvisse_img_03_leisure_sport.jpg',
                    ],
                    'imgsmall' => [
                        'rooms/small/alvisse_rooms_img01.jpg',
                        'rooms/small/alvisse_rooms_img01.jpg',
                        'rooms/small/alvisse_rooms_img01.jpg',
                    ],
                ],
                4 => [
                    'description' => [
                        'block_title' => 'GAME OF SKITTLES',
                        'title' => 'Game of skittles',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'apartments/carrousel_01_appartements.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'leisure-sports/alvisse_img_04_leisure_sport.jpg',
                    ],
                    'imgsmall' => [
                        'rooms/small/alvisse_rooms_img01.jpg',
                        'rooms/small/alvisse_rooms_img01.jpg',
                        'rooms/small/alvisse_rooms_img01.jpg',
                    ],
                ],
                5 => [
                    'description' => [
                        'block_title' => 'PING PONG',
                        'title' => 'Ping-Pong',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'apartments/carrousel_01_appartements.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'leisure-sports/alvisse_img_05_leisure_sport.jpg',
                    ],
                    'imgsmall' => [
                        'rooms/small/alvisse_rooms_img01.jpg',
                        'rooms/small/alvisse_rooms_img01.jpg',
                        'rooms/small/alvisse_rooms_img01.jpg',
                    ],
                ],
                6 => [
                    'description' => [
                        'block_title' => 'MONTAIN BIKE',
                        'title' => 'Montain Bike',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'apartments/carrousel_01_appartements.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'leisure-sports/alvisse_img_06_leisure_sport.jpg',
                    ],
                    'imgsmall' => [
                        'rooms/small/alvisse_rooms_img01.jpg',
                        'rooms/small/alvisse_rooms_img01.jpg',
                        'rooms/small/alvisse_rooms_img01.jpg',
                    ],
                ],
                7 => [
                    'description' => [
                        'block_title' => 'GOLF',
                        'title' => 'Golf & Minigolfs',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'apartments/carrousel_01_appartements.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'leisure-sports/alvisse_img_07_leisure_sport.jpg',
                    ],
                    'imgsmall' => [
                        'rooms/small/alvisse_rooms_img01.jpg',
                        'rooms/small/alvisse_rooms_img01.jpg',
                        'rooms/small/alvisse_rooms_img01.jpg',
                    ],
                ],
            ],

            /*
             * Events
             */

            //wedding
            'wedding' => [
                [
                    'description' => [
                        'block_title' => 'wedding',
                        'title' => 'your wedding, our passion',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'wedding/wedding-block1.jpg',
                    ],
                ],
            ],

            //baptism_communion reunion !
            'baptism_communion' => [
                [
                    'description' => [
                        'block_title' => 'BAPTISM & COMMUNION',
                        'title' => 'Baptism & communion',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'baptism-communion/baptism-communion-block1.jpg',
                    ],
                ],
            ],

            'birthday' => [
                [
                    'description' => [
                        'block_title' => 'Birthday',
                        'title' => 'Birthday',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'class-reunion/class-reunion-block1.jpg',
                    ],
                ],
            ],

            //class reunion !
            'class_reunion' => [
                [
                    'description' => [
                        'block_title' => 'class reunion',
                        'title' => 'Class reunions & other celebrations',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'class-reunion/class-reunion-block1.jpg',
                    ],
                ],
            ],

            //conferences !
            'conference' => [
                [
                    'description' => [
                        'block_title' => 'conferences',
                        'title' => 'your conference center in luxembourg',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'calvisse-parc-hotel.jpeg',
                    ],
                ],
            ],

            'small_size' => [
                [
                    'description' => [
                        'block_title' => 'SMALL ROOMS',
                        'title' => 'Beaufort & Clervaux',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'meeting-room/meeting-room-small-room.jpg',
                    ],
                ],
                [
                    'description' => [
                        'block_title' => 'SMALL ROOMS',
                        'title' => 'Echternach',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'meeting-room/meeting-room-small-room.jpg',
                    ],
                ],
                [
                    'description' => [
                        'block_title' => 'SMALL ROOMS',
                        'title' => 'Schengen I',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'meeting-room/meeting-room-small-room.jpg',
                    ],
                ],
            ],
            'medium_size' => [
                [
                    'description' => [
                        'block_title' => 'MEDIUM ROOMS',
                        'title' => 'Ansembourg',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'meeting-room/meeting-room-medium-room.jpg',
                    ],
                ],
                [
                    'description' => [
                        'block_title' => 'MEDIUM ROOMS',
                        'title' => 'Diekirch',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'meeting-room/meeting-room-medium-room.jpg',
                    ],
                ],
                [
                    'description' => [
                        'block_title' => 'MEDIUM ROOMS',
                        'title' => 'Fischbach',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'meeting-room/meeting-room-medium-room.jpg',
                    ],
                ],
                [
                    'description' => [
                        'block_title' => 'MEDIUM ROOMS',
                        'title' => 'Vianden and Wiltz',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'meeting-room/meeting-room-medium-room.jpg',
                    ],
                ],

                [
                    'description' => [
                        'block_title' => 'MEDIUM ROOMS',
                        'title' => 'Fischbach',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'meeting-room/meeting-room-medium-room.jpg',
                    ],
                ],

                [
                    'description' => [
                        'block_title' => 'MEDIUM ROOMS',
                        'title' => 'Schengen II',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'meeting-room/meeting-room-medium-room.jpg',
                    ],
                ],
                [
                    'description' => [
                        'block_title' => 'MEDIUM ROOMS',
                        'title' => 'Hollenfels',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'meeting-room/meeting-room-medium-room.jpg',
                    ],
                ],
            ],
            'big_size' => [
                [
                    'description' => [
                        'block_title' => 'BIG ROOMS',
                        'title' => 'Europe',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'meeting-room/meeting-room-big-room.jpg',
                    ],
                ],
            ],

            'bowling_room' => [
                [
                    'description' => [
                        'block_title' => 'BOWLING ROOM',
                        'title' => 'Bowling room',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'imgs' => [
                        'meeting-room/meeting-room-bowling-room.jpg',
                    ],
                ],
            ],
        ];

        if (array_key_exists($page, $data)) {
            if ('' != $id) {
                if (('rooms' == $page) || ('birthday' == $page) || ('apartments' == $page)) {
                    return [$data[$page][$id]];
                }

                return $data[$page][$id];
            }

            return $data[$page];
        }

        /*
         if(array_key_exists( $page, $data )){
            if($id != ''){
                //var_dump(array($data[ $page ][$id]));die();
                return ($data[ $page ][$id]);
            }
            return $data[ $page ];
        }
        */
    }
}
