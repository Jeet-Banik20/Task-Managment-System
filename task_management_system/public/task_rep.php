<?php
include('connect.php');
require '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf= new Dompdf();

$html= '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocPDF</title>
    <style>
        *{
            font-family: "Times New Roman", Times, serif;
        }
        h2{
            text-align: center;
        }
        table{
            margin: auto;
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            font-size: 1rem;
        }
        th{
            background-color: #e5e5e5;
        }
        th, td{
            padding: 10px;
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h2>Task\'s List</h2>
    <table>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Priority</th>
            <th>Due Date</th>
        </tr>';

$user_id= $_SESSION['user_id'];
$sql= "SELECT title, task_description, task_status, task_priority, due_date FROM tasks WHERE user_id= '$user_id'";
$rows= mysqli_query($conn, $sql);

while ($row=mysqli_fetch_assoc($rows)) {
    $html.= '
        <tr>
            <td>'.ucfirst($row['title']).'</td>
            <td>'.ucfirst($row['task_description']).'</td>
            <td>'.str_replace("_", " ", ucfirst($row['task_status'])).'</td>
            <td>'.ucfirst($row['task_priority']).'</td>
            <td>'.date('d-m-Y', strtotime($row['due_date'])).'</td>
        </tr>
    ';
}

$html.='
    </table>
</body>
</html>
';

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("task_rep.pdf", array("Attachment"=>false));
?>