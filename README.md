<p align="center"><h1> Rapport du Projet GuessWhat fait par Corentin BONIFACIO </h1></p>

## Mon matériel :
*	Macbook pro 2020
*	Version PHP : 7.4.9
*	Version Git : 2.33.0
## Requis :
*	Composer
*	PHPUnit
*	Projet GuessWhat

## Installation de Composer :

Pour commencer, rendez-vous sur ce lien-là : https://getcomposer.org/
Aller dans la catégorie download puis télécharger Composer-Setup.exe.
Une fois téléchargés, lancez le setup et suivez les instructions :

Ne rien cocher et appuyez sur NEXT.

![github-small](https://i.imgur.com/HyV6aK7.png)

Définissez l’emplacement de votre exécuteur PHP (pour ma part, j’utilise l’exécuteur PHP fournis par WAMP64) ensuite faites NEXT, l’installateur vérifiera si l’emplacement de votre exécuteur est correct.

![github-small](https://i.imgur.com/L8J2DAU.png)

Ne définissez pas de PROXY et appuyez sur NEXT.

![github-small](https://i.imgur.com/7oHDWtE.png)

Puis, cliquez sur INSTALL, Composer vas-donc s’installer sur votre ordinateur.

![github-small](https://i.imgur.com/hr1TO69.png)

Pour vérifiez que Composer est bien installé, lancer votre invite de commande et lancer la commande « __composer__ ».
Si composer à bien été installer vous devriez obtenir ce résultat :

![github-small](https://i.imgur.com/AK6zUbQ.png)

## Installation de PHPUnit :

Dans un premier temps, git clone le projet GuessWhat dans le répertoire que vous voulez en faisant ces commandes-là :
Changer de répertoire : 

__cd C:\exemple__

Puis, Git clone le projet dans le répertoire :

__Git clone git@gitlab.com:okpu/guesswhat.git__

Pour accéder au projet cloné, faites tout simplement :

__cd guesswhat__

Ensuite, dans le projet GuessWhat effectuer un composer install comme ceci :

__composer install__

Si le moindre problème pouvait interrompre l’installation, faites :

__composer update__

PHPUnit est maintenant installé dans le dossier __\bin\phpunit__

Pour effectuer un test unitaires sur PHPUnit, faites :

__Php .\bin\phpunit__

Une fois cette commande effectuée, phpunit repérera les moindres erreurs dans votre fichier de Test.

## Résolutions des erreurs PHPUnit :
Comme vous pouvez le remarquer, __testCompareSameNameNoSameColor__, __testCompareNoSameCardNoSameColor__, __testCompareNoSameCardSameColor__ et __testToString__ ne sont pas implémenter, il y a donc 4 Failures.
Nous allons résoudre ça dès maintenant.

![github-small](https://i.imgur.com/h872gWJ.png)

Dans un premier temps, nous allons résoudre l’erreur dans la fonction __testCompareSameNameNoSameColor()__.
Accéder au fichier « __CardTest.php__ » accessible dans « __tests/Core/CardTest.php__ » puis l’ouvrir avec l’éditeur __PHPStorm__.
Dans un premier temps, supprimons les lignes situer dans la fonction :

![github-small](https://i.imgur.com/d1zAW23.png)

Puis remplacer par ceci :

![github-small](https://i.imgur.com/DeKz5Eb.png)

Dans la ligne : __$this->assertEquals(+1, CardGame32 ::compare($card1,$card2)) ;__
Le « +1 » situé dans la ligne de code a été remplacé, de base le nombre inscrit est « 0 ».
Le +1 a été mis pour correspondre à l’égalité, alors que de base Pique est au-dessus du Trèfle.
La fonction a maintenant été résolue, mais cela ne fonctionne toujours pas, car « __CardGame32.php__ » n’est pas modifié.
Dans un premier temps il faut définir un tableau qui définira qui est plus fort que qui ? (Trèfle plus fort que Pique ?)
Donc voici le tableau que j’ai choisi de définir j’ai donc associé les valeurs à 2,4,6,8

```
$TAB_COLOR = ["trèfle" => 2, "pique" => 4, "carreau" => 6, "coeur" => 8];
```

Nous allons définir via la fonction IF si la couleur est supérieure.
Pour commencer, nous allons rajouter une petite variable qui va appeler la fonction « __getColor()__ » et la transformé en minuscule.

```
$c1Color = strtolower($c1->getColor());
$c2Color = strtolower($c2->getColor());
```

Maintenant, nous allons implémenter le test :

```
  if ($c1Name ===  $c2Name]) {
      if($TAB_COLOR[$c1Color] === $TAB_COLOR[$c2Color]) {
        return 0;
      }
      return ($TAB_COLOR[$c1Color] > $TAB_COLOR[$c2Color]) ? +1 : -1;
    }
        return ($c1Name > $c2Name) ? +1 : -1;
  }

```
Vous pouvez maintenant tester votre code en faisant la commande :

__Php .\bin\phpunit__

Une fois le test effectué, phpunit vous dira qu’il vous reste plus que 3 erreurs à corriger.
Pour ne plus avoir ses 3 erreurs, je vais vous faire montrer mes fonctions dans mon CardTest.php :

![github-small](https://i.imgur.com/R0kB8fW.png)

__CardGame32.php__ :

![github-small](https://i.imgur.com/NKmgnEf.png)

__Card.php__ :

![github-small](https://i.imgur.com/WxBsjf7.png)

Une fois toutes ces modifications effectuées, vous pouvez tester votre code :

__Php .\bin\phpunit__

Une fois le test effectuer, vous devriez obtenir ceci :

![github-small](https://i.imgur.com/Wk25W0U.png)

### BRAVO ! VOUS AVEZ TERMINÉ LE CHALLENGE 1 & 2 !

## Liens :
* [Lien du dépot initial du projet GuessWhat](https://gitlab.com/okpu/guesswhat.git)
* [Lien de mon dépot](https://github.com/CorentinSIOdev/Projet-GuessWhat)
