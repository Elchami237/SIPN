// Configuration TinyMCE pour SIPN V2
const commonConfig = {
    height: 600,
    menubar: true,
    plugins: [
        'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
        'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
        'insertdatetime', 'media', 'table', 'help', 'wordcount', 'template'
    ],
    toolbar: 'undo redo | blocks | bold italic underline strikethrough | ' +
        'alignleft aligncenter alignright alignjustify | ' +
        'bullist numlist outdent indent | forecolor backcolor | ' +
        'link image media table | template | removeformat | code fullscreen',
    
    // Templates d'articles
    templates: [
        {
            title: 'Article standard',
            description: 'Structure de base pour un article',
            content: `<p class="lead">Introduction accrocheuse qui résume l'essentiel de l'article en quelques lignes.</p>
<h2>Premier titre de section</h2>
<p>Contenu de la première section avec des informations détaillées.</p>
<h2>Deuxième titre de section</h2>
<p>Contenu de la deuxième section.</p>
<blockquote>
<p>Citation importante ou point clé à mettre en évidence.</p>
</blockquote>
<h2>Conclusion</h2>
<p>Résumé et appel à l'action.</p>`
        },
        {
            title: 'Article avec image et texte côte à côte',
            description: 'Mise en page avec image à gauche et texte à droite',
            content: `<div style="display: flex; gap: 30px; align-items: center; margin: 2em 0;">
<div style="flex: 1;">
<img src="https://via.placeholder.com/400x300" alt="Description" style="margin: 0; border-radius: 8px;">
</div>
<div style="flex: 1;">
<h3>Titre de la section</h3>
<p>Texte explicatif à côté de l'image. Cette mise en page est idéale pour présenter un projet, un matériel ou une réalisation.</p>
<ul>
<li>Point important 1</li>
<li>Point important 2</li>
<li>Point important 3</li>
</ul>
</div>
</div>
<p>Suite de l'article...</p>`
        },
        {
            title: 'Annonce projet réalisé',
            description: 'Template pour présenter une réalisation',
            content: `<p class="lead">Nous sommes fiers d'annoncer la réalisation réussie du projet [NOM DU PROJET] pour notre client [NOM CLIENT].</p>
<h2>📋 Détails du projet</h2>
<ul>
<li><strong>Client :</strong> [Nom du client]</li>
<li><strong>Lieu :</strong> [Localisation]</li>
<li><strong>Durée :</strong> [Période]</li>
<li><strong>Type de service :</strong> [Location / Travaux / Construction]</li>
</ul>
<h2>🎯 Objectifs</h2>
<p>Description des objectifs du projet et des défis à relever.</p>
<h2>⚙️ Matériels et moyens déployés</h2>
<ul>
<li>Liste des équipements utilisés</li>
<li>Équipe mobilisée</li>
<li>Technologies mises en œuvre</li>
</ul>
<div class="callout callout-success">
<p><strong>Résultat :</strong> Décrivez les résultats obtenus, le respect des délais, la satisfaction client, etc.</p>
</div>
<p class="signature">L'équipe S.I.P.N.</p>`
        },
        {
            title: 'Liste avec icônes',
            description: 'Article avec liste à puces illustrée',
            content: `<p class="lead">Découvrez les principaux avantages de nos services.</p>
<h2>Nos points forts</h2>
<ul>
<li><strong>✅ Réactivité :</strong> Intervention rapide sur toute la région</li>
<li><strong>✅ Expertise :</strong> Plus de 20 années d'expérience dans le secteur du BTP</li>
<li><strong>✅ Matériels récents :</strong> Parc d'équipements moderne et bien entretenu</li>
<li><strong>✅ Équipe qualifiée :</strong> Personnel formé et certifié</li>
<li><strong>✅ Flexibilité :</strong> Solutions adaptées à vos besoins et votre budget</li>
<li><strong>✅ Qualité garantie :</strong> Respect des normes et des délais</li>
</ul>
<div class="callout">
<p>💡 <strong>Le saviez-vous ?</strong> Nous proposons également un service de maintenance préventive pour optimiser la durée de vie de vos équipements.</p>
</div>`
        }
    ],
    
    // Configuration des images
    image_advtab: true,
    image_caption: true,
    image_title: true,
    
    // Styles de contenu
    content_style: `
        body { 
            font-family: 'Open Sans', sans-serif; 
            font-size: 16px; 
            line-height: 1.6;
            color: #333;
            padding: 20px;
        }
        .lead {
            font-size: 1.25em;
            font-weight: 600;
            color: #555;
            line-height: 1.6;
            margin-bottom: 1.5em;
        }
        .callout {
            background: #f0f9ff;
            border-left: 4px solid #0284c7;
            padding: 1em 1.5em;
            margin: 1.5em 0;
            border-radius: 4px;
        }
        .callout-success {
            background: #f0fdf4;
            border-left-color: #22c55e;
        }
        .callout-warning {
            background: #fffbeb;
            border-left-color: #f59e0b;
        }
        .signature {
            text-align: right;
            font-style: italic;
            color: #666;
            margin-top: 2em;
        }
        h2 {
            color: #003B7A;
            border-bottom: 2px solid #F47920;
            padding-bottom: 0.3em;
            margin-top: 1.5em;
        }
        h3 {
            color: #F47920;
        }
    `,
    
    // Formats personnalisés
    style_formats: [
        {
            title: 'Paragraphe d\'introduction',
            selector: 'p',
            classes: 'lead'
        },
        {
            title: 'Encadré info',
            block: 'div',
            classes: 'callout',
            wrapper: true
        },
        {
            title: 'Encadré succès',
            block: 'div',
            classes: 'callout callout-success',
            wrapper: true
        },
        {
            title: 'Signature',
            selector: 'p',
            classes: 'signature'
        }
    ],
    
    // Configuration de base
    branding: false,
    promotion: false,
    relative_urls: false,
    remove_script_host: false,
    convert_urls: true,
};

// Initialiser TinyMCE pour le français
if (document.getElementById('content_fr')) {
    tinymce.init({
        ...commonConfig,
        selector: '#content_fr',
        language: 'fr_FR',
    });
}

// Initialiser TinyMCE pour l'anglais
if (document.getElementById('content_en')) {
    tinymce.init({
        ...commonConfig,
        selector: '#content_en',
        language: 'en',
    });
}
