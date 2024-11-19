# Arkusz Projektowania Funkcjonalności

| Sekcja                          | Szczegóły                                                                                       |
|---------------------------------|-------------------------------------------------------------------------------------------------|
| **Pracownik Nadzorujący Kontakt z Klientem** |                                                                                                 |
| Imię i Nazwisko                 | Dawid Kropidłowski                                                                                                 |
| Adres email                     |   krop3ks@gmail.com                                                                                              |
| **Opis Klienta**                |                                                                                                 |
| Nazwa Funkcjonalności           |  Rezerwacja ofert                                                                                              |
| **Cel Funkcjonalności**         |  Rezerwowanie i sprawdzanie dostępności ofert                                       |
| **Funkcjonalność**              |   Funkcjonalość będzie zawierać: <ul><li>możliwość dokonania rezerwacji danej oferty</li><li>sprawdzenie czy wybrana oferta jest dostępna</li><li>podstawowe informacje o ofercie, którą wybraliśmy</li><li>w przypadku niedostępności, podpowiadanie innej oferty</li></ul>                                                                |
| **Opis Elementów Graficznych**  | Opis lub rysunki elementów graficznych                                                          |
| **Opis Techniczny**             |                                                                                                 |
| Technologia Wykonania           | Frontend: HTML (HTML5), CSS (CSS3), JS (ES2023)<br> Backend: PHP (8.2.12)<br> Baza danych: MySQL (MariaDB 10.4.32)                                |
| Zależności                      | 	Środowisko uruchomieniowe: XAMPP<br>Wymagane API oraz baza danych zawarta w repozytorium                         |
| **Baza Danych**                 |                                                                                                 |
| Struktura Bazy Danych           | Baza danych wspólna razem z innymi funkcjonalnościami<br>Tabela offers:<ul><li>id - klucz gówny, automatycznie inkrementowany, wartość całkowita</li><li>name - nazwa oferty, łańcuch znaków</li><li>country - kraj lokalizacji obiektu oferty, łańcuch znaków</li><li>street - ulica lokalizacji obiektu oferty, łańcuch znaków</li><li>apartment_number - numer lokalu obiektu oferty, łańcuch znaków</li><li>post_code - kod pocztowy lokalizacji obiektu oferty, łańcuch znaków</li><li>day_price_pln - cena za dobę</li><li>hotelową w PLN, typ rzeczywisty (2 miejsca po przecinku)</li><li>description - opis oferty, typ tekstowy</li><li>views - ilość wyświetleń podstrony danej oferty, typ całkowity</li></ul>                                             |
| **Testowanie**                  |                                                                                                 |
| Scenariusz Testowy              | Plan testów, oczekiwane wyniki                                                                  |
| **Bezpieczeństwo**              | Walidacja formularza wyszukiwania: obsługa nieprawidłowo podanych danych, SQL-Injections oraz innych ataków z tego poziomu.<br>Inne zabezpieczenia obejmujące serwer cały serwer (analogiczne do obecnych w innych funkcjonalnościach).                        |
