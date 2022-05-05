<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/classes/admin.php');

function getReadQueries(){
    $queries=Admin::GetReadQueries();
    foreach($queries as $key=>$query){
        echo '
        <tr>
            <td>'.($key+1).'</td>
            <td>'.$query['name'].'</td>
            <td>'.$query['email'].'</td>
            <td>'.$query['contact'].'</td>
            <td>'.$query['message'].'</td>
            <td>
                <a href="//localhost/hospital2/admin/query-details.php?id='.$query['id'].'" class="table-view"><i class="fa-solid fa-eye"></i></a>
            </td>
        </tr>
        ';
    }
}