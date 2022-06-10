<?php

namespace App\Helper;

/**
 * Class Datas.
 */
class Datas
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
            '404' => [
                'header' => [
                    'bg' => 'alvisse-parc-hotel2.jpeg',
                ],

                'block' => [
                    '404' => ['template' => '_404.html.twig', 'data' => Welcome::getDatas($page)],
                ],
            ],
            'accueil' => [
                'headerinfo' => [
                    'bg' => 'alvisse-parc-hotel2.jpeg',
                ],

                'block' => [
                    'welcome' => ['template' => '_welcome.html.twig', 'data' => Welcome::getDatas($page)],
                    'presentation' => ['template' => '_presentation.html.twig', 'data' => Presentation::getDatas($page)],
                    'slider' => ['template' => '_slider.html.twig', 'data' => Slider::getDatas($page)],
                    //'bigblock' => array('template' => '_big-block.html.twig', 'data' => self::getDatasBigBlock($page)),
                    /*welcome2' => array('template' => '_welcome.html.twig' , 'data' => Welcome::getDatas($page)),
                    'blokinfos' => array('template' => '_block-infos.html.twig' , 'data' => self::getDatasBlockinfos('accueil')['spa_area_pool']),
                    'blokinfos_2' => array('template' => '_block-infos.html.twig' , 'data' => self::getDatasBlockinfos('accueil')['buffets']),
                    'blokinfos2' => array('template' => '_block-infos.html.twig' , 'data' => self::getDatasBlockinfos('accueil')['our_outside_pool']),
                    'slider_gallery' => array('template' => '_slider-gallery.html.twig', 'data' => self::getDatasSliderGallery( $page ) ),
                    'breakfast' => array('template' => '_breakfast.html.twig', 'data' => array() ),
                    'logo_service' => array('template' => '_logos-service.html.twig' , 'data' => DatasLogoService::getDatas() ),*/
                ],
            ],
            'about' => [
                'headerinfo' => [
                    'bg' => 'about-header.jpg',
                    'title' => 'About us',
                ],
                'block' => [
                    'presentation' => ['template' => '_presentation.html.twig', 'data' => Presentation::getDatas($page)],
                    'gift' => ['template' => '_gift.html.twig', 'data' => Gift::getDatas($page)],
                    //'presentation2' => array('template' => '_presentation.html.twig', 'data' => Presentation::getDatasOther( $page )[0] ),
                ],
            ],

            'rooms' => [
                'headerinfo' => [
                    'bg' => 'header-rooms.jpg',
                    'title' => 'Rooms',
                    1 => [
                         'bg' => 'header_bg_confort_rooms.jpg',
                         'title' => 'The confort room',
                     ],
                    2 => [
                        'bg' => 'header_bg_superior_rooms1.jpg',
                        'title' => 'Superior Room 1',
                    ],
                    3 => [
                        'bg' => 'header_bg_superior_rooms2.jpg',
                        'title' => 'Superior Room 2',
                    ],
                    4 => [
                        'bg' => 'header_bg_superior_rooms3.jpg',
                        'title' => 'Superior Room 3',
                    ],
                ],
                'block' => [
                    'welcome' => ['template' => '_welcome.html.twig', 'data' => Welcome::getDatas($page)],
                    'logo_service' => ['template' => '_logos-service.html.twig', 'data' => DatasLogoService::getDatas()],
                   // 'presentation' => array('template' => '_presentation.html.twig', 'data' => Presentation::getDatas( $page ) ),
                    'slider_gallery' => ['template' => '_slider-gallery.html.twig', 'data' => SliderGallery::getDatas($page)],
                    'breakfast' => ['template' => '_breakfast.html.twig', 'data' => []],
                ],
                'details' => [
                    1 => [
                        'slider_gallery' => ['template' => '_slider-gallery.html.twig', 'data' => SliderGallery::getDatas($page, $id)],
                        'logo_service' => ['template' => '_logos-service.html.twig', 'data' => DatasLogoService::getDatas()],
                        'other_rooms' => ['template' => '_gallery.html.twig', 'data' => self::getDatasOtherRooms($page, $id)],
                    ],
                    2 => [
                        'slider_gallery' => ['template' => '_slider-gallery.html.twig', 'data' => SliderGallery::getDatas($page, $id)],
                        'logo_service' => ['template' => '_logos-service.html.twig', 'data' => DatasLogoService::getDatas()],
                        'other_rooms' => ['template' => '_gallery.html.twig', 'data' => self::getDatasOtherRooms($page, $id)],
                    ],
                    3 => [
                        'slider_gallery' => ['template' => '_slider-gallery.html.twig', 'data' => SliderGallery::getDatas($page, $id)],
                        'logo_service' => ['template' => '_logos-service.html.twig', 'data' => DatasLogoService::getDatas()],
                        'other_rooms' => ['template' => '_gallery.html.twig',
                        'data' => self::getDatasOtherRooms($page, $id),
                        ],
                    ],
                    4 => [
                        'slider_gallery' => ['template' => '_slider-gallery.html.twig', 'data' => SliderGallery::getDatas($page, $id)],
                        'logo_service' => ['template' => '_logos-service.html.twig', 'data' => DatasLogoService::getDatas()],
                        'other_rooms' => ['template' => '_gallery.html.twig',
                        'data' => self::getDatasOtherRooms($page, $id),
                        ],
                    ],
                ],
            ],

            'apartments' => [
                'headerinfo' => [
                    'bg' => 'header_bg_appartements.jpg',
                    'title' => 'Apartments',
                    1 => [
                        'bg' => 'header-la-villa.jpg',
                        'title' => 'La villa',
                    ],
                ],
                'block' => [
                    'welcome' => ['template' => '_welcome.html.twig', 'data' => Welcome::getDatas($page)],
                    'logo_service' => ['template' => '_logos-service.html.twig', 'data' => DatasLogoService::getDatas()],
                    'slider_gallery' => ['template' => '_slider-gallery.html.twig', 'data' => SliderGallery::getDatas($page)],
                    'contact' => ['template' => '_contact.html.twig', 'data' => Contact::getDatas($page)],
                ],
                'details' => [
                    1 => [
                        'slider_gallery' => ['template' => '_slider-gallery.html.twig', 'data' => SliderGallery::getDatas($page, $id)],
                        'logo_service' => ['template' => '_logos-service.html.twig', 'data' => DatasLogoService::getDatas()],
                        'other_rooms' => ['template' => '_gallery.html.twig', 'data' => self::getDatasOtherRooms($page, $id)],
                    ],
                    /*2 => array(
                        'slider_gallery' => array('template' => '_slider-gallery.html.twig', 'data' => SliderGallery::getDatas( $page ,$id) ),
                        //'logo_service' => array('template' => '_logos-service.html.twig' , 'data' => DatasLogoService::getDatas() ),
                        //'other_rooms' => array('template' => '_gallery.html.twig' , 'data' => self::getDatasOtherRooms( $page, $id )),
                    ),*/
                ],
            ],

            'special_offers' => [
                'headerinfo' => [
                    'bg' => 'header_bg_special_offers.jpg',
                    'title' => 'Special offers',
                ],
                'block' => [
                    'presentation' => ['template' => '_presentation.html.twig', 'data' => Presentation::getDatas($page)],
                ],
                'details' => [
                    1 => [
                        //'welcome' => array('template' => '_welcome.html.twig' , 'data' => Welcome::getDatas($page) ),

                        //'logo_service' => array('template' => '_logos-service.html.twig' , 'data' => DatasLogoService::getDatas() ),
                        /*'slider_gallery' => array('template' => '_slider-gallery.html.twig', 'data' => SliderGallery::getDatas( $page ,$id) ),*/
                        /*'presentation' => array('template' => '_presentation.html.twig', 'data' => Presentation::getDatas( $page ) ),
                        'breakfast' => array('template' => '_breakfast.html.twig', 'data' => array() ),*/
                    ],
                ],
            ],

            'restaurant' => [
                'headerinfo' => [
                    'bg' => 'alvisse_header_home.jpg',
                    'title' => 'Restaurant & bar',
                    'la_veranda' => [
                        'bg' => 'header-la-veranda.jpg',
                        'title' => '"La Veranda" Restaurant',
                    ],
                    'lounge_bar' => [
                        'bg' => 'header_bg_lounge_bar.jpg',
                        'title' => 'Lounge Bar',
                    ],
                ],
                'block' => [
                    'presentation' => ['template' => '_presentation.html.twig', 'data' => Presentation::getDatas($page)],
                ],
                'details' => [
                    'la_veranda' => [
                        'slider2' => ['template' => '_img-text-block2.html.twig', 'data' => self::getDatasSlider2($id)],
                        'breakfast' => ['template' => '_breakfast.html.twig', 'data' => []],
                        'slider_gallery' => ['template' => '_slider-gallery.html.twig', 'data' => SliderGallery::getDatas($page, $id)],
                    ],
                    'lounge_bar' => [
                        'slider_gallery' => ['template' => '_slider-gallery.html.twig', 'data' => SliderGallery::getDatas($page, $id)],
                    ],
                ],
            ],

            'gifts' => [
                'headerinfo' => [
                    'bg' => 'header_bg_gift_vouchers.jpg',
                    'title' => 'Gift Vouchers',
                ],
                'block' => [
                    'gift' => ['template' => '_gift-large.html.twig', 'data' => Gift::getDatas($page)],
                    'form' => ['template' => '_gift-reservation.html.twig', 'data' => GiftForm::getDatas($page)],
                    'contact' => ['template' => '_contact.html.twig', 'data' => Contact::getDatas($page)],
                ],
            ],

            'brochure' => [
                'headerinfo' => [
                    'bg' => 'header_bg_brochures.jpg',
                    'title' => '',
                ],
                'block' => [
                    'gallery' => ['template' => '_gallery.html.twig', 'data' => self::getDatasGallery($page)],
                ],
            ],

            'contact' => [
                'headerinfo' => [
                    'bg' => 'contact-header.jpg',
                    'title' => 'Contact',
                ],
                'block' => [
                    'contact' => ['template' => '_contact-form.html.twig', 'data' => self::getDatasFormContact($page)],
                ],
            ],

            'spa_leisure' => [
                'headerinfo' => [
                    'bg' => 'header_bg_spa_leisure.jpg',
                    'title' => 'Spa & Leisure',
                ],
                'block' => [
                    'presentation' => ['template' => '_presentation.html.twig', 'data' => Presentation::getDatas($page)],
                ],
                'details' => [
                    1 => [
                        'welcome' => ['template' => '_welcome.html.twig', 'data' => Welcome::getDatas($page)],
                        'logo_service' => ['template' => '_logos-service.html.twig', 'data' => DatasLogoService::getDatas()],
                        'slider_gallery' => ['template' => '_slider-gallery.html.twig', 'data' => SliderGallery::getDatas($page)],
                        'presentation' => ['template' => '_presentation.html.twig', 'data' => Presentation::getDatas($page)],
                        'breakfast' => ['template' => '_breakfast.html.twig', 'data' => []],
                    ],
                ],
            ],

            'packages' => [
                'headerinfo' => [
                    'bg' => 'header_bg_exclusive_packages.jpg',
                    'title' => 'Exclusive packages',
                ],

                'block' => [
                    'presentation' => ['template' => '_presentation.html.twig', 'data' => Presentation::getDatas($page)],
                ],
            ],

            'discovery_news' => [
                'headerinfo' => [
                    'bg' => 'alvisse-parc-hotel2.jpeg',
                ],

                'block' => [
                    'slider_gallery' => ['template' => '_slider-gallery.html.twig', 'data' => SliderGallery::getDatas($page)],
                ],
            ],

            'swimming_pools' => [
                'headerinfo' => [
                    'bg' => 'header_bg_swimming.jpg',
                    'title' => 'Swimming-pools',
                ],

                'block' => [
                    'slider_gallery' => ['template' => '_slider-gallery.html.twig', 'data' => SliderGallery::getDatas($page)],
                    'blokinfos' => ['template' => '_block-infos.html.twig', 'data' => self::getDatasBlockinfos('accueil')['our_outside_pool']],
                ],
            ],

            'wellness_area' => [
                'headerinfo' => [
                    'bg' => 'header_bg_wellness_area.jpg',
                    'title' => 'Wellness area',
                ],

                'block' => [
                    'slider_gallery' => ['template' => '_slider-gallery.html.twig', 'data' => [SliderGallery::getDatas('wellness_area')[0]]],
                    'blokinfos' => ['template' => '_block-infos.html.twig', 'data' => self::getDatasBlockinfos('accueil')['spa_area_pool']],
                    'slider_gallery2' => ['template' => '_slider-gallery.html.twig', 'data' => [SliderGallery::getDatas('wellness_area')[1]]],
                ],
            ],

            'leisure_sports' => [
                'headerinfo' => [
                    'bg' => 'header_bg_leisure_sport.jpg',
                    'title' => 'Leisure & sport',
                ],

                'block' => [
                    'slider_gallery' => ['template' => '_slider-gallery.html.twig', 'data' => SliderGallery::getDatas($page)],
                ],
            ],

            'bed_bike' => [
                'headerinfo' => [
                    'bg' => 'header_bg_bed_bike.jpg',
                    'title' => 'Bed & Bike',
                ],

                'block' => [
                    //'slider_gallery' => array('template' => '_slider-gallery.html.twig', 'data' => SliderGallery::getDatas( $page ) ),
                    'blokinfos' => ['template' => '_block-infos.html.twig', 'data' => self::getDatasBlockinfos('accueil')['practical_info']],
                ],
            ],

            'rallye' => [
                'headerinfo' => [
                    'bg' => 'header_bg_rallye.jpg',
                    'title' => 'Rallye',
                ],

                'block' => [
                    'presentation' => ['template' => '_presentation.html.twig', 'data' => Presentation::getDatas($page)],
                    //'blokinfos' => array('template' => '_block-infos.html.twig' , 'data' => self::getDatasBlockinfos('accueil')['lorem'])
                ],
            ],

            //events
            'events' => [
                'headerinfo' => [
                    'bg' => 'event-header.jpg',
                    'title' => 'Events',
                ],

                'block' => [
                    'presentation' => ['template' => '_presentation.html.twig', 'data' => Presentation::getDatas($page)],
                ],
            ],

            'wedding' => [
                'headerinfo' => [
                    'bg' => 'header-wedding.jpg',
                    'title' => 'wedding',
                 ],

                'block' => [
                    'slider_gallery' => ['template' => '_slider-gallery.html.twig', 'data' => SliderGallery::getDatas($page)],
                    'other_rooms' => ['template' => '_gallery.html.twig',
                        'data' => self::getDatasOtherRooms($page),
                    ],
                    'bigblock' => ['template' => '_big-block.html.twig', 'data' => self::getDatasBigBlock($page)],
                    'gift_form' => ['template' => '_contact-form.html.twig', 'data' => self::getDatasFormContact($page)],
                ],
            ],

            'baptism_communion' => [
                'headerinfo' => [
                    'bg' => 'header-baptism-communion.jpg',
                    'title' => 'Baptism & communion',
                ],

                'block' => [
                    'slider_gallery' => ['template' => '_slider-gallery.html.twig', 'data' => SliderGallery::getDatas($page)],
                    'other_rooms' => ['template' => '_gallery.html.twig',
                        'data' => self::getDatasOtherRooms($page),
                    ],
                    'bigblock' => ['template' => '_big-block.html.twig', 'data' => self::getDatasBigBlock($page)],
                    'gift_form' => ['template' => '_contact-form.html.twig', 'data' => self::getDatasFormContact($page)],
                ],
            ],

            'birthday' => [
                'headerinfo' => [
                    'bg' => 'header-birthday.jpg',
                    'title' => 'Birthday',
                ],

                'block' => [
                    'slider_gallery' => ['template' => '_slider-gallery.html.twig', 'data' => SliderGallery::getDatas($page)],
                    'other_rooms' => ['template' => '_gallery.html.twig',
                        'data' => self::getDatasOtherRooms($page),
                    ],
                    'bigblock' => ['template' => '_big-block.html.twig', 'data' => self::getDatasBigBlock($page)],
                    'gift_form' => ['template' => '_contact-form.html.twig', 'data' => self::getDatasFormContact($page)],
                ],
            ],

            'class_reunion' => [
                'headerinfo' => [
                    'bg' => 'header-class-reunion.jpg',
                    'title' => 'Class reunion',
                ],

                'block' => [
                    'slider_gallery' => ['template' => '_slider-gallery.html.twig', 'data' => SliderGallery::getDatas($page)],
                    'other_rooms' => ['template' => '_gallery.html.twig',
                    'data' => self::getDatasOtherRooms($page),
                    ],
                    'bigblock' => ['template' => '_big-block.html.twig', 'data' => self::getDatasBigBlock($page)],
                    'gift_form' => ['template' => '_contact-form.html.twig', 'data' => self::getDatasFormContact($page)],
                ],
            ],

            'conference' => [
                'headerinfo' => [
                    'bg' => 'header-conference.jpg',
                    'title' => 'Conferences',
                ],

                'block' => [
                    'slider2' => ['template' => '_img-text-block2.html.twig', 'data' => self::getDatasSlider2($page)],
                    'welcome' => ['template' => '_welcome.html.twig', 'data' => Welcome::getDatas($page)],
                    'logo_service' => ['template' => '_logos-service.html.twig', 'data' => DatasLogoService::getDatas()],

                    'other_rooms' => ['template' => '_gallery.html.twig',
                        'data' => self::getDatasOtherRooms($page),
                    ],

                    'gift_form' => ['template' => '_contact-form.html.twig', 'data' => self::getDatasFormContact($page)],
                ],
            ],

            //meeting rooms
            'meeting_room' => [
                'headerinfo' => [
                    'bg' => 'meeting-room-header.jpg',
                    'title' => 'Our reception rooms',
                ],

                'block' => [
                    'welcome' => ['template' => '_welcome.html.twig', 'data' => Welcome::getDatas($page)],
                    'logo_service' => ['template' => '_logos-service.html.twig', 'data' => DatasLogoService::getDatas('meeting_room')],
                    'presentation' => ['template' => '_presentation.html.twig', 'data' => Presentation::getDatas($page)],
                    'gift_form' => ['template' => '_contact-form.html.twig', 'data' => self::getDatasFormContact($page)],
                ],
            ],

            'small_size' => [
                'headerinfo' => [
                    'bg' => 'header-small-room.jpg',
                    'title' => 'Small rooms',
                ],

                'block' => [
                    'slider_gallery' => ['template' => '_slider-gallery.html.twig', 'data' => SliderGallery::getDatas($page)],
                    //'welcome' => array('template' => '_welcome.html.twig', 'data' => Welcome::getDatas( $page ) ),
                    /*'logo_service' => array('template' => '_logos-service.html.twig' , 'data' => DatasLogoService::getDatas( 'meeting_room' ) ),
                    'presentation' => array('template' => '_presentation.html.twig', 'data' => Presentation::getDatas( $page ) ),
                    'gift_form' => array('template' => '_contact-form.html.twig', 'data' => self::getDatasFormContact( $page ) ),*/
                ],
            ],

            'medium_size' => [
                'headerinfo' => [
                    'bg' => 'header-medium-room.jpg',
                    'title' => 'Medium rooms',
                ],

                'block' => [
                    'slider_gallery' => ['template' => '_slider-gallery.html.twig', 'data' => SliderGallery::getDatas($page)],
                    //'welcome' => array('template' => '_welcome.html.twig', 'data' => Welcome::getDatas( $page ) ),
                    /*'logo_service' => array('template' => '_logos-service.html.twig' , 'data' => DatasLogoService::getDatas( 'meeting_room' ) ),
                    'presentation' => array('template' => '_presentation.html.twig', 'data' => Presentation::getDatas( $page ) ),
                    'gift_form' => array('template' => '_contact-form.html.twig', 'data' => self::getDatasFormContact( $page ) ),*/
                ],
            ],

            'big_size' => [
                'headerinfo' => [
                    'bg' => 'header-big-room.jpg',
                    'title' => 'Big rooms',
                ],

                'block' => [
                    'slider_gallery' => ['template' => '_slider-gallery.html.twig', 'data' => SliderGallery::getDatas($page)],
                    //'welcome' => array('template' => '_welcome.html.twig', 'data' => Welcome::getDatas( $page ) ),
                    /*'logo_service' => array('template' => '_logos-service.html.twig' , 'data' => DatasLogoService::getDatas( 'meeting_room' ) ),
                    'presentation' => array('template' => '_presentation.html.twig', 'data' => Presentation::getDatas( $page ) ),
                    'gift_form' => array('template' => '_contact-form.html.twig', 'data' => self::getDatasFormContact( $page ) ),*/
                ],
            ],

            'bowling_room' => [
                'headerinfo' => [
                    'bg' => 'header-bowling-room.jpg',
                    'title' => 'Bowling room',
                ],

                'block' => [
                    'slider_gallery' => ['template' => '_slider-gallery.html.twig', 'data' => SliderGallery::getDatas($page)],
                    'blokinfos_2' => ['template' => '_block-infos.html.twig', 'data' => self::getDatasBlockinfos('accueil')['buffets']],
                    'gift_form' => ['template' => '_contact-form.html.twig', 'data' => self::getDatasFormContact($page)],
                ],
            ],
        ];

        //put this in function

        if (!isset($data[$page])) {
            header('Location: /page/404');
            exit();
        }

        if ('404' != $page) {
            $blocks = $data[$page]['block'];

            if (!empty($id)) {
                if (isset($data[$page]['details'][$id])) {
                    $data[$page]['headerinfo']['bg'] = $data[$page]['headerinfo'][$id]['bg'];
                    $data[$page]['headerinfo']['title'] = $data[$page]['headerinfo'][$id]['title'];
                    $blocks = $data[$page]['details'][$id];
                } else {
                    header('Location: /page/404');
                    exit();
                }
            } else {
                unset($data[$page]['details']);
            }

            foreach ($blocks as $key => $block) {
                $template = $block['template'];
                if (empty($block['data'])) {
                    $array[] = [
                        'template' => $template,
                        'data' => '',
                    ];
                } else {
                    foreach ($block['data'] as $dt) {
                        $array[] = [
                            'template' => $template,
                            'data' => $dt,
                        ];
                    }
                }
            }

            unset($data[$page]['block']);

            $data[$page]['block'] = $array;
        }

        //return results
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

            'wedding' => [
                [
                    'title' => 'Get your free offer',
                    'text' => 'Lorem ipsum kjhgdsjhf hjsdgjkf gkjhgsdjkhfgjhsgjkhkfsgfjgsdjfghjhsd',
                ],
            ],

            'meeting_room' => [
                [
                    'title' => 'Get your free offer',
                    'text' => 'Lorem ipsum kjhgdsjhf hjsdgjkf gkjhgsdjkhfgjhsgjkhkfsgfjgsdjfghjhsd',
                ],
            ],
            'bowling_room' => [
                [
                    'title' => 'Get your free offer',
                    'text' => 'Lorem ipsum kjhgdsjhf hjsdgjkf gkjhgsdjkhfgjhsgjkhkfsgfjgsdjfghjhsd',
                ],
            ],
            'conference' => [
                [
                    'title' => 'Get your free offer',
                    'text' => 'Lorem ipsum kjhgdsjhf hjsdgjkf gkjhgsdjkhfgjhsgjkhkfsgfjgsdjfghjhsd',
                ],
            ],
            'baptism_communion' => [
                [
                    'title' => 'Get your free offer',
                    'text' => 'Lorem ipsum kjhgdsjhf hjsdgjkf gkjhgsdjkhfgjhsgjkhkfsgfjgsdjfghjhsd',
                ],
            ],
            'birthday' => [
                [
                    'title' => 'Get your free offer',
                    'text' => 'Lorem ipsum kjhgdsjhf hjsdgjkf gkjhgsdjkhfgjhsgjkhkfsgfjgsdjfghjhsd',
                ],
            ],
            'class_reunion' => [
                [
                    'title' => 'Get your free offer',
                    'text' => 'Lorem ipsum kjhgdsjhf hjsdgjkf gkjhgsdjkhfgjhsgjkhkfsgfjgsdjfghjhsd',
                ],
            ],
        ];

        if (array_key_exists($page, $data)) {
            return $data[$page];
        }
    }

    public static function getDatasOtherRooms($page, $id = '')
    {
        $data = [
            'rooms' => [
                1 => [
                    [
                        'title' => 'Others rooms',
                        'text' => '',
                        'details' => [
                            [
                                'id' => '1',
                                'title' => 'Superior Room 1',
                                'img' => 'small/superior-room-1.jpg',
                                'slug' => 'rooms',
                            ],
                            [
                                'id' => '2',
                                'title' => 'Superior Room 2',
                                'img' => 'small/superior-room-2.jpg',
                                'slug' => 'rooms',
                            ],
                            [
                                'id' => '3',
                                'title' => 'Superior Room 3',
                                'img' => 'small/superior-room-3.jpg',
                                'slug' => 'rooms',
                            ],
                        ],
                    ],
                ],
                2 => [
                    [
                        'title' => 'Others rooms',
                        'text' => '',
                        'details' => [
                            [
                                'id' => '1',
                                'title' => 'Confort Room',
                                'img' => 'small/confort_room1.jpg',
                                'slug' => 'rooms',
                            ],
                            [
                                'id' => '2',
                                'title' => 'Superior Room 2',
                                'img' => 'small/superior-room-2.jpg',
                                'slug' => 'rooms',
                            ],
                            [
                                'id' => '3',
                                'title' => 'Superior Room 3',
                                'img' => 'small/superior-room-3.jpg',
                                'slug' => 'rooms',
                            ],
                        ],
                    ],
                ],
                3 => [
                    [
                        'title' => 'Others rooms',
                        'text' => '',
                        'details' => [
                            [
                                'id' => '1',
                                'title' => 'Confort Room',
                                'img' => 'small/confort_room1.jpg',
                                'slug' => 'rooms',
                            ],
                            [
                                'id' => '2',
                                'title' => 'Superior Room 1',
                                'img' => 'small/superior-room-1.jpg',
                                'slug' => 'rooms',
                            ],
                            [
                                'id' => '3',
                                'title' => 'Superior Room 3',
                                'img' => 'small/superior-room-3.jpg',
                                'slug' => 'rooms',
                            ],
                        ],
                    ],
                ],
                4 => [
                    [
                        'title' => 'Others rooms',
                        'text' => '',
                        'details' => [
                            [
                                'id' => '1',
                                'title' => 'Confort Room',
                                'img' => 'small/confort_room1.jpg',
                                'slug' => 'rooms',
                            ],
                            [
                                'id' => '2',
                                'title' => 'Superior Room 1',
                                'img' => 'small/superior-room-1.jpg',
                                'slug' => 'rooms',
                            ],
                            [
                                'id' => '3',
                                'title' => 'Superior Room 2',
                                'img' => 'small/superior-room-2.jpg',
                                'slug' => 'rooms',
                            ],
                        ],
                    ],
                ],
            ],

            'apartments' => [
                1 => [
                    [
                        'title' => 'Our apartments & studios',
                        'text' => '',
                        'details' => [
                            [
                                'id' => '2',
                                'title' => 'Studio hotel',
                                'img' => 'small/carrousel_01_appartements.jpg',
                                'slug' => 'apartments',
                            ],
                            [
                                'id' => '3',
                                'title' => 'Studio résidence',
                                'img' => 'small/carrousel_02_appartements.jpg',
                                'slug' => 'apartments',
                            ],
                        ],
                    ],
                ],
                2 => [
                    [
                        'title' => 'Our apartments & studios',
                        'text' => '',
                        'details' => [
                            [
                                'id' => '1',
                                'title' => 'La villa',
                                'img' => 'small/carrousel_01_appartements.jpg',
                                'slug' => 'rooms',
                            ],
                            [
                                'id' => '2',
                                'title' => 'Studio résidence',
                                'img' => 'small/carrousel_02_appartements.jpg',
                                'slug' => 'rooms',
                            ],
                        ],
                    ],
                ],
            ],
            'wedding' => [
                [
                    'block_title' => 'Rooms',
                    'title' => 'our rooms',
                    'text' => 'Lorem ipsum kdjhkldshfjshdfj hdkfljhdklshfjhdsfhkjhsd flkkjdshfkjsdfjhsdjhfkljsdl',
                    'details' => [
                        [
                            'id' => '1',
                            'img' => 'small/wedding-carousel-1.jpg',
                            'slug' => 'test',
                        ],
                        [
                            'id' => '2',
                            'img' => 'small/wedding-carousel-2.jpg',
                            'slug' => 'test',
                        ],
                        [
                            'id' => '3',
                            'img' => 'small/wedding-carousel-3.jpg',
                            'slug' => 'test',
                        ],
                        [
                            'id' => '4',
                            'img' => 'small/wedding-carousel-4.jpg',
                            'slug' => 'test',
                        ],
                    ],
                ],
            ],

            'birthday' => [
                [
                    'block_title' => 'Rooms',
                    'title' => 'our rooms',
                    'text' => 'Lorem ipsum kdjhkldshfjshdfj hdkfljhdklshfjhdsfhkjhsd flkkjdshfkjsdfjhsdjhfkljsdl',
                    'details' => [
                        [
                            'id' => '1',
                            'title' => 'Wiltz/Vianden',
                            'img' => 'small/wedding-carousel-1.jpg',
                            'slug' => 'test',
                        ],
                        [
                            'id' => '2',
                            'title' => 'Fischbach & Echternach',
                            'img' => 'small/wedding-carousel-2.jpg',
                            'slug' => 'test',
                        ],
                        [
                            'id' => '3',
                            'title' => 'Hollenfels',
                            'img' => 'small/wedding-carousel-3.jpg',
                            'slug' => 'test',
                        ],
                        [
                            'id' => '4',
                            'title' => 'Schengen',
                            'img' => 'small/wedding-carousel-4.jpg',
                            'slug' => 'test',
                        ],
                    ],
                ],
            ],
            'baptism_communion' => [
                [
                    'block_title' => 'Rooms',
                    'title' => 'our rooms',
                    'text' => 'Lorem ipsum kdjhkldshfjshdfj hdkfljhdklshfjhdsfhkjhsd flkkjdshfkjsdfjhsdjhfkljsdl',
                    'details' => [
                        [
                            'id' => '1',
                            'title' => 'Wiltz/Vianden',
                            'img' => 'small/wedding-carousel-1.jpg',
                            'slug' => 'test',
                        ],
                        [
                            'id' => '2',
                            'title' => 'Fischbach & Echternach',
                            'img' => 'small/wedding-carousel-2.jpg',
                            'slug' => 'test',
                        ],
                        [
                            'id' => '3',
                            'title' => 'Hollenfels',
                            'img' => 'small/wedding-carousel-3.jpg',
                            'slug' => 'test',
                        ],
                        [
                            'id' => '4',
                            'title' => 'Schengen',
                            'img' => 'small/wedding-carousel-4.jpg',
                            'slug' => 'test',
                        ],
                    ],
                ],
            ],

            'class_reunion' => [
                [
                    'block_title' => 'Rooms',
                    'title' => 'our rooms',
                    'text' => 'Lorem ipsum kdjhkldshfjshdfj hdkfljhdklshfjhdsfhkjhsd flkkjdshfkjsdfjhsdjhfkljsdl',
                    'details' => [
                        [
                            'id' => '1',
                            'title' => 'Wiltz/Vianden',
                            'img' => 'small/wedding-carousel-1.jpg',
                            'slug' => 'test',
                        ],
                        [
                            'id' => '2',
                            'title' => 'Fischbach & Echternach',
                            'img' => 'small/wedding-carousel-2.jpg',
                            'slug' => 'test',
                        ],
                        [
                            'id' => '3',
                            'title' => 'Hollenfels',
                            'img' => 'small/wedding-carousel-3.jpg',
                            'slug' => 'test',
                        ],
                        [
                            'id' => '4',
                            'title' => 'Schengen',
                            'img' => 'small/wedding-carousel-4.jpg',
                            'slug' => 'test',
                        ],
                    ],
                ],
            ],

            'conference' => [
                [
                    'block_title' => 'Rooms',
                    'title' => 'our rooms',
                    'text' => 'Lorem ipsum kdjhkldshfjshdfj hdkfljhdklshfjhdsfhkjhsd flkkjdshfkjsdfjhsdjhfkljsdl',
                    'details' => [
                        [
                            'title' => 'Small rooms',
                            'img' => 'small/wedding-carousel-1.jpg',
                            'slug' => 'small-size',
                        ],
                        [
                            'title' => 'Medium rooms',
                            'img' => 'small/wedding-carousel-2.jpg',
                            'slug' => 'medium-size',
                        ],
                        [
                            'title' => 'Big rooms',
                            'img' => 'small/wedding-carousel-3.jpg',
                            'slug' => 'big-size',
                        ],
                        [
                            'title' => 'Bowling room',
                            'img' => 'small/wedding-carousel-4.jpg',
                            'slug' => 'bowling-room',
                        ],
                    ],
                ],
            ],
        ];

        if (array_key_exists($page, $data)) {
            if (isset($data[$page][$id])) {
                return $data[$page][$id];
            }

            return $data[$page];
        }
    }

    /**
     * GALLERY.
     *
     * @param $page
     *
     * @return mixed
     */
    public static function getDatasGallery($page)
    {
        $data = [
            'brochure' => [
                [
                    'title' => 'Hotel brochure',
                    'text' => "Voici une sélection de brochures et depliant de l'hôtel, cliquez sur les liens",
                    'details' => [
                        [
                            'title' => 'Hotel brochure',
                            'img' => 'alvisse_img_01_brochures.jpg',
                            'slug' => 'apartments',
                        ],
                        [
                            'title' => 'Guest info',
                            'img' => 'alvisse_img_02_brochures.jpg',
                            'slug' => 'apartments',
                        ],
                        [
                            'title' => 'Room service',
                            'img' => 'alvisse_img_03_brochures.jpg',
                            'slug' => 'apartments',
                        ],
                        [
                            'title' => 'Eco charte',
                            'img' => 'alvisse_img_04_brochures.jpg',
                            'slug' => 'apartments',
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
     * BLOCK INFOS.
     *
     * @param $page
     *
     * @return mixed
     */
    public static function getDatasBlockInfos($page)
    {
        $data = [
            'accueil' => [
                'spa_area_pool' => [
                    [
                        'title' => '<span class="bloc-infps-span-title">Prices</span> inside pool & spa area',
                        'details' => [
                            [
                                'title' => 'ADULT',
                                'price_per_day' => 'DAY 24 <i class="fa fa-eur" aria-hidden="true"></i>',
                                'other_price' => [
                                    'month 69 <i class="fa fa-eur" aria-hidden="true"></i>',
                                    '3 month 188 <i class="fa fa-eur" aria-hidden="true"></i>',
                                    '6 month 353 <i class="fa fa-eur" aria-hidden="true"></i>',
                                    'YEAR 620 <i class="fa fa-eur" aria-hidden="true"></i>',
                                ],
                            ],
                            [
                                'title' => 'KIDS',
                                'price_per_day' => 'DAY 24 <i class="fa fa-eur" aria-hidden="true"></i>',
                                'other_price' => [
                                    'month 69 <i class="fa fa-eur" aria-hidden="true"></i>',
                                    '3 month 188 <i class="fa fa-eur" aria-hidden="true"></i>',
                                    '6 month 353 <i class="fa fa-eur" aria-hidden="true"></i>',
                                    'YEAR 620 <i class="fa fa-eur" aria-hidden="true"></i>',
                                ],
                            ],

                            [
                                'title' => 'TOWEL RENTAL',
                                'price_per_day' => '3 <i class="fa fa-eur" aria-hidden="true"></i>',
                            ],
                            [
                                'title' => 'BATHROBE RENTAL',
                                'price_per_day' => '6 <i class="fa fa-eur" aria-hidden="true"></i>',
                            ],

                            [
                                'title' => 'COCHING ON DEMAND',
                                'price_per_day' => '6 <i class="fa fa-eur" aria-hidden="true"></i>',
                            ],
                        ],
                    ],
                ],
                'our_outside_pool' => [
                            [
                                'title' => '<span class="bloc-infps-span-title" >Prices</span> inside pool & spa area',
                                'details' => [
                                    [
                                        'title' => 'ADULT',
                                        'price_per_day' => 'DAY 6 <i class="fa fa-eur" aria-hidden="true"></i>',
                                    ],
                                    [
                                        'title' => 'KIDS',
                                        'price_per_day' => 'DAY 3 <i class="fa fa-eur" aria-hidden="true"></i>',
                                    ],
                                ],
                            ],
                     ],
                'buffets' => [
                        [
                            'title' => '<span class="bloc-infps-span-title">Buffets</span> (starting 20 guests)',
                            'details' => [
                                [
                                    'title' => 'Buffet 1',
                                    'price_per_day' => '35 <i class="fa fa-eur" aria-hidden="true"></i>',
                                    'description' => 'Delicatessen meat , gouda in slices, green sakad, fired potatoes with bacon, bread rolls',
                                ],
                                [
                                    'title' => 'Buffet 2',
                                    'price_per_day' => '35 <i class="fa fa-eur" aria-hidden="true"></i>',
                                    'description' => 'Delicatessen meat , gouda in slices, green sakad, fired potatoes with bacon, bread rolls',
                                ],
                                [
                                    'title' => 'Buffet 3',
                                    'price_per_day' => '35 <i class="fa fa-eur" aria-hidden="true"></i>',
                                    'description' => 'Delicatessen meat , gouda in slices, green sakad, fired potatoes with bacon, bread rolls',
                                ],
                        ],
                    ],
                ],

                'practical_info' => [
                        [
                            'title' => '<span class="bloc-infps-span-title">Practical information</span>',
                            'details' => [
                                [
                                    'title' => 'RESERVATION DE TOURS GUIDÉS',
                                    'price_per_day' => '<span class="company">VELOSOPHIE S.A.R.L</span> <span class="phonenumber">TEL.: +352 621 458 525,</span> <span class="website">VELOSOPHIE.LU</span>',
                                ],
                                [
                                    'title' => 'GUIDE VÉLO',
                                    'price_per_day' => '<span class="company">BIKETOURS A.S.B.L</span> <span class="phonenumber">TEL.: +352 621 302 930,</span> <span class="website">BIKETOURS.LU</span>',
                                ],
                                [
                                    'title' => 'HÔPITAL',
                                    'price_per_day' => '<span class="company">CLINIQUE D\'EICH</span> <span class="phonenumber">TEL.: +352 44 11 12,</span> <span class="website">CHL.LU</span>',
                                ],
                                [
                                    'title' => 'PHARMACIE',
                                    'price_per_day' => '<span class="address1"> 5, PLACE DARGENT,</span> <span class="address2">L-1413 LUXEMBOURG</span> <span class="phonenumber">TEL.: +352 43 16 09</span>',
                                ],
                                [
                                    'title' => 'BANQUE',
                                    'price_per_day' => '<span class="company">DEXIA BANQUE</span> <span class="address1"> 76, RUE D\'EICH,</span> <span class="address2">L-1460 LUXEMBOURG</span> <span class="phonenumber"> TEL.: +352 24 59 94 02</span>',
                                ],
                            ],
                        ],
                    ],
                ],

                'lorem' => [
                        [
                            'title' => '<span class="bloc-infps-span-title">Lorem ipsum</span>',
                            'details' => [
                                [
                                    'title' => 'LOREM IPSUM',
                                    'price_per_day' => 'LOREM IPSUM',
                                ],
                                [
                                    'title' => 'LOREM IPSUM',
                                    'price_per_day' => 'LOREM IPSUM',
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
     * BIG BLOCK.
     *
     * @param $page
     *
     * @return mixed
     */
    public static function getDatasBigBlock($page)
    {
        $data = [
            'accueil' => [
                [
                    'big_block_title' => 'LAVERANDA big block',
                    'description' => [
                        'title' => 'Alvisse Parc Hotel 4* welcomes you in the heart of Luxembourg',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg big block',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],

                [
                    'description' => [
                        'title' => 'Alvisse Parc Hotel 4* welcomes you in the heart of Luxembourg',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],

                [
                    'description' => [
                        'title' => 'Alvisse Parc Hotel 4* welcomes you in the heart of Luxembourg',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'alvisse-parc-hotel.jpeg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'footer' => [
                        [
                            'img' => 'icon_equiped_02_office.svg',
                            'title' => 'HONEY MOON ROOM IS FREE',
                            'text' => 'Has your honney Moon,wea are pleased to offer you a roome in the \'Supervisor\' category ',
                        ],
                        [
                            'img' => 'icon_equiped_02_office.svg',
                            'title' => 'OFFICE',
                            'button' => 'View',
                        ],
                    ],
                ],
            ],

            'wedding' => [
                [
                    'big_block_title' => 'Menu & beverages',
                    'description' => [
                        'title' => 'Your aperitif',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'wedding-block2-1.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],

                [
                    'description' => [
                        'title' => 'Your menu or buffet',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'wedding-block2-2.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],

                [
                    'description' => [
                        'title' => 'Your beverage',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'wedding-block2-3.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'footer' => [
                        [
                            'img' => 'icon_equiped_02_office.svg',
                            'title' => 'HONEY MOON ROOM IS FREE',
                            'text' => 'Has your honney Moon,wea are pleased to offer you a roome in the \'Supervisor\' category ',
                        ],
                        [
                            'img' => 'icon_equiped_02_office.svg',
                            'title' => 'price examples',
                            'button' => 'View',
                        ],
                    ],
                ],
            ],

            'birthday' => [
                [
                    'big_block_title' => 'Menu & beverages',
                    'description' => [
                        'title' => 'Your aperitif',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'wedding-block2-1.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],

                [
                    'description' => [
                        'title' => 'Your menu or buffet',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'wedding-block2-2.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],

                [
                    'description' => [
                        'title' => 'Your beverage',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'wedding-block2-3.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'footer' => [
                        [
                            'img' => 'icon_equiped_02_office.svg',
                            'title' => 'price examples',
                            'button' => 'View',
                        ],
                    ],
                ],
            ],

            'baptism_communion' => [
                [
                    'big_block_title' => 'Menu & beverages',
                    'description' => [
                        'title' => 'Your aperitif',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'wedding-block2-1.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],

                [
                    'description' => [
                        'title' => 'Your menu or buffet',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'wedding-block2-2.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],

                [
                    'description' => [
                        'title' => 'Your beverage',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'wedding-block2-3.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'footer' => [
                        [
                            'img' => 'icon_equiped_02_office.svg',
                            'title' => 'price examples',
                            'button' => 'View',
                        ],
                    ],
                ],
            ],

            'class_reunion' => [
                [
                    'big_block_title' => 'Menu & beverages',
                    'description' => [
                        'title' => 'Your aperitif',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'wedding-block2-1.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],

                [
                    'description' => [
                        'title' => 'Your menu or buffet',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'wedding-block2-2.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                ],

                [
                    'description' => [
                        'title' => 'Your beverage',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'bg_img' => 'wedding-block2-3.jpg',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'footer' => [
                        [
                            'img' => 'icon_equiped_02_office.svg',
                            'title' => 'price examples',
                            'button' => 'View',
                        ],
                    ],
                ],
            ],
        ];

        if (array_key_exists($page, $data)) {
            return $data[$page];
        }
    }

    public static function getDatasSlider2($page)
    {
        $data = [
            'conference' => [
                [
                    'description' => [
                        'block_title' => 'OUR RECeption rooms',
                        'title' => 'Small rooms',
                        'sub_title' => '10 - 70 guests',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition
                         et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'details' => [
                        [
                            'title' => 'Coffee breaks',
                            'img' => 'conference-carousel1-1.jpg',
                            'slug' => 'test',
                        ],
                        [
                            'title' => 'Meeting package',
                            'img' => 'conference-carousel1-2.jpg',
                            'slug' => 'test',
                        ],
                        [
                            'title' => 'Catering',
                            'img' => 'conference-carousel1-3.jpg',
                            'slug' => 'test',
                        ],
                    ],
                ],
            ],

            'la_veranda' => [
                [
                    'description' => [
                        'block_title' => '',
                        'title' => '"La Véranda" our establishment\'s gourmet restaurant',
                        'sub_title' => '10 - 70 guests',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition
                         et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                    ],
                    'details' => [
                        [
                            'title' => 'A la carte',
                            'img' => 'alvisse_img_01_veranda.jpg',
                            'slug' => 'apartments',
                        ],
                        [
                            'title' => 'Room service',
                            'img' => 'alvisse_img_02_veranda.jpg',
                            'slug' => 'apartments',
                        ],
                        [
                            'title' => 'Vegetarian dishes',
                            'img' => 'alvisse_img_03_veranda.jpg',
                            'slug' => 'apartments',
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
     * GRT LOGO SERVICE.
     *
     * @param $context
     *
     * @return array
     */
    public static function getDatasLogoService()
    {
    }
}
