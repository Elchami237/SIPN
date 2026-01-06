@echo off
cls
echo ========================================
echo   ACTIVATION PAGE A PROPOS
echo ========================================
echo.
echo Nettoyage des caches...
echo.
php artisan route:clear
php artisan view:clear
php artisan cache:clear
php artisan optimize
echo.
echo ========================================
echo          TERMINE !
echo ========================================
echo.
echo La page "A propos" est maintenant active:
echo.
echo [OK] Route creee: /a-propos
echo [OK] Vue creee avec 4 sections
echo [OK] Lien ajoute dans la navbar
echo [OK] Lien ajoute dans le menu mobile
echo.
echo TESTEZ MAINTENANT:
echo http://localhost/a-propos
echo.
echo Sections de la page:
echo - Historique de l'entreprise
echo - Nos Valeurs (4 valeurs)
echo - Notre Vision
echo - Notre Mission (3 missions)
echo.
pause
