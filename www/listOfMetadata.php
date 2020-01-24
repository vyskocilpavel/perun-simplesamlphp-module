<?php

use SimpleSAML\Metadata\MetaDataStorageHandler;
use \SimpleSAML\Module\perun\Disco;

$metadataHandler = MetaDataStorageHandler::getMetadataHandler();

$metadata = $metadataHandler->getList();
$filteredMetadata = Disco::doFilter($metadata);

$data = [];

foreach ($filteredMetadata as $metadata) {
    $item = [];
    $item['entityid'] = $metadata['entityid'];
    $item['name'] = $metadata['name'];
    $data[] = $item;
}

header('Content-type: application/json');
echo json_encode($data);
exit;
