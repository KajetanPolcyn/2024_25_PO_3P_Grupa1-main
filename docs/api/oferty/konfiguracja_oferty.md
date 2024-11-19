# Konfiguracja API Ofert

### Połączenie z bazą danych

Do większości skryptów potrzebne jest połączenie z bazą danych.

Aby obsłużyć połączenie z bazą danych należy:

1.  Podłączyć plik `database.php`
    ```php
    require_once "./api/database.php";
    ```
2.  Zapisać połączenie do zmiennej `$con`
    ```php
    $con = dbConnect();
    ```
3.  Sprawdzić stan połączenia i ew. wypisać błąd

    ```php
    if (!$con) {
        die("<h2>Brak połączenia z bazą danych...</h2><br>Proszę spróbować później.");
    }
    ```

4.  **Na końcu pliku**, zamknąć połączenie z bazą danych
    ```php
    mysqli_close($con);
    ```

---

### Podpięcie pliku funkcyjnego

Poza plikiem bazy danych kluczowe są pliki zawierające funkcjonalności API.

Pliki należy podpinać w sposób

```php
require_once "./api/[FILE_NAME]"
```

Gdzie `[FILE_NAME]` to nazwa konkretnego pliku.

---

Aby poznać konkretne funkcjonalności oraz pliki, które trzeba do nich podpiąć należy sprawdzić pozostałe sekcje [dokumentacji](../api/)

---

_Uwaga: Ścieźki podane w dokumentacji są tylko przykładowe, nie mają związku z rzeczywistym systemem plików!_
