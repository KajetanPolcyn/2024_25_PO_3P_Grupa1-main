# Arkusz Projektowania Rejestracja i Logowanie Użytkowników

| Sekcja                                       | Szczegóły                                                                                       |
|----------------------------------------------|-------------------------------------------------------------------------------------------------|
| **Pracownik Nadzorujący Kontakt z Klientem** | Raman Klimkovich                                                                                |
| Imię i Nazwisko                              | Raman Klimkovich                                                                                |
| Adres email                                  | raman.klimkovich2022p@zsepoznan.pl                                                              |
| **Opis Klienta**                             | System ma umożliwić użytkownikom łatwe tworzenie konta oraz logowanie się do istniejącego konta, co w przyszłości pozwoli na zarządzanie rezerwacjami oraz dostęp do spersonalizowanych usług. |
| Nazwa Funkcjonalności                        | Rejestracja i Logowanie Użytkowników                                                            |
| **Cel Funkcjonalności**                      | Umożliwienie użytkownikom rejestracji oraz logowania się do systemu, co w przyszłości pozwoli na korzystanie z funkcji rezerwacji hoteli, zarządzania kontem oraz personalizacji usług. |
| **Funkcjonalność**                           | Użytkownicy mogą zarejestrować swoje konta, podając wymagane dane, takie jak imię, nazwisko, adres e-mail, nazwa użytkownika i hasło. Po zarejestrowaniu się użytkownicy mogą logować się do swojego konta, wprowadzając nazwę użytkownika lub e-mail i hasło. System weryfikuje dane logowania i umożliwia dostęp do profilu użytkownika. |
| **Opis Elementów Graficznych**               | ![Strona rejestracji](../resources/LOGOWANIE_3.svg)<br><br>![Strona logowania](../resources/LOGOWANIE_2.svg) |
| **Opis Techniczny**                          | System powinien być responsywny i działać na wszystkich urządzeniach. Formy będą walidowane po stronie klienta oraz serwera. |
| Technologia Wykonania                        | Frontend: _HTML (HTML5), CSS (CSS3), JS (ES2023)_<br>Backend: _PHP (8.2.12)_<br>Baza danych: _MySQL (MariaDB 10.4.32)_<br>   |
| Zależności                                   | Uruchamiać w środowisku XAMPP, Do działania wymagane API oraz baza danych.                                                              |
| **Baza Danych**                              |                                                                                                 |
| Struktura Bazy Danych                        | Tabela `users`: <br> - `usersId` (INT, PK, AI) <br> - `usersFname` (VARCHAR) <br> - `usersLname` (VARCHAR) <br> - `usersEmail` (VARCHAR) <br> - `usersUid` (VARCHAR) <br> - `usersPwd` (VARCHAR). |
| **Testowanie**                               | - Sprawdzenie, czy wszystkie wymagane pola formularza są obecne. <br> - Weryfikacja, czy rejestracja odbywa się prawidłowo z poprawnymi danymi. <br> - Sprawdzenie, czy system wyświetla odpowiedni komunikat o błędzie, gdy użytkownik próbuje zarejestrować konto z już istniejącym adresem e-mail. <br> - Testowanie logowania przy użyciu poprawnych i błędnych danych logowania. |
| Scenariusz Testowy                           | 1. Zarejestruj nowe konto z poprawnymi danymi - oczekiwany wynik: konto utworzone. <br> 2. Spróbuj zarejestrować konto z istniejącym e-mailem - oczekiwany wynik: błąd. <br> 3. Zaloguj się z poprawnymi danymi - oczekiwany wynik: zalogowanie do systemu. <br> 4. Zaloguj się z błędnymi danymi - oczekiwany wynik: błąd logowania. |
| **Bezpieczeństwo**                           | - Hasła będą przechowywane w formie zaszyfrowanej przy użyciu bcrypt.                                |
