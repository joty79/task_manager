# Laravel Project Transfer Guide

Οδηγός μεταφοράς Laravel project από laptop σε desktop υπολογιστή με χρήση XAMPP και MySQL.

## 📋 Προαπαιτούμενα

- XAMPP με Apache και MySQL
- PHP
- Composer
- Git
- GitHub account
- Laravel

## 🚀 Βήματα Εγκατάστασης

### 1️⃣ Προετοιμασία Περιβάλλοντος

Εγκαταστήστε τα απαραίτητα εργαλεία:

- [XAMPP](https://www.apachefriends.org/download.html)
- [Composer](https://getcomposer.org/download/)
- [Git](https://git-scm.com/downloads)
- [Node](https://nodejs.org/en) κατεβάστε την LTS version

### 2️⃣ Εγκατάσταση Laravel

Ελένχουμε τα path του composer και του node καθώς και της PHP στο environment variables.

π.χ. στο PATH session του environment variables πρέπει να δούμε τα παρακέτω paths:

```
C:\xampp\php
C:\Users\<username>\AppData\Roaming\npm
C:\ProgramData\ComposerSetup\bin
```
και προαιρετικά 
```
C:\Program Files\nodejs
C:\Users\<username>\AppData\Roaming\Composer
```

### Εγκαταστήστε το Laravel με την παρακατω εντολη:

```composer global require laravel/installer```

### PHP Extensions
Βεβαιωθείτε ότι οι απαραίτητες PHP extensions είναι ενεργοποιημένες στο `php.ini`: 
Οι επεκτάσεις που χρειαζόμαστε είναι:
- pdo_mysql
- zip
- fileinfo

και τις ενεργοποιούμε βγάζοντας το σημείο μπροστά από το ;

*Μέσα στο  Control Panel του XAMPP, to php.ini file βρίσκεται εύκολα αφου κάνουμε κλικ στο config του apache.*

### 2️⃣ Clone του Repository

@Πλοήγηση στον φάκελο htdocs

 ```cd C:\xampp\htdocs```

Clone του repository

```git clone [your-github-repository-url]```

### 3️⃣ Εγκατάσταση Dependencies

 Είσοδος στον φάκελο του project

```cd your-project-name```

Εγκατάσταση PHP dependencies

```composer install```

### 4️⃣ Ρύθμιση Environment

Δημιουργία .env αρχείου

```cp .env.example .env```

Δημιουργία application key

```php artisan key:generate```

### 5️⃣ Ρύθμιση Database

1. Ανοίξτε το phpMyAdmin (http://localhost/phpmyadmin)
2. Δημιουργήστε νέα database
3. Ρυθμίστε το .env αρχείο:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=your_database_name  
DB_USERNAME=root  
DB_PASSWORD=
```

### 6️⃣ Database Migration

```php artisan migrate```

### 7️⃣ Storage Link

```php artisan storage:link```

### 8️⃣ Εκκίνηση του Project

#### Μέθοδος 1: Μέσω XAMPP

1. Εκκινήστε Apache και MySQL από το XAMPP Control Panel
2. Επισκεφθείτε: `http://localhost/your-project-name/public`

Αυτό το README.md παρέχει μια καθαρή και οργανωμένη δομή των οδηγιών με emojis για καλύτερη αναγνωσιμότητα.