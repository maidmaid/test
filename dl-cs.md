# Standard de développement 

## IDE

L'IDE utilisé est [PhpStorm](https://www.jetbrains.com/phpstorm/).

## PHP

D'une manière générale, les standards syntaxiques de Digital Link pour écrire du PHP suivent les standards de développement [PSR-1](http://www.php-fig.org/psr/psr-1/) et [PSR-2](http://www.php-fig.org/psr/psr-2/) du php-fig.

De plus, sont appliqués : 

- les règles de [structure de Symfony](http://symfony.com/doc/current/contributing/code/standards.html#structure),
- les [conventions de nommage de Symfony](http://symfony.com/doc/current/contributing/code/standards.html#naming-conventions),
- les règles de [conventions de nom de méthodes de Symfony](http://symfony.com/doc/current/contributing/code/conventions.html#method-names),
- les règles de [documentation de Symfony](http://symfony.com/doc/current/contributing/code/standards.html#documentation),
- les [conventions de nom de services de Symfony](http://symfony.com/doc/current/contributing/code/standards.html#service-naming-conventions) dans l'utilisation d'un DI (dependency injection).

L'outil [php-cs-fixer](http://cs.sensiolabs.org/) de Symfony permet le respect de ces standards et son utilisation est de vigueur. 

Exemple sommaire d'écriture d'une classe PHP respectant ces standards :

```php
<?php

namespace Acme;

/**
 * Coding standards demonstration.
 */
class FooBar
{
    const SOME_CONST = 42;

    private $fooBar;

    /**
     * @param string $dummy Some argument description
     */
    public function __construct($dummy)
    {
        $this->fooBar = $this->transformText($dummy);
    }

    /**
     * @param string $dummy Some argument description
     * @param array  $options
     *
     * @return string|null Transformed input
     *
     * @throws \RuntimeException
     */
    private function transformText($dummy, array $options = array())
    {
        $mergedOptions = array_merge(
            array(
                'some_default' => 'values',
                'another_default' => 'more values',
            ),
            $options
        );

        if (true === $dummy) {
            return;
        }

        if ('string' === $dummy) {
            if ('values' === $mergedOptions['some_default']) {
                return substr($dummy, 0, 5);
            }

            return ucwords($dummy);
        }

        throw new \RuntimeException(sprintf('Unrecognized dummy option "%s"', $dummy));
    }

    private function reverseBoolean($value = null, $theSwitch = false)
    {
        if (!$theSwitch) {
            return;
        }

        return !$value;
    }
}
```

## HTML

Le standard de développement de Digital Link pour écrire du HTML respecte celui de Mark Otto, fondateur du twitter bootstrap : http://codeguide.co/#html

Exemple sommaire d'écriture d'un document HTML respectant ces standards :

```html
<!DOCTYPE html>
<html lang="en-us">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <title>Page title</title>
  </head>
  <body>
    <img src="images/company-logo.png" alt="Company">
    <h1 class="hello-world">Hello, world!</h1>
  </body>
</html>
```

## CSS

Le standard de développement de Digital Link pour écrire du HTML respecte celui de Mark Otto, fondateur du twitter bootstrap : http://codeguide.co/#css

Exemple sommaire d'écriture d'une feuille CSS respectant ces standards :

```css
/* Good CSS */
.selector,
.selector-secondary,
.selector[type="text"] {
  padding: 15px;
  margin-bottom: 15px;
  background-color: rgba(0,0,0,.5);
  box-shadow: 0 1px 2px #ccc, inset 0 1px 0 #fff;
}
```
 
## Javascript

Le standard de développement de Digital Link pour écrire du HTML respecte le [standard proposé par Google](http://google-styleguide.googlecode.com/svn/trunk/javascriptguide.xml).
 
## Symfony

Les développements Symfony suivent les [best practices](http://symfony.com/doc/current/best_practices/index.html) Symfony.

### Namespace du bundle applicatif

> ``namespace Dl\[Project]\AppBundle;``

* ``[Project]`` est le nom du projet en cours et peut être abrégé avec des initiales.

Exemple:

> ``namespace Dl\Tpf\AppBundle;``

## Twig

Le standard de développement de Digital Link pour écrire des templates Twig respecte les [standards officiels](http://twig.sensiolabs.org/doc/coding_standards.html).

## Joomla

### Admin

#### Menu

> **Titre** : ``Menu [catégorie] [nom du menu] [code langue]``

> **Type de menu** :  ``menu-[catégorie]-[nom de catégorie]-[code langue]``

``[catégorie]`` est optionnel.

``[code langue]`` est écrit en minuscule.

``[catégorie]`` et ``[nom de menu]`` sont écrit en français, même dans un code langue différent.
 
Exemple:

> Titre : ``Menu été principal fr``

> Type de menu : ``menu-ete-principal-fr``
 
#### Module

> **Nom de module** : ``[page(s) assignée(s)] [nom du module] [code langue]``

> **Suffixe de classe CSS** : ``dl-[nom abrégé du module]``
 
``[page(s) assignée(s)]``  reprend la convention décrit dans le type de menu.

``[code langue]`` est écrit en minuscule.

``[nom de module]`` est écrit en français, même dans un code langue différent.
 
Exemple:

> Nom de module : ``Accueil slider fr``

> Suffixe de classe CSS: ``dl-slider``

### Dev
 
#### Méthode task dans le controller

> **Signature de méthode** :  ``public function [nom de la méthode]Task()``
 
``[nom de la méthode]`` est écrit en anglais.
 
Exemple:

> Signature de méthode :  ``public function refreshTomasTask()``

## Git

### Workflow

Le workflow utilisé est le [feature branch workflow](https://www.atlassian.com/git/tutorials/comparing-workflows/feature-branch-workflow).

![feature branch workflow](https://www.atlassian.com/git/images/tutorials/collaborating/comparing-workflows/feature-branch-workflow/01.svg)

La branche master doit toujours restée stable. Si un développement présente plusieurs étapes potentiellement instables, une branche doit être créée, puis mergée dans master (après un éventuel rebase sqash).

Chaque commit est le plus atomique possible: un par bug ou feature, voire un par sous-élément de bug ou feature.
 
### Message de commit

> ``#[ID du bug] [message]``

Exemple :

> ``#PdS15 Fix slider``

Le message du commit est :

- écrit en EN,
- fixé à 50 charactères,
- capitalisé (première lettre en majuscule),
- écrit à la form impérative (ex: _fix, update, remove, add, refactore, rename, move, improve, cleanup, import, revert, merge, use, check, reduce, ..._).

Article détaillant ces consignes : [http://chris.beams.io/posts/git-commit/](http://chris.beams.io/posts/git-commit/)
 
### Tag

Utilisation du [Semantic Versioning](http://semver.org/).

> ``v[MAJOR].[MINOR].[PATCH]``
 
Exemple :

> ``v1.7.1``

Un tag est appliqué à chaque version patch du projet.

Un fichier CHANGELOG.md à la racine du projet est présent et contient un résumé de toutes les versions avec leurs changements. Voilà un exemple à suivre de fichier [CHANGELOG.md](https://raw.githubusercontent.com/symfony/symfony/2.7/CHANGELOG-2.2.md).
