<?php
  $page_title = 'Add User';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
  $groups = find_all('user_groups');
?>
<?php
  if(isset($_POST['add_user'])){

   $req_fields = array('full-name','username','password','level', 'email', 'adresse', 'telephone', 'cni', 'cnps' );
   validate_fields($req_fields);

   if(empty($errors)){
           $name   = remove_junk($db->escape($_POST['full-name']));
       $username   = remove_junk($db->escape($_POST['username']));
       $password   = remove_junk($db->escape($_POST['password']));
       $user_level = (int)$db->escape($_POST['level']);
       $email   = remove_junk($db->escape($_POST['email']));
       $adresse   = remove_junk($db->escape($_POST['adresse']));
       $telephone   = remove_junk($db->escape($_POST['telephone']));
       $cni   = remove_junk($db->escape($_POST['cni']));
       $cnps   = remove_junk($db->escape($_POST['cnps']));

       $password = sha1($password);
        $query = "INSERT INTO users (";
        $query .="name,username,password,user_level,status, email, adresse, telephone, cni, cnps";
        $query .=") VALUES (";
        $query .=" '{$name}', '{$username}', '{$password}', '{$user_level}', '1', '{$email}', '{$adresse}', '{$telephone}', '{$cni}', '{$cnps}' ";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s',"Employé créé! ");
          redirect('add_user.php', false);
        } else {
          //failed
          $session->msg('d',' Employé non créé!');
          redirect('add_user.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('add_user.php',false);
   }
 }
?>
<?php include_once('layouts/header.php'); ?>
  <?php echo display_msg($msg); ?>
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Ajouter un employé</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_user.php">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="full-name" placeholder="">
            </div>
            <div class="form-group">
                <label for="prenom">Prenom</label>
                <input type="text" class="form-control" name="username" placeholder="">
            </div>
            <div class="form-group">
                <label for="password">password</label>
                <input type="text" class="form-control" name="password" placeholder="">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" placeholder="">
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" class="form-control" name="adresse" placeholder="">
            </div>
            <div class="form-group">
                <label for="username">Ville</label>
                <input type="text" class="form-control" name="ville" placeholder="">
            </div>
            <div class="form-group">
                <label for="telephone">Telephone</label>
                <input type="text" class="form-control" name="telephone" placeholder="">
            </div>
            <div class="form-group">
                <label for="cni">cni</label>
                <input type="text" class="form-control" name="cni" placeholder="">
            </div>
            <div class="form-group">
                <label for="mdp">Mot_de_passe</label>
                <input type="password" class="form-control" name ="password"  placeholder="">
            </div>
            <div class="form-group">
                <label for="cnps">Cnps</label>
                <input type="text" class="form-control" name="cnps" placeholder="">
            </div>
            <div class="form-group">
              <label for="level">Statut</label>
                <select class="form-control" name="level">
                  <?php foreach ($groups as $group ):?>
                   <option value="<?php echo $group['group_level'];?>"><?php echo ucwords($group['group_name']);?></option>
                <?php endforeach;?>
                </select>
            </div>
            <div class="form-group clearfix">
              <button type="submit" name="add_user" class="btn btn-primary">Ajouter</button>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
