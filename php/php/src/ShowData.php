<table class="table">
    <thead>
        <tr>
            <th scope="col">Type</th>
            <th scope="col">Username</th>
            <th scope="col">Password</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require 'dbconnect.php';

        $inputbox = $_POST["inputbox"];
        $sql = "SELECT * FROM รหัสต่างๆ WHERE Type = '$inputbox'";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <tr>
                    <td><?php echo $row['Type']; ?></td>
                    <td><?php echo $row['User_ID']; ?></td>
                    <td><?php echo $row['Pass_ID']; ?></td>
                </tr>
        <?php
            }
        } else {
            echo "0 results";
        }
        $conn->close();

        ?>
    </tbody>
</table>