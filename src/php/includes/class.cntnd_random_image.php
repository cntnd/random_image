<?php
/**
 * cntnd_random_image Class
 */
class CntndRandomImage {

    public static function folders($client){
        $db = new cDb;
        $cfg = cRegistry::getConfig();
        $cfgClient = cRegistry::getClientConfig();

        $folders = array();
        $sql = "SELECT DISTINCT dirname FROM :table WHERE idclient=:idclient ORDER BY dirname ASC";
        $values = array(
            'table' => $cfg['tab']['upl'],
            'idclient' => cSecurity::toInteger($client)
        );
        $db->query($sql, $values);
        while ($db->nextRecord()) {
            $dirname = $db->f('dirname');
            if (!empty($dirname)){
                $folders[] = $dirname;
            }
        }
        return $folders;
    }

    public static function randomImage($folder, $client){
        $cfgClient = cRegistry::getClientConfig();
        $uploadDir = $cfgClient[$client]["upl"]["htmlpath"];
        $uploadPath = $cfgClient[$client]["upl"]["path"];

        $images = array();
        if ($handle = opendir($uploadPath.$folder)) {
            while (false !== ($entry = readdir($handle))) {
                if (!is_dir($entry)){
                    $images[]=$uploadDir.$folder.$entry;
                }
            }
            closedir($handle);
        }
        $index = array_rand($images,1);
        return $images[$index];
    }

}
?>
