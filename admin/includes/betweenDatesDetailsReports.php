<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/classes/admin.php');


function getReports()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['start']) && isset($_POST['end'])) {
        $start = $_POST['start'];
        $end = $_POST['end'];
        $reports = Admin::GetReport($start, $end);
        foreach ($reports as $key => $report) {
            echo '
            <tr>
                <td>' . ($key + 1) . '</td>
                <td>' . $report['name'] . '</td>
                <td>' . $report['contact'] . '</td>
                <td>' . $report['gender'] . '</td>
                <td>' . $report['createdDate'] . '</td>
                <td>' . $report['updatedDate'] . '</td>
                <td>
                    <a href="//localhost/hospital2/admin/view-patient.php?id=' . $report['id'] . '"><i class="fa-solid fa-eye"></i></a>
                </td>
            </tr>
            ';
        }
    }
}
