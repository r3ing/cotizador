<?php
	function Mayus($variable) {
		$variable = strtr(strtoupper($variable),"אטלעשביםףתחסהכןצü","ְָּׂÙֱֹֽ׃ÚִַֻֿׁײÜ");
		return $variable;
	}
?>