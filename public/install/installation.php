<?php use app\Lib\Install;
$user_name_php = Install::get_user_php();
$root_path = substr(getcwd(), 0, -7);
$config
?><!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Installation - Seedbox Manager</title>        
        <link href="./components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link type="text/css" rel="stylesheet" href="./install/style.css">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--[if lt IE 9]>
            <script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>

    <body>
        <div  class="container marg" style="margin-top:50px">
            <h1 class="page-header dashboard"><i class="glyphicon glyphicon-wrench"></i> Guide d'installation</h1>
            <section class="row">
                <article class="col-md-12">
                    <div class="well well-sm">
                        <h4 class="titre-head">Démarrage de l'application</h4>
                        <div class="trait"></div>
                        <p>Indiquez le bon propriétaire des fichiers de l'application, copiez cette commande et l'exécuter en ROOT (super utilisateur).</p>
                        <code>chown -R <?php echo $user_name_php['name'].':'.$user_name_php['name'].' '.$root_path; ?>/</code>
                        <p>Exécutez le script install.sh pour compiler le programme de reboot en ROOT.</p>
                        <code>cd <?php echo $root_path; ?>/source-reboot-rtorrent/ </code>
                        <code>chmod +x install.sh &amp;&amp; ./install.sh</code>
                    </div>
                </article>
                <article class="col-md-12">
                    <div class="well well-sm">
                        <h4 class="titre-head">Comment obtenir les droits administrateurs ?</h4>
                        <div class="trait"></div>
                        <p>Pour obtenir les droits administrateurs il faut avant cela exécuter les commandes ci-dessus.</p>
                        <p>Ensuite rafraîchir cette page avec F5 par exemple. Cela aura pour conséquence de générer vos fichiers de configuration.</p>
                        <p>Puis ouvrez votre fichier de configuration avec un éditeur de texte.</p>
                        <code>nano <?php echo $root_path; ?>/conf/users/<?php echo $userName; ?>/config.ini</code>
                        <small><em>Je vous conseille de copier cette commande après rafraichissement normalement cette page ne s'affichera plus jamais.</em></small>
                        <p>Pour terminer, il vous suffit de mettre owner = yes à la place de no et de quitter en enregistrant.</p>
                    </div>
                </article>
                <article class="col-md-12">
                    <div class="well well-sm">
                        <h4 class="titre-head">Modifier la config par défault</h4>
                        <div class="trait"></div>
                        <form method="post" action="" role="form">
                            <input type="hidden" name="user_directory" value="<?php echo $config['user']['user_directory']; ?>">
                            <input type="hidden" name="scgi_folder" id="scgi_folder" value="<?php echo $config['user']['scgi_folder']; ?>">
                            <fieldset>
                                <legend>Barre de navigation</legend>
                                <div class="checkbox">
                                    <input type="checkbox" name="active_rutorrent" value="true" id="active_rutorrent" <?php if ($config['nav']['active_rutorrent'] == true) echo 'checked' ?> >
                                    <label for="active_rutorrent">Afficher le lien rutorrent</label>
                                </div>
                                <div class="form-group">
                                    <label for="url_rutorrent">L'url de rutorrent</label>
                                    <input type="url" class="form-control" name="url_rutorrent" id="url_rutorrent" value="<?php echo $config['nav']['url_rutorrent']; ?>">
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" name="active_cakebox" value="true" id="active_cakebox" <?php if ($config['nav']['active_cakebox'] == true) echo 'checked' ?> >
                                    <label for="active_cakebox">Afficher le lien cakebox</label>
                                </div>
                                <div class="form-group">
                                    <label for="url_cakebox">L'url de cakebox</label>
                                    <input type="url" class="form-control" name="url_cakebox" id="url_cakebox" value="<?php echo $config['nav']['url_cakebox']; ?>">
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend>Paramètre des serveurs FTP/sFTP</legend>
                                <div class="form-group">
                                    <label for="port_ftp">Port ftp</label>
                                    <input type="number" class="form-control" name="port_ftp" id="port_ftp" value="<?php echo $config['ftp']['port_ftp']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="port_sftp">Port sftp</label>
                                    <input type="number" class="form-control" name="port_sftp" id="port_sftp" value="<?php echo $config['ftp']['port_sftp']; ?>">
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend>Support</legend>
                                <div class="form-group">
                                    <label for="adresse_mail">Adresse du support</label>
                                    <input type="email" class="form-control" name="adresse_mail" id="adresse_mail" value="<?php echo $config['support']['adresse_mail']; ?>">
                                </div>
                            </fieldset>
                            <p class="text-right fix-marg-input">

                                <input type="hidden" name="owner_change_config">
                                <input type="submit" name="submit" value="Valider" class="btn btn-info">
                            </p>
                        </form>
                    </div>
                </article>
            </section>
        </div>
    </body>
</html>