<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Client Information</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>bt client id</th>
        <th>brand</th>
        <!-- Add more columns as needed -->
    </tr>

    <?php foreach ($clients as $client): ?>
        <tr>
            <td><?php echo $client['Client']['id']; ?></td>
            <td><?php echo $client['Client']['name']; ?></td>
            <td><?php echo $client['Client']['bt_client_id']; ?></td>
            <td><?php echo $client['Client']['brand']; ?></td>

            <!-- Add more columns as needed -->
        </tr>
    <?php endforeach; ?>
    <?php unset($client); ?>
</table>


