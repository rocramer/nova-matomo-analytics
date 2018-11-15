# Matomo Analytics for Nova

*Matomo Analytics for Nova* provides some basic Matomo metrics for your Laravel Nova dashboard.

![image](https://www.robincramer.de/wp-content/uploads/2018/11/matomo-nova.png)


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
        ];
    }
```

The plugin requires your Matomo url, token and side id in your .env file:

```dotenv
MATOMO_URL=https://analytics.example.com/
MATOMO_TOKEN=8axxxxxxxxxxxxxxxxxxxx35a5a
MATOMO_PAGE_ID=Z
```

This is a first version. More Nova Cards and an own dashboard for Matomo metrics are planned for the future.

Feel free to create a PR or contribute suggestions.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
