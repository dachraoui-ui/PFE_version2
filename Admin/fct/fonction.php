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
        <h1 class="display-2 text-center text-secondary">Nos offres</h1>';
      
        if(!$rows){
            echo '
            <div class="container"><div class="alert mt-5 alert-warning" role="alert">
            Aucune offre pour le moment !
            </div></div>';
        }else{
            echo '
            <a role="button" href="?dir=add&type='.$colone.'" class="btn btn-primary">
                <i class="fa fa-plus" aria-hidden="true"></i> Create a new contract
            </a>'; 
            echo '<div class="row row-cols-1 mt-2 row-cols-md-2">';
            foreach($rows as $row){
            ?>    
            <div class="col mb-4">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">
    <span style="color: blue;">Offre :</span>
    <span class="description"><?php echo $row['description'];?></span>
 <br><br>  <span style="color: green;">Tarif :</span>
    <span class="tarif"><?php echo $row['tarif'];
        if (!empty($row['rate'])) {
            echo " <span class='offre-rate' style='color: red;'>-".$row['rate']."%</span>";
        }
    ?></span>
</h4>



<style>
    .description {
        font-size: 30px;
        color: black; 
        
    }

    .tarif {
        font-size: 20px; 
        color: darkgreen; 
       
    }

   
</style>


                    </div>
                </div>
            </div>        
            <?php
                    }echo '</div>';
                }echo '</div>';
            }
            ?>
<?php                
    
   
    function idAsr($type)
    {
        global $cnx;
        $sql    = "SELECT idAsr FROM insurance WHERE Nom = '$type' ";
        $req    = $cnx->prepare($sql);
        $req->execute();
        $col    = $req->fetchColumn();
        return $col;
    }
 
    function returnCount2($table,$select,$colone=null,$condition=null)
    {
        global $cnx;
        if($colone !=null && $condition != null){
            $sql    = "SELECT COUNT($select) FROM $table WHERE $colone = $condition ";
        }else{
            $sql    = "SELECT COUNT($select) FROM $table ";
        }
        $req    = $cnx->prepare($sql);
        $req->execute();
        $col    = $req->fetchColumn();
        return $col;
    }

    function getAllForms() {
        global $cnx;
    
        $sql = "SELECT form.*, user.Nom as 'Nom', user.Prenom as 'Prenom', insurance.Nom as 'insurance'
                FROM form
                INNER JOIN user ON form.idClt = user.idUser
                INNER JOIN insurance ON insurance.idAsr = form.idAsr
                WHERE user.GroupID = 0";
    
        $req = $cnx->prepare($sql);
        $req->execute();
        $rows = $req->fetchAll();
    
        return $rows;
    }
    
    function searchForms($search) {
        global $cnx;
    
        $sql = "SELECT form.*, user.Nom as 'Nom', user.Prenom as 'Prenom', insurance.Nom as 'insurance'
                FROM form
                INNER JOIN user ON form.idClt = user.idUser
                INNER JOIN insurance ON insurance.idAsr = form.idAsr
                WHERE user.GroupID = 0 
                AND (user.Nom LIKE ('%$search%') OR user.Prenom LIKE ('%$search%') OR insurance.Nom LIKE ('%$search%'))";
    
        $req = $cnx->prepare($sql);
        $req->execute();
        $rows = $req->fetchAll();
    
        return $rows;
    }
?>
