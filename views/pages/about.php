<p>ss</p>
<p>ee</p>
<?php 

if (!isset($_SESSION['id'])) {
    echo "<form action='index.php?action=inscrpition' method='post' >

  <div class='form-row'>
    <div class='form-group col-md-6'>
      <label for='first_name'>Prénom</label>
      <input type='text' class='form-control' name='first_name' id='first_name' placeholder='Exemple : John'>
    </div>

    <div class='form-group col-md-6'>
      <label for='last_name'>Nom de fameille</label>
      <input type='last_name' class='form-control' id='last_name' placeholder='Exemple : Doe'>
    </div>
  </div>
  
  <div class='form-row'>
    <div class='form-group col-md-6'>
      <label for='form-label'>Email</label>
      <input type='email' class='form-control' name='email' id='form-label' placeholder='Exemple : john-doe@gmail.com'>
    </div>

    <div class='form-group col-md-6'>
      <label for='password'>Password</label>
      <input type='password' class='form-control' id='password' placeholder='Password'>
    </div>
  </div>


  </div>

  
  <button type='submit' class='btn btn-success' name='submit'>Save</button>
  <a href='/' class='btn-danger'>Cancel</a>
</form>";
}
?>