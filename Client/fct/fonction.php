<?php 

    function returnAllResultat($table,$colone=null,$condition=null)
    {
        global $cnx;
        if($colone != null && $condition != null){
            $sql    = "SELECT * FROM $table WHERE $colone = $condition ";
        }else{
            $sql    = "SELECT * FROM $table";
        }        
        $req    = $cnx->prepare($sql);
        $req->execute();
        $rows    = $req->fetch();
        return $rows;
    }
 
    function returnOneColumn($table,$select,$colone,$condition)
    {
        global $cnx;
        $sql    = "SELECT $select FROM $table WHERE $colone = $condition ";
        $req    = $cnx->prepare($sql);
        $req->execute();
        $col    = $req->fetchColumn();
        return $col;
    }

    function returnCount($table,$select,$colone,$condition)
    {
        global $cnx;
        $sql    = "SELECT COUNT($select) FROM $table WHERE $colone = $condition ";
        $req    = $cnx->prepare($sql);
        $req->execute();
        $col    = $req->fetchColumn();
        return $col;
    }
  
    function byOrder($table,$select,$colone,$condition,$order,$type='DESC',$limit=10)
    {
        global $cnx;
        $sql    = "SELECT $select FROM $table WHERE $colone = $condition ORDER BY $order $type LIMIT $limit";       
        $req    = $cnx->prepare($sql);
        $req->execute();
        $rows    = $req->fetchAll();
        return $rows;
    }
 
    function activate($status='1',$group,$type='DESC',$limit=10)
    {
        global $cnx;
        $sql    = "SELECT * FROM user WHERE Activate = $status AND GroupID = $group ORDER BY idUser $type LIMIT $limit";       
        $req    = $cnx->prepare($sql);
        $req->execute();
        $rows    = $req->fetchAll();
        return $rows;
    }
    function returnCountActivate($table,$select,$colone,$condition,$status = '1')
    {
        global $cnx;
        $sql    = "SELECT COUNT($select) FROM $table WHERE $colone = $condition AND Activate = $status ";
        $req    = $cnx->prepare($sql);
        $req->execute();
        $col    = $req->fetchColumn();
        return $col;
    }

    function returnAssur($table, $colone = null, $condition = null)
    {
        global $cnx;
    
        if ($colone != null && $condition != null) {
            $sql = "SELECT * FROM $table WHERE $colone = ?";
            $params = array($condition);
        } else {
            $sql = "SELECT * FROM $table";
            $params = array();
        }
    
        $req = $cnx->prepare($sql);
        $req->execute($params);
        $rows = $req->fetchAll();
        return $rows;
    }
    

    function returnOffre ($colone)
    {
        global $cnx;
  
        $sql    = " SELECT * FROM insurance,offer
                    WHERE insurance.idAsr = offer.idAsr                    
                    AND insurance.Nom = ? ";
        $req    = $cnx->prepare($sql);
        $req->execute(array($colone));
        $rows    = $req->fetchAll();

        
        echo '<div class="container">
        <h1 class="display-2 text-center text-secondary">Nos offres</h1><br>';
    
        if(!$rows){
            echo '
            <div class="container"><div class="alert mt-5 alert-warning" role="alert">
            Aucune offre pour le moment !
            </div></div>';
        }else{
            echo '<div class="row row-cols-1 mt-2 row-cols-md-2">';
            foreach($rows as $row){
            ?>    
            <div class="col mb-4">
            <div class="card">
    <div class="card-body">
        <?php
        $nom = $row['description'];
        $tarif = $row['tarif'];

        echo "<h4>Nom de l'offre : ","$nom</h4>";
       
        echo'<br>';
        echo "<h5 style='color: green;'>Tarif de l'offre : $tarif DT</h5>";

        

        if (!empty($row['rate'])) {
            echo " <span class='offre-rate'>-" . $row['rate'] . "%</span>";
        }
        ?>
    </div>
</div>
</div>
        
            <?php
                    }echo '</div>';
                }echo '</div>';
            }

?>
