<?php

class Utility {

    public static function upload($index, $destination, $maxsize = FALSE, $extensions = FALSE) {
        //Test1: fichier correctement uploadé
        if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0)
            return FALSE;
        //Test2: taille limite
        if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize)
            return FALSE;
        //Test3: extension
        $ext = substr(strrchr($_FILES[$index]['name'], '.'), 1);
        if ($extensions !== FALSE AND !in_array($ext, $extensions))
            return FALSE;
        //Déplacement
        $name_file = $ext . rand(1, 999999) . $index . '.' . $ext;
        $temp2 = move_uploaded_file($_FILES[$index]['tmp_name'], $destination . $name_file);
        return array($temp2, $name_file);
    }

   /* public static function grid(array $donnees, array $noms_column,$type) {


        $size2 = count($noms_column);
        echo "<br/><br/>";
        echo "<article>";
        echo "<fieldset>";
        echo "<legend><h1>Liste des Animateurs</h1></legend>";
        echo "<table border=\"1\"> ";



        echo "<tr> ";
        for ($j = 0; $j < $size2; $j++) {

            echo "<th>" . $noms_column[$j] . "</th> ";
        }
        echo "<th>" . "Plus" . "</th> ";
        echo "</tr> ";

        echo "<tr> ";

        $gett = '';
        foreach ($donnees as $object) {
            $i = 0;
            $gett = '?';
            echo "<tr> ";
            while ($i < $size2) {

                $temp = $object->get_getter();
                $gett.=$noms_column[$i] . '=' . $temp . '&';
                if (in_array(substr(strrchr($temp, '.'), 1), array('pdf', 'doc', 'docx')))
                    echo "<td><a href=\"/mvc_test/libs/uploads/cv/\" >" . $temp . "</a></td>";
                elseif (in_array(substr(strrchr($temp, '.'), 1), array('png', 'gif', 'jpg', 'jpeg')))
                    echo "<td><img src=\"/mvc_test/libs/uploads/picture/" . $temp . "\" height=\"70\" width=\"60\" ></td>";
                else
                    echo "<td>" . $temp . "</td>";
                $i++;
            }
            echo "<td><a href=\"/mvc_test/".$type."/lookone" . substr($gett, 0, strlen($gett) - 1) . "\" >" . "Plus" . "</a></td>";

            echo "</tr> ";
        }


        echo "</table>";
        echo "</fieldset>";
        echo "</article>";
    } */

}

?>
