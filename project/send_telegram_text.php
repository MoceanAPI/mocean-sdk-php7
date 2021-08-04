<?php
	require_once "../vendor/autoload.php";

	use Mocean\Client;
	use Mocean\Client\Credentials\Basic;
	use Mocean\Command\Mc as CommandMC;
	use Mocean\Command\McBuilder as CommandMcBuilder;
	
	$client = new Client(new Basic("SydD2E4X1H", "zL2aW5lNzr"));
	
	$command1 = CommandMC::tgSendText()->setFrom("mocean")->setTo("813260944")->setContent("Test send telegram");
	$builder = CommandMcBuilder::create()->add($command1);
	
	$response = $client->command()->execute(array("mocean-command" => $builder));
	echo $response->getRawResponseData();

?>