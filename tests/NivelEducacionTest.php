<?php
use PHPUnit\Framework\TestCase;
define('DB_HOST', 'localhost');
define('DB_NAME', 'prueba8');
define('DB_PORT', '5432');
define('DB_USER', 'test');
define('DB_PASS', 'admin123');
class NivelEducacionTest extends TestCase
{
    private $pdo;

    protected function setUp(): void
    {
        $dsn = 'pgsql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME;
        $this->pdo = new PDO($dsn, DB_USER, DB_PASS);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function testCreateNivelEducacion()
    {
        $stmt = $this->pdo->prepare("INSERT INTO ds_niveleducacion (id, descripcion) VALUES (4, 'Postgrado')");
        $result = $stmt->execute();
        $this->assertTrue($result);
    }

    public function testReadNivelEducacion()
    {
        $stmt = $this->pdo->query("SELECT * FROM ds_niveleducacion WHERE id = 2");
        $nivel = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->assertNotEmpty($nivel);
        $this->assertEquals('PROFESIONAL', $nivel['descripcion']);
    }

    public function testUpdateNivelEducacion()
    {
        $stmt = $this->pdo->prepare("UPDATE ds_niveleducacion SET descripcion = 'SECON' WHERE id = 1");
        $result = $stmt->execute();
        $this->assertTrue($result);
    }

    public function testDeleteNivelEducacion()
    {
        $stmt = $this->pdo->prepare("DELETE FROM ds_niveleducacion WHERE id = 3");
        $result = $stmt->execute();
        $this->assertTrue($result);
    }

    protected function tearDown(): void
    {
        $this->pdo = null;
    }
}
