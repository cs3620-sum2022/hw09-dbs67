<?php

/**
 * Unit-test for the database.
 *
 * PHP Version 8
 *
 * @category UnitTests
 * @package  Tests
 * @author   Don Stringham <donstringham@weber.edu>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://weber.edu
 */

declare(strict_types=1);

namespace App\Tests;

use PHPUnit\Framework\TestCase;

/**
 * Tests database validation
 *
 * @property string _host
 * @property string _port
 * @property string _username
 * @property string _password
 * @property \MySQLi _connection
 * @property string _database
 * @category UnitTests
 * @package  App\Tests
 * @author   Don Stringham <donstringham@weber.edu>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://weber.edu
 */
class DatabaseTest extends TestCase
{
    /**
     * Set up data needed for every unit-test
     *
     * @category UnitTests
     * @package  App\Tests
     * @author   Don Stringham <donstringham@weber.edu>
     * @license  MIT https://opensource.org/licenses/MIT
     * @link     https://weber.edu
     * @return   void
     */
    public function setUp(): void
    {
        $this->_driver = "mysql";
        $this->_host = 'localhost';
        $this->_port = '3306';
        $this->_username = 'cs3620';
        $this->_password = 'letmein';
        $this->_database = 'cs3620';
        $this->_charset = 'utf8mb4';
        $dsn = $this->_driver . ":host=" . $this->_host . ";port=" . $this->_port . ";dbname=" . $this->_database . ";charset=" . $this->_charset;
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES => false,
        ];
        try {
            $this->_pdo = new \PDO($dsn, $this->_username, $this->_password, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Tests if unit-test can be run
     *
     * @category UnitTests
     * @package  App\Tests
     * @author   Don Stringham <donstringham@weber.edu>
     * @license  MIT https://opensource.org/licenses/MIT
     * @link     https://weber.edu
     * @return   void
     */
    public function testCanary(): void
    {
        // arrange & act & assert
        $this->assertTrue(true);
    }

    /**
     * Tests SELECT ALL statement.
     *
     * @category UnitTests
     * @package  App\Tests
     * @author   Don Stringham <donstringham@weber.edu>
     * @license  MIT https://opensource.org/licenses/MIT
     * @link     https://weber.edu
     * @return   void
     */
    public function testSelectAll(): void
    {
        // arrange
        $query = "SELECT * FROM " . $this->_database . ".test";
        $stmt = $this->_pdo->query($query);
        // act
        $rows = $stmt->rowCount();
        // assert
        $this->assertEquals(3, $rows);
    }
}
