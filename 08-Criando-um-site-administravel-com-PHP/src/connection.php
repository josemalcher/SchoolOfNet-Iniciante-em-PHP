<?php
/**
 * Created by PhpStorm.
 * User: josemalcher
 * Date: 16/01/2019
 * Time: 21:58
 */

mysqli_report(MYSQLI_REPORT_ERROR);

$conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWD, DB_NAME);