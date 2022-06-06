<?php

namespace Arquitetura\Testes;

use Arquitetura\Telefone;
use PHPUnit\Framework\TestCase;

class TelefoneTest extends TestCase
{
    public function testTelefoneDeveSerRepresentadoComString()
    {
        $telefone = new Telefone('24', '22222222');
        $this->assertSame('(24) 22222222', (string) $telefone);
    }

    public function testTelefoneComODddInvalidoNaoDeveExistir()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('DDD inválido');
        new Telefone('ddd', '22222222');
    }

    public function testTelefoneComNumeroInvalidoNaoDeveExistir()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Número de telefone inválido');
        new Telefone('24', 'número');
    }
}