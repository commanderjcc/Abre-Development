<?php
/*
* Copyright (C) 2019 Mason City Schools.
*
* This program is free software: you can redistribute it and/or modify
* it under the terms of the Affero General Public License version 3
* as published by the Free Software Foundation.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU Affero General Public License for more details.
*
* You should have received a copy of the Affero General Public License
* version 3 along with this program.  If not, see https://www.gnu.org/licenses/agpl-3.0.en.html.
*/

//required verifications
require_once(dirname(__FILE__) . '/../../../../core/abre_verification.php'); //required verification security
require(dirname(__FILE__) . '/../../../../core/abre_dbconnect.php');

$siteID = intval($_SESSION['siteID']);
$operation = $_POST['operation'];
$data = $_POST['data'];

if ($operation === 'update') {
    $sql = "UPDATE moods_contact_list set email = ?, admin = ?, counselor = ? Where ID = ? and buttonName = ? and siteID = " . $siteID;
    $stmt = $db->stmt_init();
    $stmt->prepare($sql);
    $stmt->bind_param('siiis',$data['email'],intval($data['admin']),intval($data['counselor']),intval($data['id']),$data['button']);
    $stmt->execute();
    $stmt->close();
} elseif ($operation === 'delete') {
    $sql = "Delete From moods_contact_list Where id = ? and buttonName = ? and siteID =" . $siteID;
    $stmt = $db->stmt_init();
    $stmt->prepare($sql);
    $stmt->bind_param('is',intval($data['id']),$data['button']);
    $stmt->execute();
    $stmt->close();
} elseif ($operation === 'add') {
    $sql = "INSERT INTO moods_contact_list(buttonName,email,admin,counselor,siteID) values (?,?,?,?,?)";
    $stmt = $db->stmt_init();
    $stmt->prepare($sql);
    $stmt->bind_param('ssiii', $data['button'], $data['email'], intval($data['admin']), intval($data['counselor']), $siteID);
    $stmt->execute();
    echo $stmt->insert_id;
    $stmt->close();
}