<!-- MODAL BOOTSTRAP -->

    <div class="modal fade" id="popupreboot" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                 <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Avertissement</h4>
                </div>
                <div class="modal-body">
                    <p>&Ecirc;tes-vous sûr de vouloir redémarrer votre session rtorrent ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <form action="index.php" method="post">
                        <input type="hidden" name="reboot">
                        <input type="submit" value="Redémarrer" class="btn btn-info">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- popup about us -->
    <div class="modal fade" id="popupinfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                 <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">A propos</h4>
                </div>
                <div class="modal-body">
                    <p class="textmodaleabout">Application web par Backtoback & Magicalex</p>
                    <p class="textmodaleabout">Contacter les développeurs : <a href="mailto:magicalex14000@gmail.com" target="_blank">magicalex14000@gmail.com</a></p>
                    <p class="textmodaleabout"><strong>Version 2.2-alpha</strong> <em>en développement.</em></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- popup logout -->
    <div class="modal fade" id="popuplogout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                 <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="glyphicon glyphicon-log-out"></i> Déconnexion</h4>
                </div>
                <div class="modal-body">
                    <p>&Ecirc;tes-vous sûr de vouloir vous déconnecter du serveur ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <a href="?logout" class="btn btn-danger">Déconnexion</a>
                </div>
            </div>
        </div>
    </div>

    <?php if ( $user->is_owner() === true && isset($_GET['option']) ) { ?>
    <!-- popup delete user -->
    <div class="modal fade" id="delete-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                 <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="user-titre-modal"></h4>
                </div>
                <div class="modal-body">
                    <p>&Ecirc;tes-vous sûr de vouloir supprimer la configuration de cette utilisateur ?</p>
                    <p>Cette action est réversible.<br>Dès que votre utilisateur va se connecter les fichiers de configuration seront généré automatiquement (configuration par défaut).</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <form action="index.php?edit" method="post">
                        <input type="hidden" name="delete-userName" id="delete-userName">
                        <input type="submit" value="Supprimer" class="btn btn-danger">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

    </body>

    <script type="text/javascript" src="./js/jquery.js"></script>
    <script type="text/javascript" src="./js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./js/application.js"></script>

</html>