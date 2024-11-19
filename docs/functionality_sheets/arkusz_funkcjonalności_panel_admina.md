| **Sekcja**                          | **Szczegóły**                                                                                       |
|-------------------------------------|-----------------------------------------------------------------------------------------------------|
| **Pracownik Nadzorujący Kontakt z Klientem** |  KajetanPolcyn                                                                                                   |
| Imię i Nazwisko                     | Kajetan Polcyn                                                                                        |
| Adres email                         | kajetan.polcyn@gmail.com                                                                            |
| **Opis Klienta**                    | Firma rent4cent – firma oferująca usługi automatycznej rezerwacji hoteli na całym świecie  |
| Nazwa Funkcjonalności               | Interfejs Panelu Administratora                                                             |
| **Cel Funkcjonalności**             | Funkcjonalność umożliwi administratorom efektywne zarządzanie stroną, w tym dodawanie i edytowanie hoteli, kontrolowanie rezerwacji oraz zarządzanie użytkownikami i ich uprawnieniami. Ułatwi to utrzymanie porządku i aktualności na stronie oraz optymalizację obsługi klienta. |
| **Funkcjonalność**                  | Panel Administratora umożliwia: <ul><li>Dodawanie, edytowanie i usuwanie hoteli</li><li>Przeglądanie i zarządzanie rezerwacjami</li><li>Zarządzanie użytkownikami, w tym nadawanie ról i praw dostępu</li><li>Przeglądanie raportów i analizowanie statystyk związanych z rezerwacjami i obłożeniem hoteli</li></ul> |
| **Opis Elementów Graficznych**      | Panel powinien mieć przejrzysty interfejs z układem kart i zakładek. Elementy graficzne obejmują ikony zarządzania hotelami, rezerwacjami, użytkownikami. Dodatkowo planowany jest użycie odpowienich kolorów dla poszczególnych sekcji panelu, co ułatwi orientację. |
| **Opis Techniczny**                 | Panel admina ma działać jako część głównej aplikacji, ale dostep do niego bedą miały tylko osoby do tego uprawnione czyli takie które będą zalogowane na konto administratora.  |
| Technologia Wykonania               |Frontend: HTML (HTML5), CSS (CSS3),Backend: PHP (PHP 8.3),Baza danych: MySQL (MySQL 8.1)    |
| Zależności                          | Uruchamiać w środowisku XAMPP, Do działania wymagane API oraz baza danych |
| **Baza Danych**                     | Tak                                                                                                 |
| Struktura Bazy Danych               | Tabela `users`: <br> - `usersId` (INT, PK, AI) <br> - `usersName` (VARCHAR) <br> - `usersEmail` (VARCHAR) <br> - `usersUid` (VARCHAR) <br> - `usersPwd` (VARCHAR). |
| **Testowanie**                      | Cykliczne, Przed każdym wdrożeniem                                                                                                 |
| Scenariusz Testowy                  | <ul><li>Dodanie nowego hotelu i sprawdzenie, czy wyświetla się na stronie głównej</li><li>Przypisanie nowej roli użytkownikowi i weryfikacja dostępu do określonych sekcji panelu</li><li>Przeprowadzenie symulacji rezerwacji oraz usunięcie rezerwacji przez administratora</li></ul> |
| **Bezpieczeństwo**                  | Aby wejść na panel admina należy znać hasło do konta administratora. W panelu walidacja nieprawidłowych danych, obrona przed SQL injection i innych prób przejścia |
