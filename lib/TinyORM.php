<?php

namespace DBProject\Lib;

use \PDO;
use Symfony\Component\Yaml\Yaml;

class TinyORM {
  // Méthodes de classe

  /*
   * Retourne les valeurs "désinfectés" si toutes les valeurs
   * attendues sont présentes
   */
  public static function sanitize($ary) {
    $sanitized = [];

    if (!self::hasExpectedPost()) { die('There is a missing key'); }

    foreach (self::authorized() as $authorized) {
      if (!isset($ary[$authorized])) { continue; }

      $value = htmlspecialchars($ary[$authorized]);
      $sanitized[":" . $authorized] = $value;
    }

    return $sanitized;
  }

  public static function all() {
    $db = self::dbConnect();
    $table = self::tableize(get_called_class());
    $req = $db->query("SELECT * FROM {$table}");

    return $req;
  }

  public static function find($id) {
    $db = self::dbConnect();
    $table = self::tableize(get_called_class());

    $sth = $db->prepare("SELECT * FROM {$table} WHERE id = :id");
    $sth->execute(array(':id' => $id));

    return $sth->fetch();
  }

  public static function create($ary) {
    $ary = self::sanitize($ary);

    $db = self::dbConnect();
    $table = self::tableize(get_called_class());

    $values = join(',', array_keys($ary));
    $columns = str_replace(':', '', $values);

    $req = $db->prepare("INSERT INTO {$table}({$columns}) VALUES ({$values})");
    $req->execute($ary);

    return $req;
  }

  public static function update($id, $ary) {
    $ary = self::sanitize($ary);

    $db = self::dbConnect();
    $table = self::tableize(get_called_class());
    $arySet = [];

    foreach(array_keys($ary) as $key) {
      array_push(
        $arySet,
        str_replace(':', '', $key) . '=' . $key
      );
    }

    $set = join(',', $arySet);
    $ary[':id'] = $id;

    $req = $db->prepare("UPDATE {$table} SET {$set} WHERE id = :id");
    $req->execute($ary);

    return $req;
  }

  public static function destroy($id) {
    $db = self::dbConnect();
    $table = self::tableize(get_called_class());

    $req = $db->prepare("DELETE FROM {$table} WHERE id = :id");
    $req->execute(array(':id' => $id));

    return $req;
  }

  private static function dbConnect() {
    $config = Yaml::parseFile('./config/database.yml');
    $bdd = new PDO("mysql:host={$config['host']};dbname={$config['database']};charset=utf8", $config['username'], $config['password'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    return $bdd;
  }

  private static function authorized() {
    if(get_called_class()::EXPECTED !== NULL) {
      return get_called_class()::EXPECTED;
    }

    return [];
  }

  private static function expected() {
    if (get_called_class()::EXPECTED !== NULL) {
      return get_called_class()::EXPECTED;
    }

    return [];
  }

  private static function hasExpectedPost() {
    foreach(self::expected() as $expected) {
      if (!array_key_exists($expected, $_POST)) {
        return false;
      }
    }

    return true;
  }

  private static function tableize($class) {
    return lcfirst(end(explode('\\', $class)));
  }
}
