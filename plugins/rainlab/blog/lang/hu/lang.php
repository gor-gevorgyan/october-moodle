<?php

return [
    'plugin' => [
        'name' => 'Blog',
        'description' => 'Teljeskörű blog alkalmazás.'
    ],
    'blog' => [
        'menu_label' => 'Blog',
        'menu_description' => 'Blog bejegyzések kezelése',
        'courses' => 'Bejegyzések',
        'create_course' => 'blog bejegyzés',
        'categories' => 'Kategóriák',
        'create_category' => 'blog kategória',
        'tab' => 'Blog',
        'access_courses' => 'Blog bejegyzések kezelése',
        'access_categories' => 'Blog kategóriák kezelése',
        'access_other_courses' => 'Más felhasználók bejegyzéseinek kezelése',
        'access_import_export' => 'Bejegyzések importálása és exportálása',
        'access_publish' => 'Blog bejegyzések közzététele',
        'manage_settings' => 'Blog beállítások kezelése',
        'delete_confirm' => 'Törölni akarja a kijelölt bejegyzéseket?',
        'chart_published' => 'Közzétéve',
        'chart_drafts' => 'Piszkozatok',
        'chart_total' => 'Összesen',
        'settings_description' => 'Beállítási lehetőségek.',
        'show_all_courses_label' => 'Az összes bejegyzés mutatása az adminisztrátorok számára',
        'show_all_courses_comment' => 'A közzétett és a még nem publikált bejegyzések is egyaránt meg fognak jelenni az oldal szerkesztőinek.',
        'tab_general' => 'Általános'
    ],
    'courses' => [
        'list_title' => 'Blog bejegyzések',
        'filter_category' => 'Kategória',
        'filter_published' => 'Közzétéve',
        'filter_date' => 'Létrehozva',
        'new_course' => 'Új bejegyzés',
        'export_course' => 'Exportálás',
        'import_course' => 'Importálás'
    ],
    'course' => [
        'title' => 'Cím',
        'title_placeholder' => 'Új bejegyzés címe',
        'content' => 'Szöveges tartalom',
        'content_html' => 'HTML tartalom',
        'slug' => 'Keresőbarát cím',
        'slug_placeholder' => 'uj-bejegyzes-cime',
        'categories' => 'Kategóriák',
        'author_email' => 'Szerző e-mail címe',
        'created' => 'Létrehozva',
        'created_date' => 'Létrehozás dátuma',
        'updated' => 'Módosítva',
        'updated_date' => 'Módosítás dátuma',
        'published' => 'Közzétéve',
        'published_by' => 'Szerző:',
        'current_user' => 'Felhasználó',
        'published_date' => 'Közzététel dátuma',
        'published_validation' => 'Adja meg a közzététel dátumát',
        'tab_edit' => 'Szerkesztés',
        'tab_categories' => 'Kategóriák',
        'categories_comment' => 'Jelölje be azokat a kategóriákat, melyekbe be akarja sorolni a bejegyzést',
        'categories_placeholder' => 'Nincsenek kategóriák, előbb létre kell hoznia egyet!',
        'tab_manage' => 'Kezelés',
        'published_on' => 'Közzététel dátuma',
        'excerpt' => 'Kivonat',
        'summary' => 'Összegzés',
        'featured_images' => 'Kiemelt képek',
        'delete_confirm' => 'Valóban törölni akarja ezt a bejegyzést?',
        'delete_success' => 'Sikeresen törölve lettek a bejegyzések.',
        'close_confirm' => 'A bejegyzés nem került mentésre.',
        'return_to_courses' => 'Vissza a bejegyzésekhez'
    ],
    'categories' => [
        'list_title' => 'Blog kategóriák',
        'new_category' => 'Új kategória',
        'uncategorized' => 'Nincs kategorizálva'
    ],
    'category' => [
        'name' => 'Név',
        'name_placeholder' => 'Új kategória neve',
        'description' => 'Leírás',
        'slug' => 'Keresőbarát cím',
        'slug_placeholder' => 'uj-kategoria-neve',
        'courses' => 'Bejegyzések',
        'delete_confirm' => 'Valóban törölni akarja ezt a kategóriát?',
        'delete_success' => 'Sikeresen törölve lettek a kategóriák.',
        'return_to_categories' => 'Vissza a kategóriákhoz',
        'reorder' => 'Kategóriák sorrendje'
    ],
    'menuitem' => [
        'blog_category' => 'Blog kategória',
        'all_blog_categories' => 'Összes blog kategória',
        'blog_course' => 'Blog bejegyzés',
        'all_blog_courses' => 'Összes blog bejegyzés',
        'category_blog_courses' => 'Blog kategória bejegyzések'
    ],
    'settings' => [
        'category_title' => 'Blog kategória lista',
        'category_description' => 'A blog kategóriákat listázza ki a lapon.',
        'category_slug' => 'Cím paraméter neve',
        'category_slug_description' => 'A webcím útvonal paramétere a jelenlegi kategória keresőbarát címe alapján való kereséséhez. Az alapértelmezett komponensrész ezt a tulajdonságot használja a jelenleg aktív kategória megjelöléséhez.',
        'category_display_empty' => 'Üres kategóriák kijelzése',
        'category_display_empty_description' => 'Azon kategóriák megjelenítése, melyekben nincs egy bejegyzés sem.',
        'category_page' => 'Kategória lap',
        'category_page_description' => 'A kategória hivatkozások kategória lap fájljának neve. Az alapértelmezett komponensrész használja ezt a tulajdonságot.',
        'course_title' => 'Blog bejegyzés',
        'course_description' => 'Egy blog bejegyzést jelez ki a lapon.',
        'course_slug' => 'Cím paraméter neve',
        'course_slug_description' => 'A webcím útvonal paramétere a bejegyzés keresőbarát címe alapján való kereséséhez.',
        'course_category' => 'Kategória lap',
        'course_category_description' => 'A kategória hivatkozások kategória lap fájljának neve. Az alapértelmezett komponensrész használja ezt a tulajdonságot.',
        'courses_title' => 'Blog bejegyzések',
        'courses_description' => 'A közzétett blog bejegyzések listázása a honlapon.',
        'courses_pagination' => 'Lapozósáv paraméter neve',
        'courses_pagination_description' => 'A lapozósáv lapjai által használt, várt paraméter neve.',
        'courses_filter' => 'Kategória szűrő',
        'courses_filter_description' => 'Adja meg egy kategória keresőbarát címét vagy webcím paraméterét a bejegyzések szűréséhez. Hagyja üresen az összes bejegyzés megjelenítéséhez.',
        'courses_per_page' => 'Bejegyzések laponként',
        'courses_per_page_validation' => 'A laponkénti bejegyzések értéke érvénytelen formátumú',
        'courses_no_courses' => 'Üzenet ha nincs bejegyzés',
        'courses_no_courses_description' => 'A blog bejegyzés listában kijelezendő üzenet abban az esetben, ha nincsenek bejegyzések. Az alapértelmezett komponensrész használja ezt a tulajdonságot.',
        'courses_no_courses_default' => 'Nem található bejegyzés',
        'courses_order' => 'Bejegyzések sorrendje',
        'courses_order_description' => 'Jellemző, ami alapján rendezni kell a bejegyzéseket',
        'courses_category' => 'Kategória lap',
        'courses_category_description' => 'A "Kategória" kategória hivatkozások kategória lap fájljának neve. Az alapértelmezett komponensrész használja ezt a tulajdonságot.',
        'courses_course' => 'Bejegyzéslap',
        'courses_course_description' => 'A "Tovább olvasom" hivatkozások blog bejegyzéslap fájljának neve. Az alapértelmezett komponensrész használja ezt a tulajdonságot.',
        'courses_except_course' => 'Bejegyzés kizárása',
        'courses_except_course_description' => 'Adja meg annak a bejegyzésnek az azonosítóját vagy webcímét, amit nem akar megjeleníteni a listázáskor.',
        'courses_except_course_validation' => 'A kivételnek webcímnek, illetve azonosítónak, vagy pedig ezeknek a vesszővel elválasztott felsorolásának kell lennie.',
        'courses_except_categories' => 'Kategória kizárása',
        'courses_except_categories_description' => 'Adja meg azoknak a kategóriáknak a webcímét vesszővel elválasztva, amiket nem akar megjeleníteni a listázáskor.',
        'courses_except_categories_validation' => 'A kivételnek webcímnek, vagy pedig ezeknek a vesszővel elválasztott felsorolásának kell lennie.',
        'rssfeed_blog' => 'Blog oldal',
        'rssfeed_blog_description' => 'Annak a lapnak a neve, ahol listázódnak a blog bejegyzések. Ezt a beállítást használja alapértelmezetten a blog komponens is.',
        'rssfeed_title' => 'RSS hírfolyam',
        'rssfeed_description' => 'A bloghoz tartozó RSS hírfolyam generálása.',
        'group_links' => 'Hivatkozások',
        'group_exceptions' => 'Kivételek'
    ],
    'sorting' => [
        'title_asc' => 'Név (növekvő)',
        'title_desc' => 'Név (csökkenő)',
        'created_asc' => 'Létrehozva (növekvő)',
        'created_desc' => 'Létrehozva (csökkenő)',
        'updated_asc' => 'Frissítve (növekvő)',
        'updated_desc' => 'Frissítve (csökkenő)',
        'published_asc' => 'Publikálva (növekvő)',
        'published_desc' => 'Publikálva (csökkenő)',
        'random' => 'Véletlenszerű'
    ],
    'import' => [
        'update_existing_label' => 'Meglévő bejegyzések frissítése',
        'update_existing_comment' => 'Két bejegyzés akkor számít ugyanannak, ha megegyezik az azonosító számuk, a címük vagy a webcímük.',
        'auto_create_categories_label' => 'Az import fájlban megadott kategóriák létrehozása',
        'auto_create_categories_comment' => 'A funkció használatához meg kell felelnie a Kategóriák oszlopnak, különben az alábbi elemekből válassza ki az alapértelmezett kategóriákat.',
        'categories_label' => 'Kategóriák',
        'categories_comment' => 'Válassza ki azokat a kategóriákat, amelyekhez az importált bejegyzések tartoznak (nem kötelező).',
        'default_author_label' => 'Alapértelmezett szerző (nem kötelező)',
        'default_author_comment' => 'A rendszer megpróbál egy meglévő felhasználót társítani a bejegyzéshez az Email oszlop alapján. Amennyiben ez nem sikerül, az itt megadott szerzőt fogja alapul venni.',
        'default_author_placeholder' => '-- válasszon felhasználót --'
    ]
];