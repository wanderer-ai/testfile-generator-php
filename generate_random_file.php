<?PHP

$json = '{
  "vertices": [
    {
      "_collection": "flow",
      "_id": "vertex_0",
      "_origin": true,
      "_x": 0,
      "_y": 0,
      "languages": [
        "en",
        "de"
      ],
      "topic": {
        "en": "Super chat flow",
        "de": "Super Chat-Flow"
      },
      "author": "Wanderer.ai",
      "license": "MIT",
      "builder": "wanderer.ai",
      "target": "web",
      "version": "0.0.1",
      "time": "2020-10-26T20:01:03.331Z"
    }
  ],
  "edges": [
    
  ]
}';

$data = json_decode($json, true);

for($i=1;$i<1000;$i++) {
	
	array_push($data['vertices'], [
		"message" => [
        		"en" => "Awesome message ".$i,
        		"de" => "Wundervolle Nachricht ".$i
      		],
      		"forgetful" => false,
		"_id" => "vertex_".$i,
		"_collection" => "message",
		"_origin" => false,
		"_x" => rand(-5000, 5000),
		"_y" => rand(-5000, 5000)
	]);

	array_push($data['edges'], [
		"type" => "or",
		"priority" => 10,
		"name" =>  "",
		"expose" => "",
		"method" => false,
		"condition" => false,
		"_id" => "edge_".$i,
		"_from" => "vertex_".($i-1),
		"_to" => "vertex_".$i,
		"_collection" => "leadsTo"
	]);

}

file_put_contents('super_chat_flow.json',json_encode($data, JSON_PRETTY_PRINT));
