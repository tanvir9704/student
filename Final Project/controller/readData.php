<?php 

require_once ('../model/model.php');

function fetchAllUsers(){
	//echo 'success';
	return showAllUsers();

}

function fetchAllDoctors(){
	//echo 'success';
	return showAllDoctors();

}


function fetchAllNurses(){
	//echo 'success';
	return showAllNurses();

}


function fetchUsers($username){
	return showUsers($username);

}

function fetchHistory(){
	//echo 'success';
	return showHistory();

}


function fetchHistoryAccepted(){
	//echo 'success';
	return showHistoryAccepted();

}





?>