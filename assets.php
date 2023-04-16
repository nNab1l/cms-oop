<?php 

class assets{
       public $destination;
       public $file;
       public $err;
       public $size;

    public function __construct(){
        $this->destination = 'assets/' . basename($_FILES['image']['name']);
        $this->file = $_FILES['image']['tmp_name'];
        $this->err = $_FILES['image']['error'];
        $this->size = filesize('assets/' . basename($_FILES['image']['name'])) / 1000000;
    }

    
  public function upload() {
    if (!$this->fileExists()) {
    if ($this->err == 0 && move_uploaded_file($this->file, $this->destination)) {
        echo "Bestand succesvol geupload en verplaatst naar {$this->destination} <br>";
        echo "grootte bestand:  " . $this->size . "MB";
    } 
      
    else {
        echo "Error: Er ging iets mis tijdens het uploaden.";
    }
    } 
    else if ($this->size > 3) {
      echo "Error: dit bestand is te groot.";
    } 
    else {
      echo "Error: dit bestand bestaat al.";
    }
  }

  private function fileExists() {
    return file_exists($this->destination);
  }
}




?>