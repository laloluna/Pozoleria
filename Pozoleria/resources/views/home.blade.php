@extends('layouts.sideBar')

@section('description', 'Has ingresado exitosamente')

@section('content')

			<?php 
			strpos(Request::url(), 'home') ? $jj = 'active' : $jj = 'inactive';
			echo $jj;
        	?>

@endsection