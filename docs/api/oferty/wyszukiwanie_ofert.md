# Wyszukiwanie ofert

_Przed podjęciem pokazanych tu kroków, należy zapoznać się z [konfiguracją](./konfiguracja_oferty.md)._

---

### Załącznie pliku

Aby mieć dostę do tych funkcji należy załączyć plik `read-functions.php`

```php
require_once "./api/read-functions.php"
```

### Pobieranie państw

Aby utworzyć formularz wyszukiwania należy najpierw pobrać wszystkie państwa ofert za pomocą funkcji `getCountries`.

```php
getCountries($con);
```

Gdzie `$con` oznacza uchwyt połączenia z bazą danych.

### Pobranie poprzednich wartości

Jeżeli formularz został odrzucony lub zaakceptowany, aby dane nie zresetowały się należy zapisać dane z tablicy `$_GET`

```php
if (isset($_GET["search"])) {
    $search = $_GET["search"];
    $s_country = $_GET["country"];
} else {
    $search = "";
    $s_country = "all";
}
```

### Formularz wyszukiwania

Aby możliwe było wyszukiwanie ofert należy utworzyć do tego odpowiedni formularz. Powinien on przesyłać dane za pomocą `GET` oraz posiadać polatakie jak:

- `search` - pole wyszukiwania tekstowego
- `country` - lista wyboru państwa
- `submit` - przycisk przesyłający formularz

Należy zrealizować to analogicznie do poniższego przykładu:

```html
<form action="#" method="get">
    <input type="search" name="search" placeholder="Szukaj..." value="<?php echo $search; ?>">

    <select name="country">
        <option value="all" <?php if ($s_country == "all") echo "selected"; ?>>Wszystkie kraje</option>
        <?php
        foreach ($countries as $country) {
            echo "<option value='$country' " . ($country == $s_country ? "selected" : "") . ">$country</option>";
        }
        ?>
    </select>

    <input type="submit" value="Szukaj">
</form>
```

### Wyszukiwanie oferty

Sama logika wyszukiwania dostępna jest za pomocą funkcji `getSearchedOffers` używanej analogicznie do przykładu:

```php
$offers = getSearchedOffers($con, $search, $s_country);
```

Gdzie:

- `$con` to połączenie z bazą danych
- `search` to dane wpisane w polu tekstowym
- `$s_country` to państwo oferty

### Wyświetlanie ofert

Oferty otrzymane z powyższej funkcji należy wyświetlić tak, jak w przykładzie

```php
if ($offers) {
    foreach ($offers as $offer) {
        echo "<h4>$offer->name</h4>";
        echo "<p>$offer->country, $offer->city</p>";
        echo "<p>Od $offer->day_price_pln zł za dobę</p>";
        echo "<p><a href='offer.php?id=$offer->id'>Więcej o ofercie...</a></p>";
        echo "<hr />";
    }
} else {
    echo "<h2>Brak wyników...</h2>";
}
```

---

_**Uwaga**: nazwy zmiennych, jak i ścieżek do plików są przykładowe_

---

_**Uwaga**: dane wysyłane z formularza wyszukiwania mogą się zmienić_
