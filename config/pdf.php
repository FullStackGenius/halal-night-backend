<?php

return [
    'mode'                     => '',
    'format'                   => 'A4',
    'orientation'              => 'P',
    'title'                    => 'Laravel mPDF',
    'subject'                  => '',
    'author'                   => '',
    'watermark'                => '',
    'show_watermark'           => false,
    'show_watermark_image'     => false,

    // <<< Use storage_path('fonts') if your fonts are in storage/fonts
    'custom_font_dir' => storage_path('fonts'),

    'custom_font_data' => [
        // family name => mapping of styles to files
        'poppins' => [
            'R'  => 'Poppins-Regular.ttf',
            'M'  => 'Poppins-Medium.ttf',
            'SB' => 'Poppins-SemiBold.ttf',
            'B'  => 'Poppins-Bold.ttf',
        ],
        'scheherazade' => [
            'R' => 'ScheherazadeNew-Regular.ttf',
            'B' => 'ScheherazadeNew-Bold.ttf',
        ],
        'notonaskh' => [
            'R' => 'NotoNaskhArabic-Regular.ttf',
        ],
         'amiri' => [
        'R'  => 'Amiri-Regular.ttf',
        'B'  => 'Amiri-Bold.ttf',
        'I'  => 'Amiri-Italic.ttf',
        'BI' => 'Amiri-BoldItalic.ttf',
    ],
     'notosansarabic' => [
        'R' => 'NotoSansArabic-Regular.ttf',
    ],
    ],

    'default_font' => 'scheherazade',

    'display_mode'             => 'fullpage',
    'watermark_text_alpha'     => 0.1,
    'watermark_image_path'     => '',
    'watermark_image_alpha'    => 0.2,
    'watermark_image_size'     => 'D',
    'watermark_image_position' => 'P',

    // temp dir for mPDF
    'temp_dir'                 => storage_path('app'),
    'auto_language_detection'  => true,
    'pdfa'                     => false,
    'pdfaauto'                 => false,
    'use_active_forms'         => false,
];
