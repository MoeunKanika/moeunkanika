<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Table Layout</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            text-align: center;
        }

        th,
        td {
            border: 1px solid black;
            padding: 10px;
        }

        th[colspan] {
            font-size: 20px;
        }

        button {
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <table>
        <!-- Row for Cambodia title -->
        <tr>
            <th colspan="9">Cambodia</th>
            <th colspan="2">Option</th>
        </tr>

        <!-- Header row (you can customize) -->
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>

        <!-- Data row -->
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><button>Update</button></td>
            <td><button>Delete</button></td>
        </tr>

        <!-- Another data row -->
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><button>Update</button></td>
            <td><button>Delete</button></td>
        </tr>
    </table>

</body>

</html>