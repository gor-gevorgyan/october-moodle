<?php

return [
    'plugin' => [
        'name' => 'Blog',
        'description' => 'Robustna platforma za bloganje.',
    ],
    'blog' => [
        'menu_label' => 'Blog',
        'menu_description' => 'Upravljanje bloga',
        'courses' => 'Objave',
        'create_course' => 'Blog objava',
        'categories' => 'Kategorije',
        'create_category' => 'Blog kategorija',
        'tab' => 'Blog',
        'access_courses' => 'Upravljanje blog objav',
        'access_categories' => 'Upravljanje blog kategorij',
        'access_other_courses' => 'Upravljanje objav drugih uporabnikov',
        'access_import_export' => 'Dovoljenje za uvoz in izvoz objav',
        'access_publish' => 'Dovoljenje za objavljanje objav',
        'manage_settings' => 'Urejanje nastavitev bloga',
        'delete_confirm' => 'Ali ste prepričani?',
        'chart_published' => 'Objavljeno',
        'chart_drafts' => 'Osnutki',
        'chart_total' => 'Skupaj',
        'settings_description' => 'Urejanje nastavitev bloga',
        'show_all_courses_label' => 'Administratorjem prikaži vse objave',
        'show_all_courses_comment' => 'Na spletni strani prikaži administratorjem vse objavljene in neobjavljene objave.',
        'tab_general' => 'Splošno',
    ],
    'courses' => [
        'list_title' => 'Urejanje blog objav',
        'filter_category' => 'Kategorija',
        'filter_published' => 'Objavljeno',
        'filter_date' => 'Datum',
        'new_course' => 'Nova objava',
        'export_course' => 'Izvoz objav',
        'import_course' => 'Uvoz objav',
    ],
    'course' => [
        'title' => 'Naslov',
        'title_placeholder' => 'Naslov nove objave',
        'content' => 'Vsebina',
        'content_html' => 'HTML vsebina',
        'slug' => 'Povezava',
        'slug_placeholder' => 'povezava-nove-objave',
        'categories' => 'Kategorije',
        'author_email' => 'E-pošta avtorja',
        'created' => 'Ustvarjeno',
        'created_date' => 'Ustvarjeno dne',
        'updated' => 'Posodobljeno',
        'updated_date' => 'Posodobljeno dne',
        'published' => 'Objavljeno',
        'published_by' => 'Objavil',
        'current_user' => 'Trenutni uporabnik',
        'published_date' => 'Datum objave',
        'published_validation' => 'Prosimo, podajte datum objave',
        'tab_edit' => 'Upravljanje',
        'tab_categories' => 'Kategorije',
        'categories_comment' => 'Izberite kategorije, v katere spada objava',
        'categories_placeholder' => 'Ni najdenih kategorij, ustvarite vsaj eno kategorijo!',
        'tab_manage' => 'Urejanje',
        'published_on' => 'Datum objave',
        'excerpt' => 'Izvleček',
        'summary' => 'Povzetek',
        'featured_images' => 'Uporabljene slike',
        'delete_confirm' => 'Želite izbrisati to objavo?',
        'delete_success' => 'Te objave so bile uspešno izbrisane.',
        'close_confirm' => 'Ta objava ni shranjena.',
        'return_to_courses' => 'Vrnite se na seznam objav',
    ],
    'categories' => [
        'list_title' => 'Upravljanje blog kategorij',
        'new_category' => 'Nova kategorija',
        'uncategorized' => 'Nekategorizirano',
    ],
    'category' => [
        'name' => 'Naslov',
        'name_placeholder' => 'Naslov nove kategorije',
        'description' => 'Opis',
        'slug' => 'Povezava',
        'slug_placeholder' => 'povezava-nove-kategorije',
        'courses' => 'Objave',
        'delete_confirm' => 'Želite izbrisati to kategorijo?',
        'delete_success' => 'Te kategorije so bile uspešno izbrisane.',
        'return_to_categories' => 'Vrnite se na seznam blog kategorij',
        'reorder' => 'Spremenite vrstni red kategorij',
    ],
    'menuitem' => [
        'blog_category' => 'Blog kategorija',
        'all_blog_categories' => 'Vse blog kategorije',
        'blog_course' => 'Blog objava',
        'all_blog_courses' => 'Vse blog objave',
        'category_blog_courses' => 'Objave v kategoriji',
    ],
    'settings' => [
        'category_title' => 'Seznam kategorij',
        'category_description' => 'Prikaži seznam blog kategorij na strani.',
        'category_slug' => 'Povezava kategorije',
        'category_slug_description' => 'Omogoča pregled blog kategorije na podani povezavi. Ta lastnost je uporabljena v privzeti predlogi komponente za označevanje trenutno aktivne kategorije.',
        'category_display_empty' => 'Prikaži prazne kategorije',
        'category_display_empty_description' => 'Prikaže kategorije brez objav.',
        'category_page' => 'Stran s kategorijo',
        'category_page_description' => 'Naslov strani blog kategorij za ustvarjanje povezav. Ta lastnost je uporabljena v privzeti predlogi komponente.',
        'course_title' => 'Objava',
        'course_description' => 'Prikaži blog objavo na strani.',
        'course_slug' => 'Povezava objave',
        'course_slug_description' => "Omogoča pregled blog objave na podani povezavi.",
        'course_category' => 'Stran s kategorijo',
        'course_category_description' => 'Naslov strani blog kategorije za ustvarjanje povezav. Ta lastnost je uporabljena v privzeti predlogi komponente.',
        'courses_title' => 'Seznam objav',
        'courses_description' => 'Prikaži seznam najnovejših blog objav na strani.',
        'courses_pagination' => 'Številka strani',
        'courses_pagination_description' => 'Ta vrednost se uporablja za določitev, na kateri strani se nahaja uporabnik.',
        'courses_filter' => 'Filter kategorij',
        'courses_filter_description' => 'Vnesite povezavo kategorije ali URL parameter za filtriranje objav. Pustite prazno za prikaz vseh objav.',
        'courses_per_page' => 'Število objav na strani',
        'courses_per_page_validation' => 'Neveljaven format števila objav na strani',
        'courses_no_courses' => 'Sporočilo brez objav',
        'courses_no_courses_description' => 'Sporočilo, ki se prikaže na seznamu blog objav, če ni nobenih objav. Ta lastnost je uporabljena v privzeti predlogi komponente.',
        'courses_no_courses_default' => 'Ni najdenih objav',
        'courses_order' => 'Vrstni red objav',
        'courses_order_description' => 'Lastnost, glede na katero naj bodo razvrščene objave',
        'courses_category' => 'Stran s kategorijo',
        'courses_category_description' => 'Naslov strani blog kategorije za povezave "Objavljeno v". Ta lastnost je uporabljena v privzeti predlogi komponente.',
        'courses_course' => 'Stran z objavo',
        'courses_course_description' => 'Naslov strani blog objave za povezave "Preberi več". Ta lastnost je uporabljena v privzeti predlogi komponente.',
        'courses_except_course' => 'Izvzete objave',
        'courses_except_course_description' => 'Vnesite ID/URL objave ali spremenljivko z ID-jem/URL-jem objave, ki jo želite izvzeti. Za določitev večjega števila objav lahko uporabite seznam, ločen z vejicami.',
        'courses_except_course_validation' => 'Izvzete objave morajo biti posamezna povezava ali ID objave ali pa seznam povezav oz. ID-jev objav, ločen z vejicami.',
        'courses_except_categories' => 'Izvzete kategorije',
        'courses_except_categories_description' => 'Vnesite seznam povezav kategorij, ločen z vejicami ali pa spremenljivko, ki vključuje takšen seznam kategorij, ki jih želite izvzeti.',
        'courses_except_categories_validation' => 'Izvzete kategorije morajo biti posamezna povezava kategorije ali pa seznam povezav kategorij, ločen z vejicami.',
        'rssfeed_blog' => 'Stran z blogom',
        'rssfeed_blog_description' => 'Naslov glavne strani bloga za ustvarjanje povezav. Ta lastnost je uporabljena v privzeti predlogi komponente.',
        'rssfeed_title' => 'RSS vir',
        'rssfeed_description' => 'Ustvari vir RSS, ki vsebuje objave iz bloga.',
        'group_links' => 'Povezave',
        'group_exceptions' => 'Izjeme',
    ],
    'sorting' => [
        'title_asc' => 'Naslov (naraščajoče)',
        'title_desc' => 'Naslov (padajoče)',
        'created_asc' => 'Ustvarjeno (naraščajoče)',
        'created_desc' => 'Ustvarjeno (padajoče)',
        'updated_asc' => 'Posodobljeno (naraščajoče)',
        'updated_desc' => 'Posodobljeno (padajoče)',
        'published_asc' => 'Objavljeno (naraščajoče)',
        'published_desc' => 'Objavljeno (padajoče)',
        'random' => 'Naključno',
    ],
    'import' => [
        'update_existing_label' => 'Posodobi obstoječe objave',
        'update_existing_comment' => 'Označite kvadratek, če želite posodobiti objave, ki imajo popolnoma enak ID, naslov ali povezavo.',
        'auto_create_categories_label' => 'Ustvari kategorije, določene v uvozni datoteki',
        'auto_create_categories_comment' => "Za uporabo te možnosti morate ali povezati stolpec 'Kategorije' ali pa označiti privzete kategorije za uporabo iz spodnjega seznama.",
        'categories_label' => 'Kategorije',
        'categories_comment' => 'Izberite kategorije, na katere bodo povezavne uvožene objave (neobvezno).',
        'default_author_label' => 'Privzeti avtor objave (neobvezno)',
        'default_author_comment' => "Uvoz bo poskusil uporabiti obstoječega avtorja, če povežete stolpec 'E-pošta avtorja', sicer se bo uporabil zgoraj navedeni avtor.",
        'default_author_placeholder' => '-- izberite avtorja --',
    ],
];
