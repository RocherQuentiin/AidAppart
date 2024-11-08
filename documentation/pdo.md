# Documentation de l'objet PDO en PHP

## Introduction
PDO (PHP Data Objects) est une extension de PHP qui définit une interface pour accéder à une base de données. Elle fournit une méthode d'accès uniforme à plusieurs bases de données et permet d'exécuter des requêtes SQL de manière sécurisée.

## Connexion à une Base de Données
Pour se connecter à une base de données avec PDO, vous devez créer une instance de la classe `PDO`. Voici un exemple de connexion à une base de données MySQL :

```php
<?php
$dsn = 'mysql:host=localhost;dbname=testdb;charset=utf8';
$username = 'root';
$password = 'password';

try {
    $pdo = new PDO($dsn, $username, $password);
    // Définir le mode d'erreur de PDO sur Exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
```

## Exécution de Requêtes SQL
### Requêtes avec `query()`
La méthode `query()` est utilisée pour exécuter des requêtes SQL simples qui ne nécessitent pas de paramètres. Voici un exemple de sélection de toutes les entrées d'une table :

```php
<?php
$sql = 'SELECT * FROM users';
foreach ($pdo->query($sql) as $row) {
    print_r($row);
}
?>
```

### Requêtes avec `prepare()` et `execute()`
Pour des requêtes qui nécessitent des paramètres, il est recommandé d'utiliser les méthodes `prepare()` et `execute()` pour éviter les injections SQL. Voici un exemple d'insertion de données :

```php
<?php
$sql = 'INSERT INTO users (name, email) VALUES (:name, :email)';
$stmt = $pdo->prepare($sql);
$stmt->execute(['name' => 'John Doe', 'email' => 'john.doe@example.com']);
?>
```

## Gestion des Erreurs
PDO offre plusieurs modes de gestion des erreurs. Le mode par défaut est `PDO::ERRMODE_SILENT`, mais il est recommandé d'utiliser `PDO::ERRMODE_EXCEPTION` pour lancer des exceptions en cas d'erreur :

```php
<?php
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
```

## Transactions
PDO permet de gérer les transactions pour assurer l'intégrité des données. Voici un exemple de gestion de transaction :

```php
<?php
try {
    $pdo->beginTransaction();
    $pdo->exec("INSERT INTO users (name, email) VALUES ('Alice', 'alice@example.com')");
    $pdo->exec("INSERT INTO users (name, email) VALUES ('Bob', 'bob@example.com')");
    $pdo->commit();
} catch (Exception $e) {
    $pdo->rollBack();
    echo "Échec : " . $e->getMessage();
}
?>
```

## Conclusion
PDO est une interface puissante et flexible pour interagir avec des bases de données en PHP. Elle offre une méthode sécurisée pour exécuter des requêtes SQL et gérer les transactions. Pour plus de détails, consultez la [documentation officielle de PDO](https://www.php.net/manual/fr/book.pdo.php).
