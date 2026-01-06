<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Test Langue</title>
    <style>
        body { font-family: Arial; padding: 40px; background: #f5f5f5; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h1 { color: #003366; }
        .btn { display: inline-block; padding: 15px 30px; margin: 10px; background: #FF6600; color: white; text-decoration: none; border-radius: 5px; font-weight: bold; }
        .btn:hover { background: #CC5200; }
        .info { background: #e3f2fd; padding: 15px; border-left: 4px solid #2196F3; margin: 20px 0; }
        .success { background: #e8f5e9; padding: 15px; border-left: 4px solid #4CAF50; margin: 20px 0; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🌍 Test du Système de Langue</h1>
        
        <div class="info">
            <strong>Instructions:</strong><br>
            Cliquez sur un bouton ci-dessous pour forcer la langue.
        </div>

        <div style="text-align: center; margin: 30px 0;">
            <a href="/language/fr" class="btn">🇫🇷 FRANÇAIS</a>
            <a href="/language/en" class="btn">🇬🇧 ENGLISH</a>
        </div>

        <div class="success">
            <strong>✓ Après avoir cliqué:</strong><br>
            Vous serez redirigé vers la page d'accueil dans la langue choisie.
        </div>

        <hr style="margin: 30px 0;">

        <h2>🔧 Dépannage</h2>
        
        <h3>Si ça ne fonctionne toujours pas:</h3>
        <ol>
            <li><strong>Utilisez la navigation privée</strong>
                <ul>
                    <li>Chrome/Edge: Ctrl + Shift + N</li>
                    <li>Firefox: Ctrl + Shift + P</li>
                </ul>
            </li>
            <li><strong>Videz le cache du navigateur</strong>
                <ul>
                    <li>Appuyez sur: Ctrl + Shift + Delete</li>
                    <li>Cochez "Cookies" et "Données en cache"</li>
                    <li>Cliquez "Effacer"</li>
                </ul>
            </li>
            <li><strong>Essayez un autre navigateur</strong></li>
        </ol>

        <h3>Vérifications:</h3>
        <ul>
            <li>✓ Fichiers de traduction créés (lang/fr.json, lang/en.json)</li>
            <li>✓ Middleware SetLocale configuré</li>
            <li>✓ Routes language.switch définies</li>
            <li>✓ Langue par défaut: Français</li>
        </ul>

        <div style="margin-top: 30px; padding: 20px; background: #fff3cd; border-left: 4px solid #ffc107;">
            <strong>⚠️ Note importante:</strong><br>
            Le problème vient probablement du cache de votre navigateur qui garde l'ancienne langue en session.
            La navigation privée est la solution la plus rapide!
        </div>
    </div>
</body>
</html>
