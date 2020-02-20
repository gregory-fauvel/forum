
<!-- Affichage liste membre + changement de rôle -->

<?php

$connexion = mysqli_connect('localhost', 'root', '', 'forum');

if (isset($_POST['changerank'])) {

    $rank = $_POST['rank'];
    $login = $_POST['login'];

    $update_rank = "UPDATE utilisateurs SET rank = '$rank' WHERE login = '" . $login . "'";
    $query_updaterank = mysqli_query($connexion, $update_rank);
}

$recup_liste  = "SELECT id,login,name,surname,rank FROM utilisateurs";
$query_recup = mysqli_query($connexion, $recup_liste);
$resultat_liste = mysqli_fetch_all($query_recup, MYSQLI_ASSOC);

//  var_dump($resultat_liste);
?>

<table class='liste_membre'>
    <thead>
        <tr>
            <?php $taille = sizeof($resultat_liste) - 1;
            foreach ($resultat_liste[$taille] as $key => $value) { ?>
                <th><?php echo $key ?></th>


            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php $i = 0;
        while ($i <= $taille) {
        ?>
            <tr>
                <td> <?php echo $resultat_liste[$i]['id'] ?> </td>
                <td> <a href='membre.php?id=<?php echo $resultat_liste[$i]['id'] ?>'><?php echo $resultat_liste[$i]['login'] ?> </a></td>
                <td> <?php echo $resultat_liste[$i]['name'] ?> </td>
                <td> <?php echo $resultat_liste[$i]['surname'] ?> </td>
                <td>
                    <?php if ($resultat_liste[$i]['id'] != '1') { ?>
                        <form method='POST' action='profil.php'>
                            <input type="hidden" name="login" value="<?= $resultat_liste[$i]['login'] ?>">
                            <select name='rank'>
                                <option value='Admin' <?php if ($resultat_liste[$i]['rank'] == 'Admin') { ?> selected <?php } ?>> Admin </option>
                                <option value='Membre' <?php if ($resultat_liste[$i]['rank'] == 'Membre') { ?> selected <?php } ?>> Membre </option>
                            </select>
                </td>
                <td class='change_rank'> <input type='submit' name='changerank' value='Changer' /> </td>
                <td> <a href="include/delete_membre.php?id=<?php echo $resultat_liste[$i]['id'] ?>"><img src="img/delete.png" class="deleteicon"></a> </form>
                </td>
            <?php } else { ?>
                <?php echo $resultat_liste[$i]['rank'] ?> </td>
            </tr>
    <?php
                    }
                    $i++;
                } ?>
    </tbody>
</table>

<?php
?>