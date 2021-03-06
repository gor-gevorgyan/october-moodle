<?php

return [
    'plugin' => [
        'name' => 'Blogi',
        'description' => 'Vankka bloggausalusta.'
    ],
    'blog' => [
        'menu_label' => 'Blogi',
        'menu_description' => 'Hallitse blogicourseauksia',
        'courses' => 'Courseaukset',
        'create_course' => 'Blogicourseaus',
        'categories' => 'Categories',
        'create_category' => 'Blogikategoria',
        'tab' => 'Blogi',
        'access_courses' => 'Hallitse courseauksia',
        'access_categories' => 'Hallitse kategorioita',
        'access_other_courses' => 'Hallitse muiden käyttäjien courseauksia',
        'access_import_export' => 'Saa tuoda ja viedä courseauksia',
        'access_publish' => 'Saa julkaista courseauksia',
        'delete_confirm' => 'Olteko varma?',
        'chart_published' => 'Julkaistu',
        'chart_drafts' => 'Luonnokset',
        'chart_total' => 'Yhteensä'
    ],
    'courses' => [
        'list_title' => 'Hallitse blogicourseauksia',
        'filter_category' => 'Kategoria',
        'filter_published' => 'Julkaistu',
        'filter_date' => 'Päivämäärä',
        'new_course' => 'Uusi courseaus',
        'export_course' => 'Vie courseaukset',
        'import_course' => 'Tuo courseauksia'
    ],
    'course' => [
        'title' => 'Otsikko',
        'title_placeholder' => 'Uuden courseauksen otsikko',
        'content' => 'Sisältö',
        'content_html' => 'HTML Sisältö',
        'slug' => 'Slugi',
        'slug_placeholder' => 'uuden-courseaukse-slugi',
        'categories' => 'Kategoriat',
        'author_email' => 'Tekijän sähköcoursei',
        'created' => 'Luotu',
        'created_date' => 'Luomispäivämäärä',
        'updated' => 'Muokattu',
        'updated_date' => 'Muokkauspäivämäärä',
        'published' => 'Julkaistu',
        'published_date' => 'Julkaisupäivämäärä',
        'published_validation' => 'Määrittele julkaisupäivämäärä',
        'tab_edit' => 'Muokkaa',
        'tab_categories' => 'Kategoriat',
        'categories_comment' => 'Valitse kategoriat joihin courseaus kuuluu',
        'categories_placeholder' => 'Kategorioita ei ole, sinun pitäisi luoda ensimmäinen ensin!',
        'tab_manage' => 'Hallitse',
        'published_on' => 'Julkaistu',
        'excerpt' => 'Poiminto',
        'summary' => 'Yhteenveto',
        'featured_images' => 'Esittelykuvat',
        'delete_confirm' => 'Poista tämä courseaus?',
        'close_confirm' => 'Tämä courseaus ei ole tallennettu.',
        'return_to_courses' => 'Palaa courseauslistaan'
    ],
    'categories' => [
        'list_title' => 'Hallitse blogikategorioita',
        'new_category' => 'Uusi kategoria',
        'uncategorized' => 'Luokittelematon'
    ],
    'category' => [
        'name' => 'Nimi',
        'name_placeholder' => 'Uuden kategorian nimi',
        'description' => 'Kuvaus',
        'slug' => 'Slugi',
        'slug_placeholder' => 'uuden-kategorian-slugi',
        'courses' => 'Julkaisuja',
        'delete_confirm' => 'Poista tämä kategoria?',
        'return_to_categories' => 'Palaa blogikategorialistaan',
        'reorder' => 'Järjestä kategoriat uudelleen'
    ],
    'menuitem' => [
        'blog_category' => 'Blogikategoria',
        'all_blog_categories' => 'Kaikki blogikategoriat',
        'blog_course' => 'Blogicourseaukset',
        'all_blog_courses' => 'Kaikki blogicourseaukset'
    ],
    'settings' => [
        'category_title' => 'Kategorialista',
        'category_description' => 'Näyttää listan blogikategorioista sivulla.',
        'category_slug' => 'Kategorian slugi',
        'category_slug_description' => 'Etsii blogikategorian käyttämällä annettua slugi-arvoa. Komponentti käyttää tätä merkitsemään aktiivisen kategorian.',
        'category_display_empty' => 'Näytä tyhjät kategoriat',
        'category_display_empty_description' => 'Näytä kategoriat joilla ei ole yhtään courseauksia.',
        'category_page' => 'Kategoriasivu',
        'category_page_description' => 'Kategorialistaussivun tiedostonimi. Oletuskomponenttiosa käyttää tätä ominaisuutta.',
        'course_title' => 'Courseaus',
        'course_description' => 'Näyttää blogicourseauksen sivulla.',
        'course_slug' => 'Courseauksen slugi',
        'course_slug_description' => 'Etsii blogicourseauksen käyttämällä annettua slugi-arvoa.',
        'course_category' => 'Kategoriasivu',
        'course_category_description' => 'Kategorialistaussivun tiedostonimi. Oletuskomponenttiosa käyttää tätä ominaisuutta.',
        'courses_title' => 'Lista courseauksista',
        'courses_description' => 'Näyttää listan uusimmista blogicourseauksista sivulla.',
        'courses_pagination' => 'Sivunumero',
        'courses_pagination_description' => 'Tätä arvoa käytetään määrittämään millä sivulla käyttäjä on.',
        'courses_filter' => 'Kategoriasuodatin',
        'courses_filter_description' => 'Lisää kategorian slugi tai URL parametri, jolla suodattaa courseauksia. Jätä tyhjäksi näyttääksesi kaikki courseaukset.',
        'courses_per_page' => 'Courseauksia per sivu',
        'courses_per_page_validation' => 'Courseauksia per sivu -kohta sisältää kelvottoman arvon',
        'courses_no_courses' => 'Ei julkaisuja -viesti',
        'courses_no_courses_description' => 'Viesti, joka näytetään silloin kun courseauksia ei ole. Oletuskomponenttiosa käyttää tätä ominaisuutta.',
        'courses_order' => 'Courseauksien järjestys',
        'courses_order_description' => 'Attribuutti, jonka mukaan courseaukset tulisi järjestää',
        'courses_category' => 'Kategoriasivu',
        'courses_category_description' => 'Kategoriasivun tiedosto "Julkaistu kohteeseen" kategorialinkkejä varten. Oletuskomponenttiosa käyttää tätä ominaisuutta.',
        'courses_course' => 'Courseaussivu',
        'courses_course_description' => 'Blogisivun tiedostonimi "Lue lisää" linkkejä varten. Oletuskomponenttiosa käyttää tätä ominaisuutta.',
        'courses_except_course' => 'Poissulje courseauksia',
        'courses_except_course_description' => 'Lisää courseauksen ID/URL tai muuttuja, jonka haluat poissulkea',
        'rssfeed_blog' => 'Blogisivu',
        'rssfeed_blog_description' => 'Blogisivun tiedostonimi linkkien generointia varten. Oletuskomponenttiosa käyttää tätä ominaisuutta.',
        'rssfeed_title' => 'RSS syöte',
        'rssfeed_description' => 'Generoi RSS syötteen sisältäen courseaukset blogista.'
    ]
];
