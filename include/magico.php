<?php
 //METODOS MAGICOS o PREDEFINIDOS EMPIEZAN CON: "__(construct/destruct)"
	class BankBalance {
	private $balance;
	public function __get($propertyName) {
	 echo "No property " . $propertyName . "\n";
	}
	public function __set($propertyName, $value) {
	 echo "Cannot set $propertyName to $value\n";
 	}
}
$myAccount = new BankBalance();
$myAccount->balance = 100;
echo $myAccount->nonExistingProperty;
?>