# Pobieranie Wyróżnonych Ofert

_Przed podjęciem pokazanych tu kroków, należy zapoznać się z [konfiguracją](./konfiguracja_oferty.md)._

---

### Załącznie pliku

Aby mieć dostę do tych funkcji należy załączyć plik `read-functions.php`

```php
require_once "./api/read-functions.php"
```

### Pobieranie ofert

Do pobrania ofert służy funkcja `getFeaturedOffers($con, $amount)` która posiada dwa parametry

- $con - połączenie z bazą danych (uchwyt)
- $amount - ilość ofert jakie mają być wyświetlone

Przykład dla połączenia `$con` oraz 4 ofert:

```php
$featuredOffers = getFeaturedOffers($con, 4);
```

### Wyświetlanie ofert

Zwracana jest tablica obiektów `featuredOffert` posiadających atrybuty:

- $id - ID
- $name - Nazwę oferty
- $country - Kraj
- $city - Miasto
- $day_price_pln - Cena za dobę hotelową w PLN

Oferty można wyświetlić analogicznie do poniższego przykładu:

```php
foreach ($featuredOffers as $offert) {
        echo "<h4>$offert->name</h4>";
        echo "<p>$offert->country, $offert->city</p>";
        echo "<p>Od $offert->day_price_pln zł za dobę</p>";
        echo "<p><a href='offert.php?id=$offert->id'>Więcej o hotelu...</a></p>";
        echo "<hr />";
}
```
