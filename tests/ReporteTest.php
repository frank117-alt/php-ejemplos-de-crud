<?php
use PHPUnit\Framework\TestCase;


define('DB_HOST', 'localhost');
define('DB_NAME', 'prueba8');
define('DB_PORT', '5432');
define('DB_USER', 'test');
define('DB_PASS', 'admin123');

class ReporteTest extends TestCase
{
    private $pdo;

    protected function setUp(): void
    {
        $dsn = 'pgsql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME;
        $this->pdo = new PDO($dsn, DB_USER, DB_PASS);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function testReporte()
    {
        $stmt = $this->pdo->query("
            SELECT e.apellido, n.descripcion
            FROM ds_empleado e
            JOIN ds_niveleducacion n ON e.id_niveleducacion = n.id
            JOIN ds_departamento d ON e.id_departamento = d.id
            WHERE (SELECT SUM(salario) FROM ds_empleado WHERE id_departamento = d.id) > 250000
            ORDER BY e.apellido;
        ");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->assertNotEmpty($result);
    }

    protected function tearDown(): void
    {
        $this->pdo = null;
    }
}
