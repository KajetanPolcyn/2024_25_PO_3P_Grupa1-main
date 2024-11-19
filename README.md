# Rent 4 Cent - Aplikacja do Zarządzania Noclegami

> Aplikacja internetowa do rezerwacji hoteli i apartamentów.

### Spis Treści

- [O Projekcie](#o-projekcie)
- [Funkcjonalności](#funkcjonalności)
- [Instalacja](#instalacja)
- [Technologie](#technologie)
- [Licencja](#licencja)
- [Twórcy](#twórcy)
- [Kontakt](#kontakt)

---

### O projekcie

Aplikacja została zaprojektowana, aby rezerwowanie noclegów było wygodne i intuicyjne. Użytkownicy mogą przeglądać dostępne obiekty, filtrować je według udogodnień, dat i lokalizacji, a także dokonywać rezerwacji.

### Funkcjonalności

- **Rejestracja i Autoryzacja Użytkowników**: Bezpieczne funkcje rejestracji, logowania i wylogowywania.
- **Opcje Wyszukiwania i Filtrowania**: Zaawansowane opcje wyszukiwania i filtrowania według lokalizacji, ceny, ocen, udogodnień i innych.
- **System Rezerwacji**: Użytkownicy mogą przeglądać szczegóły obiektów, sprawdzać dostępność i rezerwować noclegi.
- **Panel Administratora**: Dla właścicieli obiektów i administratorów serwisu do zarządzania ofertami, rezerwacjami i danymi użytkowników.
- **Responsywny Design**: Optymalizacja zarówno dla urządzeń stacjonarnych, jak i mobilnych.

Bardziej szczegółowy opis funkcjonalności obecnych, jak i planowanych, w [dokumentacji](docs/001_koncepcja_projektu.md)

---

### Instalacja

#### Wymagania:

- System **Windows** lub **Linux/Unix**
- Pakiet **XAMPP** (aktualna wersja **PHP** oraz **MySQL**)

#### Uruchamianie

1. W panelu kontroli **XAMPP** należy włączyć usługę **Apache** oraz **MySQL**.

2. Pliki z folderu **[src](src)** należy umieścić w folderze **htdocs/rent-4-cent** znajdującego się w folderze głównym pakietu **XAMPP**.

3. Do bazy danych w systemie **MySQL** należy zaimportować [kod SQL](database/) przez interfejs graficzny (zwykle adres [localhost/phpmyadmin](http://localhost/phpmyadmin)) lub interfejs tekstowy.

4. W systemie **MySQL** należy utworzyć użytkownika o danych określonych w [pliku](database/)

5. Aby wejść na stronę, należy w przeglądarce wpisać http://localhost/rent-4-cent

---

### Technologie:

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Baza danych**: MySQL (MariaDB)

---

### Licencja

Projekt jest udostępniony na warunkach licencji Copyright Notice with Usage Restriction.

Wszelkie informacje są uwzględnone w pliku [LICENSE](./LICENSE).

---

### Twórcy

- [@DKropidlowski](https://github.com/DKropidlowski)
- [@DTaranovich](https://github.com/DTaranovich)
- [@KajetanPolcyn](https://github.com/KajetanPolcyn)
- [@M-Wasielewski](https://github.com/M-Wasielewski)
- [@MKKosmowski](https://github.com/MKKosmowski)
- [@rommanj0](https://github.com/rommanj0)

---

### Kontakt

Kontakt dostępny przez wszelkie ścieżki kontaktu dostępne na platformie GitHub - **[Rent 4 Cent](https://github.com/zse-poznan/2024_25_PO_3P_Grupa1)**
