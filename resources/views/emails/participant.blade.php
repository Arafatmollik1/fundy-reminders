<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
    <title>Email</title>
</head>
<body>
<h2>Participant Information</h2>

<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Amount</th>
        <th>Date of Month</th>
    </tr>
    <tr>
        <td>{{ $participant['name'] }}</td>
        <td>{{ $participant['email'] }}</td>
        <td>{{ $participant['amount'] }}</td>
        <td>{{ $participant['date_of_month'] }}</td>
    </tr>
</table>
</body>
</html>
