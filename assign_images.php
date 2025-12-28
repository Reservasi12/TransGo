<?php
$services = App\Models\TransportService::all();
$images = [
    'transport-services/SPTAnjA0BBtONaT9I0wtPmAR9QUzpraYaBnC0Vs3.jpg',
    'transport-services/nli2RkOzle8gWVGM9nxlQ5ifVo83lEm3gsKAYOkc.jpg'
];
foreach ($services as $key => $service) {
    echo "Updating service: " . $service->name . "\n";
    $service->image = $images[$key % 2];
    $service->save();
}
echo "Done.";
