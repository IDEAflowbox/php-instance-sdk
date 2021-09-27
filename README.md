# Cyberkonsultant SDK for PHP
Cyberkonsultant SDK for PHP jest biblioteką napisaną w języku PHP, dostarczającą wiele zaawansowanych funkcji, które umożliwiają programistom łatwą integrację aplikacji zależnych od cyberkonsultanta z API instancji klienckiej cyberkonsultanta.

---

## Wymagania biblioteki
- PHP 7.1 lub wyższy
- [Composer](https://getcomposer.org/)

---

## Instalacja
W pliku composer.json swojego projektu, należy dać repozytorium, tak jak jest to przedstawione poniżej:

    "repositories": [
        {
            "type": "vcs",
            "url": "https://repos.o323.com/cyberkonsultant/php-instance-sdk"
        }
    ]

Następnie należy zainstalować bibliotekę:

    composer require cyberkonsultant/php-instance-sdk

---

## Inicjalizacja
W celu korzystania z biblioteki, należy podać *adres URL* do API instancji klienta oraz *access token*:

    $sdk = new Cyberkonsultant\Cyberkonsultant([
        'api_url' => 'http://localhost:3000',
        'access_token' => 'ACCESS_TOKEN'
    ]);

## Przykłady użycia

Poniższe przykłady demonstrują w jaki sposób można wykorzystać bibliotekę:

- **Eventy**
    - [Pobierz listę eventów](./examples/get-events.php)
    - [Zapisz event](./examples/create-event.php)
- **Użytkownicy**
    - [Pobierz listę użytkowników](./examples/get-users.php)
    - [Pobierz pojedyńczego użytkownika](./examples/get-user.php)
    - [Zaktualizuj użytkownika](./examples/update-user.php)
- **Produkty**
    - [Pobierz listę produktów](./examples/get-products.php)
    - [Dodaj produkty](./examples/add-products.php)
- **Kategorie**
    - [Pobierz listę kategorii](./examples/get-categories.php)
    - [Dodaj kategorię](./examples/add-category.php)
    - [Powiąż kategorie](./examples/associate-categories.php)
- **Cechy**
    - [Pobierz listę cech](./examples/get-features.php)
    - [Dodaj cechę](./examples/add-feature.php)
- **Grupy**
    - [Pobierz listę grup](./examples/get-groups.php)
    - [Dodaj grupę](./examples/add-group.php)
    - [Pobierz listę produktów dla grupy](./examples/get-group-products.php)
    - [Pobierz listę identyfikatorów wszystkich produktów dla grupy](./examples/get-group-products-ids.php)
    - [Pobierz listę kodów produktów wszystkich produktów dla grupy](./examples/get-group-products-codes.php)
- **Ramki rekomendacyjne**
    - [Pobierz listę ramek rekomendacyjnych](./examples/get-recommendation-frames.php)
    - [Utwórz prostą ramkę rekomendacyjną](./examples/create-simple-recommendation-frame.php)
    - [Utwórz zaawansowaną ramkę rekomendacyjną](./examples/create-advanced-recommendation-frame.php)
    - [Zaktualizuj ramkę rekomendacyjną](./examples/update-recommendation-frame.php)
- **[Voice] Połączenia**
    - [Pobierz listę połączeń](./examples/get-calls.php)
    - [Dodaj połączenie](./examples/create-call.php)
    - [Oznacz połączenie jako przetworzone](./examples/mark-call-as-processed.php)
