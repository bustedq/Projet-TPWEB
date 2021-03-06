<!DOCTYPE html>
<html>
    <head>
        <title>EDITEUR LIST</title>
        <meta charset='utf-8'>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
           <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
          <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>
    <body>
        <h1>EDITEUR LIST</h1> 
		<style>
	.custab{
    border: 1px solid #ccc;
    padding: 5px;
    margin: 5% 0;
    box-shadow: 3px 3px 2px #ccc;
    transition: 0.5s;
    }
.custab:hover{
    box-shadow: 3px 3px 0px transparent;
    transition: 0.5s;
    }
    img {
        width:75px;
        height:50px;
    }
	</style>
<div class="container">
    <div class="row col-md-6 col-md-offset-2 custyle">
    <td> <a class='btn btn-success btn-xs' href='?page=formcreateediteur'><span class='glyphicon glyphicon-plus-sign'></span> Add</a> 
<table class="table table-striped custab"> 		
        <?php
             include "../includes/database.php";
             include "../includes/define.php";
            try{
                
                /*Sélectionne les valeurs dans les colonnes prenom et mail de la table
                 *users pour chaque entrée de la table*/
                $sth = $dbco->prepare("SELECT * FROM editeur");
                
                $sth->execute();
                
                /*Retourne un tableau associatif pour chaque entrée de notre table
                 *avec le nom des colonnes sélectionnées en clefs*/
                $result = $sth->fetchAll(PDO::FETCH_ASSOC);
                
				foreach ($result as $row => $editeur) {
					
					echo "<tr>";
						
						echo "<td>". $editeur['nom']."</td>";
                        echo "<td>". $editeur['adresse']."</td>";
                        
						echo "<td> <a class='btn btn-info btn-xs' href='?page=formupdateediteur&id=".$editeur['id_editeur']."'><span class='glyphicon glyphicon-edit'></span> Edit</a>";
                        echo "<td> <a class='btn btn-danger btn-xs' href='".$route['deleteediteur']."?id=".$editeur['id_editeur']."'><span class='glyphicon glyphicon-remove'></span> Delete</a>";
                        
					echo "</tr>";
				
				}
				
			echo "</table>";
                /*print_r permet un affichage lisible des résultats,
                 *<pre> rend le tout un peu plus lisible*/
          
            }
                  
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        ?>
		
		</table>
    </div>
    </body>
</html>
