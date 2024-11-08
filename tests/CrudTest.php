<?php
use PHPUnit\Framework\TestCase;

require_once 'config.php';
require_once 'Crud.php';

class CrudTest extends TestCase {
    protected $crud;

    protected function setUp(): void {
        $this->crud = new Crud();
    }

    public function testSelectAllFromTable() {
        $result = $this->crud->selectAllFromTable('Personne');
        $this->assertIsArray($result);
        $this->assertCount(20, $result);
    }

    public function testDeleteById() {
        $this->crud->deleteById('Personne', 1);
        $result = $this->crud->selectAllFromTable('Personne');
        $this->assertCount(19, $result);
    }

    public function testInsertPersonne() {
        $result = $this->crud->insertPersonne('Test', 'User', 'test.user@example.com', 1, '0600000021', 'password21');
        $this->assertTrue($result);

        $personnes = $this->crud->selectAllFromTable('Personne');
        $this->assertCount(21, $personnes);
    }

    public function testInsertLogement() {
        $result = $this->crud->insertLogement('Appartement', 70, 1, 1500, 150, '2023-01-16', 1, true, true, true, 3, true, 'Appartement de test');
        $this->assertTrue($result);

        $logements = $this->crud->selectAllFromTable('Logement');
        $this->assertCount(16, $logements);
    }

    public function testInsertAnnonce() {
        $result = $this->crud->insertAnnonce(1, '2023-01-16', 1, true, '2023-09-01', 2, 'disponible', 'Annonce de test');
        $this->assertTrue($result);

        $annonces = $this->crud->selectAllFromTable('Annonce');
        $this->assertCount(8, $annonces);
    }
}
?>