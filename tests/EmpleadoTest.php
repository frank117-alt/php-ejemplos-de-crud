<?php
use PHPUnit\Framework\TestCase;

define('DB_HOST', 'localhost');
define('DB_NAME', 'prueba8');
define('DB_PORT', '5432');
define('DB_USER', 'test');
define('DB_PASS', 'admin123');

class EmpleadoTest extends TestCase
{
    private $pdo;

    protected function setUp(): void
    {
        $dsn = 'pgsql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME;
        $this->pdo = new PDO($dsn, DB_USER, DB_PASS);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function testCreateEmpleado()
    {
        $stmt = $this->pdo->prepare("INSERT INTO ds_empleado (id, nombre, apellido, id_departamento, salario, id_niveleducacion) VALUES (11, 'Eva', 'López', 1, 50000, 2)");
        $result = $stmt->execute();
        $this->assertTrue($result);
    }

    public function testReadEmpleado()
    {
        $stmt = $this->pdo->query("SELECT * FROM ds_empleado WHERE id = 1");
        $empleado = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->assertNotEmpty($empleado);
        $this->assertEquals('melo', $empleado['nombre']);
    }

    public function testUpdateEmpleado()
    {
        $stmt = $this->pdo->prepare("UPDATE ds_empleado SET salario = 70000 WHERE id = 1");
        $result = $stmt->execute();
        $this->assertTrue($result);
    }

    public function testDeleteEmpleado()
    {
        $stmt = $this->pdo->prepare("DELETE FROM ds_empleado WHERE id = 11");
        $result = $stmt->execute();
        $this->assertTrue($result);
    }

    protected function tearDown(): void
    {
        $this->pdo = null;
    }
}
