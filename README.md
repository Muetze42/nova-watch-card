# NovaWat.ch Card

A card for Laravel Nova, which checks whether an update is available with [NovaWat.ch](https://novawat.ch).

![Preview](https://raw.githubusercontent.com/Muetze42/nova-watch-card/main/docs/preview.png "Preview")

## Installation

```shell
composer require norman-huth/nova-watch-card
```

## Usage

Basic usage.

```php
    public function cards(): array
    {
        return [
            new \NormanHuth\NovaWatchCard\NovaWatchCard(),
        ];
    }
```

### Check Specific Version

```php
    public function cards(): array
    {
        return [
            new \NormanHuth\NovaWatchCard\NovaWatchCard('4.29.0'),
        ];
    }
```

### Add A Heading

```php
    public function cards(): array
    {
        return [
            new \NormanHuth\NovaWatchCard\NovaWatchCard()
                ->setHeading('Customer 3'),
        ];
    }
```

### Optional: Publish Translations

```shell
php artisan vendor:publish --tag=nova-watch-card-translations
```
