# Setup
## Requirements: 
1. Docker 
2. DDEV (Docker Extension) https://ddev.com
3. PHP 8.2^
4. Symfony CLI

## Start project
### In Terminal:
1. `git clone https://github.com/FabianPierreUlrich/GymBuddys.git`
2. `cd GymBuddys`
3. `ddev start`
4. `ddev ssh (access PHP container)`
5. `composer install`
6. `php bin/console doctrine:database:create`
7. `php bin/console doctrine:migrations:migrate`

## Usage
1. Create Account via Registrieren
2. Login via Login
3. Create a Trainingsplan via Neuer Plan 
4. Click on the created Plan
5. Add Übung via Neue Übung 
6. Click on Plan again 
7. Add values via Werte hinzufügen 
8. Added Values are visible now below the created Übung

You can create multiple plans and excercises - all values are visible below every single excercise.
There is also a Home, About us and Contact page. 