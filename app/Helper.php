<?php 

function convertRupiah($money){
    return 'Rp. ' .substr(strrev(chunk_split(strrev($money),3, '.')), 1);
}

?>