<?php

class File {
    
    public function createFile ($tasks) {
    
        $myfile = fopen("tasks.txt", "w") or die("Unable to open file!");
        fwrite($myfile, $tasks);
        fclose($myfile);
        
    }
    
    public function readFile ($filename) {
        
        $myfile = fopen($filename, "r") or die("Unable to open file!");
        $tasks = fread($myfile,filesize($filename));
        fclose($myfile);
        
        return $tasks;
    }
    
}
    
?>