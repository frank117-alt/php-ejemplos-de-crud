<?php
use PHPUnit\Framework\TestCase;

define('DB_HOST', 'localhost');
define('DB_NAME', 'prueba8');
define('DB_PORT', '5432');
define('DB_USER', 'test');
define('DB_PASS', 'admin123');
class DepartamentoTest extends TestCase
{
    private $pdo;

    protected function setUp(): void
    {
        $dsn = 'pgsql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME;
        $this->pdo = new PDO($dsn, DB_USER, DB_PASS);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function testCreateDepartamento()
    {
        $stmt = $this->pdo->prepare("INSERT INTO ds_departamento (id, nombre_departamento, ciudad_departamento) VALUES (4, 'Departamento D', 'Ciudad W')");
        $result = $stmt->execute();
        $this->assertTrue($result);
    }

    public function testReadDepartamento()
    {
        $stmt = $this->pdo->query("SELECT * FROM ds_departamento WHERE id = 1");
        $departamento = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->assertNotEmpty($departamento);
        $this->assertEquals('tolima', $departamento['nombre_departamento']);
    }

    public function testUpdateDepartamento()
    {
        $stmt = $this->pdo->prepare("UPDATE ds_departamento SET ciudad_departamento = 'Barranquilla' WHERE id = 1");
        $result = $stmt->execute();
        $this->assertTrue($result);
    }

    public function testDeleteDepartamento()
    {
        $stmt = $this->pdo->prepare("DELETE FROM ds_departamento WHERE id = 4");
        $result = $stmt->execute();
        $this->assertTrue($result);
    }

    protected function tearDown(): void
    {
        $this->pdo = null;
    }
}
