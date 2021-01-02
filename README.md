Config Loader
=============

![CI](https://github.com/phpactor/config-loader/workflows/CI/badge.svg)

Library to load an application configuration file

Usage
-----

```php
$loader = new ConfigLoader(
    new Deserializers([
        'json' => new JsonDeserializer(),
    ]),
    new PathCandidates([
        new XdgPathCandidate('myapp', 'config.json', 'json'),
        new AbsolutePathCandidate(getcwd() . '/' . 'myapp.json', 'json'),
    ])
);
$config = $loader->load();
```

The above will:

- Load existing config from XDG config directory for `myapp` (e.g. `$HOME/.config/myapp/config.json`).
- Merge existing config from the current working directory if it exists.

Deserializers
-------------

- **JsonDeserializer**: Deserializes using `json_decode`. Very fast.
- **YamlDeserializer**: Deserializes using the Symfony YAML parser requires
  `symfony/yaml`

Path Candidates
---------------

- **XdgPathCandidate**: Represents candidate config file in the XDG config path for an application.
- **AbsolutePathCandidate**: Represents an arbitrary config file at an
  absolute path.

Contributing
------------

This package is open source and welcomes contributions! Feel free to open a
pull request on this repository.

Support
-------

- Create an issue on the main [Phpactor](https://github.com/phpactor/phpactor) repository.
- Join the `#phpactor` channel on the Slack [Symfony Devs](https://symfony.com/slack-invite) channel.

