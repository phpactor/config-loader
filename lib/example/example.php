<?php

$configDeserializer = new ConfigLoader(
    new Deserializers([
        'json' => new JsonDeserializer(),
        'yaml' => new YamlDeserializer(),
        'yml' => new YamlDeserializer()
    ]),
    new Candidates([
        new XdgPathCandidate('phpactor', 'phpactor.json', 'json', XdgPathCandidates::HOME),
        new PathCandidate([getcwd(), '.phpactor', 'json'], 'json'),
        new PathCandidate([getcwd(), '.phpactor', 'yaml'], 'yaml'),
    ])
);
