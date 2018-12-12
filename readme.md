# Matomo Analytics for Nova

*Matomo Analytics for Nova* provides some basic Matomo metrics and page tables for your Laravel Nova dashboard.

![image](https://www.robincramer.de/wp-content/uploads/2018/12/matomo-nova.png)


## Installation

You can install the package via composer:

```
composer require rocramer/nova-matomo-analytics
```

After that you can register the following metrics on a dashboard of your choice:

```php
protected function cards()
{
    return [
        new \Rocramer\MatomoAnalytics\Cards\UniqueVisitors(),
        new \Rocramer\MatomoAnalytics\Cards\Visits(),
        new \Rocramer\MatomoAnalytics\Cards\VisitLength(),
        new \Rocramer\MatomoAnalytics\Cards\BounceRate(),
        new \Rocramer\MatomoAnalytics\Cards\Outlinks(),
        new \Rocramer\MatomoAnalytics\Cards\Downloads()
        new \Rocramer\MatomoAnalytics\Cards\EntryPages()
        new \Rocramer\MatomoAnalytics\Cards\ExitPages()
        new \Rocramer\MatomoAnalytics\Cards\MostViewedPages()
    ];
}
```

The plugin requires your Matomo url, token and side id in your `config/services.php` file:

```php
'matomo' => [
    'token'   => env('MATOMO_TOKEN'),
    'url'     => env('MATOMO_URL'),
    'page_id' => env('MATOMO_PAGE_ID')
]
```

This is a first version. More Nova Cards and an own dashboard for Matomo metrics are planned for the future.

Feel free to create a PR or contribute suggestions.

## Customization

### Caching

By default, all cards get cached for 5 minutes. You can change that behaviour by adding a `caching` setting with the number of minutes you want to cache within your `config/services.php` file: 

```php
'matomo' => [
    'token'   => env('MATOMO_TOKEN'),
    'url'     => env('MATOMO_URL'),
    'page_id' => env('MATOMO_PAGE_ID'),
    'caching' => 3
]
```

If you want to fully disable caching for the cards, just set the value to `false`.

### Localization

This package uses localization via [Laravel Translation Strings](https://laravel.com/docs/5.7/localization#retrieving-translation-strings). Therefore, you can add localization support for your cards by adding the keys with their corresponding translations to your JSON localization files. So, for German language support add the following keys in `resources/lang/vendor/nova/de.json`:
```json
"Unique Visitors": "Eindeutige Besucher",
"Visits": "Aufrufe",
"Visit Length": "Besuchsdauer",
"Outlinks": "Ausgehende Verweise",
"Bounce Rate": "Absprungrate",
"Downloads": "Downloads",
"seconds (avg.)": "Sekunden (Durchschnitt)",
"Days": "Tage",
"Clicks": "Klicks",
"Unique Clicks": "Eindeutige Klicks",
"URL": "URL",
"No data found.": "Keine Daten gefunden.",
"Time on Page (avg.)": "Besuchsdauer (Durchschnitt)",
"Bounce Rate": "Absprungrate",
"Exit Rate": "Ausstiegsrate",
"Generation Time (avg.)": "Generierungszeit (Durchschnutt)",
"Entry Pages": "Einstiegsseiten",
"Exit Pages": "Ausstiegsseiten",
"Most Viewed Pages": "Am häufigsten besuchte Seiten",


```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
