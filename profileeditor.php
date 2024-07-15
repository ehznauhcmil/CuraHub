<?php
include 'db.php';

// فرض کنید که user_id = 1 باشد
$user_id = 1;

$sql = "SELECT * FROM users WHERE id = $user_id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
  <div class="container">
    <h1>Edit Profile</h1>
    <form action="submitProfile.php" method="post">
      <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
      <div class="form-row">
        <label for="name"><strong>Name:</strong></label><br />
        <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>">
      </div>
      <div class="form-row">
        <label for="gender"><strong>Gender:</strong></label><br />
        <input type="text" id="gender" name="gender" value="<?php echo $user['gender']; ?>">
      </div>
      <div class="form-row">
        <label for="birthday"><strong>Birthday:</strong></label><br />
        <input type="date" id="birthday" name="birthday" value="<?php echo $user['birthday']; ?>">
      </div>
      <div class="form-row">
        <label for="nric"><strong>NRIC:</strong></label><br />
        <input type="text" id="nric" name="nric" value="<?php echo $user['nric']; ?>">
      </div>
      <div class="form-row">
        <label for="address"><strong>Address:</strong></label><br />
        <input type="text" id="address" name="address" value="<?php echo $user['address']; ?>">
      </div>
      <div class="form-row">
        <label for="phone"><strong>Phone Number:</strong></label><br />
        <input type="text" id="phone" name="phone" value="<?php echo $user['phone']; ?>">
      </div>
      <div class="form-row">
        <label for="email"><strong>Email:</strong></label><br />
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>">
      </div>
      <div class="form-row">
        <label for="state"><strong>State:</strong></label><br />
        <input type="text" id="state" name="state" value="<?php echo $user['state']; ?>">
      </div>
      <div class="form-row">
        <label for="country"><strong>Country:</strong></label><br />
        <input type="text" id="country" name="country" value="<?php echo $user['country']; ?>">
      </div>
      <div class="button-container">
        <button type="submit" class="profile-button">Save Changes</button>
      </div>
    </form>
  </div>
</body>

</html>
<?php
$conn->close();
?>