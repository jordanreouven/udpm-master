<?php 

    session_start(); //Permet d'utiliser les variables de sessions.

/*----------------------------------------------------------*/
/*---------- Récupère les varibales envoyé en POST ---------*/
/*----------------------------------------------------------*/
    $AgeConf=0;
    $erreur="";
    $_SESSION['email']="";
    $Prenom=htmlspecialchars(@$_POST['Prenom']);
    $Nom=htmlspecialchars(@$_POST['Nom']);
    $Login=htmlspecialchars(@$_POST['Login']);
    $Email=htmlspecialchars(@$_POST['Email']);
    $EmailConf=htmlspecialchars(@$_POST['EmailConf']);
    $Passwd=htmlspecialchars(@$_POST['Passwd']);
    $PasswdConf=htmlspecialchars(@$_POST['PasswdConf']);
    $DateDeNaissance=htmlspecialchars(@$_POST['DateDeNaissance']);
 
/*---------------------- Fin de block ----------------------*/
/*----------------------------------------------------------*/
 
 
 
/*----------------------------------------------------------*/
/*------- Fonction qui vérifie si l'email est valide -------*/
/*----------------------------------------------------------*/
 
    function EmailValide($email){ 
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
 
/*---------------------- Fin de block ----------------------*/
/*----------------------------------------------------------*/
 
 
/*--------------------------------------------------------------------------------------------*/
/*----- Vérifie si l'email et l'email de confirmation n'ont pas de caractère spéciaux --------*/
/*--------------------------------------------------------------------------------------------*/
 
    if(EmailValide($Email)==true && EmailValide($EmailConf)==true){
        if($Email==$EmailConf){
            $_SESSION['email']=true;
        }
        else{
            $_SESSION['email']=false;
            $erreur=1;
        }
    }
 
/*--------------------------------------- Fin de block ---------------------------------------*/
/*--------------------------------------------------------------------------------------------*/


/*--------------------------------------------------------------------------------------------*/
/*----- Vérifie si le mot de passe et le mot de passe  de confirmation sont identique --------*/
/*--------------------------------------------------------------------------------------------*/
        if($Passwd==$PasswdConf){
            $_SESSION['password']=true;
        }
        else{
            $_SESSION['password']=false;    
            $erreur=1;
        }
/*--------------------------------------- Fin de block ---------------------------------------*/
/*--------------------------------------------------------------------------------------------*/


/*--------------------------------------------------------------------------------------------*/
/*----- Vérifie si la date est valide --------*/
/*--------------------------------------------------------------------------------------------*/
       $Day = date('d', time());
        $Month = date('m', time());
        $Year = date('Y', time());  

        $date = date_parse($DateDeNaissance); // or date_parse_from_format("d/m/Y", $date);
        if (checkdate($date['month'], $date['day'], $date['year'])) {
            if(($Year-$date['year'])>14){
             $AgeConf=true;}
            
            else if(($Year-$date['year'])>14){
                    if(($Month-$date['month'])>0){
                        $AgeConf=true;
                    }
                    else if(($Day-$date['day'])>0){
                        $AgeConf=true;
                    }
                    else{ 
                        $AgeConf=false;    
                        $erreur=1;
                    }
            }        
        }
/*--------------------------------------- Fin de block ---------------------------------------*/
/*--------------------------------------------------------------------------------------------*/

/*--------------------------------------------------------------------------------------------*/
/*----- Login disponible --------*/
/*--------------------------------------------------------------------------------------------*/
                 include("Include/IncludeInscription.php");

                $varSql = "SELECT Login FROM user";
                $resultat=bdConnect($varSql, 'select');
                $ligne=$resultat->fetch();
                if($ligne['Login']==$Login){
                    $ConfLogin=false;    
                    $erreur=1;
                }
                else{
                    $ConfLogin=true;
                }

/*--------------------------------------- Fin de block ---------------------------------------*/
/*--------------------------------------------------------------------------------------------*/

/*--------------------------------------------------------------------------------------------*/
/*----- Ajout de l'utilisateur dans la base de donnée --------*/
/*--------------------------------------------------------------------------------------------*/

        if(($_SESSION['email']==true)&&($_SESSION['password'])&&($AgeConf==true)&&($ConfLogin==true)){
            
            
      $varSql ="Insert into user (Firstname, Surname, Email, Birthday, Login, Password) values ('$Prenom', '$Nom', '$Email', '$DateDeNaissance', '$Login', '$Passwd')";  
            //echo $varSql;
        bdConnect($varSql,"insert");
            mkdir("utilisateur/".$Login);
            mkdir("utilisateur/".$Login."/Music");
            mkdir("utilisateur/".$Login."/Img");
            mkdir("utilisateur/".$Login."/Img/ImgMusic");
            mkdir("utilisateur/".$Login."/Img/ImgProfil");
            header('Location:index.php');
        }


/*--------------------------------------- Fin de block ---------------------------------------*/
/*--------------------------------------------------------------------------------------------*/
?>
<div class="page">
    <div class="header">
        <nav>
            <ul>
                <li style="color:#b47f2a;font-size: 36pt;"><a href="index.php" style="text-decoration:none;color:#b47f2a;position:relative;top:30px;left:10px;">UD&amp;PM</a></li>
            </ul>
        </nav>
    </div>
    <div class="music" align=center>
        <h1>Pour pouvoir écouter et uploader <br>des musiques, incrivez-vous !<br>C'est simple et gratuit.</h1>
        <div>
            <?php if(isset($_GET['erreur'])){ ?>
                <div id="erreur"> 
                    <?php if($_SESSION['email']==false){ echo "Vos adresses email ne sont pas identiques ";}
                           if($AgeConf==false){ echo " Voud devez avoir minimum 14 ans ";}
                            if($_SESSION['password']==false){ echo"Vos mots de passe ne corresponde pas";}
                            if($ConfLogin==false){echo"Ce login est déjà pris ";} ?>
                </div>
            <?php } ?>
            <form action="?page=Inscription&erreur=<?php echo $erreur; ?>" method="post">
                <table id="TableInscription">
                    <tr>
                        <td><label>Prénom :</label></td><td><input type="text" id="Prenom" name="Prenom" placeholder="Prénom" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <td><label>Nom :</label></td><td><input type="text" id="Nom" name="Nom" placeholder="Nom" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <td><label>Login (au max 8 caractères) :</label></td><td><input type="text" id="Login" name="Login" placeholder="Login" autocomplete="off" min="3" max="12" required></td>
                    </tr>
                    <tr>
                        <td><label>Email :</label></td><td><input type="email" id="Email" name="Email" placeholder="abc.hello@chocolate.boudin" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <td><label>Confirmation de email :</label></td><td><input type="email" id="EmailConf" name="EmailConf" placeholder="" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <td><label>Mot de passe :</label></td><td><input type="password" id="Passwd" name="Passwd" placeholder="Mot de passe" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <td><label>Confirmation de mot de passe:</label></td><td><input type="password" id="PasswdConf" name="PasswdConf" placeholder="" autocomplete="off" required></td>
                    </tr>
                     <tr>
                        <td><label>Date</label></td><td><input type="date" id="DateDeNaissance" name="DateDeNaissance" placeholder="ex 16/05/1998" autocomplete="off" required></td>
                    </tr>
                </table><br>
                <input type="submit" id="submit" value="Confirmer"><input type="reset" id="reset" value="Réinitialiser">
            </form>
        </div>
    </div>
</div> 