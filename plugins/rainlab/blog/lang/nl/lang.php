<?php

return [
    'plugin' => [
        'name' => 'Blog',
        'description' => 'A robust blogging platform.'
    ],
    'blog' => [
        'menu_label' => 'Blog',
        'menu_description' => 'Beheer blog artikelen',
        'courses' => 'Artikelen',
        'create_course' => 'Artikel',
        'categories' => 'Categorieën',
        'create_category' => 'blog categorie',
        'tab' => 'Blog',
        'access_courses' => 'Blog artikelen beheren',
        'access_categories' => 'Blog categorieën beheren',
        'access_other_courses' => 'Beheren van blog artikelen van gebruikers',
        'access_import_export' => 'Toegang tot importeren en exporteren van artikelen',
        'delete_confirm' => 'Weet je het zeker?',
        'chart_published' => 'Gepubliceerd',
        'chart_drafts' => 'Concepten',
        'chart_total' => 'Totaal'
    ],
    'courses' => [
        'list_title' => 'Beheren van blog artikelen',
        'filter_category' => 'Categorie',
        'filter_published' => 'Verberg gepubliceerd',
        'new_course' => 'Nieuw artikel'
    ],
    'course' => [
        'title' => 'Titel',
        'title_placeholder' => 'Titel van artikel',
        'content' => 'Inhoud',
        'content_html' => 'HTML Inhoud',
        'slug' => 'Slug',
        'slug_placeholder' => 'nieuw-artikel-slug',
        'categories' => 'Categorieën',
        'author_email' => 'E-mail auteur',
        'created' => 'Aangemaakt',
        'created_date' => 'Aangemaakt op',
        'updated' => 'Bijgewerkt',
        'updated_date' => 'Bijgewerkt op',
        'published' => 'Gepubliceerd',
        'published_by' => 'Gepubliceerd door',
        'current_user' => 'Huidige gebruiker',
        'published_date' => 'Gepubliceerd op',
        'published_validation' => 'Graag een publicatie datum opgeven',
        'tab_edit' => 'Bewerken',
        'tab_categories' => 'Categorieën',
        'categories_comment' => 'Selecteer een categorie waarbij het artikel hoort',
        'categories_placeholder' => 'Er zijn geen categorieën, maak eerst een categorie aan!',
        'tab_manage' => 'Beheer',
        'published_on' => 'Gepubliceerd op',
        'excerpt' => 'Samenvatting',
        'summary' => 'Samenvatting',
        'featured_images' => 'Uitgelichte afbeelding',
        'delete_confirm' => 'Weet je zeker dat je dit artikel wilt verwijderen?',
        'close_confirm' => 'Artikel is nog niet opgeslagen.',
        'return_to_courses' => 'Terug naar artikel overzicht'
    ],
    'categories' => [
        'list_title' => 'Beheer blog categorieën',
        'new_category' => 'Nieuwe categorie',
        'uncategorized' => 'Ongecategoriseerd'
    ],
    'category' => [
        'name' => 'Naam',
        'name_placeholder' => 'Naam categorie',
        'slug' => 'Slug',
        'slug_placeholder' => 'nieuw-categorie-slug',
        'courses' => 'Artikelen',
        'delete_confirm' => 'Weet je zeker dat je deze categorie wilt verwijderen?',
        'return_to_categories' => 'Terug naar categorie overzicht'
    ],
    'settings' => [
        'category_title' => 'Categorie overzicht',
        'category_description' => 'Geeft een lijst weer van alle categorieën op de pagina.',
        'category_slug' => 'Categorie slug',
        'category_slug_description' => 'Haal blog categorie op a.h.v. de opgegeven slug. Deze waarde wordt standaard gebruikt voor de partial om de actieve categorie te markeren.',
        'category_display_empty' => 'Geef lege categorieën weer',
        'category_display_empty_description' => 'Geef categorieën weer die geen artikelen hebben.',
        'category_page' => 'Categorie pagina',
        'category_page_description' => 'Naam van categorie pagina bestand voor de categorie links. Deze waarde wordt standaard gebruikt door de partial.',
        'course_title' => 'Artikel',
        'course_description' => 'Geef een artikel weer op de pagina.',
        'course_slug' => 'Artikel slug',
        'course_slug_description' => 'Haal een artikel op a.h.v. de opgegeven slug.',
        'course_category' => 'Categorie pagina',
        'course_category_description' => 'Naam van categorie pagina bestand voor de categorie links. Deze waarde wordt standaard gebruikt door de partial.',
        'courses_title' => 'Artikel overzicht',
        'courses_description' => 'Geeft een lijst van de nieuwste artikelen weer op de pagina.',
        'courses_pagination' => 'Pagina nummer',
        'courses_pagination_description' => 'Deze waarde wordt gebruikt om te kijken op welke pagina de gebruiker is.',
        'courses_filter' => 'Categorie filter',
        'courses_filter_description' => 'Geef een categorie slug of URL param om de artikelen hier op te kunnen filteren. Leeg laten als alle artikelen getoond moeten worden.',
        'courses_per_page' => 'Artikelen per pagina',
        'courses_per_page_validation' => 'Ongeldig formaat voor het aantal artikelen per pagina',
        'courses_no_courses' => 'Geen artikelen melding',
        'courses_no_courses_description' => 'Deze tekst wordt getoond als er geen artikelen zijn. Deze waarde wordt standaard gebruikt door de partial.',
        'courses_order' => 'Volgorde artikelen',
        'courses_order_description' => 'Kolom waar de artikelen op gesorteerd moeten worden',
        'courses_category' => 'Categorie pagina',
        'courses_category_description' => 'Naam van categorie pagina bestand voor gekoppeld artikel overzichts pagina. Deze waarde wordt standaard gebruikt door de partial.',
        'courses_course' => 'Artikel pagina',
        'courses_course_description' => 'Naam van blog pagina bestand voor de "Lees meer" links. Deze waarde wordt standaard gebruikt door de partial.',
        'courses_except_course' => 'Except course',
        'courses_except_course_description' => 'Enter ID/URL or variable with course ID/URL you want to except',
    ]
];
