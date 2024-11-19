# Formularz administratora - Oferty

> Kroki tu podane zakładają wcześniejsze zapoznanie się i implementacja "konfiguracji oferty".

### Wyświetlanie formularza

Aby wyświetlić formularz edycyjny pozwalający na aktualizację dnaych o ofertach należy:

1. Podłączyć plik `admin-functions.php` z funkcjami dotyczącymi panelu administratora

```php
require_once "./api/offers/admin-functions.php";
```

2. Pobrać zakres ID ofert do wyświetlenia, np. do zmiennych `$fromid` oraz `$toid`
3. Pobrać dane ofert o ustalicnych ID za pomocą funkcji `getAllFullOffers`, np. do zmiennej `$offers`

```php
$offers = getAllFullOffers($con, $fromid, $toid);
```

4. Pobrać listę nazw miniaturek do wyboru (z folderu `src/assets/thumnmails`), za pomocą funckji `getThumbnails`, np. do zmiennej `$thumbnails`

```php
$thumbnails = getThumbnails();
```

5. Wyświetlić formularz z pobranymi danymi jako wartościami domyślnymi w sposób analogiczny do przykładu. **Formularz musi przekierowywać do pliku `admin-form.php`, gdzie wykonuje się dalsza część kodu**!

```php
if ($offers) {
    foreach ($offers as $offer) {
        echo '<form action="./api/offers/admin-form.php" method="post" id="post_form_css">';

        echo '<input type="number" name="offerid" value="' . $offer->id . '" readonly>';
        echo '<input type="text" name="offername" value="' . $offer->name . '">';
        echo '<input type="text" name="offercountry" value="' . $offer->country . '">';
        echo '<input type="text" name="offercity" value="' . $offer->city . '">';
        echo '<input type="text" name="offerstreet" value="' . $offer->street . '">';
        echo '<input type="text" name="offerapartment_number" value="' . $offer->apartment_number . '">';
        echo '<input type="text" name="offerpost_code" value="' . $offer->post_code . '">';

        echo '<select name="offerthumbnail">';
        foreach ($thumbnails as $thumbnail) {
            echo '<option value="' . $thumbnail . '" ' . ($thumbnail == $offer->thumbnail ? 'selected' : '') . '>' . $thumbnail . '</option>';
        }
        echo '</select>';

        echo '<input type="number" name="offerday_price_pln" value="' . $offer->day_price_pln . '">';
        echo '<textarea name="offerdescription" rows="5" cols="50">' . $offer->description . '</textarea>';
        echo '<input type="number" name="offerviews" value="' . $offer->views . '" readonly>';

        echo '<input type="submit" value="Zapisz" name="admin-update-offer">';
        echo '<input type="submit" value="Usun" name="admin-delete-offer">';

        echo '</form>';

        echo '<hr style="margin-top: 5rem; margin-bottom: 5rem" />';
    }
} else {
    echo "Brak wyników...";
}
```

### Wyświetlanie błędów

Aby możliwe było wyświetlanie błędów oraz innych informacji zwrotnych dla użytkownika, należy użyć odpowiednich zmiennych w tablicy `$_SESSION` tak, jak w przykładzie

```php
if (isset($_SESSION['offer_admin_success'])) {
    echo "<h2>" . $_SESSION['offer_admin_success'] . "</h2>";
    unset($_SESSION['offer_admin_success']);
} else if (isset($_SESSION['offer_admin_error'])) {
    echo "<h2>" . $_SESSION['offer_admin_error'] . "</h2>";
    unset($_SESSION['offer_admin_error']);
}

```

**Uwaga: Na początku pliku należy wystartować sejsę za pomocą poniższej instrukcji**

```php
session_start();
```

---

_**Uwaga**: Pokazane tu ścieżki do plików są wyłącznie poglądowe!_
