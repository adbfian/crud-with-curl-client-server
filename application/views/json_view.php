<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		$dt = $this->db->get('person')->result();
		$data = array();
		$i 	  = 0;
		foreach ($dt as $person) {
			$data[$i]['mhs_nim'] = $person->mhs_nim;
			$data[$i]['mhs_nama'] = $person->mhs_nama;
			$data[$i]['mhs_alamat'] = $person->mhs_alamat;
			$data[$i]['mhs_jk'] = $person->mhs_jk;
			$data[$i]['mhs_tm'] = $person->mhs_tm;
			$data[$i]['mhs_ttl'] = $person->mhs_ttl;
			$data[$i]['mhs_asal'] = $person->mhs_asal;
			$data[$i]['mhs_jurusan'] = $person->mhs_jurusan;
			$data[$i]['mhs_agama'] = $person->mhs_agama;
			$i++;
		}
		echo json_encode($data);
	 ?>
</body>
</html>