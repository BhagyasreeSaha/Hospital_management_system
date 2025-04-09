<?php
include("../mymethods.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel - User Info</title>
  <style>
    /* styles.css */
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f9f9f9;
  color: #333;
}


.main-content {
  max-width: 1200px;
  margin: 2rem auto;
  padding: 1rem;
  background: white;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
}

h2 {
  margin-bottom: 1rem;
}

table {
  width: 100%;
  border-collapse: collapse;
}

table, th, td {
  border: 1px solid #ddd;
}

th, td {
  padding: 0.75rem;
  text-align: left;
}

th {
  background-color: #f4f4f4;
}

td button {
  padding: 0.5rem 1rem;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-weight: bold;
}

.edit-btn {
  background-color: #28a745;
  color: white;
}

.delete-btn {
  background-color: #dc3545;
  color: white;
}

.edit-btn:hover {
  background-color: #218838;
}

.delete-btn:hover {
  background-color: #c82333;
}


  </style>
</head>
<body>

  <main class="main-content">
    <section>
      <h2>User Information</h2>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Password</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $result=displayUserData();
          if ($result->num_rows > 0) 
          {
              // output data of each row
              while($row = $result->fetch_assoc())
              {
                  echo'
                  <tr>
                  <td>'.$row["reg_id"].'</td>
                  <td>'.$row["username"].'</td>
                  <td>'.$row["email"].'</td>
                  <td>'.$row["contact"].'</td>
                  <td>'.$row["password"].'</td>
                  <td>
                    <button class="edit-btn" onclick="editData(' . $row["reg_id"] . ')">Edit</button>
                    <button class="delete-btn" onclick="deleteData(' . $row["reg_id"] . ')">Delete</button>
                  </td>
                </tr>
                ';
              }
          }
             else {
            echo "0 results";
          }
        ?>
          
          
        </tbody>
      </table>
    </section>
  </main>
<script>
  function editData(reg_id)
  {
    window.location.href = `editdata.php?reg_id=${reg_id}`;
  }

  function deleteData(reg_id)
  {
    if(confirm("are you sure to delete the data?"))
    {
        $.ajax({
          url:"deleteData.php",
          method:"get",
          data:{"reg_id":reg_id},
          success:function(response)
          {
            alert(response);
            window.location.href="";
          }

        })
    }
  }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
