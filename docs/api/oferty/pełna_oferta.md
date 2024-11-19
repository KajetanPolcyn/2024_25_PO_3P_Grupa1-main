# Pobieranie Pełnej Ofery

_Przed podjęciem pokazanych tu kroków, należy zapoznać się z [konfiguracją](./konfiguracja_oferty.md)._

---

### Załącznie pliku

Aby mieć dostę do tych funkcji należy załączyć plik `read-functions.php`

```php
require_once "./api/read-functions.php"
```

### Pobieranie ID oferty

ID ofery podane jest w adresie URL strony (formularz GET). Aby je pobrać należy użyć poniższej instrukcji:

```php
$id = $_GET["id"] ?? false;
```

Jeżeli URL nie posiada takiego argumentu, do zmiennej przypisywana jest wartość `false`.

### Walidacja ID oferty

Formularz GET jest stosunkowo łatwy do modyfikacji przez klienta. Aby w razie niepoprawnego numeru strona zachowała się prawidłowo (powróciła do wyboru ofert) należy użyć poniższej instrukcji:

```php
if (!is_numeric($id) || $id < 0 || !$id) {
    header('location: /rent-4-cent/backend/offers/examples/read/featured-offers.php');
    die();
}
```

_Adres URL przekierowania jest tylko poglądowy (na potrzeby przykładu)!_

### Pobieranie oferty

Aby pobrać pełne informacje o pojedynczej ofercie należy użyć funkcji `getFullOffer($con, $id)`, zawierającej parametry

- $con - połączenie z bazą danych (uchwyt)
- $id - ID pojedynczego rekordu (oferty) z formularza GET

```php
$fullOffer = getFullOffer($con, $id);
```

### Wyświetlanie ofert

Zwracana jest tablica obiektów `fullOffer` posiadających atrybuty:

- $id - ID
- $name - Nazwę oferty
- $country - Kraj
- $city - Miasto
- $street - Ulicę
- $apartment_number - Numer lokalu
- $post_code - Kod pocztowy
- $thumbnail - Nazwę pliku zdjęcia promocyjnego (miniaturki)
- $day_price_pln - Cenę za dobę hotelową
- $description - Opis oferty

Stronę z pojedynczą ofertą, pobraną wcześniej, można wyświetlić w poniższy sposób:

```php
echo "<img src='/rent-4-cent/src/assets/thumbnails/$fullOffer->thumbnail' alt='$fullOffer->name'>";

echo "<h1>$fullOffer->name</h1>";

echo "<h2>$fullOffer->city, $fullOffer->country</h2>";
echo "<p>$fullOffer->street $fullOffer->apartment_number</p>";

echo "<p>$fullOffer->description</p>";

echo "<p>Doba hotelowa już od: $fullOffer->day_price_pln zł</p>";
```

_Adres zdjęcia jest tylko poglądowy!_
