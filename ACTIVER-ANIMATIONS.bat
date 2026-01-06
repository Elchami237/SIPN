@echo off
cls
echo ========================================
echo   ACTIVATION DES ANIMATIONS
echo ========================================
echo.
echo Nettoyage des caches...
echo.
php artisan cache:clear
php artisan view:clear
php artisan optimize
echo.
echo ========================================
echo          TERMINE !
echo ========================================
echo.
echo Les animations sont maintenant actives:
echo.
echo [OK] Fichier CSS animations.css cree
echo [OK] Fichier JS animations.js cree
echo [OK] Animations ajoutees au layout
echo [OK] Page A propos animee
echo.
echo Types d'animations ajoutees:
echo - Fade in au scroll
echo - Hover effects (lift, scale)
echo - Gradient anime
echo - Pulse subtil
echo - Transitions fluides
echo.
echo TESTEZ MAINTENANT:
echo http://localhost/a-propos
echo.
echo Scrollez pour voir les animations!
echo.
pause
